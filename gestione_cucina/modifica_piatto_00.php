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
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">modifica un piatto esistente</h1>
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

        <form method="POST" action="modifica_piatto_01.php" class="">
          <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
            <div class="row justify-content-center">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
              <div class="col-10"> <!-- colonna che occupa 10 parti su 12 -->
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

</main>

<!-- Richiamo la funzione che genera dinamicamente il footer-->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>

