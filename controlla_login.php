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
  <nav class="navbar navbar-expand-lg bg-nero">
    
    <a href="#mioMain" class="skip text-center" tabindex="1">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->

    <div class="container-fluid">

      <a class="navbar-brand fontstranaBase" href="index.php">
        <img src="Immagini/Logo_Stranamore_01.jpg" class="d-inline-block align-center" alt="logo stranamore">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse fontNav" id="navbarNav" role="navigation" aria-label="main navigation">
        <div class="d-flex justify-content-center flex-grow-1">
          
          <ul class="navbar-nav" id="myNavBar">
            <li class="nav-item">
              <a class="nav-link mioActive" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="chisiamo.php">Chi Siamo</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="lacucina.php">La Cucina</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="eventi.php">Eventi</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="contatti.php">Contatti</a>
            </li>
          </ul>
        </div>

        <div>
          <a href="login.php">
            <i class="bi bi-box-arrow-in-right pe-4 nav-link mioOver"></i>
          </a>
        </div>
      
      </div>  
    </div>
  </nav>



<?php
  if (!isset($_SESSION["username"])) { # Controllo che non sia già stato effettuato il login
    if (isset($_POST["username"]) && $_POST["username"] && isset ($_POST["psw1"]) && $_POST["psw1"]) { #controllo che i campi siano compilati 

      $username = $_POST["username"];
      $datiUtente = cercaUtente ($username);  #Richiamo la funzione per cercare gli utenti all'interno del database

      if ($datiUtente) {  #Se datiUtente è true --> utente presente nel database

        $password = $_POST["psw1"];
        if ($password == $datiUtente["password"]) { # Controllo che la password inserita sia corretta
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