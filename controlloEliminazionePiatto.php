<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "eliminaPiatto";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana eliminaPiatto</title>
</head>

<body>

<!-- Richiamo la nav bar-->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">elimina un singolo piatto</h1>
  </div>
</div>

<?php
  
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  }
  else {
    
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION["username"];
    $idUser = $_SESSION["idUser"];
    
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    }
    else {
      $idPiatto = $_POST["piattoSelezionatoElimina"];
      $esitoEliminazione = eliminaPiatto($idPiatto);
      
      if (!$esitoEliminazione['successo']) {
        ?>
        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
            <h2>Ci sono stati errori durante l'eliminazione del piatto</h2>
            <h3>Il piatto selezionato non è stato eliminato</h3>
            <hr>
            <a href="homeAdmin.php" class="btn btn-primary mb-3">Home Adimn</a><br>
            <a href="eliminaPiatto.php" class="btn btn-primary mb-3">Elimina altro piatto</a><br>
            <a href="gestioneCucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
          </div>
        </div>
        <?php
      }
      else {
        ?>
        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
            <h2> Eliminazione piatto avvenuta con successo </h2>
            <h3>Hai eliminato: <strong><?= $esitoEliminazione['nomePiatto']?></strong></h3>
            <hr>
            <a href="homeAdmin.php" class="btn btn-primary mb-3">Home Admin</a><br>
            <a href="eliminaPiatto.php" class="btn btn-primary mb-3">Elimina altro piatto</a><br>
            <a href="gestioneCucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
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
