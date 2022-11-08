<?php
    require_once 'classe/usuarios.php';
    $u = new Usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Upload e Download</title>

<script src="lib/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>


<style>
    
.bg{
    background-color: lightseagreen;
    width: 100%;
    height: 100vh;
    
}

div.msg-erro{
width: 365px;
position: absolute;
top:500px;
left:525px;
margin: 10px auto;
padding: 10px;
background-color: rgba(250, 128, 114,.3);
border: 1px solid rgb(165,42,42);
}

.text-left{
    color: teal;
}

.form-container{
    position: absolute;
    top: 15vh;
    background-color: #fff;
    padding: 30px;
    width: 360px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.btn-primary{
    background-color: teal;
}

.form-control:focus{
    border-color: lightseagreen;
    -webkit-box-shadow: none;
    box-shadow: none;
   
}

.btn-success{
    position: unset;
    top: 305px;
    left: 60px;
    width: 115px;
}

h1{
    text-align: center;
    color: lightseagreen;
}

hr{
    background-color: lightseagreen;
}

label{
    font-family:sans-serif;
	font-weight:normal;
    font-size:12pt;
}


</style>

</head>

<body>

<section class="container-fluid bg">
                <section class="row justify-content-center">
                    <section class="col-12 col-sm-6 col-md-3">
                    <form method="POST" class="form-container"> 
                        <h1>Login</h1>
                        <hr>
                                <div class="form-group">
                             <label for="exampleInputText1">Email</label>
                            <input type="email" class="form-control"  id="exampleInputText1" maxlength="40" name="email" aria-describedby="textHelp" placeholder="Digite o seu Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha" maxlength="8">
                                </div> 
                                <p><button type="submit" class="btn btn-info btn-block" style="Background-color: lightseagreen;">Entrar</button></p> 
                               <p class="text-left"><a href="cadastrar-admin.php">Ainda n&atilde;o se cadastrou?&nbsp;<b>Cadastre-se!</b></a></p> 
                                    
                                </form>
                    </section>
                </section>

            </section>

            <?php
               
               if(isset($_POST['email']))
               {
               
               $email = addslashes($_POST['email']);
               $senha = addslashes($_POST['senha']);
               
               //verificar se esta vazio
               if( !empty($email) && !empty($senha))
               {
                   $u->conectar("biblioteca_digital", "localhost", "root", "");
                   if($u->msgErro == "")
                   {
               
                   
                   if($u->logar($email,$senha))
                   {
                       header("location: AreaPrivada.php");
                   }else
                   {
                       ?>
                       <div class="msg-erro">
                       Email e/ou senha est&atilde;o incorretos!
                       </div>
                       <?php
                   }
               }
               else{
                   ?>
                   <div class="msg-erro">
                   <?php echo "Erro:".$u->msgErro;?>
                   </div>
                   <?php
               }
               
               }else{
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