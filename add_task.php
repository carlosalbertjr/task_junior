<?php
session_start();
require 'TaskManager.php';
require 'Task.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskManager = unserialize($_SESSION['taskManager']);
    $newTask = new Task(uniqid(), $_POST['title'], $_POST['description']);
    $taskManager->addTask($newTask);
    $_SESSION['taskManager'] = serialize($taskManager);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Adicionar Tarefa</title>
</head>
<body>
    <div id="interface">
        <h1>Adicionar Tarefa</h1>
        <form method="POST">
            <input type="text" name="title" placeholder="Título" required>
            <textarea name="description" placeholder="Descrição" required></textarea>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
