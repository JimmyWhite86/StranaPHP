<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "nuovo_evento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
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
      if (empty($evento) || empty($descrizione) || empty($data)) { //TODO: la descrizione può non essere obbligatoria?
        echo "Tutti i campi devono essere compilati"; //TODO: evitare di usare echo
      }
      
      // Gestisco l'immagine
      $imagePath = gestisciImmagine();
      if ($imagePath === false) {
        echo "Errore durante il caricamento del file"; //TODO: evitare di usare echo
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
              <a href="crea_evento.php" class="btn btn-primary mb-3">Aggiungi evento</a><br>
              <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
            </div>
          </div>
          <?php
        } else {
          ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>Ci sono stati problemi con l'inserimento del nuovo evento!</h2>
              <h3>Errore: <?=$esitoInserimentoEvento['errore']?></h3> <!--Per le prove-->
              <hr>
              <a href="crea_evento.php" class="btn btn-primary mb-3">Aggiungi evento</a><br>
              <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
            </div>
          </div>
          <?php
        }
      } else { ?>
        <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
            <h2>L'evento <strong>"<?=$evento?>"</strong> è stato inserito correttamente</h2>
            <hr>
            <a href="crea_evento.php" class="btn btn-primary mb-3">Aggiungi un altro evento</a><br>
            <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
          </div>
        </div>
        <?php
      }
      
    }
  }
  
  
  HTMLfooter($nomePagina);?>

</body>
</html>
