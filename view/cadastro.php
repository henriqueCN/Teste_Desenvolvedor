<?php
include('cabecalho.php');
?>
<?php
include('estilo.html');
?>

<html>
<head>

<script>

$(function(){ //validacao dos campos

        $("#att").submit(function(){

            var isValid = true;

            $("input").each(function() { //verifica os inputs

                var element = $(this);

                if (element.val() == "") { isValid = false; } //testa se os inputs estão preenchidos

            }); // each Function

            // Função permite verificar se todos os campos estão preenchidos dentro do each 

            if(isValid == false){ alert("Todos os campos devem ser preenchidos."); return false;} 

            else {

                alert("Inserido com sucesso"); 
            }   

    }); 

});  
    </script>
</head>
<body>

<center><h2>Cadastro</h2></center>
<center><form action="../controller/crud.php" id = "att" method = "post">
  <div class="imgcontainer">
    <img src="fotos/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label ><b>Nome</b></label>
    <input type="text" name="nome" required>
    <br>
    <label ><b>Email</b></label>
    <input type="text" name="email" required>
    <br>
    <label ><b>Telefone</b></label>
    <input type="text" name="telefone" id="fone" required>
    <br>
    <label ><b>Senha</b></label>
    <input type="password" name="senha" required>
    <br>
    <label ><b>Data de nascimento</b></label>
    <input type="date" name="data_nasc" required>
    <br>    
    <button type="submit" name = "cadastrar">Cadastrar</button>
  </div>
</form></center>

</body>
</html>

