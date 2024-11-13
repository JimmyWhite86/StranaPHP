<?php
  session_start();
  $nomePagina = "modificaEvento";
  include "function.php";
  include "functionHTML.php";
?>

<!DOCTYPE html>
<html lang="it">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="keyword" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">

  <!-- CDN CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- JavaScript di Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">
  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>

  <!--  Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Strana modificaEvento</title>

</head>
<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina);?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">modifica un evento</h1>
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
    } else {
      
      
      $idEvento = $_POST["eventoSelezionato"];
      $datiEventoSelezionato = eventoDaModificareSelezionato($idEvento);
      
      ?>


      <!-- Form della pagina -->
      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <div class="container-fluid my-5" id="containerForm">
              <form method="POST" action="controlloModificaEvento.php" enctype="multipart/form-data" class="col-md-8 mx-auto"> <!-- Attributo enctype => Serve per caricamento dei file w3schools.com/tags/att_form_enctype.asp -->
                <h2 class="mb-5 text-center">
                  <?=$username?>, aggiorna i campi che vuoi modificare nel form sottostante
                </h2>

                <fieldset>
                  <div class="form-group">
                    
                    <input type="hidden" name="idEvento" value="<?= htmlspecialchars($idEvento) ?>">
                    
                    <label for="eventoNew">
                      Inserisci il titolo dell'evento
                      <span class="mandatory">*</span>
                    </label>
                    <input type="text" name="eventoNew" id="eventoNew" class="form-control"
                           title="Inserisci il titolo dell'evento" required aria-required="true"
                           placeholder="<?= htmlspecialchars($datiEventoSelezionato['nomeEvento'])?>">
                    <br>

                    <label for="dataNew">
                      Inserisci la data
                      <span class="mandatory">*</span>
                    </label>
                    <input type="date" name="dataNew" id="dataNew" class="form-control col-md-3"
                           required aria-required="true" title="inserisci la data dell'evento"
                          placeholder="<?= htmlspecialchars($datiEventoSelezionato['DataEvento']) ?>">
                    <br>

                    <label for="descrizioneNew">
                      Inserisci la descrizione
                      <span class="mandatory">*</span>
                    </label>
                    <textarea name="descrizioneNew" id="descrizioneNew" class="form-control" required aria-required="true"
                              title="Inserisci la descrizione dell'evento"
                              placeholder="<?= htmlspecialchars($datiEventoSelezionato['Descrizione']) ?>">
                    </textarea>
                    <br>

                    <label for="immagine">Aggiungi l'immagine dell'evento</label>
                    <input type="file" name="immagine" id="immagine" class="form-control">

                    <br><br>

                  </div>

                  <div class="text-center">
                    <input type="submit" value="Inserisci" class="btn btn-success">
                  </div>

                </fieldset>
              </form>
            </div>

          </div>
        </div>
      </div>
      
      <?php
    }
  }
  
  HTMLfooter($nomePagina);
?>



</body>
</html>

