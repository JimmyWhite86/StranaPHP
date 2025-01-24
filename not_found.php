<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "not_found";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | 404</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina);?>
<h1 class="visually-hidden">Pagina non trovata</h1>

<main id="mioMain" class="bg-rosso">
  

  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">404</h1>
    </div>
  </div>
  
  
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">pagina non trovata</h1>
    </div>
  </div>
  

  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="fontTitoloSezione">Torna alla pagina principale</h1>
      <a href="index.php" class="btn btn-primary">Home</a>
    </div>
  </div>


</main>
  
  <!-- Footer -->
  <?php HTMLfooter($nomePagina);?>



</body>
</html>

