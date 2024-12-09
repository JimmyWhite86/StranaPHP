<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "nuovoMenu00";
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
  
  <title>Strana nuovoMenu</title>

</head>
<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina); ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">crea un nuovo menu</h1>
  </div>
  <br>
  <div class="text-center">
    <h2>Passaggio 1 di 2</h2>
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
      
      <!-- Form per selezionare cuoco e numero di piatti -->
      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <div class="container-fluid my-5" id="containerForm">
              
              <form method="POST" action="nuovoMenu01.php" class="col-md-8 mx-auto" name="formNuovoMenu00" id="formNuovoMenu00"
                    ng-app="myAppNuovoMenu00" ng-controller="validateNuovoMenu00Ctrl" novalidate>
                
                <h2 class="mb-5 text-center">
                  <?=$username?>, seleziona il cuoco e il numero di piatti per ogni categoria
                </h2>
                
                <fieldset>
                  
                  <p>
                    Inserisci il cuoco
                    <span class="mandatory">*</span>
                  </p>
                  <span ng-show="formNuovoMenu00.cuocoMenu.$touched && formNuovoMenu00.cuocoMenu.$error.required"
                        class="mioErrore01" role="alert">
                    Campo obbligatorio
                  </span>
                  <br ng-show="formNuovoMenu00.cuocoMenu.$touched && formNuovoMenu00.cuocoMenu.$error.required">
                  <input type="radio" id="pino" name="cuocoMenu" value="Pino" ng-model="cuocoMenu" ng-required="true">
                  <label for="pino">Pino</label><br>
                  <input type="radio" id="tarta" name="cuocoMenu" value="Tarta" ng-model="cuocoMenu" ng-required="true">
                  <label for="tarta">Tarta</label>
                  <br><br><br>
                  
                  <label for="qtyAntipasti">Inserisci il numero di antipasti</label>
                  <span ng-show="formNuovoMenu00.qtyAntipasti.$error.min || formNuovoMenu00.qtyAntipasti.$error.max"
                        class="mioErrore01" role="alert">
                    Inserire una quantità compresa tra 0 e 4
                  </span>
                  <input type="number" name="qtyAntipasti" id="qtyAntipasti" class="form-control" min="0" max="4"
                         ng-model="qtyAntipasti"
                         ng-class="{'is-pristine': formNuovoMenu00.qtyAntipasti.$untouched,
                                    'is-invalid': formNuovoMenu00.qtyAntipasti.$touched && formNuovoMenu00.qtyAntipasti.$invalid,
                                    'is-valid': formNuovoMenu00.qtyAntipasti.$touched && formNuovoMenu00.qtyAntipasti.$valid}">
                  <br>
                  
                  <label for="qtyPrimi">Inserisci il numero di primi</label>
                  <span ng-show="formNuovoMenu00.qtyPrimi.$error.min || formNuovoMenu00.qtyPrimi.$error.max" class="mioErrore01" role="alert">
                    Inserire una quantità compresa tra 0 e 4
                  </span>
                  <input type="number" name="qtyPrimi" id="qtyPrimi" class="form-control" min="0" max="3"
                         ng-model="qtyPrimi"
                         ng-class="{'is-pristine': formNuovoMenu00.qtyPrimi.$untouched,
                                    'is-invalid': formNuovoMenu00.qtyPrimi.$touched && formNuovoMenu00.qtyPrimi.$invalid,
                                    'is-valid': formNuovoMenu00.qtyPrimi.$touched && formNuovoMenu00.qtyPrimi.$valid }">
                  <br>
                  
                  <label for="qtySecondi">Inserisci il numero di secondi</label>
                  <span ng-show="formNuovoMenu00.qtySecondi.$error.min || formNuovoMenu00.qtySecondi.$error.max" class="mioErrore01" role="alert">
                    Inserire una quantità compresa tra 0 e 4
                  </span>
                  <input type="number" name="qtySecondi" id="qtySecondi" class="form-control" min="0" max="3"
                         ng-model="qtySecondi"
                         ng-class="{'is-pristine': formNuovoMenu00.qtySecondi.$untouched,
                                    'is-invalid': formNuovoMenu00.qtySecondi.$touched && formNuovoMenu00.qtySecondi.$invalid,
                                    'is-valid': formNuovoMenu00.qtySecondi.$touched && formNuovoMenu00.qtySecondi.$valid }">
                  <br>
                  
                  <label for="qtyContorni">Inserisci il numero di contorni</label>
                  <span ng-show="formNuovoMenu00.qtyContorni.$error.min || formNuovoMenu00.qtyContorni.$error.max" class="mioErrore01" role="alert">
                    Inserire una quantità compresa tra 0 e 4
                  </span>
                  <input type="number" name="qtyContorni" id="qtyContorni" class="form-control" min="0" max="3"
                         ng-model="qtyContorni"
                         ng-class="{'is-pristine': formNuovoMenu00.qtyContorni.$untouched,
                                   'is-invalid': formNuovoMenu00.qtyContorni.$touched && formNuovoMenu00.qtyContorni.$invalid,
                                   'is-valid': formNuovoMenu00.qtyContorni.$touched && formNuovoMenu00.qtyContorni.$valid }" >
                  <br>
                  
                  <label for="qtyDolci">Inserisci il numero di dolci</label>
                  <span ng-show="formNuovoMenu00.qtyDolci.$error.min || formNuovoMenu00.qtyDolci.$error.max" class="mioErrore01" role="alert">
                    Inserire una quantità compresa tra 0 e 4
                  </span>
                  <input type="number" name="qtyDolci" id="qtyDolci" class="form-control" min="0" max="3"
                         ng-model="qtyDolci"
                         ng-class="{'is-pristine': formNuovoMenu00.qtyDolci.$untouched,
                                    'is-invalid': formNuovoMenu00.qtyDolci.$touched && formNuovoMenu00.qtyDolci.$invalid,
                                    'is-valid': formNuovoMenu00.qtyDolci.$touched && formNuovoMenu00.qtyDolci.$valid }" >
                  <br><br>
                  
                  <p>
                    Pasto Buffet / Menu fisso?
                    <span class="mandatory">*</span>
                  </p>
                  <span ng-show="formNuovoMenu00.tipoMenu.$touched && formNuovoMenu00.tipoMenu.$error.required" class="mioErrore01" role="alert">
                    Campo obbligatorio
                  </span>
                  <br>
                  <input type="radio" id="buffet" name="tipoMenu" value="buffet" ng-model="tipoMenu" ng-required="true">
                  <label for="buffet">Buffet</label><br>
                  <input type="radio" id="carta" name="tipoMenu" value="carta" ng-model="tipoMenu" ng-required="true">
                  <label for="carta">Alla carta</label><br>
                  
                  <div class="text-center">
                    <input type="submit" value="Prosegui" class="btn btn-success" ng-disabled="formNuovoMenu00.$invalid">
                  </div>
                
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    
    <?php }
  }?>

<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
  </html><?php
