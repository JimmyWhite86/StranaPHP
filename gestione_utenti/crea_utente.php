<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "crea_utente";
  
  $testoDelTitolo = "crea un nuovo utente"
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>AdminStrana | Crea Utente</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina); ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <?php titoloDellaPagina($testoDelTitolo) ?>
  
  
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
        <div class="container-fluid bg-rosso py-4 my-4 myShadowRossa">
          <div class="container-fluid col-md-8 bg-bianco py-4 my-4 myShadowBianca rounded-3">
            <div class="row justify-content-center"> 
              <div class="container-fluid my-5" id="containerForm">

                <form method="POST" action="controllo_crea_utente.php" class="col-md-8 mx-auto" name="formNuovoUtente"
                      id="formNuovoUtente" ng-app="myAppNuovoUtente" ng-controller="validateNuovoUtenteCtrl" novalidate>

                  <h2 class="mb-5 text-center">
                    <?=$username?>, compila i dati del form sottostante per creare un nuovo utente con privilegi di admin
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

</main>

<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
