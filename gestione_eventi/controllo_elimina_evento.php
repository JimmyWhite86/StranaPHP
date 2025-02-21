<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "elimina_evento";
    
    $testoDelTitolo = "elimina un evento"
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>StranaAdmin | Elimina Evento</title>
</head>

<body>

<!-- Richiamo la nav bar-->
<?php richiamaNavBar($nomePagina);?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
    <?php titoloDellaPagina($testoDelTitolo) ?>
    
    <?php
        
        if (!isset($_SESSION["username"])) {
            deviLoggarti();
        } else {
            $username = $_SESSION["username"];
            $amministratore = $_SESSION["admin"];
            
            if ($amministratore == 0) {
                deviEssereAdmin($username);
            } else {
                
                if (!isset($_POST["eventoSelezionato"])) {
                    ?>
                  <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                      <h2 class="fontTitoloSezione fontRosso"> Attenzione! </h2>
                      <p>Non hai selezionato nessun evento da eliminare</p>
                      <hr>
                      <a href="elimina_evento.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        ELIMINA EVENTO
                      </a>
                      <a href="<?= BASE_URL ?>/gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        GESTIONE EVENTI
                      </a>
                    </div>
                  </div>
                    <?php
                } else {
                    $idEvento = $_POST["eventoSelezionato"];
                    $esitoEliminazione = eliminaEvento($idEvento);
                    
                    if (!$esitoEliminazione['successo']) { ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontRosso"> Evento non eliminato </h2>
                          <p>L'evento selezionato non è stato eliminato</p>
                          <!--<p>Hai cercato di eliminare l'evento <?php /*=$esitoEliminazione['nomeEvento']*/?></p>-->
                          <hr>
                          <a href="elimina_evento.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            ELIMINA EVENTO
                          </a>
                          <a href="<?= BASE_URL ?>/gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            GESTIONE EVENTI
                          </a>
                        </div>
                      </div>
                        <?php
                        
                    } else { ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontVerde"> Evento eliminato con successo </h2>
                          <p>Hai eliminato: <strong><?= $esitoEliminazione['nomeEvento']?></strong></p>
                          <hr>
                          <a href="<?= BASE_URL ?>/home_admin.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            HOME ADMIN
                          </a>
                          <a href="<?= BASE_URL ?>/gestione_eventi.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            GESTIONE EVENTI
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
