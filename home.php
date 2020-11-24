<?php

require_once 'assets/scripts/validate_session.php';

require_once 'assets/scripts/get_tasks.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggressive Tasks</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <div class="container text-center">

        <?php
            if(isset($_GET['newtask']) && $_GET['newtask']){ ?>
                <div class="alert alert-success alert-dismissible fade show mt-3 block mb-n4" role="alert">
                    &#128075; <strong><?=htmlspecialchars($_SESSION['usuario']);?></strong> sua tarefa foi devidamente criada, agora prossiga para a parte de evitá-la.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php } ?>

        <div class="flex-container d-flex flex-column align-items-center justify-content-between">
            
            <header class="p-3 mt-md-4">
                <h1><a href="index.php" class="text-white text-decoration-none c-font">Aggressive Tasks</a></h1>
                <p class="lead mt-3">Iae <?=htmlspecialchars($_SESSION['usuario']) ?> &#9996;, comece a criar tarefas e quem sabe você algum dia consiga concluir algumas! &#128582;</p>
                <div class="btn-group">
                    <a href="novatarefa.php" class="btn btn-outline-light"><span class="h5">Nova tarefa</span></a>
                    <a href="assets/scripts/logoff.php" class="btn btn-outline-light"><span class="h5">Sair</span></a>
                </div>
            </header>
            
            <section>

                <?php while($row = $result->fetch_assoc()) { ?>
                                        
                    <div class="card mt-3">
                        <div class="card-body" style="color: #222222">
                            <?php if($row['completo']){?> <span class="badge badge-success p-1">CONCLUÍDA</span> &#128591; <?php } ?>
                            <h4 class="card-title mt-2 dark-text c-font <?php if($row['completo']){ ?>text-muted<?php } ?>"><?=htmlspecialchars($row['titulo'])?> </h4>
                            <p class="card-text dark-text <?php if($row['completo']){ ?>text-muted<?php } ?>"><?=htmlspecialchars($row['descricao'])?></p>
                            <div class="btn-group font-weight-bold">
                                <a href="assets/scripts/delete_task.php?del_task=<?=$row['id']?>" class="btn btn-warning">Excluir</a>
                                <a href="editartarefa.php?edit_task=<?=$row['id']?>" class="btn btn-dark">Editar</a>
                                <a href="assets/scripts/conclude_task.php?done_task=<?=$row['id']?>" class="btn btn-success <?php if($row['completo']){ ?>disabled<?php } ?>">Concluir</a>
                            </div>
                        </div>
                    </div>
                
                <?php } ?>
                
            </section>

            <footer class="p-2 mt-md-3">
                <p>&copy; <a href="index.php" class="text-white c-font">Aggressive Tasks</a><br/>by <a href="#" class="text-white font-weight-bold">samvkn</a> &#128406;</p>
            </footer>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>