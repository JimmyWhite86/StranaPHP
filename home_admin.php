<?php
  session_start();
  $nomePagina = "homeAdmin";
  include "function.php";
  include "functionHTML.php";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana HomeAdmin</title>
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
          <li><a href="nuovo_Menu_00.php">Crea un nuovo menù</a></li>
          <li><a href="elimina_menu.php">Elimina il menu presente</a></li>
          <li><a href="crea_piatto.php">Aggiungi un singolo piatto al menu</a></li>
          <li><a href="elimina_piatto.php">Elimina un singolo piatto dal menu</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Eventi</h2>
        <ul class="list-unstyled">
          <li><a href="crea_evento.php">Aggiungi un nuovo evento</a></li>
          <li><a href="elimina_evento.php">Elimina un evento</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Utenti</h2>
        <ul class="list-unstyled">
          <li><a href="crea_utente.php">Crea un nuovo utente con privilegi da Admin</a></li>
          <li><a href="elimina_utente.php">Elimina un utente</a></li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- Funzione per creare dinamicamente il footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>