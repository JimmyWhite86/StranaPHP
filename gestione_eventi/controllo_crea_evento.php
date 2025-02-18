<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "crea_evento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>Stranamore | Crea Evento</title>
</head>

<body>

<!-- Richiamo la navBar-->
<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">crea un evento</h1>
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
                    $orario = $_POST["orarioNew"];
                    $descrizione = $_POST["descrizioneNew"];
                }
                
                // Controllo che i campi obbligatori non siano vuoti
                if (empty($evento) || empty($descrizione) || empty($orario) || empty($data)) { ?>
                  <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                    <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                      <h2>Attenzione! Tutti i campi devono essere compilati.</h2>
                      <hr>
                      <a href="crea_evento.php" class="btn btn-primary mb-3">Crea evento</a><br>
                      <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
                    </div>
                  </div>
                    <?php
                }
                
                // Gestisco l'immagine
                $imagePath = gestisciImmagine();
                
                if ($imagePath === false) {
                    // echo "Errore durante il caricamento del file";
                    ?>
                  <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                    <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                      <h2>Abbiamo riscontrato un problema durante il caricamento dell'immagine</h2>
                      <p><strong>L'evento non è stato creato</strong></p>
                      <p><a href="crea_evento.php">Riprova</a> a creare l'evento</p>
                      <hr>
                      <a href="crea_evento.php" class="btn btn-primary mb-3">Crea evento</a><br>
                      <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
                    </div>
                  </div>
                    <?php
                }
                
                // Richiamo la funzione che inserisce l'evento nel db e associo il risultato ad una variabile
                $esitoInserimentoEvento = inserisciEvento($evento, $data, $orario, $descrizione, $imagePath);
                
                // Controllo il risultato dell'operazione:
                if (!$esitoInserimentoEvento['successo']) {
                    if ($esitoInserimentoEvento['codiceErrore'] == 0 ) {
                        ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                        <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                          <h2>L'evento che hai provato a creare esiste già con lo stesso nome nella stessa data!</h2>
                          <hr>
                          <a href="crea_evento.php" class="btn btn-primary mb-3">Crea evento</a><br>
                          <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
                        </div>
                      </div>
                        <?php
                    } else {
                        ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                        <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                          <h2>Ci sono stati problemi con l'inserimento del nuovo evento!</h2>
                          <h3>Errore: <?=$esitoInserimentoEvento['errore']?></h3> <!-- Stampo errore per prove. Può essere eliminato in versione definitiva -->
                          <hr>
                          <a href="crea_evento.php" class="btn btn-primary mb-3">Crea evento</a><br>
                          <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
                        </div>
                      </div>
                        <?php
                    }
                } else { ?>
                  <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
                    <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
                      <h2>L'evento <strong>"<?=$evento?>"</strong> è stato creato con successo</h2>
                      <hr>
                      <a href="crea_evento.php" class="btn btn-primary mb-3">Crea un altro evento</a><br>
                      <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn btn-primary mb-3">Gestione eventi</a><br>
                    </div>
                  </div>
                    <?php
                }
            }
        } ?>

</main>

<!-- Richiamo la funzione che genera il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
