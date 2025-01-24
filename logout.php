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
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">log out</h1>
    </div>
  </div>

  <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
    <div class="row bg-bianco justify-content-center col-6 text-center">
        <h1>Logout effettuato correttamente</h1>
        <a href="index.php">Puoi tornare alla home page</a>
    </div>
  </div>

  <!-- Footer -->
  <?php HTMLfooter($nomePagina); ?>

</body>
</html>
