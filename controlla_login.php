<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "login";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
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
