<?php
    session_start();
    include "../includes/init.php";
    $nomePagina = "elimina_utente";
    
    $testoDelTitolo = "elimina un utente";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>StranAdmin | eliminaUtente</title>
</head>

<body>

<!-- Richiamo la nav bar-->
<?php richiamaNavBar($nomePagina);?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
    <?php titoloDellaPagina($testoDelTitolo); ?>
    
    <?php
        
        if (!isset($_SESSION["username"])) {
            deviLoggarti();
        } else {
            $amministratore = $_SESSION["admin"];
            $username = $_SESSION["username"];
            if ($amministratore == 0) {
                deviEssereAdmin($username);
            } else {
                
                if (empty($_POST["utenteSelezionato"])) { ?> <!-- L'utente non ha selezionato nulla nella pagina precedente -->
                  <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                      <h2 class="fontTitoloSezione fontRosso"> Attenzione!</h2>
                      <p>Non hai selezionato nessun utente nella pagina precedente</p>
                      <p>Prova nuovamente ad eliminare l'utente</p>
                      <hr>
                      <a href="elimina_utente.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        ELIMINA UTENTE
                      </a>
                      <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        GESTIONE UTENTI
                      </a>
                    </div>
                  </div>
                    <?php
                } else {
                    
                    $idUtente = $_POST["utenteSelezionato"];
                    $esitoEliminazione = eliminaUtente($idUtente);
                    //print_r($esitoEliminazione);
                    
                    if (!$esitoEliminazione['successo']) { ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontRosso"> Attenzione! Utente non eliminato</h2>
                          <p>Ci sono stati problemi durante l'operazione</p>
                          <p>Prova nuovamente ad eliminare l'utente</p>
                          <hr>
                          <a href="elimina_utente.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            ELIMINA UTENTE
                          </a>
                          <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            GESTIONE UTENTI
                          </a>
                        </div>
                      </div>
                        <?php
                    } else { ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontVerde"> Utente eliminato con successo</h2>
                          <p>L'utente id <?= $idUtente ?> è stato eliminato con successo</p>
                          <hr>
                          <a href="<?= BASE_URL ?>/gestione_utenti.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            GESTIONE UTENTI
                          </a>
                        </div>
                      </div>
                        <?php
                    }
                }
            }
        }
    ?>

</main>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina);?>

</body>
</html>
