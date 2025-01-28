<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "gestione_eventi";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana GestioneEventi</title>
</head>

<body>

<?php $userName = $_SESSION['username']; ?>

<!-- Funzione per creare dinamicamente la NavBar -->
<?php richiamaNavBar($nomePagina) ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">gestione eventi</h1>
  </div>
</div>

<div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
  <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
    <div class="row justify-content-center">
      <h2 class="text-center">Ciao <?= $userName ?>, scegli un azione:</h2>
      <ul class="list-unstyled ml-5 pl-5">
        <li><a href="<?= BASE_URL ?>/gestione_eventi/crea_evento.php">Aggiungi un nuovo evento</a></li>
        <li><a href="<?= BASE_URL ?>/gestione_eventi/elimina_evento.php">Elimina un evento</a></li>
        <li><a href="<?= BASE_URL ?>/gestione_eventi/modifica_evento_00.php">Modifica un evento</a></li>
      </ul>
    </div>
  </div>
</div>



<!-- Funzione per richiamare dinamicamente il footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>