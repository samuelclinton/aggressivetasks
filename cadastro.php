<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Aggressive Tasks</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <div class="container text-center">
        <div class="flex-container d-flex flex-column align-items-center justify-content-between">

            <header class="p-3 mt-md-4">
                <h1 class="c-font">Criar sua conta</h1>
                <p class="lead mt-3">Eu sou o maior site de to-do de todo o universo conhecido &#129317; cola em mim que se brilha &#127775;</p>
            </header>
            
            <form action="assets/scripts/register.php" method="POST" class="p-3 mt-3">

                <div class="form-group">
                    <label for="usuario" class="h4 c-font">Um nome de usuário brabo &#128526;</label>
                    <input type="text" name="usuario" class="form-control form-control-lg custom-form mt-2" autofocus>
                    <?php if(isset($_GET['user_empty']) && $_GET['user_empty']){ echo '<small class="form-text text-danger">É obrigatório um nome de otário, ops usuário.</small>'; } ?>
                    <?php if(isset($_GET['user_taken']) && $_GET['user_taken']){ echo '<small class="form-text text-danger">Este nome de usuário já está sendo usado, vacilou perdeu.</small>'; } ?>
                </div>

                <div class="form-group mt-3">
                    <label for="email" class="h4 c-font">Aquele email da época do MSN &#128116;</label>
                    <input type="email" name="email" class="form-control form-control-lg custom-form mt-2">
                    <?php if(isset($_GET['email_empty']) && $_GET['email_empty']){ echo '<small class="form-text text-danger">É obrigatório um email meu parceiro!</small>'; } ?>
                    <?php if(isset($_GET['email_taken']) && $_GET['email_taken']){ echo '<small class="form-text text-danger">Este email já está sendo <s>lesado</s> usado.</small>'; } ?>
                </div>

                <div class="form-group mt-3">
                    <label for="senha" class="h4 c-font">Uma senha genial &#128161;&#128273;</label>
                    <input type="password" name="senha" class="form-control form-control-lg custom-form mt-2">
                    <?php if(!isset($_GET['password_short'])){ echo '<small class="form-text text-muted">Sua senha deve ter pelo menos 6 caracteres.</small>'; } ?>
                    <?php if(isset($_GET['password_empty']) && $_GET['password_empty']){ echo '<small class="form-text text-danger">É obrigatório uma senha meu parceiro!</small>'; } ?>
                    <?php if(isset($_GET['password_short']) && $_GET['password_short']){ echo '<small class="form-text text-danger">Eu avisei que esta merda tinha que ter pelo menos 6 caracteres &#129324;</small>'; } ?>
                </div>

                <div class="form-group mt-3">
                    <label for="confirma_senha" class="h4 c-font">Confirme sua senha genial</label>
                    <input type="password" name="confirma_senha" class="form-control form-control-lg custom-form mt-2">
                    <?php if(isset($_GET['confirmation_empty']) && $_GET['confirmation_empty']){ echo '<small class="form-text text-danger">É obrigatório confirmar sua senha genial seu animal &#129324;</small>'; } ?>
                    <?php if(isset($_GET['confirmation_nomatch']) && $_GET['confirmation_nomatch']){ echo '<small class="form-text text-danger">As senhas não conferem! &#129318;</small>'; } ?>
                </div>

                <button class="btn btn-lg btn-light mt-3" type="submit"><span class="h4">Cadastrar</span></button>

            </form>

            <a href="index.php" class="text-white font-weight-bold h5">Voltar</a>

            <footer class="p-2 mt-md-3 mb-md-3">
                <p>&copy; <a href="index.php" class="text-white c-font">Aggressive Tasks</a><br/>by <a href="#" class="text-white font-weight-bold">samvkn</a> &#128406;</p>
            </footer>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>