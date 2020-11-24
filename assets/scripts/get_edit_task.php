<?php

require_once "connect.php";

$velho_titulo = $velha_descricao = $id_tarefa = '';

if ( !isset($_GET['edit_task'])){

    header('Location: ../../home.php');

}

if ( isset($_GET['edit_task']) && $_GET['edit_task'] >= 1){

    $sql = 'SELECT id, titulo, descricao FROM tarefas WHERE id = ?';

    if ($stmt = $link->prepare($sql)){

        $stmt->bind_param('i', $param_id_editar_tarefa);

        $param_id_editar_tarefa = trim($_GET['edit_task']);

        if($stmt->execute()){

            $stmt->store_result();

            if($stmt->num_rows == 1){

                $stmt->bind_result($id, $titulo, $descricao);

                if($stmt->fetch()){

                    $velho_titulo = $titulo;
                    $velha_descricao = $descricao;
                    $id_tarefa = $id;

                }
            }
        }
        $stmt->close();
    }
}

$link->close();

?>