<?php
  session_start();
  include "includes/init.php";
  $nomePagina = "elimina_utente";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranaAdmin | eliminaUtente</title>
</head>

<body>

<!-- Richiamo la nav bar-->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">elimina utente</h1>
  </div>
</div>

<?php
  
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  }
  else {
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION["username"];
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    }
    else {
      $idUtente = $_POST["utenteSelezionato"];
      $esitoEliminazione = eliminaUtente($idUtente);
      //print_r($esitoEliminazione);
      
      if (!$esitoEliminazione['successo']) { ?>
        <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center">
            <h2> Ci sono stati errori durante l'eliminazione dell'utente </h2>
            <hr>
            <a href="elimina_utente.php">Elimina un altro utente</a>
            <a href="gestione_utenti.php">Torna alla pagina gestione utenti</a>
            <a href="home_admin.php">Oppure torna alla home per admin</a>
          </div>
        </div>
        <?php
      } else { ?>
        <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center">
            <h1> Eliminazione utente avvenuta con successo </h1>
            <p>Hai eliminato: <strong><?= $esitoEliminazione['nomeUtente'] ?></strong></p>
            <hr>
            <a href="elimina_utente.php">Elimina un altro utente</a>
            <a href="gestione_utenti.php">Torna alla pagina gestione utenti</a>
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
