<?php

require_once 'conn.php';
require_once 'login.php';

$generoQuery = $conn->query("

        SELECT genero.idgenero, genero.nombre_genero
        
        FROM genero

        ");

while ($row = $generoQuery->fetch_object()) {
    $generos[] = $row;
}

if (isset($_GET['type'], $_GET['id'])) {
    $type = $_GET['type'];
    $idpelicula  = (int)$_GET['id'];


    switch ($type) {
        case 'pelicula':
            #echo $type; 
            #echo $idpelicula;



            if (isset($_POST['liked'])) {
                $pelid = $_POST['pelid'];
                $result = mysqli_query($conn, "SELECT * FROM pelicula WHERE id=$pelid");
                $row = mysqli_fetch_array($result);
                $n = $row['likes'];
        
                mysqli_query($conn, "INSERT INTO likes (pelid, userid) VALUES ($pelid,{$_SESSION['user']})");
                mysqli_query($conn, "UPDATE pelicula SET likes=$n+1 WHERE id=$pelid");
        
                echo $n+1;
                exit();
            }
            if (isset($_POST['unliked'])) {
                $pelid = $_POST['pelid'];
                $result = mysqli_query($conn, "SELECT * FROM pelicula WHERE id=$pelid");
                $row = mysqli_fetch_array($result);
                $n = $row['likes'];
        
                mysqli_query($conn, "DELETE FROM likes WHERE pelid=$pelid AND userid={$_SESSION['user']}");
                mysqli_query($conn, "UPDATE pelicula SET likes=$n-1 WHERE id=$pelid");
                
                echo $n-1;
                exit();
            }


            
            $peliculass = mysqli_query($conn,"SELECT pelicula.id, 
            pelicula.titulo, pelicula.descripcion, pelicula.url_imagen,
            pelicula.anio_estreno,pais.nombre_pais, pelicula.director, 
            pelicula.url_trailer, pelicula.likes, genero.nombre_genero, distribuidora.nombre_empresa
            
    
            FROM pelicula 
        
            LEFT JOIN genero
            ON pelicula.genero_idgenero = genero.idgenero  
        
            LEFT JOIN pais
            ON pelicula.idpais = pais.idpais 

            LEFT JOIN distribuidora
            ON pelicula.iddistribuidora = distribuidora.iddistribuidora 
        

            WHERE pelicula.id = {$idpelicula}


            ");

            

            #echo '<pre>', print_r($pelicula, true), '</pre>'; 
            #die(); 

            break;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelicula seleccionada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" type="image/jpg" href="./img/cine.png"/>

    
    <style>
        body {
            background: rgb(255,204,179);
            background: linear-gradient(0deg, rgba(255,204,179,1) 0%, rgba(242,147,147,1) 100%);;
        }

    .like, .unlike, .likes_count {
	color: blue;
    font-size: 1.6em;
    margin-left: 5px;
     
}
.hide {
	display: none;
}
.fa-thumbs-up, .fa-thumbs-o-up {
	transform: rotateY(-180deg);
	font-size: 4em;
}

        h1 {
            text-align: center;
        }

        footer {
            background: rgb(144,94,150); 
            background: radial-gradient(circle, rgba(144,94,150,1) 0%, rgba(213,139,221,1) 100%);
            text-align: center;
            color: white;
            font-style: italic;
            box-shadow: 5px -5px 10px #D58BDD;
        }

        @media (max-width: 653px) {
            .fa-thumbs-up, .fa-thumbs-o-up {
	            font-size: 3em;
            }

            
        }

        @media (max-width: 598px) {
            .fa-thumbs-up, .fa-thumbs-o-up {
	            font-size: 7.2em;
            }

            
        }

        @media (max-width: 575px) {
            div {
                margin: 0 auto;
            }

            p,
            h3 {
                text-align: center;
            }

            .btn {
                margin-left: 40%;
            }

            .fa-thumbs-up, .fa-thumbs-o-up {
	            font-size: 4em;
                margin-left:35%
            }
        }


        @media (max-width: 454px) {
            img {
                height: 400px;
            }


        }

        @media (max-width: 386px) {
            img {
                height: 350px;
            }


        }

        @media (max-width: 324px) {
            img {
                height: 300px;
            }


        }

        @media (max-width: 288px) {
            img {
                height: 250px;
            }


        }

        @media (max-width: 413px) {
            div {
                margin: 0 auto;
            }

            p,
            h3 {
                text-align: center;
            }

            .btn {
                margin-left: 35%;
            }
        }





        @media (max-width: 323px) {
            div {
                margin: 0 auto;
            }

            p,
            h3 {
                text-align: center;
            }

            .btn {
                margin-left: 30%;
            }
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- icono o nombre -->

            <a class="navbar-brand" href="index.php">
                <i class="bi bi-film"></i>
                <span class="text-warning">Top Pelis</span>
            </a>

            <!-- boton del menu -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- elementos del menu colapsable -->

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Películas
                        </a>

                        <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                            <?php foreach ($generos as $genero) : ?>
                                    <li><a class="dropdown-item" href="genero-menu-image.php?type=genero&idgenero=<?php echo $genero->idgenero; ?>"><?php echo $genero->nombre_genero; ?></a></li>
                            <?php endforeach; ?>    
                                    <li><a class="dropdown-item" href="todas-menu-image.php">Todas</a></li>

                                

                            </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="favoritas.php">Mis favoritas</a>
                    </li>
                </ul>

                <hr class="d-md-none text-white-50">

                <!-- enlaces redes sociales -->

                <ul class="navbar-nav  flex-row flex-wrap text-light">

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="https://github.com/manita02" target="_blank"><i class="bi bi-github"></i></a>
                        <small class="d-md-none ms-2">GitHub</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="mailto:manitacoqui@gmail.com" target="_blank"><i class="bi bi-envelope-fill"></i></i></a>
                        <small class="d-md-none ms-2">Gmail</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="https://www.facebook.com/analucia.juarez.1297" target="_blank"><i class="bi bi-facebook"></i></a>
                        <small class="d-md-none ms-2">Facebook</small>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="https://www.instagram.com/ana.juarez02/" target="_blank"><i class="bi bi-instagram"></i></a>
                        <small class="d-md-none ms-2">GitHub</small>
                    </li>

                </ul>

                <!--boton Informacion -->

                <?php if ($_SESSION['user'] == 0 ) : ?>
                        <form class="d-flex">
                            <a href="logearse.php" class="btn btn-outline-warning d-none d-md-inline-block " type=button>SIGN UP</a>
    
                        </form>
                <?php else: ?>
                    <form class="d-flex">
                        <a href="logout.php" class="btn btn-outline-warning d-none d-md-inline-block " type=button>LOG OUT</a>

                    </form>
                <?php endif ?>


            </div>

        </div>
    </nav>



    <?php while ($row = mysqli_fetch_array($peliculass)) { ?>
        <div class="pelicula">
            <div class="container-fluid">
                <div class="row mt-4">
                    <h1 class="mt-3"><?php echo $row['titulo'];?></h1>

                    <div class="col-8 col-sm-7 col-md-5 col-lg-3 mt-4">
                        <img class="rounded" src="<?php echo $row['url_imagen'] ?>" alt="" width="100%" height="500">
                    </div>



                    <div class="col-12 col-sm-5 col-md-7 col-lg-2 mt-5">
                        <p> <i class="bi bi-aspect-ratio-fill"></i> Género: <?php echo $row['nombre_genero']; ?></p>
                        <p> <i class="bi bi-flag-fill"></i> Pais: <?php echo $row['nombre_pais']; ?></p>
                        <p> <i class="bi bi-calendar-event"></i> Año de estreno: <?php echo $row['anio_estreno'];  ?></p>
                        <p> <i class="bi bi-award-fill"></i> Dirigida por: <?php echo $row['director']; ?></p>
                        <p> <i class="bi bi-briefcase-fill"></i> Distribuida por: <?php echo $row['nombre_empresa']; ?></p>
                        <a class="btn btn-secondary mt-3" href=<?php echo $row['url_trailer']; ?> target="blank" role="button"><i class="bi bi-camera-reels-fill"></i> Ver Trailer</a>

                    </div>


                    <div class="col-12 col-sm-8 col-md-8 col-lg-5 mt-5">
                        <h3 class="mt-3">SINOPSIS</h3>
                        <p><?php echo $row['descripcion']; ?></p>

                    </div>

                    <div class="col-12 col-sm-3 col-md-3 col-lg-2 mt-5">
                        <?php if ($_SESSION['user'] == 0 ) : ?>
                            <a role="button" class="btn btn-primary mt-3" href="logearse.php">Me gusta <i class="bi bi-hand-thumbs-up-fill"></i> </a>
                        <?php else: ?>
                            <?php $results = mysqli_query($conn, "SELECT * FROM likes WHERE userid={$_SESSION['user']} AND pelid=".$row['id']."");

                                            if (mysqli_num_rows($results) == 1 ): ?>
                                                <!-- user already likes post -->
                                                <span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
                                                <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
                                            <?php else: ?>
                                                <!-- user has not yet liked post -->
                                                <span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
                                                <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
                                            <?php endif ?>

                                                <span class="likes_count"><?php echo $row['likes']; ?> likes</span>

                        <?php endif ?>

                    
                    </div>



                </div>



                <form method="POST" action="enviarcomentario.php?type=pelicula&id=<?php echo $row['id']; ?>">
                    <section id="contact">
                        <div class="container px-4">
                            <div class="row gx-4 justify-content-center">
                                <div class="col-lg-8">
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comentario" cols="30" rows="5" type="text" id="comentario" placeholder="Escribe tu comentario..." required></textarea>
                                            
                                        </div>
                                        <br>

                                        <?php if ($_SESSION['user'] == 0 ) : ?>
                                            <a role="button" class="btn btn-dark" href="logearse.php"><i class="bi bi-send-fill"></i> Comentar</a>
                        
                                        <?php else: ?>
                                            <input class="btn btn-dark" type="submit" value="Comentar">
                                        <?php endif ?>


                                        
                                       
                                        <br>
                                        <br>
                                        <br>

                                        <?php

                                            
                                            #echo $idpelicula;
                                            $resultado = $conn->query("SELECT * FROM comentarios 
                                            LEFT JOIN user
                                            ON comentarios.idusuario = user.userid  
                                            WHERE idpelicula = {$idpelicula}");



                                            while ($comentario = mysqli_fetch_object($resultado)) {

                                            ?>

                                            <b><?php echo ($comentario->username);  ?></b>(<?php echo ($comentario->fecha); ?>) dijo:
                                            <br />
                                            <?php echo ($comentario->comentario); ?>
                                            <br />
                                            <hr />




                                            <?php
                                            }
                                            
                                            ?>

                                    
                                </div>
                

                            </div>
                        </div>

                    </section>

                </form>


            </div>
        </div>


    <?php } ?>

    <div class="container-fluid bg-primary">
    <div class="row mt-5">
        <footer>
            <p class="mt-3">Todos los derechos reservados | © Ana Lucia Juarez 2022</p>
            <p>Miramar, Buenos Aires, Argentina</p>
        </footer>

    </div>
</div>


    <!-- LOS SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>



    <script src="jquery.min.js"></script>
<script>
	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var pelid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'movies.php',
				type: 'post',
				data: {
					'liked': 1,
					'pelid': pelid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var pelid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'movies.php',
				type: 'post',
				data: {
					'unliked': 1,
					'pelid': pelid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});
</script>


















</body>



</html>



<?php
/*

    function cargar(){
        $conn->query("
                    INSERT INTO likes (iduser, idpelicula)
                        SELECT {$_SESSION['user']}, {$idpelicula}
                        FROM pelicula
                        WHERE EXISTS (
                            SELECT idpelicula
                            FROM pelicula
                            WHERE idpelicula = {$idpelicula})

                        AND NOT EXISTS (
                            SELECT id
                            FROM likes
                            WHERE iduser = {$_SESSION['user']} 
                            AND idpelicula = {$idpelicula})
                        LIMIT 1
                        
                
                ");
    }

*/

?>