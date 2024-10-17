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

  <title>Stranamore | Home</title>

</head>

  <!-- NAV BAR -->
  <nav class="navbar navbar-expand-lg bg-nero">
    
    <a href="#mioMain" class="skip text-center" tabindex="1">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->

    <div class="container-fluid">

      <a class="navbar-brand fontstranaBase" href="index.php">
        <img src="Immagini/Logo_Stranamore_01.jpg" class="d-inline-block align-center" alt="logo stranamore">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse fontNav" id="navbarNav" role="navigation" aria-label="main navigation">
        <div class="d-flex justify-content-center flex-grow-1">
          
          <ul class="navbar-nav" id="myNavBar">
            <li class="nav-item">
              <a class="nav-link mioActive" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="chisiamo.php">Chi Siamo</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="lacucina.php">La Cucina</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="eventi.php">Eventi</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="contatti.php">Contatti</a>
            </li>
          </ul>
        </div>

        <div>
          <i class="bi bi-box-arrow-in-right pe-4"></i>
        </div>
      
      </div>  
    </div>
  </nav>

  <main id="mioMain" role="main">


<!-- Sezione Card -->
<div class="container-fluid bg-giallo text-center mioContainerContatti">
    <h3 class="mioMargin01 fontContatti01">mettiti in contatto con noi!</h3>
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
     
    <footer class="text-center bg-nero">

      <div class="p-1 border-bottom"></div> <!-- Riga sopra footer -->

      <div class="row justify-content-center">
        
        <div class="col d-flex flex-column align-items-center d-flex">
          <!-- <p class="fontFooter02">Associazione Culturale</p> -->
          <h1 class="fontstranaFooter">stranamore</h1>
        </div>

        <div class="col text-center">
          <p class="fontFooter01">Navigazione</p>
          <ul class="list-unstyled">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="chisiamo.php">Chi Siamo</a>
            </li>
            <li>
              <a href="lacucina.php">La Cucina</a>
            </li>
            <li>
              <a href="eventi.php">Eventi</a>
            </li>
            <li>
              <a href="contatti.php">Contatti</a>
            </li>
          </ul>
        </div>

        <div class="col text-center">
          <p class="fontFooter01">Social</p>
          <a href="" class="socialIcon" title="Link alla pagina Facebook"
               aria-label="Facebook link" tabindex="15">
              <i class="fa-brands fa-square-facebook fa-3x" role="img" title="Facebook icon"></i>
            </a>

            <a href="" class="socialIcon" title="Link alla pagine Twitter"
               aria-label="Twitter link" tabindex="16">
              <i class="fa-brands fa-square-twitter fa-3x" role="img" title="Twitter Icon"></i>
            </a>
            <br>

            <a href="" class="socialIcon" title="Link alla pagina Instagram"
               aria-label="Instagram link" tabindex="17">
              <i class="fa-brands fa-square-instagram fa-3x" role="img" title="Instagram icon"></i>
            </a>

            <a href="" class="socialIcon" title="Link alla pagina YouTube"
               aria-label="YouTube link" tabindex="18">
              <i class="fa-brands fa-square-youtube fa-3x" role="img" title="YouTube Icon"></i>
            </a>
        </div>

        <div class="col text-center">
          <p class="fontFooter01">Contatti</p>
          <ul class="list-unstyled">
            <li>
              <a href="https://maps.app.goo.gl/mb7UeN8NNaJD1kC78">
                <i class="fas fa-home me-3"></i>Via Ettore Bignone, 89, 10064 Pinerolo TO
              </a>
            </li>
            <li>  
              <a href="mailto:associazione.stranamore@gmail.com">
                <i class="fa fa-envelope me-3"></i>associazione.stranamore@gmail.com
              </a>
            </li>
            <li>    
              <a href="Tel:+393516230176">
                <i class="fas fa-phone me-3"></i>3516230176
              </a>
            </li>  
          </ul>
        </div>

      </div>

      <div class="row bg-giallo align-middle">
        <p class="align-middle">Sito realizzato da Bianchi Andrea</p>
      </div>

    </footer>
    

    
  </main>

</body>
</html>
