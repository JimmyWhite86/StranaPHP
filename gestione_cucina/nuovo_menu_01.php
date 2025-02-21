<?php
    session_start();
    include '../includes/init.php';
    $nomePagina = "nuovo_menu_01";
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <?php generaHeadSection(); ?>
  <title>StranAdmin | Nuovo Menu</title>
</head>

<body>


<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina); ?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 justify-content-center">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina px-1">crea un nuovo menu</h1>
    </div>
    <br>
    <div class="text-center">
      <h2>Passaggio 2 di 2</h2>
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
            } else {  # Utente loggato con diritti di admin
                if ( isset($_POST["cuocoMenu"]) && $_POST["cuocoMenu"] &&
                    isset($_POST["qtyAntipasti"]) && isset($_POST["qtyPrimi"]) &&
                    isset($_POST["qtySecondi"]) && isset($_POST["qtyContorni"]) &&
                    isset($_POST["qtyDolci"]) ) {
                    
                    $cuoco = $_POST["cuocoMenu"];
                    $qtyAntipasti = (int)$_POST["qtyAntipasti"];
                    $qtyPrimi = (int)$_POST["qtyPrimi"];
                    $qtySecondi = (int)$_POST["qtySecondi"];
                    $qtyContorni = (int)$_POST["qtyContorni"];
                    $qtyDolci = (int)$_POST["qtyDolci"];
                    $tipoMenu = $_POST["tipoMenu"];
                    
                    if ($qtyAntipasti < 0 || $qtyPrimi < 0 || $qtySecondi < 0 || $qtyContorni < 0 || $qtyDolci < 0) { ?> <!-- Numero piatti negativi-->
                      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                          <h2 class="fontTitoloSezione fontRosso">Menu non creato</h2>
                          <p>Attenzione! Le categorie di piatti non possono avere un numero negativo</p>
                          <hr>
                          <a href="nuovo_menu_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN MENU</a><br>
                          <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
                        </div>
                      </div>
                        <?php
                    } elseif ($qtyAntipasti == 0 && $qtyPrimi == 0 && $qtySecondi == 0 && $qtyContorni == 0 && $qtyDolci == 0) { ?> <!-- Tutti i piatti a zero -->
                      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                          <h2 class="fontTitoloSezione fontRosso">Menu non creato</h2>
                          <p>Attenzione! Le categorie non possono essere tutte a zero</p>
                          <hr>
                          <a href="nuovo_menu_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN MENU</a><br>
                          <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
                        </div>
                      </div>
                        <?php
                    } elseif ($qtyAntipasti > 4 || $qtyPrimi > 4 || $qtySecondi > 4 || $qtyContorni > 4 || $qtyDolci > 4) { ?> <!-- Troppi piatti per categoria -->
                      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                        <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                          <h2 class="fontTitoloSezione fontRosso">Menu non creato</h2>
                          <p>Attenzione! La quantità di ogni categoria non può essere maggiore di 4</p>
                          <hr>
                          <a href="nuovo_menu_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN MENU</a><br>
                          <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
                        </div>
                      </div>
                        <?php
                    } else { // i campi sono stati compilati tutti correttamente ?>

                      <!-- Form della pagina -->
                      <div class="container-fluid bg-rosso py-4 my-4">
                        <div class="container-fluid col-md-8 bg-giallo py-4 my-4 myShadowNera rounded-3">
                          <div class="row justify-content-center">
                            <div class="container-fluid my-5" id="containerForm">

                              <form method="POST" action="controllo_crea_menu.php" class="col-md-8 mx-auto" name="formNuovoMenu01"
                                    id="formNuovoMenu01" ng-app="myAppNuovoMenu01" ng-controller="validateNuovoMenu01Ctrl" novalidate>

                                <h2 class="mb-5 text-center fontTitoloSezione">
                                    <?=$username?>, compila i dati del form sottostante per creare un nuovo menu
                                </h2>
                                <br>
                                  
                                  <?php
                                      $categorie = [
                                          'Antipasti' => $qtyAntipasti,
                                          'Primi' => $qtyPrimi,
                                          'Secondi' => $qtySecondi,
                                          'Contorni' => $qtyContorni,
                                          'Dolci' => $qtyDolci
                                      ];
                                      
                                      $quantitaTotalePiatti = 0;
                                      
                                      foreach ($categorie as $categoria => $quantita) {
                                          if ($quantita > 0) { ?>
                                            <hr>
                                            <fieldset>
                                            <legend class="visually-hidden">Compila i dati per la categoria <?= $categoria ?></legend>
                                            <div class="text-center text-uppercase">
                                              <h3>Compila i dati per: <?=$categoria?></h3>
                                            </div>
                                            <br>
                                              <?php
                                              
                                              for ($i = 1; $i <= $quantita; $i++) { ?>
                                                <div class="form-group bg-bianco border border-dark rounded-3 myShadowNera " style="padding: 30px;">

                                                  <h4><?=$categoria?>: <?=$i?> di <?=$quantita?></h4>

                                                  <label for="nomePiatto_<?=$quantitaTotalePiatti?>">
                                                    Inserisci il nome del <?=$categoria?> <?=$i?>
                                                    <span class="mandatory">*</span>
                                                  </label>
                                                  <span class="mioErrore01 mioErrore02" role="alert"
                                                        ng-show="formNuovoMenu01.nomePiatto_<?=$quantitaTotalePiatti?>.$touched &&
                                               formNuovoMenu01.nomePiatto_<?=$quantitaTotalePiatti?>.$error.required">
                                  Campo obbligatorio
                                </span>
                                                  <input type="text" name="nomePiatto_<?=$quantitaTotalePiatti?>"
                                                         id="nomePiatto_<?=$quantitaTotalePiatti?>" aria-labelledby="nomePiatto_<?=$quantitaTotalePiatti?>"
                                                         class="form-control" title="Inserisci il nome del <?=$categoria?> <?=$i?>"
                                                         required aria-required="true" ng-model="nomePiatto_<?=$quantitaTotalePiatti?>"
                                                         ng-class="{'is-pristine': formNuovoMenu01.nomePiatto_<?=$quantitaTotalePiatti?>.$untouched,
                                                  'is-invalid': formNuovoMenu01.nomePiatto_<?=$quantitaTotalePiatti?>.$touched &&
                                                                formNuovoMenu01.nomePiatto_<?=$quantitaTotalePiatti?>.$invalid,
                                                  'is-valid': formNuovoMenu01.nomePiatto_<?=$quantitaTotalePiatti?>.$touched &&
                                                              formNuovoMenu01.nomePiatto_<?=$quantitaTotalePiatti?>.$valid }" >
                                                  <br>

                                                  <label for="descrizionePiatto_<?=$quantitaTotalePiatti?>">
                                                    Inserisci la descrizione del <?=$categoria?> <?=$i?>
                                                  </label>
                                                  <textarea name="descrizionePiatto_<?=$quantitaTotalePiatti?>"
                                                            id="descrizionePiatto_<?=$quantitaTotalePiatti?>"
                                                            class="form-control col-md-3" aria-labelledby="descrizionePiatto_<?=$quantitaTotalePiatti?>"
                                                            title="inserisci la descrizione del <?=$categoria?> <?=$i?>"
                                                            ng-model="descrizionePiatto_<?=$quantitaTotalePiatti?>"
                                                            ng-class="{'is-valid': formNuovoMenu01.descrizionePiatto_<?=$quantitaTotalePiatti?>.$touched &&
                                                                 formNuovoMenu01.descrizionePiatto_<?=$quantitaTotalePiatti?>.$valid,
                                                     'is-pristine': formNuovoMenu01.descrizionePiatto_<?=$quantitaTotalePiatti?>.$untouched}">
                                </textarea>
                                                  <br>

                                                  <label for="prezzoPiatto_<?=$quantitaTotalePiatti?>">
                                                    Inserisci il prezzo del <?=$categoria?> <?=$i?>
                                                    <span class="mandatory">*</span>
                                                  </label>
                                                  <span class="mioErrore01" role="alert"
                                                        ng-show="formNuovoMenu01.prezzoPiatto_<?=$quantitaTotalePiatti?>.$touched &&
                                               formNuovoMenu01.prezzoPiatto_<?=$quantitaTotalePiatti?>.$error.required">
                                  Campo obbligatorio
                                </span>
                                                  <input type="number" name="prezzoPiatto_<?=$quantitaTotalePiatti?>"
                                                         id="prezzoPiatto_<?=$quantitaTotalePiatti?>" aria-labelledby="prezzoPiatto_<?=$quantitaTotalePiatti?>"
                                                         class="form-control" title="Inserisci il prezzo del <?=$categoria?> <?=$i?>"
                                                         required aria-required="true" ng-model="prezzoPiatto_<?=$quantitaTotalePiatti?>"
                                                         ng-class="{'is-pristine': formNuovoMenu01.prezzoPiatto_<?=$quantitaTotalePiatti?>.$untouched,
                                                  'is-invalid': formNuovoMenu01.prezzoPiatto_<?=$quantitaTotalePiatti?>.$touched &&
                                                                formNuovoMenu01.prezzoPiatto_<?=$quantitaTotalePiatti?>.$invalid,
                                                  'is-valid': formNuovoMenu01.prezzoPiatto_<?=$quantitaTotalePiatti?>.$touched &&
                                                              formNuovoMenu01.prezzoPiatto_<?=$quantitaTotalePiatti?>.$valid }">
                                                  <br>

                                                  <input type="hidden" name="categoriaPiatto_<?=$quantitaTotalePiatti?>" value="<?=$categoria?>">
                                                  <input type="hidden" name="cuocoPiatto_<?=$quantitaTotalePiatti?>" value="<?=$cuoco?>">
                                                    
                                                    <?php $quantitaTotalePiatti++; ?>

                                                </div>
                                                <br>
                                                </fieldset>
                                              <?php }
                                          }
                                      } ?>

                                <input type="hidden" name="quantitaTotalePiatti" value="<?=$quantitaTotalePiatti?>">
                                <input type="hidden" name="tipoMenu" value="<?=$tipoMenu?>">

                                <div class="text-center">
                                  <input type="submit" value="Inserisci" class="btn btn-success" ng-disabled="formNuovoMenu01.$invalid">
                                </div>

                              </form>

                            </div>
                          </div>
                        </div>
                      </div>
                        <?php
                    }
                } else { ?> <!-- Campi non compilati correttamente -->

                  <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
                    <div class="row bg-bianco justify-content-center col-md-10 col-lg-6 text-center m-3 p-3 myShadowNera rounded-4">
                      <h2 class="fontTitoloSezione fontRosso">Menu non creato</h2>
                      <p>Attenzione! Devi compilare tutti i campi della pagina precedente</p>
                      <hr>
                      <a href="nuovo_menu_00.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">CREA UN MENU</a><br>
                      <a href="<?= BASE_URL ?>gestione_cucina.php" class="btn bottoneNero mb-3 maxWidthLinkAdmin">GESTIONE CUCINA</a><br>
                    </div>
                  </div>
                    <?php
                }
            }
        }
    ?>

</main>

<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>