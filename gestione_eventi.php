<?php
    session_start();
    include 'includes/init.php';
    $nomePagina = "gestione_eventi";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>Strana GestioneEventi</title>
</head>

<body>

<!-- Funzione per creare dinamicamente la NavBar -->
<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina">gestione eventi</h1>
    </div>
  </div>
    
    <?php
        if (!isset($_SESSION["username"])) {
            deviLoggarti();
        } else {
            $amministratore = $_SESSION["admin"];
            $userName = $_SESSION["username"];
            
            if ($amministratore == 0) {
                deviEssereAdmin($userName);
            } else {
                ?>

              <div class="container-fluid bg-rosso py-4 my-4 myShadowRossa justify-content-center">
                <div class="container-fluid col-md-8 bg-bianco py-4 my-4 myShadowNera rounded-3 justify-content-center">
                  <div class="">
                    <h2 class="text-center fontTitoloSezione">Ciao <?= $userName ?>, scegli un'azione:</h2>
                    <ul class="list-unstyled ml-5 pl-5 d-flex flex-column align-items-center">
                      <li>
                        <a href="<?= BASE_URL ?>/gestione_eventi/crea_evento.php" class="card-link text-center maxWidthLinkAdmin">
                          Aggiungi un nuovo evento
                        </a>
                      </li>
                      <li>
                        <a href="<?= BASE_URL ?>/gestione_eventi/elimina_evento.php" class="card-link text-center maxWidthLinkAdmin">
                          Elimina un evento
                        </a>
                      </li>
                      <li>
                        <a href="<?= BASE_URL ?>/gestione_eventi/modifica_evento_00.php" class="card-link text-center maxWidthLinkAdmin">
                          Modifica un evento
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

<!-- Funzione per richiamare dinamicamente il footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>