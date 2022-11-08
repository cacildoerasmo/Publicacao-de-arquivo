<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: telaPrincipal.php");
        exit();
    }


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
  .text-left{
        position: absolute;
        left: 1200px;
        top: 50px;
    }
        body{
     
           background-color: lightseagreen;
          
               }
        .jumbotron{
            background-color: #dddddd;
        }

        li{
          color:#000000;
	text-decoration:none;
        }
        li:hover{
	color:#ffffff;
  text-decoration:underline;
        }
        ul{
          display: block;
        }
        li:hover{ 
	background-color:#606060;
    
        }
    </style>

<body>

<ul class="list-group" style="text-align: center; position: relative; top: 200px; left: 520px; width: 350px;"> 
    <a href="publicarLivros.php"><li class="list-group-item bg-primary text-white">PUBLICAR LIVROS</li></a> 
    <a href="sair.php"><li class="list-group-item bg-primary text-white">SAIR</li></a>
    </ul>
  

</body>
</html>
