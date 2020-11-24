<?php

// Incluir a conexão ao servidor
require_once "connect.php";

// Declarar variáveis vazias

$usuario = $email = $senha = $confirma_senha = '';
$usuario_erro = $email_erro = $senha_erro = $confirma_senha_erro = '';

if (isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirma_senha'])){

    // Validação de usuário
    if(empty(trim($_POST['usuario']))){

        $usuario_erro = 'É obrigatório um nome de otário, ops usuário.';

        header('Location: ../../cadastro.php?user_empty=true');

    } else {

        $sql = 'SELECT id FROM usuarios WHERE usuario = ?';

        if($stmt = $link->prepare($sql)){

            $stmt->bind_param('s', $param_usuario);

            $param_usuario = trim($_POST['usuario']);

            if($stmt->execute()){

                $stmt->store_result();

                if($stmt->num_rows() == 1){

                    $usuario_erro = 'Este nome de usuário já está sendo usado, vacilão.';

                    header('Location: ../../cadastro.php?user_taken=true');

                } else {

                    $usuario = trim($_POST['usuario']);

                }
            } else {

                echo 'Algo deu errado com o servidor, por favor tente novamente.';
            }

            $stmt->close();
        }
    } // Fim da validação de usuário

    // Validação de email
    if(empty(trim($_POST['email']))){

        $email_erro = 'É obrigatório um email meu parceiro!';

        header('Location: ../../cadastro.php?email_empty=true');

    } else {

        $sql = 'SELECT id FROM usuarios WHERE email = ?';

        if($stmt = $link->prepare($sql)){

            $stmt->bind_param('s', $param_email);

            if($stmt->execute()){

                $stmt->store_result();

                if($stmt->num_rows() == 1){

                    $email_erro = 'Este email já está sendo usado.';

                    header('Location: ../../cadastro.php?email_taken=true');

                } else {
                    $email = trim($_POST['email']);
                }
            } else {

                echo 'Algo deu errado com o servidor, por favor tente novamente';
            }

            $stmt->close();
        }

    } // Fim da validação de email
    
    // Validação de senha
    if(empty(trim($_POST['senha']))){

        $senha_erro = 'É obrigatório uma senha meu parceiro!';

        header('Location: ../../cadastro.php?password_empty=true');

    } elseif(strlen(trim($_POST['senha'])) < 6) {

        $senha_erro = 'Sua senha genial deve ter pelo menos 6 caracteres.';

        header('Location: ../../cadastro.php?password_short=true');

    } else {
        
        $senha = trim($_POST['senha']);

    } // Fim da validação de senha

    // Validação de confirmação da senha
    if(empty(trim($_POST['confirma_senha']))){

        $confirma_senha_erro = 'É obrigatório confirmar sua senha genial seu animal!';
        
        header('Location: ../../cadastro.php?confirmation_empty=true');

    } else {

        $confirma_senha = trim($_POST['confirma_senha']);

        if(empty($senha_erro) && ($senha != $confirma_senha) ){

            $confirma_senha_erro = 'As senhas não conferem!';

            header('Location: ../../cadastro.php?confirmation_nomatch=true');
        }

    } // Fim da validação da confirmação da senha
    
    // Validação de erros e inclusão no servidor

    if (empty($usuario_erro) && empty($email_erro) && empty($senha_erro) && empty($confirma_senha_erro)){

        $sql = 'INSERT INTO usuarios (usuario, email, senha) VALUES (?, ?, ?)';

        if ($stmt = $link->prepare($sql)){

            $stmt->bind_param('sss', $param_usuario, $param_email, $param_senha);

            $param_usuario = $usuario;
            $param_email = $email;
            $param_senha = password_hash($senha, PASSWORD_DEFAULT); // Função de criptografia de senhas

            if ($stmt->execute()){

                header('Location: ../../index.php?register=true');

            } else {
                echo 'Algo deu errado com o SQL, tente novamente mais tarde.';
            }

            $stmt->close();

        }

    }

    $link->close();
    
} // Fim do código de cadastro

?>