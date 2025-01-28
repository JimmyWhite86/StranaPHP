<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modifica_piatto_01";
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

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">modifica un piatto esistente</h1>
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
      
      <!-- Sottotilo della pagina-->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h2><?=$username?>, apporta le modifiche necessarie</h2>
        </div>
      </div>
      
      <?php
      if (isset($_POST["piattoSelezionatoElimina"])) {
        $idPiatto = $_POST["piattoSelezionatoElimina"];
        $datiPiatto = ottieniDatiPiatto($idPiatto);
        ?>
        
        <!-- Form per la modifica del piatto -->
        <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="container col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
            <div class="row justify-content-center">
              <div class="container my-5" id="containerForm">
                <form method="POST" action="controllo_modifica_piatto.php" id="formModificaPiatto"
                      enctype="multipart/form-data" class="col-md-8 mx-auto">
                  <h2 class="mb-5 text-center"><?= $username ?>, aggiorna i campi che vuoi modificare nel form sottostante</h2>
                  
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
      }
      
      
      ?>
      
      <?php
    }
  }
?>

<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
