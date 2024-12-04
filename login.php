<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "login";
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

  <title>Stranamore | LogIn</title>

</head>
<body>

  <!-- NAV BAR -->
  <?php richiamaNavBar($nomePagina) ?>

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
                  <label for="username">
                    Inserisci il tuo username
                    <span class="mandatory">*</span>
                  </label>
                  <span ng-show="formLogin.username.$touched && formLogin.username.$error.required" class="mioErrore01"
                        role="alert">
                    Campo obbligatorio
                  </span>
                  <input type="text" name="username" id="username" class="form-control"
                         title="Inserisci il tuo username" required aria-required="true" ng-model="username"
                         autocomplete="username">
                  </div>
                
                <br>
      
                <div class="form-group">
                  <label for="psw1">
                    Inserisci la tua password
                    <span class="mandatory">*</span>
                  </label>
                  <span ng-show="formLogin.psw1.$touched && formLogin.psw1.$error.required" class="mioErrore01"
                        role="alert">
                    Campo obbligatorio
                  </span>
                  <input type="password" name="psw1" id="psw1" class="form-control"
                         title="Inserisci la password" required aria-required="true" ng-model="psw1"
                         autocomplete="current-password">
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
  }
  else { #Se l'utente è già loggato, mostro un messaggio che lo avverte
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

<!-- Footer -->
<?php HTMLfooter($nomePagina) ?>

</body>
</html>



