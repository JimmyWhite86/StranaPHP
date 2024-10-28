<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "aggiungiPiatto";
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

  <title>AdminStrana | Aggiungi Piatto</title>

</head>
<body ng-app="myAppHome" ng-controller="myCtrl">

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

      <!-- Titolo e sottotilo della pagina-->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h1 class="titoloPaginaAdmin">aggiungi piatto</h1>
          <h2 class="mt-5">
            <?=$username?>, compila i dati del form sottostante per aggiungere un singolo piatto al menu
          </h2>
        </div>
      </div>
      
      
      <!-- Form della pagina -->
      <div class="container-fluid my-5" id="containerForm">
      <form method="POST" action="controlloaggiuntapiatto.php" class="col-md-8 mx-auto">
        <!--
        <h3 class="text-center">Compila i campi del form sottostante</h3>
        -->
        
        <fieldset>
          <div class="form-group">
        
            <label for="nomePiattoNew">
              Inserisci il nome del piatto
              <span class="mandatory">*</span>
            </label>
            <input type="text" name="nomePiattoNew" id="nomePiattoNew" class="form-control"
                  title="Inserisci il nome del piatto" required aria-required="true">
            <br>
    
            <label for="descrizionePiattoNew">
              Inserisci la descrizione
            </label>
            <textarea name="descrizionePiattoNew" id="descrizionePiattoNew" class="form-control col-md-3"
                   title="inserisci la descrizione del piatto">
            </textarea>
            <br>
    
            <p >
              Inserisci la categoria del piatto
              <span class="mandatory">*</span>
            </p>
            <input type="radio" id="antipasto" name="categoriaPiattoNew" value="antipasti">
            <label for="antipasto">Antipasto</label><br>
            <input type="radio" id="primi" name="categoriaPiattoNew" value="primi">
            <label for="primi">Primi</label><br>
            <input type="radio" id="secondi" name="categoriaPiattoNew" value="secondi">
            <label for="secondi">Secondi</label><br>
            <input type="radio" id="contorni" name="categoriaPiattoNew" value="contorni">
            <label for="contorni">Contorni</label><br>
            <input type="radio" id="dolci" name="categoriaPiattoNew" value="dolci">
            <label for="dolci">Dolci</label><br>
            <br>

            <label for="prezzoPiattoNew">
              Inserisci il prezzo del piatto
              <span class="mandatory">*</span>
            </label>
            <input type="number" name="prezzoPiattoNew" id="prezzoPiattoNew" class="form-control"
                   title="Inserisci il prezzo del piatto" required aria-required="true">
            <br>
            
            <p>
              Inserisci il cuoco
              <span class="mandatory">*</span>
            </p>
            <input type="radio" id="pino" name="cuocoPiattoNew" value="Pino">
            <label for="pino">Pino</label><br>
            <input type="radio" id="tarta" name="categoriaPiattoNew" value="Tarta">
            <label for="tarta">Tarta</label><br>
            
            
            <br><br>

          </div>
          
         <div class="text-center">
        <input type="submit" value="Inserisci" class="btn btn-success">
         </div>
         
        </fieldset>
      </form>
      </div>
    
    <?php   }
  }?>


<!-- Footer -->
<?php HTMLfooter($nomePagina); ?>

</body>
</html>
