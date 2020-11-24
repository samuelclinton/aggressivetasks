<?php

require_once 'connect.php';

if ($_SESSION['id'] >= 1){
    
    $stmt = $link->prepare('SELECT id, titulo, descricao, completo FROM tarefas WHERE id_usuario = ?');
    
    $stmt->bind_param('i', $id_usuario);
    
    $id_usuario = $_SESSION['id'];

    $stmt->execute();

    $result = $stmt->get_result();

}

$link->close();

?>