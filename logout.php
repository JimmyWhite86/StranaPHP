<?php
  session_start();
  session_unset();
  session_destroy();
  include 'includes/init.php';
  $nomePagina = "logut";
?>


<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Home</title>
</head>

<body>

  <!-- Nav Bar -->
  <?php richiamaNavBar($nomePagina); ?>

  <!-- "Titolo" della pagina -->
  <div class="my-5">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina">log out</h1>
    </div>
  </div>

  <div class="container-fluid d-flex justify-content-center bg-giallo py-4 my-4 myShadowGialla">
    <div class="row bg-bianco justify-content-center col-10 col-sm-6 text-center rounded-3 myShadowNera my-3">
        <h1 class="fontTitoloSezione my-4">Logout effettuato correttamente</h1>
        <!--<a href="index.php">Puoi tornare alla home page</a>-->
    </div>
  </div>

  <!-- Footer -->
  <?php HTMLfooter($nomePagina); ?>

</body>
</html>
