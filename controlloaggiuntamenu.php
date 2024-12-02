<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "aggiungiMenu";
?>

<!DOCTYPE html>
<html lang="it">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="keywords" content="Associazione culturale, APS, ARCI, promozione sociale">
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

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Stranamore | Aggiungi Menu</title>

</head>

<body>

<?php richiamaNavBar($nomePagina) ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">aggiungi menu</h1>
  </div>
</div>

<?php
  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  }
  else { # Utente loggato
    
    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];
    $idUser = $_SESSION["idUser"];
    
    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    }
    else { # Utente è admin --> controllo che i dati inseriti siano corretti
      $categorie = ['antipasti', 'primi', 'secondi', 'contorni', 'dolci'];
      $menuValido = true;
      foreach ($categorie as $categoria) {
        for ($i = 1; $i <= 3; $i++) {
          if (!isset($_POST["{$categoria}_{$i}"]) || !isset($_POST["prezzo_{$categoria}_{$i}"]) || !isset($_POST["cuoco_{$categoria}_{$i}"])) {
            $menuValido = false;
            break 2;
          }
        }
      }
      
      if ($menuValido) {
        foreach ($categorie as $categoria) {
          for ($i = 1; $i <= 3; $i++) {
            $nomePiatto = $_POST["{$categoria}_{$i}"];
            $descrizionePiatto = $_POST["descrizione_{$categoria}_{$i}"] ?? '';
            $prezzoPiatto = $_POST["prezzo_{$categoria}_{$i}"];
            $cuocoPiatto = $_POST["cuoco_{$categoria}_{$i}"];
            $disponibilitaPiatto = 1;
            $dataInserimentoPiatto = date("d/m/y");
            
            if ($prezzoPiatto < 0) { ?>
              <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                  <h2>Attenzione</h2>
                  <h3>Hai inserito un prezzo inferiore a zero!</h3>
                  <p>Prova nuovamente ad inserire il piatto</p>
                  <hr>
                  <a href="homeAdmin.php" class="btn btn-primary mb-3">Home Admin</a><br>
                  <a href="aggiungiMenu.php" class="btn btn-primary mb-3">Aggiungi un altro menu</a><br>
                  <a href="gestioneCucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
                </div>
              </div>
              <?php
              exit;
            } else {
              $risultatoAggiuntaPiatto = aggiungiPiatto($nomePiatto, $descrizionePiatto, $categoria, $prezzoPiatto, $cuocoPiatto, $disponibilitaPiatto, $dataInserimentoPiatto);
              if (!$risultatoAggiuntaPiatto) {
                echo "<p>Ci sono stati problemi con l'inserimento del piatto $nomePiatto</p>";
                azioni_amministratore();
                exit;
              }
            }
          }
        } ?>
        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
            <h2>Il menu è stato aggiunto con successo!</h2>
            <hr>
            <a href="homeAdmin.php" class="btn btn-primary mb-3">Home Admin</a><br>
            <a href="aggiungiMenu.php" class="btn btn-primary mb-3">Aggiungi un altro menu</a><br>
            <a href="gestioneCucina.php" class="btn btn-primary mb-3">Gestione Cucina</a><br>
          </div>
        </div>
        <?php
      } else {
        echo "<p> Attenzione $username! Devi compilare tutti i campi per aggiungere il menu</p>";
      }
    }
  }
  
  HTMLfooter($nomePagina);?>

</body>
</html><?php
