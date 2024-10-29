<?php
  session_start();
  $nomePagina = "contatti";
  include "function.php";
  include "functionHTML.php";
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

  <title>Stranamore | Home</title>

</head>

  <!-- NAV BAR -->
  <?php richiamaNavBar($nomePagina);?>

  <main id="mioMain" role="main">

    <!-- "Titolo" della pagina -->
    <div class="my-5 row justify-content-center">
      <div class="text-center">
        <h1 class="titoloPaginaAdmin">mettiti in contatto con strana</h1>
      </div>
    </div>


<!-- Sezione Card -->
<div class="container-fluid bg-giallo text-center mioContainerContatti">
    <!--<h3 class="mioMargin01 fontContatti01">mettiti in contatto con noi!</h3>-->
    <p class="testoHome">Contattaci, siamo a tua disposizione per qualsiasi chiarimento e per raccontarvi la nostra attività.
      <br> Saremo felici di ascoltare le tue richieste per offrirti il nostro miglior servizio.</p>

    <div class="row justify-content-center">

      <div class="card m-1 bg-5" style="width: 18rem;">
        <i role="img" class="bi bi-envelope-at-fill fa-4x iconeRosse"></i>
        <div class="card-body">
          <h5 class="card-title">Scrivici</h5>
          <p class="card-text">Manda una mail al nostro indirizzo</p>
          <p class="card-text">associazione.stranamore@gmail.com</p>
        </div>
        <div class="card-footer">
          <a href="mailto:associazione.stranamore@gmail.com" class="btn bottoneRosso">Scrivi</a>
        </div>
      </div>

      <div class="card m-1 bg-5" style="width: 18rem;">
        <i role="img" class="bi bi-telephone-outbound-fill fa-4x iconeGialle"></i>
        <div class="card-body">
          <h5 class="card-title">Mandaci un WhatsApp</h5>
          <p class="card-text">Puoi chiedere informazioni o prenotare un tavolo scrivendo al nostro numero</p>
          <p>351 623 0176</p>
        </div>
        <div class="card-footer">
          <a href="Tel:+393516230176" class="btn bottoneGiallo">Scrivici</a>
        </div>
      </div>

      <div class="card m-1 bg-5" style="width: 18rem;">
        <i role="img" class="bi bi-geo-alt-fill fa-4x iconeAzzurre"></i>
        <div class="card-body">
          <h5 class="card-title">Raggiungici</h5>
          <p class="card-text">Vieni a trovarci di persona nella nostra struttura</p>
          <p class="card-text">via Ettore Bignone 89,<br>10064 Pinerolo (TO)</p>
        </div>
        <div class="card-footer">
          <a href="https://maps.app.goo.gl/4MWoWXnPmRvHGW3d9" class="btn bottoneAzzurro">Maps</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Sezione Form -->
  <div class="container-fluid bg-azzurro mb-1 mioContainerContatti">
    <div class="row justify-content-center">
      <div class="container contact-form border-dark rounded m-3" >
        <form class="mioFormContatti" ng-app="myAppContatti" ng-controller="validateCtrl" name="formContatti"
              id="formContatti" novalidate> 
          <h3 class="mioH3contatti">lasciaci un messaggio</h3>
          <div class="row">
            <div class="col-md-6">

              <!-- NOME -->
              <div class="form-group">
                <label for="nomeFormContatti">
                  Nome<span class="mandatory">*</span>
                </label>
                <span ng-show="formContatti.nomeFormContatti.$error.required" class="mioErrore01" role="alert">
                  Campo obbligatorio
                </span>
                <input type="text" id="nomeFormContatti" name="nomeFormContatti" class="form-control"
                       required aria-required="true" autocomplete="given-name" ng-model="nomeFormContatti" >
              </div>

              <!-- EMAIL -->
              <div class="form-group">
                <label for="mailFormContatti">
                  e-mail <span class="mandatory">*</span>
                </label>
                <span ng-show="formContatti.emailFormContatti.$error.required" class="mioErrore01" role="alert">
                  Campo obbligatorio
                </span>
                <span ng-show="formContatti.emailFormContatti.$error.email" class="mioErrore01" role="alert">
                  Indirizzo e-mail non valido
                </span>
                <input type="email" autocomplete="email" id="mailFormContatti" name="emailFormContatti"
                       class="form-control" required aria-required="true" ng-model="emailFormContatti">
              </div>

            </div>

            <!-- TextArea -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="textAreaContatti">
                  Il tuo messaggio<span class="mandatory">*</span>
                </label>
                <span ng-show="formContatti.textAreaContatti.$error.required" class="mioErrore01" role="alert">
                  Campo obbligatorio
                </span>
                <textarea name="textAreaContatti" id="textAreaContatti" class="form-control"
                          style="width: 100%; height: 150px;" required aria-required="true" ng-model="textAreaContatti">
                </textarea>
              </div>

              <!-- Bottone -->
              <div class="form-group">
                <button class="btn btn-outline-dark" onclick="mostraConferma()" id="confermaInvioContatti"
                        ng-disabled="formContatti.nomeFormContatti.$invalid ||
                                     formContatti.emailFormContatti.$invalid ||
                                     formContatti.textAreaContatti.$invalid"
                        name="btnSubmit" form="formContatti">
                  Invia!
                </button>
              </div>
              <p class="border p-2 mb-3" id="paragrafoConferma" style="display: none">
                Grazie {{nomeFormContatti}}, risponderemo alle tue domande all'indirizzo {{emailFormContatti | uppercase}} il prima possibile
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    
    <!-- Footer -->
    <?php HTMLfooter("$nomePagina");?>
    
  </main>

</body>
</html>
