<?php


$nome_1 = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); //filtrando o resultado para ser string  

$nome = strip_tags(trim(($nome_1)));//evita que sejam aceitas tags na url e filtra novamente o resultado    



$email_1 = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); //filtrando o resultado para ser email

$email = strip_tags(trim(($email_1)));//evita que sejam aceitas tags na url e filtra novamente o resultado 



$telefone_1 = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING); //filtrando o resultado para ser string

$telefone = strip_tags(trim(($telefone_1)));//evita que sejam aceitas tags na url e filtra novamente o resultado 



$id_1 = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); //filtrando o resultado para ser int

$id = strip_tags(trim(($id_1)));//evita que sejam aceitas tags na url e filtra novamente o resultado 



$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); //filtrando o resultado para ser string




$data_nasc_1 = $_POST['data_nasc']; //pega a data via POST

$data_nasc = date("Y-m-d", strtotime($data_nasc_1)); //filtra o resultado data_nasc_1




include('../conexao/conexao_bd.php');

if (isset($_POST['cadastrar'])) {
	
	try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //faz a conexão
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO clientes VALUES (null,
     	'".$nome."',
      	'".$email."',
       	'".$telefone."',
       	'".md5($senha)."',
       	'".$data_nasc."');";
    
    $conn->exec($sql); //executa o comando sql

    echo "New record created successfully";
    }
	catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();

    }

	$conn = null;

}

else if (isset($_POST['atualizar'])) {
	
    try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);//faz a conexão
    

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE clientes SET nome_cliente = '".$nome."',
     email_cliente = '".$email."',
     telefone_cliente = '".$telefone."',
     senha_cliente = '".md5($senha)."',
     data_nasc_cliente = '".$data_nasc."'
     WHERE id_cliente = '".$id."';";

    $stmt = $conn->prepare($sql);

    $stmt->execute(); //executa o comando sql

    echo $stmt->rowCount() . " records UPDATED successfully";
    }

    catch(PDOException $e)

    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

   }
 header('Location:../');



?> 



