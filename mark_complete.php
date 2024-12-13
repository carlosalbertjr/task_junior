<?php
session_start();

// Inclua as classes necessárias antes de usar unserialize.
require 'Task.php';
require 'TaskManager.php';

// Restaure o estado do TaskManager.
$taskManager = unserialize($_SESSION['taskManager']);

// Recupere a tarefa pelo ID e marque-a como concluída.
$task = $taskManager->getTaskById($_GET['id']);
if ($task) {
    $task->markAsComplete();
}

// Atualize a sessão com o estado modificado.
$_SESSION['taskManager'] = serialize($taskManager);

// Redirecione de volta para a página principal.
header('Location: index.php');
exit;
?>
