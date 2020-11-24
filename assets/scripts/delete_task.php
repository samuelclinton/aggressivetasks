<?php

require_once 'connect.php';

if (isset($_GET['del_task']) && $_GET['del_task'] >= 1){

    $stmt = $link->prepare('DELETE FROM tarefas WHERE id = ?');

    $stmt->bind_param('i', $id_tarefa);

    $id_tarefa = $_GET['del_task'];

    $stmt->execute();

    $stmt->close();

    header('Location: ../../home.php');

}

?>