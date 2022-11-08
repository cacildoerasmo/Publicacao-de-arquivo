<?php

$conn = new PDO('mysql:host=localhost; dbname=biblioteca_digital','root','') or die(mysql_error);


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
    
.bg{
    background-color: white;
    width: 100%;
    height: 90vh;
    
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
    top: 8vh;
    left: -480px;
    background-color: #fff;
    padding: 22px;
    width: 300px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.btn-primary{
    background-color: teal;
}

.form-control:focus{
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
   
}

.btn-success{
    position: unset;
    top: 305px;
    left: 60px;
    width: 115px;
}

h3{
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
img#imagem{

    position: relative;
    left: 50px;
}
a:hover{
    text-decoration: none;
    color: inherit;
}
a{
    color: white;
}

    </style>

</head>
<body>




<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: lightseagreen;">


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sobrenos.php">Sobre Nós</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Publicar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: lightseagreen;">
          <a class="dropdown-item" href="telaPrincipal.php">Login</a>
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="instrucoes.php">Instruções</a>
        </div>
      </li>

    </ul>
   
  </div>
</nav>

            
            <?php
            
$query = $conn->query("SELECT * FROM upload ORDER BY id DESC");
while($row=$query->fetch()){
    $name=$row['name'];

?>
   <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
            <th width="5%" align="center">Total</th>
                <th width="90%" align="center">Arquivos</th>
                <th align="center">Baixar</th>
                
</tr>
</thead>
<?php
$query = $conn->query("SELECT * FROM upload");
while($row=$query->fetch()){
  $id=$row['id'];
    $name=$row['name'];

?>
<tr>
<td>
        &nbsp;<?php echo $id ;?>
</td>
    <td>
        &nbsp;<?php echo $name ;?>
</td>
<td>
    <button class="btn btn-info btn-block" style="Background-color: lightseagreen;"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname']?>">Download</a></button>
  
</td>
</tr>
<?php }?>

</table>
<blockquote class="blockquote">

<footer class="blockquote-footer" style="text-align: center;">Tem alguma d&uacute;vida? Contacte - nos.<br>+258 84 908 6557 / 83 308 3212<cite title="Duvida"><br>&nbsp;&copy;Todos os direitos reservados. CaermaTech Lda.</cite></footer>
</blockquote>

<?php }?>


</div>



</body>
</html>