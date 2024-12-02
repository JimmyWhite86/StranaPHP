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
            isset($_POST["cuoco"]) && $_POST["cuoco"] &&
            isset($_POST["qtyAntipasti"] ) && $_POST["qtyAntipasti"] &&
            isset($_POST["qtyPrimi"]) && $_POST["qtyPrimi"] &&
            isset($_POST["qtySecondi"]) && $_POST["qtySecondi"] &&
            isset($_POST["qtyContorni"]) && $_POST["qtyContorni"] &&
            isset($_POST["qtyDolci"]) && $_POST["qtyDolci"]
            ) {
          $cuoco = $_POST["cuoco"];
          $qtyAntipasti = $_POST["qtyAntipasti"];
          $qtyPrimi = $_POST["qtyPrimi"];
          $qtySecondi = $_POST["qtySecondi"];
          $qtyContorni = $_POST["qtyContorni"];
          $qtyDolci = $_POST["qtyDolci"];
  
          if ($qtyAntipasti < 0 || $qtyPrimi < 0 || $qtySecondi < 0 || $qtyContorni < 0 || $qtyDolci < 0) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Attenzione!</strong> Il numero di piatti per categoria non può essere negativo.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          } else { // i campi sono stati compilati tutti correttamente ?>

<!-- Form della pagina -->
<div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
  <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
    <div class="row justify-content-center">
      <div class="container-fluid my-5" id="containerForm">
        <form method="POST" action="controlloaggiuntapiatto.php" class="col-md-8 mx-auto">

          <h2 class="mb-5 text-center">
            <?=$username?>, compila i dati del form sottostante per creare un nuovo menu
          </h2>

          <fieldset>
            <?php
              
              $numeroPiatti = 0;
              
              if ($qtyAntipasti > 0) { ?>
            <h3>Compila i dati degli antipasti</h3>
            <?php
              for ($i = 1; $i <= $qtyAntipasti; $i++) { ?>


            <div class="form-group">

              <h4>Antipato numero <?= $i ?> </h4>

              <label for="nomePiattoNumero<?=$numeroPiatti?>">
                Inserisci il nome del piatto
                <span class="mandatory">*</span>
              </label>
              <input type="text" name="nomePiattoNumero<?=$numeroPiatti?>" id="nomePiattoNumero<?=$numeroPiatti?>" class="form-control"
                     title="Inserisci il nome del piatto" required aria-required="true">
              <br>

              <label for="descrizionePiattoNumero<?=$numeroPiatti?>">
                Inserisci la descrizione
              </label>
              <textarea name="descrizionePiattoNumero<?=$numeroPiatti?>" id="descrizionePiattoNumero<?=$numeroPiatti?>" class="form-control col-md-3"
                        title="inserisci la descrizione del piatto">
                    </textarea>
              <br>

              <label for="prezzoPiattoNumero<?=$numeroPiatti?>">
                Inserisci il prezzo del piatto
                <span class="mandatory">*</span>
              </label>
              <input type="number" name="prezzoPiattoNumero<?=$numeroPiatti?>" id="prezzoPiattoNumero<?=$numeroPiatti?>" class="form-control"
                     title="Inserisci il prezzo del piatto" required aria-required="true">
              <br>

              $numeroPiatti++;

              }
              
              <?php
                if ($qtyPrimi > 0) { ?>
              <h3>Compila i dati dei primi</h3>
              <?php
                for ($i = 1; $i <= $qtyPrimi; $i++) { ?>


              <h4>Primo numero <?= $i ?> </h4>

              <label for="nomePiattoNumero<?=$numeroPiatti?>">
                Inserisci il nome del piatto
                <span class="mandatory">*</span>
              </label>
              <input type="text" name="nomePiattoNumero<?=$numeroPiatti?>" id="nomePiattoNumero<?=$numeroPiatti?>" class="form-control"
                     title="Inserisci il nome del piatto" required aria-required="true">
              <br>

              <label for="descrizionePiattoNumero<?=$numeroPiatti?>">
                Inserisci la descrizione
              </label>
              <textarea name="descrizionePiattoNumero<?=$numeroPiatti?>" id="descrizionePiattoNumero<?=$numeroPiatti?>" class="form-control col-md-3"
                        title="inserisci la descrizione del piatto">
                    </textarea>
              <br>

              <label for="prezzoPiattoNumero<?=$numeroPiatti?>">
                Inserisci il prezzo del piatto
                <span class="mandatory">*</span>
              </label>
              <input type="number" name="prezzoPiattoNumero<?=$numeroPiatti?>" id="prezzoPiattoNumero<?=$numeroPiatti?>" class="form-control"
                     title="Inserisci il prezzo del piatto" required aria-required="true">
              <br>

              $numeroPiatti++;

              }

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


<?php
  } else {
  echo "Devi compilare tutti i campi per creare un nuovo menu";
}
  }
  }
?>


<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
