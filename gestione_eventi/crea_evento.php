<?php
  session_start();
  include 'includes/init.php';
  $nomePagina = "aggiungi_evento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>AdminStrana | Aggiungi Evento</title>
</head>

<body>

<?php
  
  /* Richiamo la nav bar */
  richiamaNavBar($nomePagina);
  
  /* Richiamo la breadcrumb*/
  echo generaBreadcrumb();
  
?>


<?php
  if (!isset($_SESSION["username"])) {    # Utente non loggato
    deviLoggarti();
  }
  else {    # Utente loggato
    
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION['username'];
    
    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    }
    else {  # Utente loggato con diritti di admin ?>

      <!-- "Titolo" della pagina -->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h1 class="titoloPagina">aggiungi un evento</h1>
        </div>
      </div>

      <!-- Form della pagina -->
      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <div class="container-fluid my-5" id="containerForm">

              <form method="POST" action="controllo_crea_evento.php" enctype="multipart/form-data" class="col-md-8 mx-auto"
                    name="formNuovoEvento" id="formNuovoEvento" ng-app="myAppNuovoEvento" ng-controller="validateNuovoEventoCtrl" novalidate> <!-- Attributo enctype => Serve per caricamento dei file w3schools.com/tags/att_form_enctype.asp -->

                <h2 class="mb-5 text-center">
                  <?=$username?>, compila i dati del form sottostante per aggiungere un singolo piatto al menu
                </h2>

                <fieldset>
                  <div class="form-group">

                    <label for="eventoNew">
                      Inserisci il titolo dell'evento
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoEvento.eventoNew.$touched && formNuovoEvento.eventoNew.$error.required" class="mioErrore01"
                          role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="text" name="eventoNew" id="eventoNew" class="form-control"
                           title="Inserisci il titolo dell'evento" required aria-required="true" ng-model="eventoNew">

                    <br>

                    <label for="dataNew">
                      Inserisci la data
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoEvento.dataNew.$touched && formNuovoEvento.dataNew.$error.required" class="mioErrore01"
                          role="alert"> <!--TODO: la descrizione può non essere obbligatoria?-->
                      Campo obbligatorio
                    </span>
                    <input type="date" name="dataNew" id="dataNew" class="form-control col-md-3" required aria-required="true"
                           title="inserisci la data dell'evento" ng-model="dataNew">
                    <br>

                    <label for="descrizioneNew">
                      Inserisci la descrizione
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoEvento.descrizioneNew.$touched && formNuovoEvento.descrizioneNew.$error.required" class="mioErrore01"
                          role="alert">
                      Campo obbligatorio
                    </span>
                    <textarea name="descrizioneNew" id="descrizioneNew" class="form-control" required aria-required="true"
                              title="Inserisci la descrizione dell'evento" ng-model="descrizioneNew">
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
    
    <?php   }
  }?>


<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
