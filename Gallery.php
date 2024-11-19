<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "gallery";
?>

<!DOCTYPE html>
<html lang="it">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="keyword" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">

  <!-- CDN CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- JavaScript di Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">
  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>

  <!--  Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Stranamore | Gallery</title>

</head>
<body>

<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">gallery fotografica</h1>
  </div>
</div>


<main id="mioMain" role="main">


  <!-- Gallery -->
  <div class="row m-3">
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">

      <!-- Orizzontale -->
      <img
        src="Immagini/ApeGiardino01.JPG"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Persone fanno aperitivo nel giardino del circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="0"
      />

      <!-- Verticale -->
      <img
        src="Immagini/Donca_01.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Concerto dei Doncaetano nella cantina del circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="1"
      />
    </div>

    <!-- Verticale -->
    <div class="col-lg-4 mb-4 mb-lg-0">
      <img
        src="Immagini/ConcertoGiardino02.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Concerto nel giardino del circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="2"
      />

      <!-- Orizzontale -->
      <img
        src="Immagini/Dibattito01.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Dibattito al circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="3"
      />
    </div>

    <!-- Orizzontale -->
    <div class="col-lg-4 mb-4 mb-lg-0">
      <img
        src="Immagini/Boiler01.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Aperitivo con DJ Set al circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="4"
      />
      <!-- Verticale -->
      <img
        src="Immagini/CenaGiardino01.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Cena sociale nel giardino del circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="5"
      />
    </div>
  </div>
  <!-- Gallery -->

  <!-- Modale con carosello -->
  <div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="carouselModalLabel" aria-hidden="true">   <!-- Nota 00 -->
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-giallo text-center justify-content-center align-item-center">
          <h5 class="modal-title fontTitoloCarosello" id="carouselModalLabel">le foto di strana</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-nero">
          <!-- Carosello -->
          <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="Immagini/ApeGiardino01.JPG" class="d-block w-100" alt="Persone fanno aperitivo nel giardino del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/Donca_01.jpg" class="d-block w-100" alt="Concerto dei Doncaetano nella cantina del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/ConcertoGiardino02.jpg" class="d-block w-100" alt="Concerto nel giardino del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/Dibattito01.jpg" class="d-block w-100" alt="Dibattito al circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/Boiler01.jpg" class="d-block w-100" alt="Aperitivo con DJ Set nel giardino del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/CenaGiardino01.jpg" class="d-block w-100" alt="Cena sociale nel giardino del circolo Stranamore">
              </div>
            </div>
          </div>
          <!-- Controlli del carosello -->
          <button type="button" class="carousel-control-prev" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Precedente</span>
          </button>
          <button type="button" class="carousel-control-next" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Successiva</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Richiamo la funzione che genera il footer -->
  <?php HTMLfooter($nomePagina); ?>

</body>
</html>



<!--

        Nota 00:
Cosa significano gli attributi di questo <div>:
  -



-->
