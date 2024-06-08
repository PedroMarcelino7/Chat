<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simulação de Chat</title>
</head>
<body>
    <h1>Simulação de Chat</h1>
    
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
