<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .chat-box {
            border: 1px solid #ccc;
            padding: 10px;
            width: 50%;
            margin-bottom: 20px;
            height: 300px;
            overflow-y: scroll;
        }

        .message {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        .question {
            font-weight: bold;
        }

        .response {
            color: #555;
        }

        .controls {
            margin-top: 10px;
        }

        .controls button {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <h1>Simulação de Chat</h1>

    <div class="chat-box" id="chatBox">
        <?php
        session_start();
        if (!isset($_SESSION['chat'])) {
            $_SESSION['chat'] = [];
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['message']) && isset($_POST['type'])) {
                $message = htmlspecialchars($_POST['message']);
                $type = $_POST['type'];
                $_SESSION['chat'][] = ['message' => $message, 'type' => $type];
            } elseif (isset($_POST['clear'])) {
                $_SESSION['chat'] = [];
            } elseif (isset($_POST['delete']) && isset($_POST['index'])) {
                array_splice($_SESSION['chat'], $_POST['index'], 1);
            } elseif (isset($_POST['save'])) {
                $file = fopen("conversa.txt", "w");
                foreach ($_SESSION['chat'] as $chat) {
                    fwrite($file, ($chat['type'] == 'question' ? 'Pergunta: ' : 'Resposta: ') . $chat['message'] . "\n");
                }
                fclose($file);
                echo "<p>Conversa salva em conversa.txt</p>";
            }
        }

        foreach ($_SESSION['chat'] as $index => $chat) {
            echo '<div class="message ' . $chat['type'] . '">';
            echo '<span>' . ($chat['type'] == 'question' ? 'Pergunta: ' : 'Resposta: ') . $chat['message'] . '</span>';
            echo '<form method="POST" style="display:inline;">
                    <input type="hidden" name="index" value="' . $index . '">
                    <button type="submit" name="delete">Apagar</button>
                  </form>';
            echo '</div>';
        }
        ?>
    </div>

    <form method="POST">
        <input type="text" name="message" placeholder="Digite a mensagem" required>
        <select name="type">
            <option value="question">Pergunta</option>
            <option value="response">Resposta</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
    <div class="controls">
        <form method="POST" style="display:inline;">
            <button type="submit" name="clear">Apagar Todas as Mensagens</button>
        </form>
        <form method="POST" style="display:inline;">
            <button type="submit" name="save">Salvar Conversa</button>
        </form>
    </div>
</body>

</html>