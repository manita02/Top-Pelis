<?php 
        require_once 'conn.php'; 
        require_once 'login.php'; 

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






        $pelicula = mysqli_query($conn,"SELECT pelicula.id, 
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

        "); 

//echo '<pre>', print_r($peliculas, true), '</pre>'; 

//die(); 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <style>
        .like, .unlike, .likes_count {
	color: blue;
    
}
.hide {
	display: none;
}
.fa-thumbs-up, .fa-thumbs-o-up {
	transform: rotateY(-180deg);
	font-size: 1.3em;
}


    </style>


</head>
<body>

        <?php while ($row = mysqli_fetch_array($pelicula)) { ?>
            <div class="pelicula">
            <div class="container-fluid">
                    <div class="row mt-4">
                            <h1><?php echo $row['titulo'];?></h1> 

                            <div class="col-8 col-sm-7 col-md-3">
                                    <img src="<?php echo $row['url_imagen'] ?>" alt="" width="100%" height="500">
                                </div>

                                

                                <div class="col-12 col-sm-5 col-md-2">
                                    <p>Género: <?php echo $row['nombre_genero']; ?></p>
                                    <p>Pais: <?php echo $row['nombre_pais']; ?></p>
                                    <p>Año de estreno: <?php echo $row['anio_estreno'];  ?></p>
                                    <p>Dirigida por: <?php echo $row['director']; ?></p>
                                    <p>Distribuida por: <?php echo $row['nombre_empresa']; ?></p>

                                    <a class="btn btn-primary mt-3" href=<?php echo $row['url_trailer']; ?> target="blank" role="button">Ver Trailer</a>
                                       
                                </div>

                            
                                <div class="col-12 col-sm-8 col-md-5">
                                        <h3 class="mt-3">SINOPSIS</h3>
                                        <p><?php echo $row['descripcion']; ?></p>
                                                  
                                </div>

                                <div class="col-12 col-sm-3 col-md-2">
                                         <p>jijrijrijriji</p>

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


                                </div>


        
                    </div>
            </div>



            
        </div>

            





    











        <?php } ?>


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

