<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "creaUtente";
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

  <title>AdminStrana | Crea Utente</title>

</head>
<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina); ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">aggiungi un nuovo utente</h1>
  </div>
</div>


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



      <!-- Form della pagina -->
      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <div class="container-fluid my-5" id="containerForm">

              <form method="POST" action="controlloAggiuntaUtente.php" class="col-md-8 mx-auto" name="formNuovoUtente"
                    id="formNuovoUtente" ng-app="myAppNuovoUtente" ng-controller="validateNuovoUtenteCtrl" novalidate>

                <h2 class="mb-5 text-center">
                  <?=$username?>, compila i dati del form sottostante per aggiungere un nuovo utente con privilegi di admin
                </h2>

                <fieldset>
                  <div class="form-group">

                    <label for="usernameNew">
                      Inserisci l'username del nuovo utente
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoUtente.usernameNew.$touched && formNuovoUtente.usernameNew.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="text" name="usernameNew" id="usernameNew" class="form-control"
                           title="Inserisci l'username del nuovo utente" required aria-required="true"
                           ng-model="usernameNew"
                           ng-class="{'is-pristine': formNuovoUtente.usernameNew.$untouched,
                                      'is-invalid': formNuovoUtente.usernameNew.$touched && formNuovoUtente.usernameNew.$invalid,
                                      'is-valid': formNuovoUtente.usernameNew.$touched && formNuovoUtente.usernameNew.$valid }" >
                    <br>

                    <label for="psw1">
                      Inserisci una password
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoUtente.psw1.$touched && formNuovoUtente.psw1.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="password" name="psw1" id="psw1" class="form-control" title="Inserisci una password"
                           required aria-required="true" ng-model="psw1"
                           ng-class="{'is-pristine': formNuovoUtente.psw1.$untouched,
                                      'is-invalid': formNuovoUtente.psw1.$touched && (!validatePasswords() || formNuovoUtente.psw1.$invalid),
                                      'is-valid': formNuovoUtente.psw1.$touched && validatePasswords() && formNuovoUtente.psw1.$valid }" >
                    <br>

                    <label for="psw2">
                      Ripeti la password
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoUtente.psw2.$touched && formNuovoUtente.psw2.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="password" name="psw2" id="psw2" class="form-control" title="Ripeti la password"
                           required aria-required="true" ng-model="psw2"
                           ng-class="{'is-pristine': formNuovoUtente.psw2.$untouched,
                                      'is-invalid': formNuovoUtente.psw2.$touched && (!validatePasswords() || formNuovoUtente.psw2.$invalid),
                                      'is-valid': formNuovoUtente.psw2.$touched && validatePasswords() && formNuovoUtente.psw2.$valid }">
                    <span ng-show="formNuovoUtente.psw2.$touched && !validatePasswords()" class="mioErrore01" role="alert">
                      Le password non corrispondono
                    </span>

                    <br>

                    <br><br>

                  </div>

                  <div class="text-center">
                    <button type="submit" name="invio" id="invio" value="inserisci" class="btn btn-primary"
                            ng-disabled = "formNuovoUtente.$invalid">
                      Inserisci
                    </button>
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
