<?php
  session_start();
  $nomePagina = "modificaEvento";
  include "function.php";
  include "functionHTML.php";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana modificaEvento</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<!-- Titolo della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">Modifica un Evento</h1>
  </div>
</div>

<?php
  // Verifica se l'utente è loggato
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  } else {
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION["username"];
    
    // Controllo per admin
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    } else {
      // Ottieni ID dell'evento selezionato
      if (isset($_POST["eventoSelezionato"])) {
        $idEvento = $_POST["eventoSelezionato"];
        $datiEventoSelezionato = eventoDaModificareSelezionato($idEvento);
        
        // Cambio formato alla data
        $dataFormatoNew = date("d-m-Y", strtotime($datiEventoSelezionato["DataEvento"]));
        $datiEventoSelezionato["DataEvento"] = $dataFormatoNew;
        ?>

        <!-- Form per la modifica dell'evento -->
        <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
          <div class="container col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
            <div class="row justify-content-center">
              <div class="container my-5" id="containerForm">
                <form method="POST" action="controlloModificaEvento.php" enctype="multipart/form-data" class="col-md-8 mx-auto">
                  <h2 class="mb-5 text-center"><?= $username ?>, aggiorna i campi che vuoi modificare nel form sottostante</h2>

                  <fieldset>
                    <div class="form-group">
                      <input type="hidden" name="idEvento" value="<?= $idEvento ?>">

                      <label for="eventoNew">Inserisci il titolo dell'evento <span class="mandatory">*</span></label>
                      <input type="text" name="eventoNew" id="eventoNew" class="form-control" placeholder="<?= $datiEventoSelezionato['NomeEvento'] ?>">

                      <label for="dataNew">Inserisci la data <span class="mandatory">*</span></label>
                      <input type="date" name="dataNew" id="dataNew" class="form-control" placeholder="<?= $datiEventoSelezionato['DataEvento'] ?>">

                      <label for="descrizioneNew">Inserisci la descrizione <span class="mandatory">*</span></label>
                      <textarea name="descrizioneNew" id="descrizioneNew" class="form-control" placeholder="<?= $datiEventoSelezionato['Descrizione'] ?>"></textarea>

                      <label for="immagine">Aggiungi l'immagine dell'evento</label>
                      <input type="file" name="immagine" id="immagine" class="form-control">
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
      } else {
        echo "<p>Nessun evento selezionato per la modifica.</p>";
      }
    }
  }
  
  // Richiamo il footer
  HTMLfooter($nomePagina);
?>

</body>
</html>
