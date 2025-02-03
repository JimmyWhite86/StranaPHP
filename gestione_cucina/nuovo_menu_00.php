<?php
  session_start();
  include '../includes/init.php';
  $nomePagina = "nuovo_menu_00";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>StranAdmin | creaMenu</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina); ?>

<main id="mioMain">

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

                <form method="POST" action="nuovo_menu_01.php" class="col-md-8 mx-auto" name="formNuovoMenu00"
                      id="formNuovoMenu00" ng-app="myAppNuovoMenu00" ng-controller="validateNuovoMenu00Ctrl" novalidate>
                  <h3 class="mb-5 text-center">
                    <?=$username?>, seleziona il cuoco e il numero di piatti per ogni categoria
                  </h3>

                  <fieldset>
                    <legend>Seleziona il cuoco</legend>
                    <!--<label for="cuocoMenu">
                      Inserisci il cuoco
                      <span class="mandatory">*</span>
                    </label>-->
                    <span ng-show="formNuovoMenu00.cuocoMenu.$touched && formNuovoMenu00.cuocoMenu.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <br>
                    <br ng-show="formNuovoMenu00.cuocoMenu.$touched && formNuovoMenu00.cuocoMenu.$error.required">
                    <input type="radio" id="pino" name="cuocoMenu" value="Pino" ng-model="cuocoMenu" ng-required="true">
                    <label for="pino">Pino</label><br>
                    <input type="radio" id="tarta" name="cuocoMenu" value="Tarta" ng-model="cuocoMenu" ng-required="true">
                    <label for="tarta">Tarta</label>
                    <br><br><br>
                  </fieldset>

                  <fieldset>
                    <legend>Inserisci il numero di piatti per ogni categoria</legend>
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
                    <span ng-show="formNuovoMenu00.qtyPrimi.$error.min || formNuovoMenu00.qtyPrimi.$error.max"
                          class="mioErrore01" role="alert">
                      Inserire una quantità compresa tra 0 e 4
                    </span>
                    <input type="number" name="qtyPrimi" id="qtyPrimi" class="form-control" min="0" max="3"
                           ng-model="qtyPrimi"
                           ng-class="{'is-pristine': formNuovoMenu00.qtyPrimi.$untouched,
                                      'is-invalid': formNuovoMenu00.qtyPrimi.$touched && formNuovoMenu00.qtyPrimi.$invalid,
                                      'is-valid': formNuovoMenu00.qtyPrimi.$touched && formNuovoMenu00.qtyPrimi.$valid }">
                    <br>



                    <label for="qtySecondi">Inserisci il numero di secondi</label>
                    <span ng-show="formNuovoMenu00.qtySecondi.$error.min || formNuovoMenu00.qtySecondi.$error.max"
                          class="mioErrore01" role="alert">
                      Inserire una quantità compresa tra 0 e 4
                    </span>
                    <input type="number" name="qtySecondi" id="qtySecondi" class="form-control" min="0" max="3"
                           ng-model="qtySecondi"
                           ng-class="{'is-pristine': formNuovoMenu00.qtySecondi.$untouched,
                                      'is-invalid': formNuovoMenu00.qtySecondi.$touched && formNuovoMenu00.qtySecondi.$invalid,
                                      'is-valid': formNuovoMenu00.qtySecondi.$touched && formNuovoMenu00.qtySecondi.$valid }">
                    <br>



                    <label for="qtyContorni">Inserisci il numero di contorni</label>
                    <span ng-show="formNuovoMenu00.qtyContorni.$error.min || formNuovoMenu00.qtyContorni.$error.max"
                          class="mioErrore01" role="alert">
                      Inserire una quantità compresa tra 0 e 4
                    </span>
                    <input type="number" name="qtyContorni" id="qtyContorni" class="form-control" min="0" max="3"
                           ng-model="qtyContorni"
                           ng-class="{'is-pristine': formNuovoMenu00.qtyContorni.$untouched,
                                     'is-invalid': formNuovoMenu00.qtyContorni.$touched && formNuovoMenu00.qtyContorni.$invalid,
                                     'is-valid': formNuovoMenu00.qtyContorni.$touched && formNuovoMenu00.qtyContorni.$valid }" >
                    <br>



                    <label for="qtyDolci">Inserisci il numero di dolci</label>
                    <span ng-show="formNuovoMenu00.qtyDolci.$error.min || formNuovoMenu00.qtyDolci.$error.max"
                          class="mioErrore01" role="alert">
                      Inserire una quantità compresa tra 0 e 4
                    </span>
                    <input type="number" name="qtyDolci" id="qtyDolci" class="form-control" min="0" max="3"
                           ng-model="qtyDolci"
                           ng-class="{'is-pristine': formNuovoMenu00.qtyDolci.$untouched,
                                      'is-invalid': formNuovoMenu00.qtyDolci.$touched && formNuovoMenu00.qtyDolci.$invalid,
                                      'is-valid': formNuovoMenu00.qtyDolci.$touched && formNuovoMenu00.qtyDolci.$valid }" >
                    <br><br>
                  </fieldset>

                  <fieldset>
                    <legend>Scegli il tipo di menu</legend>
                    <label for="tipoMenu">
                      Pasto Buffet / Menu fisso?
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoMenu00.tipoMenu.$touched && formNuovoMenu00.tipoMenu.$error.required"
                          class="mioErrore01" role="alert">
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
        
        <?php
      }
    }?>

</main>

<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
