<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "nuovoMenu01";
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
      if (
        isset($_POST["cuocoMenu"]) && $_POST["cuocoMenu"] &&
        isset($_POST["qtyAntipasti"]) && isset($_POST["qtyPrimi"]) &&
        isset($_POST["qtySecondi"]) && isset($_POST["qtyContorni"]) &&
        isset($_POST["qtyDolci"])
      ) {
        $cuoco = $_POST["cuocoMenu"];
        $qtyAntipasti = (int)$_POST["qtyAntipasti"];
        $qtyPrimi = (int)$_POST["qtyPrimi"];
        $qtySecondi = (int)$_POST["qtySecondi"];
        $qtyContorni = (int)$_POST["qtyContorni"];
        $qtyDolci = (int)$_POST["qtyDolci"];
        $tipoMenu = $_POST["tipoMenu"];
        
        if ($qtyAntipasti < 0 || $qtyPrimi < 0 || $qtySecondi < 0 || $qtyContorni < 0 || $qtyDolci < 0) { ?>
          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <h4>Attenzione!</h4>
            <p>Il numero di piatti per categoria non può essere un numero negativo</p>
            <p>Le categorie possono essere settate a zero nel caso non siano presenti nel menu, ma non possono avere un valore negativo!</p>
          </div>
          <?php
        } elseif ($qtyAntipasti == 0 && $qtyPrimi == 0 && $qtySecondi == 0 && $qtyContorni == 0 && $qtyDolci == 0) { ?>
          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <h4>Attenzione!</h4>
            <p>Devi inserire almeno un piatto per creare un menu.</p>
            <p>Almeno una categoria deve essere maggiore di uno</p>
          </div>
          <?php
        } elseif ($qtyAntipasti > 4 || $qtyPrimi > 4 || $qtySecondi > 4 || $qtyContorni > 4 || $qtyDolci > 4) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4>Attenzione!</h4>
            <p>La quantità massima di piatti per categoria non può essere maggiore di 4</p>
            <p>Il range di piatti accettati è 0 / 4</p>
          </div>
          <?php
        } else { // i campi sono stati compilati tutti correttamente ?>

          <!-- Form della pagina -->
          <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
            <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
              <div class="row justify-content-center">
                <div class="container-fluid my-5" id="containerForm">
                  <form method="POST" action="controlloaggiuntamenu.php" class="col-md-8 mx-auto">
                    <h2 class="mb-5 text-center">
                      <?=$username?>, compila i dati del form sottostante per creare un nuovo menu
                    </h2>
                    <br>

                    <fieldset>
                      
                      <?php
                        $categorie = [
                          'antipasti' => $qtyAntipasti,
                          'primi' => $qtyPrimi,
                          'secondi' => $qtySecondi,
                          'contorni' => $qtyContorni,
                          'dolci' => $qtyDolci
                        ];
                        
                        $quantitaTotalePiatti = 0;
                        
                        foreach ($categorie as $categoria => $quantita) {
                          if ($quantita > 0) { ?>
                            <hr>
                            <div class="text-center">
                              <h3>Compila i dati per: <?=$categoria?></h3>
                            </div>
                            <br>
                            <?php
                            
                            for ($i = 1; $i <= $quantita; $i++) { ?>
                              <div class="form-group bg-giallo" style="padding: 30px;">

                                <h4><?=$categoria?>: <?=$i?> di <?=$quantita?></h4>

                                <label for="nomePiatto_<?=$quantitaTotalePiatti?>>">Inserisci il nome del <?=$categoria?> <?=$i?><span class="mandatory">*</span></label>
                                <input type="text" name="nomePiatto_<?=$quantitaTotalePiatti?>" id="nomePiatto_<?=$quantitaTotalePiatti?>" class="form-control" title="Inserisci il nome del <?=$categoria?> <?=$i?>" required aria-required="true">
                                <br>

                                <label for="descrizionePiatto_<?=$quantitaTotalePiatti?>">Inserisci la descrizione del <?=$categoria?> <?=$i?></label>
                                <textarea name="descrizionePiatto_<?=$quantitaTotalePiatti?>" id="descrizionePiatto_<?=$quantitaTotalePiatti?>" class="form-control col-md-3" title="inserisci la descrizione del <?=$categoria?> <?=$i?>"></textarea>
                                <br>

                                <label for="prezzoPiatto_<?=$quantitaTotalePiatti?>">Inserisci il prezzo del <?=$categoria?> <?=$i?><span class="mandatory">*</span></label>
                                <input type="number" name="prezzoPiatto_<?=$quantitaTotalePiatti?>" id="prezzoPiatto_<?=$quantitaTotalePiatti?>" class="form-control" title="Inserisci il prezzo del <?=$categoria?> <?=$i?>" required aria-required="true">
                                <br>

                                <input type="hidden" name="categoriaPiatto_<?=$quantitaTotalePiatti?>" value="<?=$categoria?>">
                                <input type="hidden" name="cuocoPiatto_<?=$quantitaTotalePiatti?>" value="<?=$cuoco?>">
                                
                                <?php $quantitaTotalePiatti++; ?>

                              </div>
                              <br>
                            <?php }
                          }
                        } ?>

                      <input type="hidden" name="quantitaTotalePiatti" value="<?=$quantitaTotalePiatti?>">
                      <input type="hidden" name="tipoMenu" value="<?=$tipoMenu?>">
                      
                      <div class="text-center">
                        <input type="submit" value="Inserisci" class="btn btn-success">
                      </div>
                      
                    </fieldset>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        echo "<p>Devi compilare tutti i campi per creare un nuovo menu</p>";
      }
    }
  }
?>

<!-- Footer -->
<?php
  HTMLfooter($nomePagina);
?>


</body>
</html>