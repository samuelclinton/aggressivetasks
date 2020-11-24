<?php

    require_once 'connect.php';

    $email = $senha = '';
    $email_erro = $senha_erro = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Validação email
        if(empty(trim($_POST['email']))){
            $email_erro = 'Digite um email válido seu asno, ou então crie uma conta.';
        } else {
            $email = trim($_POST['email']);
        } // Fim validação email

        // Validação senha
        if(empty(trim($_POST['senha']))){
            $senha_erro = 'Digite a senha, ou você achou que era fácil assim?';
        } else {
            $senha = trim($_POST['senha']);
        } // Fim validação senha

        // Se não houver erros no email e senha
        if(empty($email_erro && empty($senha_erro))){

            // Prepare uma query SQL
            $sql = 'SELECT id, usuario, email, senha FROM usuarios WHERE email = ?';

            if($stmt = $link->prepare($sql)){

                $stmt->bind_param('s', $param_email);

                $param_email = $email;

                if($stmt->execute()){

                    $stmt->store_result();

                    // Checar se o email existe no banco de dados.
                    if($stmt->num_rows == 1) {

                        $stmt->bind_result($id, $usuario, $email, $senha_hash);

                        if($stmt->fetch()){

                            if(password_verify($senha, $senha_hash)){

                                session_start();
                                
                                $_SESSION['autenticado'] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION['usuario'] = $usuario;
                                $_SESSION['email'] = $email;
                                
                                header('Location: ../../home.php?login=welcome');
                            } else {

                                $_SESSION['autenticado'] = false;

                                header('Location: ../../index.php?login=erro');
                            }
                        }
                    }
                }
                $stmt->close();
            }
        }
        $link->close();
    }
?>