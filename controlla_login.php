<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "login";
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

  <title>Stranamore | Home</title>

</head>
<body ng-app="myAppHome" ng-controller="myCtrl">

  <!-- NAV BAR -->
  <?php richiamaNavBar($nomePagina) ?>

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">log in</h1>
    </div>
  </div>

  <?php
    if (!isset($_SESSION["username"])) {  #L'utente non è loggato
      if (isset($_POST["username"]) && $_POST["username"] && isset ($_POST["psw1"]) && $_POST["psw1"]) {    # Controllo che tutti i campi del form siano compilati
        $username = $_POST["username"];
        $datiUtente = cercaUtente($username);
        if ($datiUtente) {    # Se dati utente = true --> utente presente del db
          $password = $_POST["psw1"];
          if ($password == $datiUtente["Password"]) {  # Controllo che la psw sia corretta
            $valoreAmministratore = controlloAdmin($username);
            if (!$valoreAmministratore) { #Utente loggato come utente "normale"
              $_SESSION["username"] = $username;
              $_SESSION["admin"] = 0;
              // echo "<h1>Bentornatə $username, accesso effettuato con successo.</h1>";
              loginUtenteStandard($username);
            }
            else {  # Utente loggato come admin
              $_SESSION["username"] = $username;
              $_SESSION["admin"] = 1; ?>
              <!--<div class="my-5 row justify-content-center">
                <div class="text-center">
                  <h1 class="titoloPagina">log in avvenuto con successo</h1>
                </div>
              </div>
              <h1 class="text-center m-3 p-3">Utente <?php /*=$username*/?> loggato come admin</h1>-->
            <?php
              loginUtenteAdmin($username);
            }
          }
          else {  # Condizione in cui si è impostata una psw errata
            // echo "<h1>hai inserito una psw errata</h1>";
            inseritoPswErrata();
          }
        }
        else {  # Condizione in cui non sono stati trovati record corrispondenti all'username inserito dall'utente
          // echo "<h1>Non abbiamo trovato il tuo nome utente</h1>";
          nomeUtenteNonTrovato();
        }
      }
      else {  # Condizione in cui non sono stati compilati tutti i campi del form
        //echo "<h1>errore compilazione del form</h1>";
        erroreCompilazioneForm();
      }
    }
    else {    # Utente già loggato --> propongo le azioni che può compiere
      //echo "<h1>utente già loggato</h1>";  # Implementare azioni utente!!
      $username = $_SESSION['username'];
      utenteGiaLoggato($username);
    }
  ?>


<?php HTMLfooter($nomePagina); ?>

</body>
</html>
