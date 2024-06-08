<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simulação de Chat</title>

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