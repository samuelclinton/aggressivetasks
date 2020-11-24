<?php

require_once 'connect.php';

$novo_titulo = $novo_titulo_erro = $nova_descricao = $nova_descricao_erro = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Validação do novo título
    if(empty(trim($_POST['novo_titulo']))){

        $novo_titulo_erro = 'Digite um novo título para a tarefa.';

        header('Location: ../../editartarefa.php?edit_task='.$_GET['edit_task'].'&title_empty=true');

    } else {

        $novo_titulo = trim($_POST['novo_titulo']);

    } // Fim validação do novo título

    // Validação da nova descrição
    if(empty(trim($_POST['nova_descricao']))){

        $nova_descricao_erro = 'Digite uma nova descrição para a tarefa.';

        header('Location: ../../editartarefa.php?edit_task='.$_GET['edit_task'].'&description_empty=true');

    } else {

        $nova_descricao = trim($_POST['nova_descricao']);

    } // Fim validação da nova descrição

    if(empty($novo_titulo_erro) && empty($nova_descricao_erro)){

        $sql = 'UPDATE tarefas SET titulo = ?, descricao = ? WHERE id = ?';

        if ($stmt = $link->prepare($sql)){

            $stmt->bind_param('ssi', $param_titulo, $param_descricao, $param_id);

            $param_titulo = $novo_titulo;
            $param_descricao = $nova_descricao;
            $param_id = trim($_GET['edit_task']);

            if($stmt->execute()){

                header('Location: ../../home.php');

            } else {

                echo 'Algo deu errado no servidor, por favor tente novamente';
                
            }

            $stmt->close();
        }
    }
    $link->close();
}

?>