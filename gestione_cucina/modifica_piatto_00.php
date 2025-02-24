<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modifica_piatto_00";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranaAdmin | modificaPiatto</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina); ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 justify-content-center">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina px-2">modifica un piatto del menu</h1>
    </div>
    <br>
    <div class="text-center">
      <h2>Passaggio 1 di 2</h2>
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

        <!-- Sottotilo della pagina-->
        <div class="my-5 row justify-content-center">
          <div class="text-center">
            <h3><?=$username?>, scegli quale piatto vuoi modificare</h3>
          </div>
        </div>

        <div class="my-5 justify-content-center">
          <div class="text-center">
            <p class="fontFirma02">Scorri a destra e sinistra per visualizzare l'intera tabella</p>
            <i class="bi bi-arrow-left-right"></i>
          </div>
        </div>

        <form method="POST" action="modifica_piatto_01.php" class="">
          <div class="containerTabella my-5m">
            <div class="row justify-content-center d-flex">
              <div class="col-xl-10 col-lg-11 col-md-12">
                <?php
                  $disponibilitaPiatto = 1;
                  generaTabellaPiatti($disponibilitaPiatto);
                ?>
              </div>
            </div>
            <div class="text-center mt-4">
              <input type="submit" name="invio" id="invio" value="MODIFICA" class="btn btn-danger">
            </div>
          </div>
        </form>
        
        <?php
      }
    }
  ?>
  <br>

</main>

<!-- Richiamo la funzione che genera dinamicamente il footer-->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>

