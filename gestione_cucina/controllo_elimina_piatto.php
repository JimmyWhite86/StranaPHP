<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "elimina_piatto";
    
    $testoDelTitolo = "elimina un singolo piatto"
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>Strana eliminaPiatto</title>
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
            
            $amministratore = $_SESSION["admin"];
            $username = $_SESSION["username"];
            $idUser = $_SESSION["idUser"];
            
            if ($amministratore == 0) {
                deviEssereAdmin($username);
            } else {
                
                if (!isset($_POST["piattoSelezionatoElimina"])) { ?>
                  <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                      <h2 class="fontTitoloSezione fontRosso"> Attenzione! Piatto non eliminato</h2>
                      <p>Non hai selezionato nessun piatto da eliminare</p>
                      <hr>
                      <a href="elimina_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        ELIMINA PIATTO
                      </a>
                      <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        GESTIONE CUCINA
                      </a>
                    </div>
                  </div>
                    <?php
                } else {
                  
                    $idPiatto = $_POST["piattoSelezionatoElimina"];
                    $esitoEliminazione = eliminaPiatto($idPiatto);
                    
                    if (!$esitoEliminazione['successo']) { ?> <!-- ERRORI DURANTE ELIMINAZIONE-->
                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontRosso"> Attenzione! Piatto non eliminato</h2>
                          <p>Ci sono stati problemi durante l'operazione</p>
                          <p>Prova nuovamente ad eliminare il piatto</p>
                          <hr>
                          <a href="elimina_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            ELIMINA PIATTO
                          </a>
                          <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            GESTIONE CUCINA
                          </a>
                        </div>
                      </div>
                        <?php
                    }
                    else {
                        ?>
                      <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                          <h2 class="fontTitoloSezione fontVerde">Piatto eliminato con successo</h2>
                          <hr>
                          <a href="elimina_piatto.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            ELIMINA PIATTO
                          </a>
                          <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                            GESTIONE CUCINA
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
