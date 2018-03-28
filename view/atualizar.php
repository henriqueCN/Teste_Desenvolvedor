<?php
include('cabecalho.php');
?>
<?php
include('estilo.html');
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>


$(function(){ //validacao dos campos

    $("#att").submit(function(){

        var isValid = true;
        $("input").each(function() {

            var element = $(this);
            if (element.val() == "") { isValid = false; }

        }); // each Function

            // Função permite verificar se todos os campos estão preenchidos dentro do each 
        if(isValid == false){ alert("Todos os campos devem ser preenchidos."); return false;} 
        else { alert("Atualizado com sucesso"); }   

    }); // termina #form_cadastra

}); // termina document


$(function(){
    $("#email").blur(function (){
        $.getJSON("../webservice/webservice.php?email="+$(this).val(), function(dados){ //busca os dados no BD

            $("#email").val(dados.email_cliente); //atribui o valor do email no bd ao input com id 'email'.

            $("#nome").val(dados.nome_cliente); //atribui o valor do nome no bd ao input com id 'nome'.

            $("#data_nasc").val(dados.data_nasc_cliente); 

            $("#senha").val(dados.senha_cliente); 
 
            $("#telefone").val(dados.telefone_cliente); 

            $("#id").val(dados.id_cliente); 
    
        });
    });
});
    
        
</script>
</head>
<body>

<center><h2>Atualizar</h2></center>
<center><form action="../controller/crud.php" id = "att" method = "post">
  <div class="imgcontainer">
    <img src="fotos/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">

    <label for=""><b>Email:</b></label>
    <input type="text" id = "email" style = "height: 40px;width: 400px;padding-bottom: 10px;" placeholder="Digite o email para atualizar" name="email">
    <br>
    <b>Senha:</b>
    <input type="password" id = "senha"  placeholder="" name="senha" disabled>
    <br>
    <button type = "button" id = "pesquisa" class = "but">Pesquisar</button>
    <br>
    <div>
        <br>
        <b>ID:</b><br>
        <input type="text" id = "id" style = "" placeholder="" name="id">
        <br>
        <b>Nome:</b>
        <input type="text" id = "nome" placeholder="" name="nome">
        <b>Data de nascimento:</b>
        <input type="date" id = "data_nasc"  placeholder="" name="data_nasc" >
        <br>
        <b>Telefone</b><br>
        <input type="text" id = "telefone"  name="telefone">    
        <br>    
        <button type="submit" id = "atualizar" name = "atualizar"  style="background-color: orange;">Atualizar</button>
    </div> 
  </div>
</form></center>

</body>
</html>