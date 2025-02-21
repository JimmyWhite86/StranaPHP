<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "elimina_menu";
    
    $testoDelTitolo = "elimina intero menu"
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>Strana eliminaEvento</title>
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
                $esitoEliminazione = eliminaInteroMenu();
                if (!$esitoEliminazione['successo']) { ?> <!-- Errore di inserimenti-->
                  <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                      <h2 class="fontTitoloSezione fontRosso">Eliminazione non avvenuta</h2>
                      <p>Ci sono stati problemi durante l'operazione</p>
                      <p>Prova nuovamente ad eliminare il menu</p>
                      <hr>
                      <a href="elimina_menu.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">ELIMINA IL MENU</a><br>
                      <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
                    </div>
                  </div>
                    <?php
                }
                else { ?> <!-- Eliminazione avvenuta con successo -->
                  <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                      <h2 class="fontTitoloSezione fontVerde">Menu eliminato con successo</h2>
                      <p>L'intero menu è stato eliminato con successo</p>
                      <hr>
                      <a href="nuovo_menu_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN MENU</a><br>
                      <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
                    </div>
                  </div>
                    <?php
                }
            }
        }
    ?>

</main>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina);?>

</body>
</html>
