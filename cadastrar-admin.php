<?php
    require_once 'classe/usuarios.php';
    $u = new Usuario;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload e Download</title>

    <script src="lib/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
  

    <style>
*{
    margin: 0px;
    padding: 0px;
    
    
    }
.bg{
    background-color: lightseagreen;
  width: 100%;
  height: 100vh;
}

div#msg-sucesso{
    width:  585px;
    margin: 10px auto;
    padding: 12px;
    background-color: rgba(50, 205, 50,.3);
    border: 1px solid rgb(34,139,34);
    position: absolute;
top:460px;
left:390px;
}

div.msg-erro{
width: 585px;
position: absolute;
top:460px;
left:390px;
margin: 10px auto;
padding: 12px;
background-color: rgba(250, 128, 114,.3);
border: 1px solid rgb(165,42,42);
}

form{
    position: absolute;
    top: 11vh;
    background-color: #fff;
    padding: 50px;
    width: 590px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
   
}


.form-control-sm:focus{
    border-color: lightseagreen;
    -webkit-box-shadow: none;
    box-shadow: none;
}
input#inputPassword4{
    width: 200px;
}

input#senha2{
width: 150px;
}

input#example-tel-input{
    width: 200px;
}

input#inputEmail4{
width: 250px;
}

input#name{
    width: 250px;
}

h3{
    color: lightseagreen;
}

hr{
    background-color: lightseagreen;
}

label{
    text-align: center;
    font-family:sans-serif;
	font-weight:normal;
    font-size:12pt;
}
a:hover{
    text-decoration: none;
    color: inherit;
}
a{
    color: white;
}
.btn-info{
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    box-shadow: 1px 1px 2px teal;
    -moz-box-shadow: 1px 1px 2px teal;
    -webkit-box-shadow: 1px 1px 2px teal;
    background-color: white;
    width: 135px;
    height: 35px;
    color: white;
    position: relative;
    left: 1px;
    top: 20px; 
}



</style>



</head>
<body>

    
    <section class="container-fluid bg">
  <section class="row justify-content-center">
      <form method="POST">
          <h3>Administrador</h3>
          <hr>
          <div  class="form-row">
          <div class="col-xs-2">  
            <label for="name">Nome</label></br>
   <input class="form-control form-control-sm" type="text" name="nome" id="name" placeholder="Nome Completo" maxlength="30">
   </div>


<div class="col-2">
    <label for="example-tel-input">Telefone</label>
    <input class="form-control form-control-sm" type="text"  name="telefone" id="example-tel-input" value="+258 " maxlength="30">
</div> 

<div class="col-xs-2">
    <label for="inputEmail4">Email</label>
<input type="email" class="form-control form-control-sm" name="email" id="inputEmail4" placeholder="exemplo@gmail.com" maxlength="40">
</div>

    <div class="col">
    <label for="inputPassword4">Senha</label>
     <input type="password" class="form-control form-control-sm" name="senha" id="inputPassword4" placeholder="********" maxlength="15">
    </div>

    <div class="col">
        <label for="senha2">Confirmar Senha</label>
         <input type="password" class="form-control form-control-sm" name="confSenha" id="senha2" placeholder="********" maxlength="15">
        </div>
</div>

    <button type="submit" class="btn btn-info" style="Background-color: lightseagreen;">Cadastrar</button>
    <!--<button type="submit" class="btn btn-info"><a href="index.php">Voltar</a></button>-->
    </form>
    </section>
    </section>

    <?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
$nome = addslashes($_POST['nome']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);
$confirmarSenha = addslashes($_POST['confSenha']);

//verificar se esta vazio
if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
{
    $u->conectar("biblioteca_digital","localhost","root","");
    if($u->msgErro == "")//se esta tudo ok
    {
        if($senha == $confirmarSenha)
        {
        if($u->cadastrar($nome,$telefone,$email,$senha))
        {
            ?>
            <div id="msg-sucesso">
            Cadastrado com sucesso! Acesse ao sistema.
            </div>
            <?php
        }else
        {
            ?>
            <div class="msg-erro">
            Email j&aacute; cadastrado
            </div>
            <?php
        }
        }else
        {
            
            ?>
            <div class="msg-erro">
            Senha e confirmar senha n&atilde;o correspondem.Tente novamente!
            </div>
            <?php
        }
        
    }else
    {
        ?>
        <div class="msg-erro">
        <?php echo "Erro: ".$u->msgErro;?>
        </div>
        <?php
    }

}else
{
    ?>
            <div class="msg-erro">
            Preencha todos os campos!
            </div>
            <?php
}
}


?>

</body>
</html>