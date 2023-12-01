<?php  
require_once 'login.php'; 
require_once 'conn.php';

$idusuario = $_SESSION['user']; 

$comentario= $_POST['comentario'];

$type = $_GET['type']; 
$idpelicula   = (int)$_GET['id']; 

  
$comentario= mysqli_real_escape_string($conn,$comentario);
$resultado=mysqli_query($conn,
'INSERT INTO comentarios (comentario, idpelicula, idusuario) 
VALUES ("'.$comentario.'", "'.$idpelicula.'", "'.$idusuario.'")');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentario Enviado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/jpg" href="./img/sent.png"/>
</head>

<body style="background: url(./img/backcoment1.jpg); background-size:100%;">
    <br></br>
    <br></br>
    <div class="text-center mt-5">
        <h1 style="font-weight: bolder; color: black; -webkit-text-stroke: 1.5px black;"><i class="bi bi-send-check-fill"></i> Se ha registrado su comentario... <i class="bi bi-check-circle-fill"></i></h1>
        <a role="button" class="btn btn-primary mt-4" href="index.php"><i class="bi bi-chevron-double-left"></i> Volver al Inicio</a>
    </div>
</body>
</html>



