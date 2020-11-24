<?php

require_once 'assets/scripts/validate_session.php';

require_once 'assets/scripts/get_edit_task.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tarefa - Aggressive Tasks</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <div class="container text-center">
        <div class="flex-container d-flex flex-column align-items-center justify-content-between">

            <header class="p-3 mt-md-4">
                <h1 class="c-font">Editar tarefa</h1>
                <p class="lead mt-3">Edite o título e descrição da sua tarefa</p>
            </header>
            
            
            <form action="assets/scripts/edit_task.php?edit_task=<?=htmlspecialchars($_GET['edit_task']);?>" method="POST" class="p-3">

                <div class="form-group">
                    <label for="novo_titulo" class="h4 c-font">O novo título da tarefa</label>
                    <input name="novo_titulo" type="text" value="<?=$velho_titulo?>" class="form-control form-control-lg custom-form"  placeholder="Tomar vergonha na cara" autofocus>
                    <?php if(isset($_GET['title_empty']) && $_GET['title_empty']){ echo '<small class="form-text text-danger">É obrigatório um novo título para a tarefa.</small>'; } ?>
                </div>

                <div class="form-group mt-3">
                    <label for="nova_descricao" class="h4 c-font">A nova descrição da tarefa</label>
                    <textarea name="nova_descricao" class="form-control form-control-lg custom-form" rows="5" placeholder="E parar de ignorar minhas responsabilidades..."><?=$velha_descricao?></textarea>
                    <?php if(isset($_GET['description_empty']) && $_GET['description_empty']){ echo '<small class="form-text text-danger">É obrigatório uma nova descrição pra sua tarefa.</small>'; } ?>
                </div>

                <button class="btn btn-lg btn-light mt-2" type="submit"><span class="h4">Salvar</span></button>
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