<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['username'] = $_POST['username'];
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div id="interface">
        <h1>Login</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Digite seu nome" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
