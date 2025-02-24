<?php
    session_start();
    include 'includes/init.php';
    $nomePagina = "gestione_utenti";
    
    $testoDelTitolo = "gestione utenti"
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>Strana GestioneUtenti</title>
</head>

<body>

<!-- Funzione per creare dinamicamente la NavBar -->
<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <?php titoloDellaPagina($testoDelTitolo) ?>
    
    <?php
        if (!isset($_SESSION["username"])) {
            deviLoggarti();
        } else {
            $amministratore = $_SESSION["admin"];
            $userName = $_SESSION["username"];
            
            if ($amministratore == 0) {
                deviEssereAdmin($userName);
            } else { ?>

              <div class="container-fluid bg-rosso py-4 my-4 myShadowRossa justify-content-center">
                <div class="container-fluid col-md-8 bg-bianco py-4 my-4 myShadowNera rounded-3 justify-content-center">
                  <div class="">
                    <h2 class="text-center fontTitoloSezione">Ciao <?= $userName ?>, scegli un azione:</h2>
                    <ul class="list-unstyled ml-5 pl-5 d-flex flex-column align-items-center">
                      <li>
                        <a href="<?= BASE_URL ?>/gestione_utenti/crea_utente.php" class="card-link text-center maxWidthLinkAdmin">
                          Crea un nuovo utente con privilegi da Admin
                        </a>
                      </li>
                      <li>
                        <a href="<?= BASE_URL ?>/gestione_utenti/elimina_utente.php" class="card-link text-center maxWidthLinkAdmin">
                          Elimina un utente
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
                
                <?php
            }
        }
    ?>
  
  <br>
</main>

<!-- Funzione per creare dinamicamente il footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>