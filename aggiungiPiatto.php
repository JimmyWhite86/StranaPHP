<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "aggiungiPiatto";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Strana AggiungiPiatto</title>
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
          <h1 class="titoloPagina">aggiungi piatto</h1>
        </div>
      </div>

      <!-- Form della pagina -->
      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <div class="container-fluid my-5" id="containerForm">

              <form method="POST" action="controlloaggiuntapiatto.php" class="col-md-8 mx-auto" name="formNuovoPiatto" id="formNuovoPiatto"
                    ng-app="myAppNuovoPiatto" ng-controller="validateNuovoPiattoCtrl" novalidate>

                <h2 class="mb-5 text-center">
                  <?=$username?>, compila i dati del form sottostante per aggiungere un singolo piatto al menu
                </h2>

                <fieldset>
                  <div class="form-group">

                    <label for="nomePiattoNew">
                      Inserisci il nome del piatto
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoPiatto.nomePiattoNew.$touched && formNuovoPiatto.nomePiattoNew.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="text" name="nomePiattoNew" id="nomePiattoNew" class="form-control"
                           title="Inserisci il nome del piatto" required aria-required="true"
                           ng-model="nomePiattoNew"
                           ng-class="{'is-pristine': formNuovoPiatto.nomePiattoNew.$untouched,
                                      'is-invalid': formNuovoPiatto.nomePiattoNew.$touched && formNuovoPiatto.nomePiattoNew.$invalid,
                                      'is-valid': formNuovoPiatto.nomePiattoNew.$touched && formNuovoPiatto.nomePiattoNew.$valid }" >
                    <br>

                    <label for="descrizionePiattoNew">
                      Inserisci la descrizione
                    </label>
                    <textarea name="descrizionePiattoNew" id="descrizionePiattoNew" class="form-control col-md-3"
                              title="inserisci la descrizione del piatto"
                              ng-model="descrizionePiattoNew"
                              ng-class="{'is-pristine': formNuovoPiatto.descrizionePiattoNew.$untouched,
                                         'is-valid': formNuovoPiatto.descrizionePiattoNew.$touched && formNuovoPiatto.descrizionePiattoNew.$valid }">
                    </textarea>
                    <br>

                    <p>
                      Inserisci la categoria del piatto
                      <span class="mandatory">*</span>
                    </p>
                    <span ng-show="formNuovoPiatto.categoriaPiattoNew.$touched && formNuovoPiatto.categoriaPiattoNew.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="radio" id="antipasto" name="categoriaPiattoNew" value="antipasti" required>
                    <label for="antipasto">Antipasto</label><br>
                    <input type="radio" id="primi" name="categoriaPiattoNew" value="primi" required>
                    <label for="primi">Primi</label><br>
                    <input type="radio" id="secondi" name="categoriaPiattoNew" value="secondi" required>
                    <label for="secondi">Secondi</label><br>
                    <input type="radio" id="contorni" name="categoriaPiattoNew" value="contorni" required>
                    <label for="contorni">Contorni</label><br>
                    <input type="radio" id="dolci" name="categoriaPiattoNew" value="dolci" required>
                    <label for="dolci">Dolci</label><br>
                    <br>

                    <label for="prezzoPiattoNew">
                      Inserisci il prezzo del piatto
                      <span class="mandatory">*</span>
                    </label>
                    <span ng-show="formNuovoPiatto.prezzoPiattoNew.$touched && formNuovoPiatto.prezzoPiattoNew.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="number" name="prezzoPiattoNew" id="prezzoPiattoNew" class="form-control"
                           title="Inserisci il prezzo del piatto" required aria-required="true"
                           ng-model="prezzoPiattoNew"
                           ng-class="{'is-pristine': formNuovoPiatto.prezzoPiattoNew.$untouched,
                                      'is-invalid': formNuovoPiatto.prezzoPiattoNew.$touched && formNuovoPiatto.prezzoPiattoNew.$invalid,
                                      'is-valid': formNuovoPiatto.prezzoPiattoNew.$touched && formNuovoPiatto.prezzoPiattoNew.$valid }" >
                    <br>

                    <p>
                      Inserisci il cuoco
                      <span class="mandatory">*</span>
                    </p>
                    <span ng-show="formNuovoPiatto.cuocoPiattoNew.$touched && formNuovoPiatto.cuocoPiattoNew.$error.required"
                          class="mioErrore01" role="alert">
                      Campo obbligatorio
                    </span>
                    <input type="radio" id="pino" name="cuocoPiattoNew" value="Pino" required>
                    <label for="pino">Pino</label><br>
                    <input type="radio" id="tarta" name="cuocoPiattoNew" value="Tarta" required>
                    <label for="tarta">Tarta</label><br>

                    <br><br>

                  </div>

                  <div class="text-center">
                    <button type="submit" name="invio" id="invio" value="Inserisci" class="btn btn-primary"
                            ng-disabled="formNuovoPiatto.$invalid">
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
