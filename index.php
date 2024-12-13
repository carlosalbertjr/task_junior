<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require 'TaskManager.php';
require 'Task.php';

if (!isset($_SESSION['taskManager'])) {
    $_SESSION['taskManager'] = serialize(new TaskManager());
}

$taskManager = unserialize($_SESSION['taskManager']);
$tasks = $taskManager->getTasks();

// Verifica se o logoff foi solicitado
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Gerenciamento de Tarefas</title>
</head>
<body>
    <div id="interface">
        <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
        <a href="?action=logout">Logoff</a>
        <h2>Tarefas</h2>
        <a href="add_task.php">Adicionar Tarefa</a>
        <br><br>
        <table>
            <tr id="cabecalho">
                <td>Tarefa</td>
                <td>Descrição</td>
                <td>Status</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php foreach ($tasks as $task): ?>
                <tr class="tarefa">
                    <td><?= htmlspecialchars($task->title) ?></td> 
                    <td><?= htmlspecialchars($task->description) ?></td>
                    <td><?= htmlspecialchars($task->status) ?></td>
                    <td><a href="edit_task.php?id=<?= $task->id ?>">Editar</a></td>
                    <td><a href="delete_task.php?id=<?= htmlspecialchars($task->id) ?>">Excluir</a></td>
                    <?php if ($task->status === 'Pendente'): ?>
                        <td><a href="mark_complete.php?id=<?= $task->id ?>">Concluir</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
<?php $_SESSION['taskManager'] = serialize($taskManager); ?>
