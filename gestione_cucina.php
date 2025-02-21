<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "gestione_cucina";
  
  $testoDelTitolo = "gestione cucina"
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana GestioneCucina</title>
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
              <div class="container-fluid col-md-8 bg-bianco py-4 my-4 myShadowBianca rounded-4">
                <div class="">
                  <h2 class="text-center fontTitoloSezione">Ciao <?= $userName ?>, scegli un'azione:</h2>
                  <ul class="list-unstyled ml-5 pl-5 d-flex flex-column align-items-center">
                    <li>
                      <a href="<?= BASE_URL ?>/gestione_cucina/nuovo_menu_00.php"
                            class="card-link text-center maxWidthLinkAdmin">
                        Crea un nuovo menu
                      </a>
                    </li>
                    <li>
                      <a href="<?= BASE_URL ?>/gestione_cucina/elimina_menu.php"
                         class="card-link text-center maxWidthLinkAdmin">
                        Elimina il menu presente
                      </a>
                    </li>
                    <li>
                      <a href="<?= BASE_URL ?>/gestione_cucina/crea_piatto.php"
                         class="card-link text-center maxWidthLinkAdmin">
                        Aggiungi un singolo piatto al menu
                      </a>
                    </li>
                    <li>
                      <a href="<?= BASE_URL ?>/gestione_cucina/elimina_piatto.php"
                         class="card-link text-center maxWidthLinkAdmin">
                        Elimina un singolo piatto dal menu
                      </a>
                    </li>
                    <li>
                      <a href="<?= BASE_URL ?>/gestione_cucina/modifica_piatto_00.php"
                         class="card-link text-center maxWidthLinkAdmin">
                        Modifica un singolo piatto del menu
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

</main>

      <?php
        }
     }
      ?>

<!-- Funzione per creare dinamicamente il footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>