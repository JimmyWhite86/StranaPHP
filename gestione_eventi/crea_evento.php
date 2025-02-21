<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "crea_evento";
    $paginaPadre = "crea_evento";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>AdminStrana | Crea Evento</title>
</head>

<body>

<?php
    /* Richiamo la nav bar */
    richiamaNavBar($nomePagina);
    
    /* Richiamo la breadcrumb*/
    //echo generaBreadcrumb();
?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina">crea un evento</h1>
    </div>
  </div>
    
    <?php
        if (!isset($_SESSION["username"])) {    # Utente non loggato
            deviLoggarti();
        } else {    # Utente loggato
            
            $amministratore = $_SESSION["admin"];
            $username = $_SESSION['username'];
            
            if ($amministratore == 0) {   # Utente non ha diritti di admin
                deviEssereAdmin($username);
            } else {  # Utente loggato con diritti di admin ?>
              
              <!-- Form della pagina -->
              <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4 myShadowRossa">
                <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4 rounded-4 myShadowBianca">
                  <div class="row justify-content-center">
                    <div class="container-fluid my-5" id="containerForm">

                      <form method="POST" action="controllo_crea_evento.php" enctype="multipart/form-data"
                            class="col-md-8 mx-auto" name="formNuovoEvento" id="formNuovoEvento" ng-app="myAppNuovoEvento"
                            ng-controller="validateNuovoEventoCtrl" novalidate> <!-- Attributo enctype => Serve per caricamento dei file w3schools.com/tags/att_form_enctype.asp -->

                        <h2 class="mb-5 text-center fontTitoloSezione">
                            <?=$username?>, compila i dati del form sottostante per creare un nuovo evento
                        </h2>

                        <fieldset>
                          <div class="form-group">

                            <label for="eventoNew">
                              Inserisci il titolo dell'evento
                              <span class="mandatory">*</span>
                            </label>
                            <span ng-show="formNuovoEvento.eventoNew.$touched && formNuovoEvento.eventoNew.$error.required"
                                  class="mioErrore01" role="alert">
                              Campo obbligatorio
                            </span>
                            <input type="text" name="eventoNew" id="eventoNew" class="form-control"
                                   title="Inserisci il titolo dell'evento" required aria-required="true" ng-model="eventoNew"
                                   ng-class = "{ 'is-pristine': formNuovoEvento.eventoNew.$untouched,
                                           'is-invalid': formNuovoEvento.eventoNew.$touched && formNuovoEvento.eventoNew.$invalid,
                                           'is-valid': formNuovoEvento.eventoNew.$touched && formNuovoEvento.eventoNew.$valid }">
                            <br>

                            <label for="dataNew">
                              Inserisci la data
                              <span class="mandatory">*</span>
                            </label>
                            <span ng-show="formNuovoEvento.dataNew.$touched && formNuovoEvento.dataNew.$error.required"
                                  class="mioErrore01" role="alert">
                              Campo obbligatorio
                            </span>
                            <input type="date" name="dataNew" id="dataNew" class="form-control col-md-3" required aria-required="true"
                                   title="inserisci la data dell'evento" ng-model="dataNew"
                                   ng-class = "{ 'is-pristine': formNuovoEvento.dataNew.$untouched,
                                           'is-invalid': formNuovoEvento.dataNew.$touched && formNuovoEvento.dataNew.$invalid,
                                           'is-valid': formNuovoEvento.dataNew.$touched && formNuovoEvento.dataNew.$valid }">
                            <br>
                            
                            <label for="orarioNew">
                              Inserisci l'orario
                              <span class="mandatory">*</span>
                            </label>
                            <span ng-show="formNuovoEvento.orarioNew.$touched && formNuovoEvento.orarioNew.$error.required"
                                  class="mioErrore01" role="alert">
                              Campo obbligatorio
                            </span>
                            <input type="time" name="orarioNew" id="orarioNew" class="form-control col-md-3" required aria-required="true"
                                   title="Inserisci l'orario dell'evento" ng-model="orarioNew"
                                   ng-class = "{ 'is-pristine': formNuovoEvento.orarioNew.$untouched,
                                           'is-invalid': formNuovoEvento.orarioNew.$touched && formNuovoEvento.orarioNew.$invalid,
                                           'is-valid': formNuovoEvento.orarioNew.$touched && formNuovoEvento.orarioNew.$valid }">
                            <br>
                            
                            <label for="descrizioneNew">
                              Inserisci la descrizione
                              <span class="mandatory">*</span>
                            </label>
                            <span ng-show="formNuovoEvento.descrizioneNew.$touched && formNuovoEvento.descrizioneNew.$error.required"
                                  class="mioErrore01" role="alert">
                              Campo obbligatorio
                            </span>
                            <textarea name="descrizioneNew" id="descrizioneNew" class="form-control" required aria-required="true"
                                      title="Inserisci la descrizione dell'evento" ng-model="descrizioneNew"
                                      ng-class = "{ 'is-pristine': formNuovoEvento.descrizioneNew.$untouched,
                                             'is-invalid': formNuovoEvento.descrizioneNew.$touched && formNuovoEvento.descrizioneNew.$invalid,
                                             'is-valid': formNuovoEvento.descrizioneNew.$touched && formNuovoEvento.descrizioneNew.$valid }">
                            </textarea>
                            <br>

                            <label for="immagine">Aggiungi l'immagine dell'evento</label>
                            <input type="file" name="immagine" id="immagine" class="form-control"
                                   ng-class = "{ 'is-pristine': formNuovoEvento.immagine.$untouched,
                                           'is-invalid': formNuovoEvento.immagine.$touched && formNuovoEvento.immagine.$invalid,
                                           'is-valid': formNuovoEvento.immagine.$touched && formNuovoEvento.immagine.$valid }">
                            <br><br>

                          </div>

                          <div class="text-center">
                            <input type="submit" value="INSERISCI" class="btn btn-success"
                                   ng-disabled="formNuovoEvento.eventoNew.$invalid || formNuovoEvento.dataNew.$invalid || formNuovoEvento.orarioNew.$invalid || formNuovoEvento.descrizioneNew.$invalid">
                          </div>

                        </fieldset>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
                
                <?php
            }
        }?>

</main>

<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
