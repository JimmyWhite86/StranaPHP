<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "eliminaMenu";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranaAdmin EliminaEvento</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

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

      <!-- "Titolo" della pagina -->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h1 class="titoloPagina">elimina intero menu</h1>
        </div>
      </div>

      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h2><?=$username?>, da questa pagina puoi eliminare l'intero menu ad ora presente</h2>
        </div>
      </div>

      <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
          <form method="POST" action="controllo_elimina_menu.php">
            <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
              <div class="row justify-content-center">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
                <div class="col-10"> <!-- colonna che occupa 10 parti su 12 -->
                  <h3>Attenzione</h3>
                  <p>Continuando questa operazione eliminerai tutto il menu</p>
                </div> <!-- Fine della colonna-->
              </div>  <!-- Fine della riga -->
              <!-- Pulsante centrato -->
              <div class="text-center mt-4">
                <input type="submit" name="invio" id="invio" value="ELIMINA" class="btn btn-danger">
              </div>
            </div>
          </form>
        </div></div>
      <?php
    }
  }
?>


<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>


</body>
</html>