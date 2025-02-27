<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "gallery";
  
  $testoDelTitolo = "le foto di strana";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Gallery</title>
</head>

<body>

<?php richiamaNavBar($nomePagina);?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <?php titoloDellaPagina($testoDelTitolo) ?>

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
      >

      <!-- Verticale -->
      <img
        src="Immagini/Donca_01.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Concerto dei Doncaetano nella cantina del circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="1"
      >
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
      >

      <!-- Orizzontale -->
      <img
        src="Immagini/Dibattito01.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Dibattito al circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="3"
      >
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
      >
      <!-- Verticale -->
      <img
        src="Immagini/CenaGiardino01.jpg"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Cena sociale nel giardino del circolo Stranamore"
        data-bs-toggle="modal"
        data-bs-target="#carouselModal"
        data-bs-side-to="5"
      >
    </div>
  </div>
  <!-- Gallery -->

  <!-- Modale con carosello -->
  <div class="modal fade" id="carouselModal" tabindex="-1" aria-labelledby="carouselModalLabel" aria-hidden="true">   <!-- Nota 00 -->
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-giallo text-center justify-content-center align-item-center">
          <h2 class="modal-title fontTitoloCarosello" id="carouselModalLabel">le foto di strana</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-nero">
          <!-- Carosello -->
          <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="Immagini/ApeGiardino01.JPG" class="d-block img-fluid" alt="Persone fanno aperitivo nel giardino del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/Donca_01.jpg" class="d-block img-fluid" alt="Concerto dei Doncaetano nella cantina del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/ConcertoGiardino02.jpg" class="d-block img-fluid" alt="Concerto nel giardino del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/Dibattito01.jpg" class="d-block img-fluid" alt="Dibattito al circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/Boiler01.jpg" class="d-block img-fluid" alt="Aperitivo con DJ Set nel giardino del circolo Stranamore">
              </div>
              <div class="carousel-item">
                <img src="Immagini/CenaGiardino01.jpg" class="d-block img-fluid" alt="Cena sociale nel giardino del circolo Stranamore">
              </div>
            </div>
          </div>

          <!-- Controlli del carosello -->
          <button type="button" class="carousel-control-prev" data-bs-target="#galleryCarousel" data-bs-slide="prev"
                  aria-label="Precedente">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Immagine precedente</span>
          </button>
          <button type="button" class="carousel-control-next" data-bs-target="#galleryCarousel" data-bs-slide="next"
                  aria-label="Successiva">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Immagine successiva</span>
          </button>
        </div>
      </div>
    </div>
  </div>

</main>

<!-- Richiamo la funzione che genera il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>



<!--
        Nota 00:
Cosa significano gli attributi di questo <div>:
  - Class
    - modal => Classe bootstrap che identifica l'elemento come un modale, ovvero una finestra che si apre sopra il contenuto della pagina, bloccando
               l'interazione con il resto della pagina finché non viene chiuso.
    - fade => aggiunge dissolvenza all'apertura e chiusura
  - aria-labelledby="carouselModalLabel"
      Collega il modale a un elemento che ne descrive il titolo
  - aria-hidde="true"
      Indica che il modale è inizialmente nascosto
      Quando il modale viene aperto l'attributo viene aggiornato automaticamente a false.
-->
