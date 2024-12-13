<?php
session_start();
require 'TaskManager.php';
require 'Task.php';

$taskManager = unserialize($_SESSION['taskManager']);
$task = $taskManager->getTaskById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskManager->editTask($_POST['id'], $_POST['title'], $_POST['description'], $_POST['status']);
    $_SESSION['taskManager'] = serialize($taskManager);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar Tarefa</title>
</head>
<body>
    <div id="interface">
        <h1>Editar Tarefa</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $task->id ?>">
            <input type="text" name="title" value="<?= htmlspecialchars($task->title) ?>" required>
            <textarea name="description" required><?= htmlspecialchars($task->description) ?></textarea>
            <select name="status">
                <option value="Pendente" <?= $task->status === 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                <option value="Concluído" <?= $task->status === 'Concluído' ? 'selected' : '' ?>>Concluído</option>
            </select>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
