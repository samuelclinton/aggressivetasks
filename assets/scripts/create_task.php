<?php

require_once 'connect.php';

session_start();

$title_error = $description_error = '';

if (isset($_POST['titulo']) && isset($_POST['descricao'])){

    if(empty($_POST['titulo'])){

        $title_error = 'É obrigatório um título pra tarefa.';

        header('Location: ../../novatarefa.php?title_empty=true');

    } else {

        $titulo = trim($_POST['titulo']);

    }
    
    if(empty($_POST['descricao'])){

        $description_error = 'É obrigatório uma descrição para a tarefa!';

        header('Location: ../../novatarefa.php?description_empty=true');

    } else {

        $descricao = trim($_POST['descricao']);

    }

    if(empty($title_error) && empty($description_error)){
        
        // Inserir os dados no banco

        $id_usuario = $_SESSION['id'];

        $stmt = $link->prepare("INSERT INTO tarefas (titulo, descricao, id_usuario) VALUES (?, ?, ?)");

        $stmt->bind_param('sss', $titulo, $descricao, $id_usuario);

        if(!$stmt->execute()){

            $erro = $stmt->error;

        } else {

            header('Location: ../../home.php?newtask=true');
        }
    }
}

?>