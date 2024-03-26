<?php 
require_once 'php/carrucel.php';
require_once 'php/funciones/conexion.php'; 
require_once "php/funciones/validarComentario.php";
require_once "php/funciones/insertarComentario.php";
require_once "php/funciones/commentsCount.php";
session_start();
// Abrimos conexion a la BD
$MiConexion = ConexionBD();

// Inicializamos variables globales
$Mensaje = "";
$Comentario="";

// Si se presiono el boton
if(!empty($_POST['BotonEnviar'])){ 
  $Mensaje = validar();

  if(empty($Mensaje)){// Si el msj esta vacio, no hay ningun error
    //inserto el comentariio
    insertarComentario($MiConexion);
    header('Location: index.php');
    exit;
  } 

  /*ESTE BLOQUE SE EJECUTA SI EL COMENTARIO NO ES VALIDO */
  // Guardo esta info en $_SESSION ya q esta sobrevive al reload y ademas no salta el cartel del formulario.
  $_SESSION["comentario"] = $_POST['comentario']; // guardo el comentario enviado  para mostrarlo y q lo termine de enviar
  $_SESSION["mensaje"] = $Mensaje; 
  $_POST = array(); // vacio la variable _POST ya que sino salta cartel al recargar xq tiene data
  $_SERVER['REQUEST_METHOD'] = null; // Es necesario sino el requiere selecComentario ejecuta otro bloque q es para el fetch

  header('Location: index.php'); // vuelvo a cargar la pagina para q la variable $_POST ya quede vacia
  exit; // esto manda de una a index.php
}

if(!empty($_SESSION["mensaje"])){ // este bloque se ejecuta si el comentario no fue valido y _SESSION tiene info del error (linea 23 y 24)
  $Mensaje = $_SESSION["mensaje"];
  $Comentario = $_SESSION["comentario"];
  session_unset(); // Borro sel contenido de $_SESSION para q si el usuario desea recargar los errores desaparezcan.
}

// Busco la cantidad de comentarios
$commentsCountPHP = commentsCount($MiConexion);

require_once "php/funciones/selectComments.php";
$Listado = selectComments($MiConexion);

// Cerrar la conexión
mysqli_close($MiConexion);

