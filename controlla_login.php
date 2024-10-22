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

  <!-- Fobnt Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Stranamore | Home</title>

</head>
<body ng-app="myAppHome" ng-controller="myCtrl">

  <!-- NAV BAR -->
  <?php richiamaNavBar($nomePagina) ?>



<?php
  if (!isset($_SESSION["username"])) { # Controllo che non sia già stato effettuato il login
    if (isset($_POST["username"]) && $_POST["username"] && isset ($_POST["psw1"]) && $_POST["psw1"]) { #controllo che i campi siano compilati 

      $username = $_POST["username"];
      $datiUtente = cercaUtente ($username);  #Richiamo la funzione per cercare gli utenti all'interno del database

      if ($datiUtente) {  #Se datiUtente è true --> utente presente nel database

        $password = $_POST["psw1"];
        if ($password == $datiUtente["Password"]) { # Controllo che la password inserita sia corretta
          $_SESSION["username"] = $username;        # Setto l'username in sessione
          ?>
          <p>Ti sei loggato</p>
<?php   }
        else {  #Psw errata
          echo "<p>Hai inserito una psw sbagliata.</p>";
        }
      }

      else {    #Nome utente non trovato
        echo "<p>nome utente non trovato</p>";
      }
    }

    else {        #Campi non compilati correttamente
      echo "<p>Non hai compilato i campi correttamente</p>";
    }
  }
    
  else {
    echo "<p>Sei già loggato</p>";
  }

 ?>


<?php HTMLfooter($nomePagina); ?>

</body>
</html>
