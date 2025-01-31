<?php
  session_start();
  include "includes/init.php";
  $nomePagina = "login";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | LogIn</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina) ?>

<main id="mioMain">

  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">log in</h1>
    </div>
  </div>
  
  <?php
    if (!isset ($_SESSION["username"])) { #Verifico che l'utente non abbia ancora effettuato il login; ?>

      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <h2 class="text-center">Sei unə admin della pagina?</h2>
            <h3 class="text-center">Inserisci le tue credenziali</h3>
            <div>

              <form method="POST" action="controlla_login.php" class="col-md-8 mx-auto" name="formLogin" id="formLogin"
                    ng-app="myAppLogin" ng-controller="validateLoginCtrl" novalidate>
                <fieldset>

                  <div class="form-group">
                    <label for="username" id="usarnameLabel">
                      Inserisci il tuo username
                      <span class="mandatory" aria-hidden="true">*</span>
                    </label>
                    <span ng-show="formLogin.username.$touched && formLogin.username.$error.required" class="mioErrore01"
                          role="alert">
                     Campo obbligatorio
                    </span>
                    <input type="text" name="username" id="username" class="form-control"
                           title="Inserisci il tuo username" required aria-required="true" ng-model="username"
                           autocomplete="username" aria-labelledby="usarnameLabel">
                  </div>

                  <br>

                  <div class="form-group">
                    <label for="psw1" id="pswLabel">
                      Inserisci la tua password
                      <span class="mandatory" aria-hidden="true">*</span>
                    </label>
                    <span ng-show="formLogin.psw1.$touched && formLogin.psw1.$error.required" class="mioErrore01"
                          role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="password" name="psw1" id="psw1" class="form-control"
                           title="Inserisci la password" required aria-required="true" ng-model="psw1"
                           autocomplete="current-password" aria-labelledby="pswLabel">
                  </div>

                  <br>

                  <div class="text-center">
                    <button type="submit" name="invio" id="invio" value="Accedi" class="btn btn-primary"
                            ng-disabled="formLogin.username.$invalid || formLogin.psw1.$invalid">
                      Accedi
                    </button>
                  </div>

                </fieldset>
              </form>

            </div>
          </div>
        </div>
      </div>
      
      <?php
    } else { #Se l'utente è già loggato, mostro un messaggio che lo avverte
      $username = $_SESSION['username'];
      ?>
      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <h1 class="text-center"><?=$username?>, hai già effettuato il login</h1>
          </div>
        </div>
      </div>
      <?php
    }
  ?>

</main>

<!-- Footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>



