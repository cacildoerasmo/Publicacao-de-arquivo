<?php
// COnexao da base de dados
    $conn = new PDO('mysql:host=localhost; dbname=biblioteca_digital','root','') or die(mysql_error);
    //Submeter uma funcao formulario para publicar
    if(isset($_POST['submit'])!=""){

        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $temp = $_FILES['file']['tmp_name'];
        $fname = date("ymdHis").'_'.$name;
        $chk = $conn->query("SELECT * FROM upload WHERE name = '$name' ")->rowCount();
        //Verificando se o nome arquivo existe
        if($chk){
            $i = 1;
            $c = 0;
            while ($c == 0){

              
                $i++;
                $reversedParts = explode('.', strrev($name), 2);
                //Novo nome do arquivo
                $tname = (strrev($reversedParts[1]))."_".($i)."_".(strrev($reversedParts[0]));
                //Verificando se o novo nome existe na base de dados
                $chk2 = $conn->query("SELECT * FROM upload WHERE name = '$tname' ")->rowCount();
                if($chk2 == 0){

                    $c = 1;
                    $name = $tname;    
                
                }

            }


        }
        $move = move_uploaded_file($temp,"upload/".$fname);
        if($move){
            $query = $conn->query("INSERT INTO upload(name,fname) values ('$name','$fname')");
            if($query){
                header("location: index.php");

            }else{

                die(mysql_error());
            }

        }

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
    .bg{
    background-color: lightseagreen;
    width: 100%;
    height: 100vh;
    
}
hr{
    background-color:lightseagreen;
}
h3{
    text-align: center;
    color: lightseagreen;
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




    </style>
    <body>
        <h3><b>PUBLICAR ARQUIVOS</b></h3>
        <br>
        <hr>

    <form enctype="multipart/form-data" action="" name="form" method="POST">

    <div class="form-group">
        Selecione o Arquivo
        <input type="file" name="file" id="file" onchange="getImagePreview(event)"/></td>
        <div id="preview"></div>
        <input type="submit" name="submit" id="submit" value="Publicar"/>
    </div>
    </form>
<hr>
<br>


</table>

</div>

</body>
</html>