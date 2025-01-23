<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "eliminaMenu";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana eliminaEvento</title>
</head>

<body>

<!-- Richiamo la nav bar-->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">elimina intero menu</h1>
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
      $esitoEliminazione = eliminaInteroMenu();
      if (!$esitoEliminazione['successo']) { ?>
        <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center">
            <h1> Ci sono stati errori durante la cancellazione dell'intero menu </h1>
            <a href="gestione_cucina.php">Torna alla pagina gestione cucina</a>
            <a href="home_admin.php">Oppure torna alla home per admin</a>
          </div>
        </div>
        <?php
      }
      else { ?>
        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center">
            <h1> Eliminazione dell'intero menù avvenuta con successo </h1>
            <a href="gestione_cucina.php">Torna alla pagina gestione cucina</a>
            <a href="home_admin.php">Oppure torna alla home per admin</a>
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
