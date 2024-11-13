<?php
  session_start();
  $nomePagina = "homeAdmin";
  include "function.php";
  include "functionHTML.php";
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
  
  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
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
          <li><a href="nuovoMenu.php">Crea un nuovo menù</a></li>
          <li><a href="eliminaMenu.php">Elimina il menu presente</a></li>
          <li><a href="aggiungiPiatto.php">Aggiungi un singolo piatto al menu</a></li>
          <li><a href="eliminaPiatto.php">Elimina un singolo piatto dal menu</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Eventi</h2>
        <ul class="list-unstyled">
          <li><a href="aggiungievento.php">Aggiungi un nuovo evento</a></li>
          <li><a href="eliminaevento.php">Elimina un evento</a></li>
          <li><a href="modificaEvento.php">Modifica un evento</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Utenti</h2>
        <ul class="list-unstyled">
          <li><a href="creaUtente.php">Crea un nuovo utente con privilegi da Admin</a></li>
          <li><a href="eliminaUtente.php">Elimina un utente</a></li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- Funzione per creare dinamicamente il footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>