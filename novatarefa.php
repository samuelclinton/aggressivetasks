<?php

require_once 'assets/scripts/validate_session.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova tarefa - Aggressive Tasks</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <div class="container text-center">
        <div class="flex-container d-flex flex-column align-items-center justify-content-between">

            <header class="p-3 mt-md-4">
                <h1 class="c-font">Criar nova tarefa</h1>
                <p class="lead mt-3">Adicione um título e uma descrição pra sua tarefa, <i>pff</i>, como se você fosse concluir ela um dia &#128516;</p>
            </header>
            
            
            <form action="assets/scripts/create_task.php" method="POST" class="p-3">

                <div class="form-group">
                    <label for="titulo" class="h4 c-font">Um título pra sua tarefa</label>
                    <input name="titulo" type="text" class="form-control form-control-lg custom-form"  placeholder="Tomar vergonha na cara" autofocus>
                    <?php if(isset($_GET['title_empty']) && $_GET['title_empty']){ echo '<small class="form-text text-danger">É obrigatório um título para a tarefa.</small>'; } ?>
                </div>

                <div class="form-group mt-3">
                    <label for="descricao" class="h4 c-font">Uma descrição <s>descritiva</s> da sua tarefa</label>
                    <textarea name="descricao" class="form-control form-control-lg custom-form" rows="5" placeholder="E parar de ignorar minhas responsabilidades..."></textarea>
                    <?php if(isset($_GET['description_empty']) && $_GET['description_empty']){ echo '<small class="form-text text-danger">É obrigatório uma descrição para a tarefa.</small>'; } ?>
                </div>

                <button class="btn btn-lg btn-light mt-2" type="submit"><span class="h4">Criar</span></button>
            </form>    
            
            <a href="home.php" class="text-white font-weight-bold mt-2 h5">Voltar</a>
                    
            <footer class="p-2 mt-md-3 mb-md-3">
                <p>&copy; <a href="index.php" class="text-white c-font">Aggressive Tasks</a><br/>by <a href="#" class="text-white font-weight-bold">samvkn</a> &#128406;</p>
            </footer>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>