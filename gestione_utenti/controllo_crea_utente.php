<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "crea_utente";
    
    $testoDelTitolo = "crea un nuovo utente"
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>StranAdmin | creaUtente</title>
</head>

<body>

<!-- Richiamo la navBar-->
<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
    <?php titoloDellaPagina($testoDelTitolo) ?>
    
    <?php
        
        if (!isset($_SESSION["username"])) {  # Utente non loggato
            deviLoggarti();
        } else { # Utente loggato
            
            $amministratore = $_SESSION ["admin"];
            $username = $_SESSION ["username"];
            
            if ($amministratore == 0) {   # Utente non ha diritti di admin
                deviEssereAdmin($username);
            } else { # Utente è admin --> controllo che i dati inseriti siano corretti
                
                if (isset($_POST["usernameNew"]) && $_POST["usernameNew"] && isset($_POST["psw1"]) && $_POST["psw1"] && isset($_POST["psw2"]) && $_POST["psw2"] ) {
                    
                    $usernameNew = $_POST["usernameNew"];
                    $psw1 = $_POST["psw1"];
                    $psw2 = $_POST["psw2"];
                    
                    if ($psw1 === $psw2) {
                        
                        $risultatoCreazioneUtente = creaUtente($usernameNew, $psw1);
                        $errore = $risultatoCreazioneUtente['messaggio'];
                        
                        if ($risultatoCreazioneUtente['successo']) {
                            //echo "utente creato con successo";
                            //print_r($risultatoCreazioneUtente); ?>
                          <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                            <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                              <h2 class="fontTitoloSezione fontVerde"> Utente "<?= $usernameNew?>" creato con successo</h2>
                              <hr>
                              <a href="crea_utente.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                                CREA UTENTE
                              </a>
                              <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                                GESTIONE UTENTI
                              </a>
                            </div>
                          </div>
                            <?php
                        } else {
                            if ($risultatoCreazioneUtente['codiceErrore'] == 0) {
                                //echo "utente già esistente";
                                //print_r($risultatoCreazioneUtente); ?>
                              <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                                <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                                  <h2 class="fontTitoloSezione fontRosso"> Attenzione! Utente non creato</h2>
                                  <p>Esiste già un utente con l'username da te scelto</p>
                                  <p>Prova a scegliere un altro username</p>
                                  <hr>
                                  <a href="crea_utente.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                                    CREA UTENTE
                                  </a>
                                  <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                                    GESTIONE UTENTI
                                  </a>
                                </div>
                              </div>
                                <?php
                            } else {
                                //echo "Errore creazione utente";
                                //print_r($risultatoCreazioneUtente); ?>
                              <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                                <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                                  <h2 class="fontTitoloSezione fontRosso"> Attenzione! Utente non creato</h2>
                                  <p>Ci sono stati degli errori durante la creazione</p>
                                  <p>Prova nuovamente a creare l'utente</p>
                                  <hr>
                                  <a href="crea_utente.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                                    CREA UTENTE
                                  </a>
                                  <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                                    GESTIONE UTENTI
                                  </a>
                                </div>
                              </div>
                                <?php
                            }
                        }
                        
                    } else { ?> <!-- Le Password non corrispondono -->

                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontRosso"> Attenzione! Utente non creato</h2>
                          <p>Le password non corrispondono</p>
                          <p>Prova nuovamente a creare l'utente</p>
                          <hr>
                          <a href="crea_utente.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            CREA UTENTE
                          </a>
                          <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            GESTIONE UTENTI
                          </a>
                        </div>
                      </div>
                        
                        <?php
                    }
                } else { ?> <!-- Campi non compilati correttamente -->
                  <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                      <h2 class="fontTitoloSezione fontRosso"> Attenzione! Utente non creato</h2>
                      <p>Devi compilare tutti i campi per creare un nuovo utente</p>
                      <p>Prova nuovamente a creare l'utente</p>
                      <hr>
                      <a href="crea_utente.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        CREA UTENTE
                      </a>
                      <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        GESTIONE UTENTI
                      </a>
                    </div>
                  </div>
                    <?php
                }
            }
        }
    ?>

</main>
<!-- Richiamo la funzione per generare il footer-->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
