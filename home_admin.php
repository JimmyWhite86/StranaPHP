<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "homeAdmin";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranAdmin | HomeAdmin</title>
</head>

<body>

<?php $userName = $_SESSION['username'] ?>

<!-- Funzione per creare dinamicamente la NavBar -->
<?php richiamaNavBar($nomePagina) ?>

<!-- TODO: Manca controllo utente come admin -->

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">home page admin</h1>
  </div>
</div>

<section>
  <div class="container-fluid bg-rosso">
    <div class="row justify-content-center">
      <!--      <h2 class="text-center m-3">, scegli un'azione </h2>-->

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Cucina</h2>
        <ul class="list-unstyled">
          <li><a href="<?= BASE_URL ?>/gestione_cucina/nuovo_menu_00.php">Crea un nuovo menù</a></li>
          <li><a href="<?= BASE_URL ?>/gestione_cucina/elimina_menu.php">Elimina il menu presente</a></li>
          <li><a href="<?= BASE_URL ?>/gestione_cucina/crea_piatto.php">Aggiungi un singolo piatto al menu</a></li>
          <li><a href="<?= BASE_URL ?>/gestione_cucina/elimina_piatto.php">Elimina un singolo piatto dal menu</a></li>
          <li><a href="<?= BASE_URL ?>/gestione_cucina/modifica_piatto_00.php">Modifica un singolo piatto del menu</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Eventi</h2>
        <ul class="list-unstyled">
          <li><a href="<?= BASE_URL ?>/gestione_eventi/crea_evento.php">Crea un nuovo evento</a></li>
          <li><a href="<?= BASE_URL ?>/gestione_eventi/elimina_evento.php">Elimina un evento</a></li>
          <li><a href="<?= BASE_URL ?>/gestione_eventi/modifica_evento_00.php">Modifica un evento</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Utenti</h2>
        <ul class="list-unstyled">
          <li><a href="<?= BASE_URL ?>/gestione_utenti/crea_utente.php">Crea un nuovo utente con privilegi da Admin</a></li>
          <li><a href="<?= BASE_URL ?>/gestione_utenti/elimina_utente.php">Elimina un utente</a></li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- Funzione per creare dinamicamente il footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>