<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "otto_per_mille";
  
  $testoDelTitolo = "dona il tuo 8x1000";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | 8x1000</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina);?>


<main id="mioMain">
  
  <!-- Richiamo il titolo della pagina -->
    <?php titoloDellaPagina($testoDelTitolo); ?>
  

  <h1 class="visually-hidden">Pagina in costruzione</h1>
  <p class="visually-hidden">La pagina che stai cercando è in costruzione. Torna a trovarci per visualizzare i contenuti.</p>
  
  <!-- Hero Section -->
  <section class="inCostruzione bg-nero text-center text-white d-flex align-items-center" role="banner">
    <div class="container hero-content" ng-app="myAppHome" ng-controller="myCtrl">
      <div class="row justify-content-center">
        <p class="px-1 fontTitoloSezione fontRosso" id=""></p>
      </div>
    </div>
  </section>
  
  
  <br><br>
  
</main>

  <!-- Footer -->
  <?php HTMLfooter($nomePagina);?>

</body>
</html>

