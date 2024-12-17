<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "aggiungiEvento";
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">

  <!-- CDN POPPER JS BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
          integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
          integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
  </script>

  <!-- CDN CSS e JS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">

  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>

  <!-- Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>

  <title>AdminStrana | Aggiungi Evento</title>

</head>
<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina); ?>


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

              <form method="POST" action="controlloaggiuntaevento.php" enctype="multipart/form-data" class="col-md-8 mx-auto"
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
                          role="alert">
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
