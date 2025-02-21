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
                  <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                      <h2 class="fontTitoloSezione fontRosso">Evento non inserito</h2>
                      <p>Attenzione! Tutti i campi devono essere compilati.</p>
                      <hr>
                      <a href="crea_evento.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA EVENTO</a><br>
                      <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE EVENTI</a><br>
                    </div>
                  </div>
                    <?php
                } else {
                    
                    // Gestisco l'immagine
                    $imagePath = gestisciImmagine();
                    
                    if ($imagePath === false) { // Errore durante il caricamento del file dell'immagine ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontRosso">L'evento non è stato creato</h2>
                          <p>Abbiamo riscontrato un problema durante il caricamento dell'immagine</p>
                          <p><a href="crea_evento.php">Riprova</a> a creare l'evento</p>
                          <hr>
                          <a href="crea_evento.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA EVENTO</a><br>
                          <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE EVENTI</a><br>
                        </div>
                      </div>
                        <?php
                    } else {
                        
                        // Richiamo la funzione che inserisce l'evento nel db e associo il risultato ad una variabile
                        $esitoInserimentoEvento = inserisciEvento($evento, $data, $orario, $descrizione, $imagePath);
                        
                        // Controllo il risultato dell'operazione:
                        if (!$esitoInserimentoEvento['successo']) {
                            if ($esitoInserimentoEvento['codiceErrore'] == 0 ) { // Evento già esiste ?>
                              <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                                <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                                  <h2 class="fontTitoloSezione fontRosso">Evento non inserito</h2>
                                  <p>L'evento che hai provato a creare esiste già con lo stesso nome nella stessa data!</p>
                                  <hr>
                                  <a href="crea_evento.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA EVENTO</a><br>
                                  <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE EVENTI</a><br>
                                </div>
                              </div>
                                <?php
                            } else {
                                ?>
                              <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                                <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                                  <h2 class="fontTitoloSezione fontRosso">Evento non inserito</h2>
                                  <p>Abbiamo riscontrato un problema durante l'inserimento dell'evento</p>
                                  <!--<h3>Errore: <?php /*=$esitoInserimentoEvento['errore']*/?></h3>--> <!-- Stampo errore per prove. Può essere eliminato in versione definitiva -->
                                  <hr>
                                  <a href="crea_evento.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin3">CREA EVENTO</a><br>
                                  <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE EVENTI</a><br>
                                </div>
                              </div>
                                <?php
                            }
                        } else { ?>
                          <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                            <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                              <h2 class="fontTitoloSezione fontVerde">L'evento <strong>"<?=$evento?>"</strong> è stato creato con successo</h2>
                              <hr>
                              <a href="crea_evento.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA EVENTO</a><br>
                              <a href="<?= BASE_URL ?>gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE EVENTI</a><br>
                            </div>
                          </div>
                            <?php
                        }
                    }
                }
            }
        } ?>

</main>

<!-- Richiamo la funzione che genera il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
