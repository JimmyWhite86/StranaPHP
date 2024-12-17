<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "aggiungiEvento";
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

  <title>Stranamore | Home</title>

</head>

<body>

<!-- Richiamo la navBar-->
<?php richiamaNavBar($nomePagina) ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">aggiungi un evento</h1>
  </div>
</div>

<?php
  
  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  } else { # Utente loggato
    
    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];
    
    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    } else {
      
      // verifico che il modulo sia stato inviato
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Recupero i dati inviati dal form
        $evento = $_POST["eventoNew"];
        $data = $_POST["dataNew"];
        $descrizione = $_POST["descrizioneNew"];
      }
      
      // Controllo che i campi obbligatori non siano vuoti
      if (empty($evento) || empty($descrizione) || empty($data)) {
        echo "Tutti i campi devono essere compilati";
      }
      
      // Gestisco l'immagine
      $imagePath = gestisciImmagine();
      if ($imagePath === false) {
        echo "Errore durante il caricamento del file";
        exit;
      }
      
      // Richiamo la funzione che inserisce l'evento nel db e associo il risultato ad una variabile
      $esitoInserimentoEvento = inserisciEvento($evento, $data, $descrizione, $imagePath);
      
      // Controllo il risultato dell'operazione:
      if (!$esitoInserimentoEvento['successo']) {
        if ($esitoInserimentoEvento['codiceErrore'] == 0 ) {
          ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>L'evento che hai provato ad inserire esiste già con lo stesso nome nella stessa data!</h2>
              <hr>
              <a href="aggiungievento.php" class="btn btn-primary mb-3">Aggiungi evento</a><br>
              <a href="gestioneEventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
            </div>
          </div>
          <?php
        } else {
          ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>Ci sono stati problemi con l'inserimento del nuovo evento!</h2>
              <hr>
              <a href="aggiungievento.php" class="btn btn-primary mb-3">Aggiungi evento</a><br>
              <a href="gestioneEventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
            </div>
          </div>
          <?php
        }
      } else { ?>
        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
            <h2>L'evento <strong>"<?=$evento?>"</strong> è stato inserito correttamente</h2>
            <hr>
            <a href="aggiungievento.php" class="btn btn-primary mb-3">Aggiungi un altro evento</a><br>
            <a href="gestioneEventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
          </div>
        </div>
        <?php
      }
      
    }
  }
  
  
  HTMLfooter($nomePagina);?>

</body>
</html>
