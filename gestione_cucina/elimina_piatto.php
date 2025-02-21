<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "elimina_piatto";
    
    $testoDelTitolo = "elimina un singolo piatto"
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>StranAdmin | eliminaPiatto</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
    <?php titoloDellaPagina($testoDelTitolo) ?>
    
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
              <div class="my-5 justify-content-center">
                <div class="text-center">
                  <h2 class="fontTitoloSezione"><?=$username?>, scegli quale piatto vuoi eliminare.</h2>
                </div>
              </div>

              <div class="my-5 justify-content-center">
                <div class="text-center">
                  <p class="fontFirma02">Scorri a destra e sinistra per visualizzare l'intera tabella</p>
                  <i class="bi bi-arrow-left-right"></i>
                </div>
              </div>


              <!-- Tabella della pagina -->
              <form method="POST" action="controllo_elimina_piatto.php" class="">
                
                <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
                  <div class="row justify-content-center d-flex">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
                    <div class="col-xl-10 col-lg-11 col-md-12"> <!-- colonna che occupa 10 parti su 12 -->

                      
                        <?php
                            $disponibilitaPiatto = 1; /* Seleziono i piatti attivi */
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

</main>


<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>