<?php
  session_start();
  $nomePagina = "lacucina";
  include "functionHTML.php";
  include "function.php";
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

  <!-- Fobnt Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Stranamore | La Cucina</title>

</head>


<body>

<!-- Richiama la nav bar -->
<?php richiamaNavBar($nomePagina); ?>


<?php
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

?>
<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">il menu di oggi</h1>
    <h2 class="">Scopri il menu che Stranamore propone per questa sera</h2>
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

<!-- Richiama il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>