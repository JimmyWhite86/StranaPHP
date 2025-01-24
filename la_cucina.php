<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "la_cucina";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | La Cucina</title>
</head>

<body>

<!-- Richiama la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

<main>
  
  <?php
    // ------------------ PROVA FUNZIONI ------------------
    // Per controllo errori
    //    $attiviProva0 = 0;
    //    $attiviProva1 = 1;
    //    $attiviProva2 = 2;
    //
    //    $menuGenerato0 = generaMenu($attiviProva0);
    //    $menuGenerato1 = generaMenu($attiviProva1);
    //    $menuGenerato2 = generaMenu($attiviProva2);
    //    print_r($menuGenerato0);
    //    print_r($menuGenerato1);
    //    print_r($menuGenerato2);
    //
    //    $arrayPiatti = piattiInArray($attiviProva1);
    //    print_r($arrayPiatti);
    //
    //    $categoriePiatti = contaCategoriePiatti($attiviProva1);
    //    print_r($categoriePiatti);
    // --------------------------------------------------------
  ?>
  
  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">il menu di oggi</h1>
      <h2 class="fontTitoloSezione">Scopri il menu che Stranamore propone per questa sera</h2>
    </div>
  </div>

  <!-- Richiamo la funzione che restituisce il menu dinamicamente -->
  <div class="container-fluid bg-giallo pb-4 pt-4 mt-4 mb-4">
    <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
      <div class="row justify-content-center">
        <?php
          $disponibilitaPiatto = 1;
          generaMenu($disponibilitaPiatto);
        ?>
      </div>
    </div>
  </div>

</main>

<!-- Richiama il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>