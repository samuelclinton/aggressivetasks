<?php

require_once 'connect.php';

if (isset($_GET['done_task']) && $_GET['done_task'] >= 1){

    $stmt = $link->prepare('UPDATE tarefas SET completo = 1 WHERE id = ?');

    $stmt->bind_param('i', $id_tarefa);

    $id_tarefa = $_GET['done_task'];

    $stmt->execute();

    $stmt->close();

    header('Location: ../../home.php');

}

?>