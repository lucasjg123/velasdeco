<?php 
require_once 'php/carrucel.php'


?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="author" content="Lucas Godoy" />
    <meta name="description" content="Venta de velas aromaticas cba" />
    <meta name="keywords" content="velas, deco, velasdeco" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="css/theme.css?v=<?php echo(rand()); ?>" />
    <link rel="stylesheet" href="css/style.css?v=<?php echo(rand()); ?>" />
    
  </head>
  <body>
    <!-- HEADER: Inicio -->
    <header class="container-fluid">
      <!-- fondo Velas Deco -->
      <div class="row align-content-center fondoEncabezado">
        <h1 class="text-center m-0 pt-4">VELAS DECO</h1>
        <p class="text-center m-0">Lorem ipsum dolor sit</p>
        <img class="logo d-none d-lg-block" src="img/logo.jpeg" alt="logo" />
      </div>
      <!-- nav -->
      <nav class="row navbar p-0">
        <div class="container-fluid">
          <button
            class="navbar-toggler px-1 py-0 border-0"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar"
          >
            <i class="bi bi-list"></i>
          </button>
          <div class="dropdown me-3">
            <button
              class="dropdown-toggle border-0 p-0"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i id="themeIcon" class="bi bi-moon-fill ps-2"></i>
            </button>
            <ul class="dropdown-menu">
              <li>
                <a
                  id="light"
                  class="dropdown-item"
                  onclick="changeTheme('light')"
                  ><i class="bi bi-brightness-high-fill"></i> Light</a
                >
              </li>
              <li>
                <a
                  id="dark"
                  class="dropdown-item active"
                  onclick="changeTheme('dark')"
                  ><i class="bi bi-moon-fill"></i> Dark</a
                >
              </li>
              <li>
                <a id="auto" class="dropdown-item" onclick="changeTheme('auto')"
                  ><i class="bi bi-circle-half"></i> Auto</a
                >
              </li>
            </ul>
          </div>
          <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel"
          >
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              ></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Packs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Decorativas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Ofertas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Personalizados</a>
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
          class="col-sm-9 col-md-7 col-lg-6 col-xl-5 col-xxl-3 mx-auto carousel slide p-0 pointer-event"
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
        <sec class="col-xl-4 contactanos mt-5">
          <div class="row justify-content-center justify-content-xl-end">
            <ul class="col-9 col-sm-6 col-md-4 col-lg-9 col-xl-10 ps-2 pe-0">
              <h2 class="">Contactanos</h2>
              <li class="d-flex align-items-center ps-1">
                <i class="bi bi-clock"></i>
                <div class="d-inline-flex flex-column divHorarios">
                  <span class="ms-2"> Horarios de atencion: </span>
                  <span class="ms-2"> Lunes a Viernes: 10hs a 18hs </span>
                </div>
              </li>
              <li class="d-flex align-items-center mt-3 ps-1">
                <i class="bi bi-whatsapp"></i>
                <span class="ms-2">3734</span>
              </li>
              <li class="d-flex align-items-center mt-3 ps-1">
                <i class="bi bi-instagram"></i>
                <a
                  href="https://www.instagram.com/velasdeco_aromatics._cba/"
                  class="ms-2 link"
                  target="_blank"
                  >velasdeco_aromatics._cba</a
                >
              </li>
              <li class="d-flex align-items-center mt-3">
                <i class="bi bi-geo-alt"></i>
                <span class="ms-2">Córdoba, Argentina</span>
              </li>
            </ul>
          </div>
        </sec>

        <!-- SECTION: Dejanos tu comentario -->
        <sec class="col-xl-4 mt-5">
          <h2 class="text-center">Dejanos tu comentario</h2>
          <form
            action=""
            class="row d-flex flex-column align-items-center justify-content-evenly"
          >
            <div class="col msj_error text-center">
              Debes ingresar un minimo de 5 caracteres!
            </div>
            <textarea
              class="col-8 col-sm-5 col-lg-7 col-xl-9 col-xxl-8 h-75 rounded-4 py-1"
              name=""
              id="textarea"
              placeholder="Ingresa tu comentario"
              maxlength="300"
            ></textarea>
            <input
              disabled
              class="col-3 col-md-2 col-lg-3 col-xl-4 col-xxl-3"
              type="submit"
              name=""
              id="boton"
            />
          </form>
        </sec>
      </div>

      <!-- SECTION: Comentarios -->
      <sec class="row flex-column mt-5 mb-3">
        <h2 class="text-center mb-1">Comentarios</h2>

        <!-- contenedor de comentarios -->
        <div
          class="row row-cols-1 justify-content-center justify-content-md-evenly divComentarios mx-auto mt-2"
        >
          <div
            class="col-12 col-sm-8 col-md-7 col-lg-3 px-3 pt-3 border rounded-5 mt-2"
          >
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet
              doloribus architecto dignissimos, sint, atque laudantium inventore
              animi ab ad eligendi quia ipsa nobis esse modi, reiciendis
              possimus minima qui recusandae!ma qui recusandae!i
              recusandaeaeef3333
            </p>
          </div>
          <div
            class="col-12 col-sm-8 col-md-7 col-lg-3 px-3 pt-3 border rounded-5 mt-2"
          >
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet
              doloribus architecto dignissimos, sint, atque laudantium inventore
              animi ab ad eligendi quia ipsa nobis esse modi, reiciendis
              possimus minima qui recusandae!ma qui recusandae!i
              recusandaeaeef3333
            </p>
          </div>
          <div
            class="col-12 col-sm-8 col-md-7 col-lg-3 px-3 pt-3 border rounded-5 mt-2"
          >
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet
              doloribus architecto dignissimos, sint, atque laudantium inventore
              animi ab ad eligendi quia ipsa nobis esse modi, reiciendis
              possimus minima qui recusandae!ma qui recusandae!i
              recusandaeaeef3333
            </p>
          </div>
        </div>

        <!-- Flechas cometarios -->
        <div class="divFlechas d-flex w-50 mx-auto justify-content-center px-0">
          <i class="bi bi-caret-left-fill mx-4"></i>
          <i class="bi bi-caret-right-fill mx-4"></i>
        </div>
      </sec>
    </main>
    <!-- MAIN: Fin -->

    <!-- FOOTER: Inicio -->
    <footer class="container mt-5 pt-5">
      <p class="text-center">
        <img src="img/iconos/lapiz.png" alt="" />Autor: Lucas Godoy
      </p>
    </footer>
    <!-- FOOTER: Fin -->
    <script src="js/theme.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
