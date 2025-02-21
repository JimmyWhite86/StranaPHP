<!-- QUESTA PAGINA DEVE ESSERE ANCORA IMPLEMENTATA -->

<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "modificaEvento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranAdmin | modificaEvento</title>
</head>

<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 justify-content-center">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina px-1">modifica un evento</h1>
    </div>
    <br>
    <div class="text-center">
      <h2>Passaggio 2 di 2</h2>
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
          $datiEventoSelezionato = ottieniDatiEvento($idEvento);
          //print_r($datiEventoSelezionato);
          
          // Cambio formato alla data
          //$dataFormatoNew = date("d-m-Y", strtotime($datiEventoSelezionato["DataEvento"]));
          //$datiEventoSelezionato["DataEvento"] = $dataFormatoNew;
          ?>

          <!-- Form per la modifica dell'evento -->
          <div class="container-fluid d-flex justify-content-center bg-rosso bg-rosso py-4 my-4 myShadowRossa">
            <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 m-3 p-3 myShadowNera rounded-3">
              <!--<div class="row justify-content-center">-->
                <div class="container my-5" id="containerForm">
                  <form method="POST" action="controllo_modifica_evento.php" id="formModificaEvento"
                        enctype="multipart/form-data" class="col-md-8 mx-auto">
                    <h2 class="mb-5 fontTitoloSezione text-center"><?= $username ?>, aggiorna i campi che vuoi modificare nel form sottostante</h2>

                    <fieldset>
                      <div class="form-group">
                        <input type="hidden" name="idEvento" value="<?= $idEvento ?>">

                        <label for="eventoNew">Modifica il titolo dell'evento</label>
                        <input type="text" name="eventoNew" id="eventoNew" class="form-control"
                               value="<?= htmlspecialchars($datiEventoSelezionato['NomeEvento'], ENT_QUOTES, 'UTF-8') ?>">

                        <label for="dataNew">Modifica la data</label>
                        <input type="date" name="dataNew" id="dataNew" class="form-control"
                               value="<?= htmlspecialchars($datiEventoSelezionato['DataEvento'], ENT_QUOTES, 'UTF-8')?>">

                        <label for="descrizioneNew">Modifica la descrizione</label>
                        <textarea name="descrizioneNew" id="descrizioneNew" class="form-control">
                        <?= htmlspecialchars($datiEventoSelezionato['Descrizione'], ENT_QUOTES, 'UTF-8') ?>
                      </textarea>

                        <label for="immagine">Cambia l'immagine dell'evento</label>
                        <input type="file" name="immagine" id="immagine" class="form-control">

                        <!-- Visualizza la miniatura dell'immagine corrente -->
                        <?php if (!empty($datiEventoSelezionato['Immagine'])): ?>
                          <div class="mt-3">
                            <p>Immagine corrente:</p>
                            <img src="<?= BASE_URL . $datiEventoSelezionato['Immagine'] ?>" alt="Immagine corrente" class="img-thumbnail" style="max-width: 200px;">
                          </div>
                        <?php endif; ?>
                      </div>

                      <div class="text-center mt-4">
                        <input type="submit" value="Modifica" class="btn btn-success">
                      </div>
                    </fieldset>
                  </form>
                </div>
              <!--</div>-->
            </div>
          </div>
          
          <?php
        } else { ?>
          <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
              <h2>Ci sono stati dei problemi</h2>
              <p><strong><a href="modifica_evento_00.php">Riprova</a></strong></p>
              <hr>
              <a href="../home_admin.php" class="btn btn-primary mb-3">Home Admin</a><br>
              <a href="gestione_eventi.php" class="btn btn-primary mb-3">Gestione Eventi</a><br>
            </div>
          </div>
        
        <?php }
      }
    }
  
  ?>

</main>
<!--Richiamo il footer-->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
