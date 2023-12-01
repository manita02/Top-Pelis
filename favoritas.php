<?php
require_once 'conn.php';
require_once 'login.php';

if ($_SESSION['user'] == NULL ) { 
    header('location:logearse.php');
    exit();
}


//VERIFICACION SI HAY REGISTROS EN LA TABLA LIKES
// añadimos un alias para identificar mas facil:  AS total
$resultado = mysqli_query($conn, "SELECT COUNT(*) AS total FROM likes WHERE likes.userid = {$_SESSION['user']}");

// obtenemos la primera fila como array asociativo, en este caso solo tendremos una
$row = mysqli_fetch_assoc($resultado);

#echo $row['total']; 

// comparamos con el alias total que dimos en la consulta
if ($row['total'] == '0') {
    #echo ("NADA POR AQUIIIIIII");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upsss</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="icon" type="image/jpg" href="./img/warning.png"/>
    </head>

    <body style="background: url(./img/bugg.jpg);">

        <div class="container">
            <div class="row" style="margin-top: 200px;">
                <div class="col text-center">
                    <div class="card" style="width: 20rem; margin: 0 auto;">
                        <div class="card-body">
                            <h5 class="card-title display-1" style="font-weight: bolder; color: red">Upsss.. </h5>
                            <h6 class="card-subtitle mb-2 text-muted h1">Ha ocurrido un error <i class="bi bi-emoji-dizzy"></i></h6>
                            <p class="card-text lead"><i class="bi bi-exclamation-circle-fill"></i> Usted no tiene ninguna pelicula marcada como favorita... Dirígase a la sección de películas y seleccione alguna que le guste</p>
                            <a href="todas-menu-image.php" class="btn btn-danger"><i class="bi bi-film"></i> Peliculas</a>
                            <a href="index.php" class="btn btn-dark"><i class="bi bi-house-fill"></i> Inicio</a>
                        </div>
                    </div>

                </div>
            </div>


        </div>


    </body>

    </html>


<?php
    die();
}


$peliculasQuery = $conn->query("
        SELECT pelicula.id, 
        pelicula.url_imagen,
        pelicula.titulo

        FROM pelicula 

        LEFT JOIN likes
        ON pelicula.id = likes.pelid 

        LEFT JOIN user
        ON likes.userid = user.userid

        WHERE likes.userid = {$_SESSION['user']} 

        ");


        while ($row = $peliculasQuery->fetch_object()) {
            $peliculas[] = $row;
        }

#echo '<pre>', print_r($peliculas, true), '</pre>';

#die();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="icon" type="image/jpg" href="./img/fav.png"/>

    <style>
        .chat-button {
            padding: 15px;
            height: 50px;
            width: 100px;
            border-radius: 20px;
            background-color: #5612FF;
            box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.2);
            background-size: 50%;
            position: fixed;
            bottom: 30px;
            right: 30px;
            text-align: center;
            font-weight: bold;
            color: white;

        }

        h1 {
            margin: 70px;
            text-align: center;
        }

        #titulo {
            color: #FF1046;
            font-size: 55px;
            text-transform: uppercase;
            font-weight: 800;
            text-shadow: 2px 5px #000;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 20px;
            padding-top: 0;
            background: url(img/fondo.jpg);
            background-position: center;
            background-size: 100%;
            font-family: Helvetica;
        }

        img {
            width: 300px;
            padding: 5px;
            height: 450px;
        }

        .container .item {
            float: left;
            position: relative;
            margin-left: 20px;
        }

        .overlay {
            position: absolute;
            top: 0.2em;
            bottom: 0;
            left: 0.1em;
            right: 0;
            height: 443px;
            width: 295px;
            opacity: 0;
            transition: .5s ease;
            background-color: rgba(56, 53, 53, 0.568);
        }

        .container:hover .overlay {
            opacity: 1;
        }


        a:link,
        a:visited,
        a:active {
            text-decoration: none;
        }

        a:hover {
            color: #FF0074;
        }


        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
            font-weight: bold;
        }

        @media (max-width: 1319px) {
            .container {
                margin-left: 10em;

            }
        }

        @media (max-width: 1267px) {
            .container {
                margin-left: 8em;

            }
        }

        @media (max-width: 1209px) {
            .container {
                margin-left: 5em;

            }
        }

        @media (max-width: 1157px) {
            .container {
                margin-left: 3em;

            }
        }

        @media (max-width: 1108px) {
            .container {
                margin-left: 2em;

            }
        }

        @media (max-width: 1035px) {
            .container {
                margin-left: 1em;

            }
        }

        @media (max-width: 1015px) {
            .container {
                margin-left: 9em;

            }
        }

        @media (max-width: 961px) {
            .container {
                margin-left: 8em;

            }
        }

        @media (max-width: 927px) {
            .container {
                margin-left: 6em;

            }
        }

        @media (max-width: 889px) {
            .container {
                margin-left: 5em;

            }
        }

        @media (max-width: 835px) {
            .container {
                margin-left: 4em;

            }
        }

        @media (max-width: 791px) {
            .container {
                margin-left: 3em;

            }
        }

        @media (max-width: 767px) {
            .container .item {
                margin-left: 10em;
            }

            #titulo {
                font-size: 37px;
            }
        }

        @media (max-width: 687px) {
            .container .item {
                margin-left: 8em;
            }
        }

        @media (max-width: 639px) {
            .container .item {
                margin-left: 6em;
            }
        }

        @media (max-width: 597px) {
            .container .item {
                margin-left: 4em;
            }
        }

        @media (max-width: 561px) {
            .container .item {
                margin-left: 3em;
            }
        }

        @media (max-width: 529px) {
            .container .item {
                margin-left: 1em;
            }
        }

        @media (max-width: 412px) {
            .container .item {
                margin-left: -0.7em;
            }
        }

        @media (max-width: 397px) {
            .container .item {
                margin-left: -1em;
            }
        }

        @media (max-width: 360px) {
            .container .item {
                margin-left: -1.8em;
            }
        }

        @media (max-width: 280px) {
            .container .item {
                margin-left: -4em;
            }

            h1 {
                margin: 10px;
                text-align: center;
            }
        }
    </style>


</head>

<body>

    <div id="cont-titulo">
        <h1 id="titulo"> FAVORITAS </h1>
    </div>



    <?php foreach ($peliculas as $pelicula) : ?>


        <div class="container">
            <div class="item">
                <img clas="image" src="<?php echo $pelicula->url_imagen ?>" alt="">
                <div class="overlay">
                    <a class="text" href="pelicula.php?type=pelicula&id=<?php echo $pelicula->id; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg></a>
                </div>
            </div>
        </div>

        <a href="index.php" class="chat-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
            </svg>
            Volver</a>







    <?php endforeach; ?>


</body>

</html>