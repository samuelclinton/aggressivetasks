<?php

$db_server = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'at_db';

$link = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if ($link->connect_errno){
    echo "Erro: Não foi possível se conectar ao servidor";
    exit;
}

mysqli_set_charset($link, 'utf8');

?>