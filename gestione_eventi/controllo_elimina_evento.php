<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "elimina_evento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranaAdmin | eliminaEvento</title>
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
            <a href="gestione_eventi.php">Torna alla pagina gestione eventi</a>
            <a href="home_admin.php">Oppure torna alla home per admin</a>
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
            <a href="gestione_eventi.php">Torna alla pagina gestione eventi</a>
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
