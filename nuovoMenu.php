<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "eliminaMenu";
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
  <script src="modulo.js" type="text/javascript" defer></script>
  
  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
  <title>Strana EliminaEvento</title>

</head>
<body>

<!-- Richiamo la nav bar -->
<?php richiamaNavBar($nomePagina); ?>

<?php
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  }
  else {
    $amministratore = $_SESSION["admin"];
    $username = $_SESSION["username"];
    
    if ($amministratore == 0) {
      deviEssereAdmin($username);
    }
    else { ?>
      
      <!-- "Titolo" della pagina -->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h1 class="titoloPagina">elimina intero menu</h1>
        </div>
      </div>
      
      <!-- Sottotitolo della pagina-->
      <div class="my-5 row justify-content-center">
        <div class="text-center">
          <h2><?=$username?>, da questa pagina puoi eliminare l'intero menu ad ora presente</h2>
        </div>
      </div>
  
      <!-- Form della pagina -->
      <div class="container-fluid bg-rosso pb-4 pt-4 mt-4 mb-4">
        <div class="container-fluid col-md-8 bg-bianco pb-4 mb-4 pt-4 mt-4">
          <div class="row justify-content-center">
            <div class="container-fluid my-5" id="containerForm">
              <form method="POST" action="controllaNuovoMenu.php" id="formNuovoMenu" class="col-md-8 mx-auto">
            
                <h2 class="mb-5 text-center">
                  <?=$username?>, compila i dati del form sottostante per aggiungere nuovi piatti al menu
                </h2>
            
                <fieldset>
                  <div class="form-group">
                
                    <label for="nomePiattoNew">
                      Inserisci il nome del piatto
                      <span class="mandatory">*</span>
                    </label>
                    <input type="text" name="piatti[0][nome]" id="piatti[0][nome]" class="form-control"
                           title="Inserisci il nome del piatto" required aria-required="true">
                    <br>
                
                    <label for="descrizionePiattoNew">
                      Inserisci la descrizione
                    </label>
                    <textarea name="piatti[0][descrizione]" id="piatti[0][descrizione]" class="form-control col-md-3"
                              title="inserisci la descrizione del piatto">
                    </textarea>
                    <br>
                
                    <p>
                      Inserisci la categoria del piatto
                      <span class="mandatory">*</span>
                    </p>
                    <input type="radio" id="antipasto" name="piatti[0][categoria]" value="antipasti">
                    <label for="antipasto">Antipasto</label><br>
                    <input type="radio" id="primi" name="piatti[0][categoria]" value="primi">
                    <label for="primi">Primi</label><br>
                    <input type="radio" id="secondi" name="piatti[0][categoria]" value="secondi">
                    <label for="secondi">Secondi</label><br>
                    <input type="radio" id="contorni" name="piatti[0][categoria]" value="contorni">
                    <label for="contorni">Contorni</label><br>
                    <input type="radio" id="dolci" name="piatti[0][categoria]" value="dolci">
                    <label for="dolci">Dolci</label><br>
                    <br>
                
                    <label for="prezzoPiattoNew">
                      Inserisci il prezzo del piatto
                      <span class="mandatory">*</span>
                    </label>
                    <input type="number" name="piatti[0][prezzo]" id="piatti[0][prezzo]" class="form-control"
                           title="Inserisci il prezzo del piatto" required aria-required="true">
                    <br>
                
                    <p>
                      Inserisci il cuoco
                      <span class="mandatory">*</span>
                    </p>
                    <input type="radio" id="pino" name="piatti[0][cuoco]" value="Pino">
                    <label for="pino">Pino</label><br>
                    <input type="radio" id="tarta" name="piatti[0][cuoco]" value="Tarta">
                    <label for="tarta">Tarta</label><br>
                    
                    <div class="text-center">
                      <button type="button" class="btn btn-danger rimuoviRiga">Rimuovi</button>
                    </div>
                
                    <br><br>
              
                  </div>
                </fieldset>
                
                <button type="button" id="btnAggiungiRiga" class="btn btn-primary">Aggiungi nuovo piatto</button>
                <button type="submit" class="btn btn-success mt-3">Salva Piatti</button>
                
              </form>
            </div>
      
          </div>
        </div>
      </div>


    <?php   }
  }?>


<!-- Richiamo il footer -->
<?php HTMLfooter($nomePagina); ?>


</body>
</html>