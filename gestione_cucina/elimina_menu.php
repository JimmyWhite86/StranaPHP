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
  <title>StranaAdmin | EliminaEvento</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

<main id="mioMain">

  <!-- Titolo della pagina -->
    <?php titoloDellaPagina($testoDelTitolo) ?>
    
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

              <div class="my-5 row justify-content-center">
                <div class="text-center">

                </div>
              </div>

              <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                  <form method="POST" action="controllo_elimina_menu.php">
                    <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
                      <div class="row justify-content-center">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
                        <div class="col-10"> <!-- colonna che occupa 10 parti su 12 -->
                          <h2 class="fontTitoloSezione fontRosso">Attenzione!</h2>
                          <h3 class=""><?=$username?>, da questa pagina puoi eliminare l'intero menu ad ora presente</h3>
                          <p>Continuando questa operazione eliminerai tutto il menu</p>
                        </div> <!-- Fine della colonna-->
                      </div>  <!-- Fine della riga -->
                      <!-- Pulsante centrato -->
                      <div class="text-center mt-4">
                        <input type="submit" name="invio" id="invio" value="ELIMINA" class="btn btn-danger">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
                <?php
            }
        }
    ?>

</main>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>


</body>
</html>