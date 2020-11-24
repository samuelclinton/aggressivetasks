<?php require_once 'assets/scripts/validate_login.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
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

        <?php if(isset($_GET['register']) && $_GET['register']){ ?>
            <div class="alert alert-light alert-dismissible fade show block mt-3 mb-n4" role="alert">
                &#128077; Você não é um completo &#128169; e sabe preencher um formulário, agora use seu email e senha para entrar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="flex-container d-flex flex-column align-items-center justify-content-between">

            <header class="p-3 mt-md-4">
                <h1><a href="index.php" class="text-white text-decoration-none c-font">Aggressive Tasks</a></h1>
                <p class="lead mt-3">Salve trouxiane &#129305;, eu sou sua lista de tarefas inúteis, pra você procrastinar de maneira organizada &#128640;</p>
            </header>

            <form  action="assets/scripts/login.php" method="post" class="p-3">
                <div class="form-group">
                    <label for="email" class="h4 c-font">Entre com aquele email vergonhoso &#129318;</label>
                    <input type="email" name="email" class="form-control form-control-lg custom-form" autofocus>
                </div>
                <div class="form-group">
                    <label for="email" class="h4 c-font">E sua senha master blaster &#128273;</label>
                    <input type="password" name="senha" class="form-control form-control-lg custom-form">
                </div>
                <button class="btn btn-lg btn-light" type="submit"><span class="h4">Entrar</span></button>
            </form>

            <div class="p-3">
                <h5 class="h4 c-font">Cria uma conta &#129324; é de grátis</h5>
                <a href="cadastro.php" class="btn btn-outline-light btn-lg"><span class="h4">Criar conta</span></a>
            </div>             

            <footer class="p-2 mb-md-3">
                <p>&copy; <a href="index.php" class="text-white c-font">Aggressive Tasks</a><br/>by <a href="#" class="text-white font-weight-bold">samvkn</a> &#128406;</p>
            </footer>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>