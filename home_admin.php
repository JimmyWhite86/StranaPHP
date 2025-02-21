<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "homeAdmin";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranAdmin | HomeAdmin</title>
</head>

<body>

<!-- Funzione per creare dinamicamente la NavBar -->
<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina p-1">home page admin</h1>
    </div>
  </div>
  
  
  <?php
    if (!isset($_SESSION["username"])) {
      deviLoggarti();
    } else {
      $amministratore = $_SESSION["admin"];
      $username = $_SESSION["username"];
      
      if ($amministratore == 0) {
        deviEssereAdmin($username);
      } else { ?>

        <section>
          <div class="container-fluid bg-rosso myShadowRossa">
            <div class="row justify-content-center">

              <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11 myShadowNera rounded-3">
                <h2 class="text-center fontTitoloSezione">Gestione Cucina</h2>
                <ul class="list-unstyled">
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_cucina/nuovo_menu_00.php" class="card-link text-center">
                      Crea un nuovo menù
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_cucina/elimina_menu.php" class="card-link text-center">
                      Elimina il menu presente
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_cucina/crea_piatto.php" class="card-link text-center">
                      Aggiungi un singolo piatto al menu
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_cucina/elimina_piatto.php" class="card-link text-center">
                      Elimina un singolo piatto dal menu
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_cucina/modifica_piatto_00.php" class="card-link text-center">
                      Modifica un singolo piatto del menu
                    </a>
                  </li>
                </ul>
              </div>

              <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11 myShadowNera rounded-3">
                <h2 class="text-center fontTitoloSezione">Gestione Eventi</h2>
                <ul class="list-unstyled">
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_eventi/crea_evento.php" class="card-link text-center">
                      Crea un nuovo evento</a></li>
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_eventi/elimina_evento.php" class="card-link text-center">
                      Elimina un evento
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_eventi/modifica_evento_00.php" class="card-link text-center">
                      Modifica un evento
                    </a>
                  </li>
                </ul>
              </div>

              <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11 myShadowNera rounded-3">
                <h2 class="text-center fontTitoloSezione">Gestione Utenti</h2>
                <ul class="list-unstyled">
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_utenti/crea_utente.php" class="card-link text-center">
                      Crea un nuovo utente con privilegi da Admin
                    </a>
                  </li>
                  <li>
                    <a href="<?= BASE_URL ?>/gestione_utenti/elimina_utente.ph" class="card-link text-center">
                      Elimina un utente
                    </a>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </section>
        
        
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