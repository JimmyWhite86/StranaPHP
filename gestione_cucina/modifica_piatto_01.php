<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "modifica_piatto_01";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>StranAdmin | modificaPiatto</title>
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
      <h2>Passaggio 2 di 2</h2>
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
                
                
                <?php
                if (isset($_POST["piattoSelezionatoElimina"])) {
                    $idPiatto = $_POST["piattoSelezionatoElimina"];
                    $datiPiatto = ottieniDatiPiatto($idPiatto);
                    ?>

                  <!-- Form per la modifica del piatto -->
                  <div class="container-fluid bg-rosso py-4 my-4 myShadowRossa">
                    <div class="container col-md-8 bg-bianco py-4 my-4 myShadowBianca rounded-3">
                      <div class="row justify-content-center">
                        <div class="container my-5" id="containerForm">
                          <form method="POST" action="controllo_modifica_piatto.php" id="formModificaPiatto"
                                enctype="multipart/form-data" class="col-md-8 mx-auto">
                            <h3 class="mb-5 text-center"><?= $username ?>, aggiorna i campi che vuoi modificare nel form sottostante</h3>

                            <fieldset>
                              <div class="form-group">
                                <input type="hidden" name="idPiatto" value="<?= $idPiatto ?>">

                                <label for="nomePiattoNew">Modifica il nome del piatto</label>
                                <input type="text" name="nomePiattoNew" id="nomePiattoNew" class="form-control"
                                       value="<?= htmlspecialchars($datiPiatto['nomePiatto'], ENT_QUOTES, 'UTF-8') ?>">

                                <label for="descrizionePiattoNew">Modifica la descrizione del piatto</label>
                                <textarea name="descrizionePiattoNew" id="descrizionePiattoNew" class="form-control">
                          <?= htmlspecialchars($datiPiatto['descrizionePiatto'], ENT_QUOTES, 'UTF-8') ?>
                        </textarea>

                                <p>
                                  Modifica la categoria del piatto
                                </p>
                                <input type="radio" id="antipasto" name="categoriaPiattoNew" value="antipasti"
                                    <?= ($datiPiatto['categoriaPiatto'] === 'antipasti') ? 'checked' : '' ?> required>
                                <label for="antipasto">Antipasto</label><br>
                                <input type="radio" id="primi" name="categoriaPiattoNew" value="primi"
                                    <?= ($datiPiatto['categoriaPiatto'] === 'primi') ? 'checked' : '' ?> required>
                                <label for="primi">Primi</label><br>
                                <input type="radio" id="secondi" name="categoriaPiattoNew" value="secondi"
                                    <?= ($datiPiatto['categoriaPiatto'] === 'secondi') ? 'checked' : '' ?> required>
                                <label for="secondi">Secondi</label><br>
                                <input type="radio" id="contorni" name="categoriaPiattoNew" value="contorni"
                                    <?= ($datiPiatto['categoriaPiatto'] === 'contorni') ? 'checked' : '' ?> required>
                                <label for="contorni">Contorni</label><br>
                                <input type="radio" id="dolci" name="categoriaPiattoNew" value="dolci"
                                    <?= ($datiPiatto['categoriaPiatto'] === 'dolci') ? 'checked' : '' ?> required>
                                <label for="dolci">Dolci</label><br>
                                <br>

                                <label for="prezzoPiattoNew">Modifica il prezzo del piatto</label>
                                <input type="number" name="prezzoPiattoNew" id="prezzoPiattoNew" class="form-control"
                                       value="<?= htmlspecialchars($datiPiatto['prezzoPiatto'], ENT_QUOTES, 'UTF-8') ?>">

                              </div>

                              <div class="text-center mt-4">
                                <input type="submit" value="Modifica" class="btn btn-success">
                              </div>
                            </fieldset>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                    <?php
                } else { ?>
                  <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-3">
                      <h2 class="fontTitoloSezione fontRosso"> Attenzione!</h2>
                      <p>Non hai selezionato nessun piatto da modificare</p>
                      <hr>
                      <a href="modifica_piatto_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        MODIFICA PIATTO
                      </a>
                      <a href="<?= BASE_URL ?>/gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">
                        GESTIONE CUCINA
                      </a>
                    </div>
                  </div>
                    <?php
                }
                
            }
        }
    ?>

</main>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
