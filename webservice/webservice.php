<?php

$email = $_REQUEST['email']; //obtém o email requisitado no Jquery

include('../conexao/conexao_bd.php');

$database = new mysqli($servername,$username,$password,$dbname); // Far Mudar a senha do bd

try{
    $sql = "SELECT * FROM clientes WHERE email_cliente='$email'"; //busca o usuário com esse email

    $result = $database -> query($sql); //retorna o array com os campos

    echo json_encode($result -> fetch_assoc());
}
catch (Exception $e)
{
    echo $e -> getMessage();
}