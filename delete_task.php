<?php
session_start();

// Inclua as classes necessárias.
require 'Task.php';
require 'TaskManager.php';

// Restaure o estado do TaskManager da sessão.
if (!isset($_SESSION['taskManager'])) {
    die("Erro: Gerenciador de tarefas não encontrado na sessão.");
}

$taskManager = unserialize($_SESSION['taskManager']);

// Verifique se o ID foi enviado via GET.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $taskId = $_GET['id'];

    // Exclua a tarefa.
    $taskManager->deleteTask($taskId);

    // Atualize a sessão com o estado modificado.
    $_SESSION['taskManager'] = serialize($taskManager);

    // Redirecione de volta para a página principal.
    header('Location: index.php');
    exit;
} else {
    die("Erro: ID da tarefa não fornecido.");
}
?>
