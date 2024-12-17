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
  <meta name="keywords" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">

  <!-- CDN POPPER JS BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
          integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
          integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
  </script>

  <!-- CDN CSS e JS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>

  <!-- Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>

  <title>Stranamore | Login</title>

</head>
<body>

  <!-- NAV BAR -->
  <?php richiamaNavBar($nomePagina) ?>

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">log in</h1>
    </div>
  </div>

  <?php
    if (!isset($_SESSION["username"])) {  // L'utente non è loggato
      if (isset($_POST["username"]) && $_POST["username"] && isset ($_POST["psw1"]) && $_POST["psw1"]) { // Controllo che tutti i campi del form siano compilati
        $username = $_POST["username"];
        $datiUtente = cercaUtente($username);
        // var_dump($datiUtente);
        if ($datiUtente) {                              // Se dati utente = true --> utente presente del db
          $password = $_POST["psw1"];
          if (password_verify($password, $datiUtente['Password'])) {   // Controllo che la psw sia corretta
            $valoreAmministratore = controlloAdmin($username);
            $_SESSION["username"] = $username;
            $_SESSION["idUser"] = $datiUtente["IDUser"];
            if (!$valoreAmministratore) {             // Utente loggato come utente "normale"
              $_SESSION["admin"] = 0;
              loginUtenteStandard($username);
              //var_dump($_SESSION);
            }
            else {  // Utente loggato come admin
              $_SESSION["admin"] = 1;
              loginUtenteAdmin($username);
              //var_dump($_SESSION);
            }
          }
          else {  // Condizione in cui si è impostata una psw errata
            inseritoPswErrata();
          }
        }
        else {  // Condizione in cui non sono stati trovati record corrispondenti all'username inserito dall'utente
          nomeUtenteNonTrovato();
        }
      }
      else {  // Condizione in cui non sono stati compilati tutti i campi del form
        erroreCompilazioneForm();
      }
    }
    else {    // Utente già loggato --> propongo le azioni che può compiere
      $username = $_SESSION['username'];
      utenteGiaLoggato($username);
    }
  ?>


<?php HTMLfooter($nomePagina); ?>

</body>
</html>