?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Lucas Godoy" />
    <meta name="description" content="Venta de velas aromaticas cba" />
    <meta name="keywords" content="velas, deco, velasdeco" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Velas Deco</title>
    <link
      href="css/bootstrap.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="css/theme.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/style.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/mediaquerys.css?v=<?php echo(rand()); ?>" />
  </head>
  <body>
    <!-- HEADER: Inicio -->
    <header class="header container-fluid">
      <!-- fondo Velas Deco -->
      <div class="background row align-content-center">
        <h1 class="text-center m-0 pt-4">VELAS DECO</h1>
        <p class="background__p text-center m-0">Lorem ipsum dolor sit</p>
        <img class="background__logo d-none d-lg-block" src="img/logo.jpeg" alt="logo" />
      </div>
      <!-- nav -->
      <nav class="nav row navbar p-0">
        <div class="container-fluid">
          <button
            class="nav__btnMenu navbar-toggler px-1 py-0 border-0"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar"
          >
            <i class="nav__i bi bi-list"></i>
          </button>
          <div class="nav__theme dropdown me-3">
            <button
              class="nav__themeBtn dropdown-toggle border-0 p-0"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i id="themeIcon" class="bi bi-moon-fill ps-2"></i>
            </button>
            <ul class="themeList dropdown-menu">
              <li>
                <a
                  id="light"
                  class="themeList__item dropdown-item"
                  onclick="changeTheme('light')"
                  ><i class="bi bi-brightness-high-fill"></i> Light</a
                >
              </li>
              <li>
                <a
                  id="dark"
                  class="themeList__item dropdown-item active"
                  onclick="changeTheme('dark')"
                  ><i class="bi bi-moon-fill"></i> Dark</a
                >
              </li>
              <li>
                <a id="auto" class="themeList__item dropdown-item" onclick="changeTheme('auto')"
                  ><i class="bi bi-circle-half"></i> Auto</a
                >
              </li>
            </ul>
          </div>
          <div
            class="nav__menu offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel"
          >
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button
                type="button"
                class="nav__btn btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              ></button>
            </div>
            <div class="offcanvas-body">
              <ul class="menuList navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="menuList__a nav-link active" aria-current="page" href="#"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="menuList__a nav-link" href="#">Packs</a>
                </li>
                <li class="nav-item">
                  <a class="menuList__a nav-link" href="#">Decorativas</a>
                </li>
                <li class="nav-item">
                  <a class=menuList__a nav-link" href="#">Ofertas</a>
                </li>
                <li class="nav-item">
                  <a class="menuList__a nav-link" href="#">Personalizados</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- HEADER: Fin -->
    <!-- MAIN: Inicio -->
    <main class="container-fluid">
      <!-- SECTION: Carrusel -->
      <section class="row carousel">
        <div
          id="carouselExampleAutoplaying"
          class="col-sm-9 col-md-7 col-lg-6 col-xl-5 col-xxl-4 col-xxxl-3 mx-auto carousel slide p-0 pointer-event"
        >
          <!-- CUANDO LO HAGA .PHP REQUERIR CARRUCEL.PHP -->
          <div class="carousel-inner h-100">
            <?php CargarImagenes() ?>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <!-- SECTION: Quien soy -->
      <section class="row mt-5 w-75 mx-auto">
        <h2 class="text-center">¿QUIEN SOY?</h2>
        <p class="text-center">
          Soy un emprendimiento que fue ideado con la intención de dar armonía y
          paz en el hogar, a muchas personas les sirve para el aromaterapia y
          esto no se queda atrás en ese aspecto. 🕯️💫
        </p>
      </section>

      <!-- MIXTO -->
      <div class="row row-cols-1 row-cols-lg-2">
        <!-- SECTION: Contactanos -->
        <sec class="contactanos col-xl-4 mt-5">
          <div class="row justify-content-center justify-content-xl-end">
            <ul class="col-9 col-sm-6 col-md-4 col-lg-9 col-xl-10 ps-2 pe-0">
              <h2 class="contactanos__h2 text-lg-start">Contactanos</h2>
              <li class="d-flex align-items-center ps-1">
                <i class="contactanos__i bi bi-clock"></i>
                <div class="contactanos__horarios d-inline-flex flex-column">
                  <span class="ms-2"> Horarios de atencion: </span>
                  <span class="ms-2"> Lunes a Viernes: 10hs a 18hs </span>
                </div>
              </li>
              <li class="d-flex align-items-center mt-3 ps-1">
                <i class="contactanos__i bi bi-whatsapp"></i>
                <a class="contactanos__a ms-2 " target="_blank" href="https://wa.link/v7kyhq">3517160821</a>
              </li>
              <li class="d-flex align-items-center mt-3 ps-1">
                <i class="contactanos__i bi bi-instagram"></i>
                <a
                  href="https://www.instagram.com/velasdeco_aromatics._cba/"
                  class="contactanos__a ms-2"
                  target="_blank"
                  >velasdeco_aromatics._cba</a
                >
              </li>
              <li class="d-flex align-items-center mt-3">
                <i class="contactanos__i contactanos__i--modified bi bi-geo-alt"></i>
                <span class="ms-2">Córdoba, Argentina</span>
              </li>
            </ul>
          </div>
        </sec>

        <!-- SECTION: Dejanos tu comentario -->
        <sec class="dejanos col-xl-4 mt-5">
          <h2 class="text-center">Dejanos tu comentario</h2>
          <form
            method="post"
            class="dejanos__form row d-flex flex-column align-items-center justify-content-around"
            style="<?php if(!empty($Mensaje)){ echo "height: 19em;"; } ?>"
          >
            <?php if(!empty($Mensaje)){ ?> <div class="form__error col-10 text-center"> <?php echo $Mensaje; ?> </div> <?php } ?> 

            <textarea
              class="form__textarea col-8 col-sm-5 col-lg-7 col-xl-9 col-xxl-8 rounded-4 py-1"
              name="comentario"
              id="textarea"
              placeholder="Ingresa tu comentario"
              maxlength="200" <?php  if(!empty($Mensaje)){ echo "autofocus";} ?>><?php echo $Comentario ?></textarea>
            <input
              class="form__input col-3 col-md-2 col-lg-3 col-xl-4 col-xxl-3"
              type="submit"
              name="BotonEnviar"
              id="boton"
            />
          </form>
        </sec>
      </div>

      <!-- SECTION: Comentarios -->
      <sec class="comentarios row flex-column mt-5 mb-3">
        <h2 class="text-center mb-1">Comentarios</h2>

        <!-- contenedor de comentarios -->
        <div
          class="row row-cols-1 justify-content-center justify-content-md-evenly mx-auto mt-2"
        >
          <div
            class="comentarios__card col-12 col-sm-8 col-md-7 col-lg-3 px-3 pt-3 border rounded-5 mt-2"
          >
            <p class="comentarios__p" id="comment1"><?php if(!empty($Listado[0])) echo $Listado[0]?></p>
          </div>
          <div
            class="comentarios__card col-12 col-sm-8 col-md-7 col-lg-3 px-3 pt-3 border rounded-5 mt-2"
          >
            <p class="comentarios__p" id="comment2"><?php if(!empty($Listado[1])) echo $Listado[1]?></p>
          </div>
          <div
            class="comentarios__card col-12 col-sm-8 col-md-7 col-lg-3 px-3 pt-3 border rounded-5 mt-2"
          >
            <p class="comentarios__p" id="comment3"><?php if(!empty($Listado[2])) echo $Listado[2]?></p>
          </div>
        </div>

        <!-- Flechas cometarios -->
        <div class="comentarios__controllers d-flex w-50 mx-auto justify-content-center px-0">
          <i id="prev" class="controllers__i bi bi-caret-left-fill mx-4"></i>
          <i id="sig" class="controllers__i bi bi-caret-right-fill mx-4"></i>
        </div>
      </sec>
    </main>
    <!-- MAIN: Fin -->

    <!-- FOOTER: Inicio -->
    <footer class="footer container mt-5 pt-5">
      <p class="text-center">
        <img class="footer__img" src="img/iconos/lapiz.png" alt="" />
        Autor: Lucas Godoy
      </p>
    </footer>
    <!-- FOOTER: Fin -->
    <script src="js/theme.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script>
      let commentsCountJS = <?php echo $commentsCountPHP  ?>;
    </script>
    <script src="js/main.js"></script>
    
  </body>
</html>
