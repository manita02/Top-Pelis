<section align="center">
    <h1 align="center">📽️🎬TOP PELIS📺🍿</h1>
    <img src="https://i.pinimg.com/originals/5d/97/9d/5d979dec7f3ff0c36421af0def2c340e.jpg">
   <section align="center">
        <img src="https://img.shields.io/badge/STATE-FINISHED-green" alt="Estado del Proyecto">
   </section>
</section>


# Índice
- [Sobre Top Pelis :movie_camera::fries::computer:](#sobre-top-pelis-movie_camerafriescomputer)
- [Programas necesarios :memo:](#white_check_mark-programas-necesariosmemo)
- [Descargar proyecto :inbox_tray:](#white_check_mark-descargar-proyectoinbox_tray) 
- [Crear Base de Datos :wrench:](#white_check_mark-crear-base-de-datoswrench)
- [Configurar conn.php :nut_and_bolt:](#white_check_mark-configurar-connphpnut_and_bolt)
- [Ejecutar el proyecto :rocket:](#white_check_mark-ejecutar-el-proyectorocket)
- [Funcionalidades :clipboard:](#funcionalidades-clipboard)
- [Tecnologías utilizadas :hammer:](#tecnologías-utilizadas-hammer)
- [Autor :black_nib:](#autor-black_nib)


## Sobre Top Pelis :movie_camera::fries::computer:
<p align="justify">
  Sitio web realizado con PHP, MYSQL, HTML, CSS y Bootstrap, donde los usuarios se pueden logear para ver información sobre diferentes películas🎦, a las cuales, se les puede dar LIKE👍, dejar comentarios💬, y que aparezcan en una sección de favoritas💗.
</p>


### :white_check_mark: `Programas necesarios`:memo:
- Descargar e Instalar :arrow_down_small: 
  - <a href="https://www.apachefriends.org/es/index.html" target="_blank"> 
        XAMPP
    </a> 
  - Editor de código de preferencia (puede ser el <a href="https://visualstudio.microsoft.com/es/" target="_blank"> Visual Studio Code</a>) 

### :white_check_mark: `Descargar proyecto`:inbox_tray:
- [Descargar proyecto](https://github.com/manita02/Top-Pelis/archive/refs/heads/main.zip):anger:


### :white_check_mark: `Crear Base de Datos`:wrench: 
- Ejecutar XAMPP
- Iniciar los servidores Apache y MySQL ⚙️
  <section align="center">
       <img src="https://upload.wikimedia.org/wikipedia/commons/d/de/XAMPP_Windows_10.PNG" alt="Servidores activos">
  </section>
- Abrir phpMyAdmin presionando<a href="https://www.youtube.com/watch?v=giCmjKBmK6A" target="_blank"> el boton Admin </a>en el servidor MySQL desde XAMPP :bulb: 
- <a href="https://disenowebakus.net/crear-una-base-de-datos-phpmyadmin-mysql-php.php" target="_blank"> Crear la base de datos, ponerle un nombre.</a> :warning: IMPORTANTE NO AGREGARLE TABLAS A LA BD, tiene que estar VACÍA :warning:  
- <a href="https://help.one.com/hc/es/articles/115005588189--C%C3%B3mo-importar-una-base-de-datos-a-phpMyAdmin-" target="_blank"> Importar el archivo bd_peliss.sql </a>(que se encuentra en el repositorio dentro de la carpeta BD) para que se creen las tablas :triangular_flag_on_post: 


### :white_check_mark: `Configurar conn.php`:nut_and_bolt:
- Abrir la carpeta donde se descargó anteriormente el proyecto, y buscar el archivo "conn.php" 👉 abrirlo con su editor de código de preferencia😉
  <section align="center">
    <img src="https://imgfz.com/i/gmV3J5X.jpeg" alt="conexionBD">
  </section>
- Donde dice "nombre de la BD" hay que poner el nombre de la base de datos creada anteriormente :link:
- Donde dice "root" hay que poner el nombre de usuario con el que se conectará a la BD. Si tenemos un usuario con diferente nombre al de root, modificarlo y escribir el nombre que corresponda:bangbang: 
- Si tenemos una <a href="https://www.mclibre.org/consultar/webapps/lecciones/phpmyadmin-1-soluciones.html" target="_blank"> contraseña para nuestro usuario </a> hay que escribirla donde dice "clave del usuario". Si es que NO tenemos contraseña hay que dejar las comillas vacías que vienen por defecto ("")
    

### :white_check_mark: `Ejecutar el proyecto`:rocket:
- Copiar la carpeta del proyecto descargado anteriormente a la siguiente ruta📌: 
  ```
    C:\xampp\htdocs
  ```
  <section align="center">
    <img src="https://imgfz.com/i/7Ll3oVI.jpeg" alt="ruta">
  </section>

 - Abrir XAMPP y activar los servidores Apache y MySQL ⚙️
 - Abrir su navegador de Internet🌐 y en el buscador🔎 pegar el siguiente enlace: 
    ```
      http://localhost/Top-Pelis-main/index.php
    ```


## Funcionalidades :clipboard:
### :red_circle: `Sin cuenta de usuario (sin iniciar sesión)`:rocket:
- Visualizar información de diferentes películas🎬, cómo el nombre, género, país🏁, año de estreno, director, empresa distribuidora, trailer🎥 y una sinopsis. 
- Filtrar películas📼 por género
  <section align="center">
    <img src="https://play-lh.googleusercontent.com/5UmiKCiL3tCpKtClWGXazB45bjA_gp0h_1DoRRgg1DXmj1zqWceAz-elMaIMiZgxKHU" alt="pelis">
  </section>
### :large_blue_circle: `Con cuenta de usuario creada (con sesión activa y logeado en el sitio) `:rocket:
- Se podrá acceder a todo lo mencionado anteriormente mas:
	- Dar like👍 a las películas🍿 y marcarlas como favoritas❣️
	- Dejar comentarios👁️‍🗨️ sobre alguna película📺


## Tecnologías utilizadas :hammer:
<section align="center">
<a href="https://www.php.net/manual/es/intro-whatis.php" target="_blank"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" alt="php" width="150" height="100"/> </a> 📣
<a href="https://www.ionos.es/digitalguide/servidores/know-how/que-es-mysql/#:~:text=MySQL%20es%20un%20sistema%20de,por%20ejemplo%2C%20WordPress%20y%20TYPO3." target="_blank"> <img class="img" src="https://styles.redditmedia.com/t5_2qm6k/styles/communityIcon_dhjr6guc03x51.png" alt="mysql" width="120" height="120"/> </a> 📣
<a href="https://www.phpmyadmin.net/" target="_blank"> <img class="img" src="https://www.techspot.com/images2/downloads/topdownload/2014/05/phpMyAdmin.png" alt="phpmyadmin" width="120" height="120"/> </a>
</section>


## Autor :black_nib:
| [<img src="https://i.pinimg.com/564x/c3/f6/16/c3f6166d32ceae00cf83f2e900011219.jpg" width=115><br><sub>Ana Lucia Juarez</sub>](https://github.com/manita02) | 
| :---: |
