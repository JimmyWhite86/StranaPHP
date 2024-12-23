<?php
  session_start();
  $nomePagina = "eliminaPiatto";
  include "function.php";
  include "functionHTML.php";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana eliminaPiatto</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">elimina un singolo piatto</h1>
  </div>
</div>

<?php
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  }
  else {
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION["username"];
    
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    }
    else { ?>

      <!-- Sottotilo della pagina-->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h2><?=$username?>, scegli quale piatto vuoi eliminare.</h2>
        </div>
      </div>


      <form method="POST" action="controlloEliminazionePiatto.php" class="">
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
            <input type="submit" name="invio" id="invio" value="ELIMINA" class="btn btn-danger">
          </div>
        </div>
      </form>
      
      <?php
    }
  }
?>


<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>