<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "eliminaEvento";
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">

  <!-- CDN POPPER JS BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
          integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
          integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
  </script>

  <!-- CDN CSS e JS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>

  <!-- Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>

  <title>Strana eliminaEvento</title>

</head>
<body>

<!-- Richiamo la nav bar-->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">elimina evento</h1>
  </div>
</div>

<?php
  
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  }
  else {
    $username = $_SESSION["username"];
    $amministratore = $_SESSION["admin"];
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    }
    else {
      $idEvento = $_POST["eventoSelezionato"];
      $esitoEliminazione = eliminaEvento($idEvento);
      
      if (!$esitoEliminazione['successo']) { ?>
        <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center">
            <h2> Ci sono stati errori durante l'eliminazione dell'evento </h2>
            <p>Hai cercato di eliminare l'evento <?=$esitoEliminazione['nomeEvento']?></p>
            <hr>
            <a href="gestioneEventi.php">Torna alla pagina gestione eventi</a>
            <a href="homeAdmin.php">Oppure torna alla home per admin</a>
          </div>
        </div>
        <?php
        
      }
      else {?>
        <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center">
            <h1> Eliminazione evento avvenuta con successo </h1>
            <p>Hai eliminato: <strong><?= $esitoEliminazione['nomeEvento']?></strong></p>
            <hr>
            <a href="gestioneEventi.php">Torna alla pagina gestione eventi</a>
            <a href="homeAdmin.php">Oppure torna alla home per admin</a>
          </div>
        </div>
        <?php
      }
    }
  }
?>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina);?>

</body>
</html>
