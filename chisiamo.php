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
<body ng-app="myAppHome" ng-controller="myCtrl">

  <!-- NAV BAR -->
  <nav class="navbar navbar-expand-lg bg-nero">
    
    <a href="#mioMain" class="skip text-center" tabindex="1">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->

    <div class="container-fluid">

      <a class="navbar-brand fontstranaBase" href="home.html">
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
              <a class="nav-link mioActive" aria-current="page" href="home.html">Home</a>
            </li>
            <li class="nav-item">
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="chisiamo.html">Chi Siamo</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="lacucina.html">La Cucina</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="eventi.html">Eventi</a>
            </li>
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link mioOver" href="contatti.html">Contatti</a>
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


  <!-- START THE FEATURETTES -->
  <div class="container marketing">

    <hr class="featurette-divider">

    <div class="row featurette" title="chi siamo">
      <div class="col-md-7">
        <h2 class="fontChiSiamo01">
          chi siamo
        </h2>
        <p class="lead">
            Stranamore è un'Associazione No Profit fondata nel 1993 e affiliata al circuito ARCI. 
            Il nostro obiettivo è quello di promuovere iniziative sociali, culturali, ambientaliste, artistiche, 
            ricreative e sportive. Attraverso questi progetti, ci impegniamo a creare uno spazio di dialogo e 
            condivisione tra singoli e gruppi, incoraggiando l’autogestione culturale e sostenendo la comunità 
            del territorio pinerolese.
        </p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="Immagini/Staff01.JPG" alt="Conigli mangiano intorno ad una ciotola">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette" title="la nostra vision">
      <div class="col-md-7 order-md-2">
        <h2 class="fontChiSiamo01">
          i nostri valori
        </h2>
        <p class="lead">
            Ci battiamo per una società più inclusiva e giusta, opponendoci fermamente a ogni 
            forma di ignoranza, intolleranza, violenza, discriminazione ed emarginazione. 
            Promuoviamo eventi che spaziano dal teatro alla musica, dalla letteratura allo 
            sport, e collaboriamo con altre realtà, sia a livello locale che internazionale, 
            per favorire lo scambio di idee ed esperienze. Attraverso queste attività, puntiamo a 
            stimolare un cambiamento positivo e duraturo nella nostra comunità.
        </p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="Immagini/Mani_01.png" alt="Bambino gioca nel bosco">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette" title="cosa facciamo">
      <div class="col-md-7">
        <h2 class="fontChiSiamo01">
          cosa facciamo
        </h2>
        <p class="lead">
            L'Associazione si dedica anche a iniziative solidali a favore 
            delle fasce più vulnerabili della popolazione e a progetti di economia
             solidale, come i Gruppi di Acquisto Solidale (G.A.S.), promuovendo 
             l'uso di prodotti biologici, ecocompatibili e a basso impatto 
             ambientale. All'interno della nostra sede, offriamo ai soci la 
             possibilità di partecipare a incontri culturali e sociali, di gustare
              piatti preparati con ingredienti di qualità e di sostenere iniziative che 
              difendono l'ambiente e la pace.
        </p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="Immagini/Emi_01.jpg" alt="Papere in giardino">
      </div>
    </div>

    <hr class="featurette-divider">

  </div>
</main>



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
              <a href="home.html">Home</a>
            </li>
            <li>
              <a href="chisiamo.html">Chi Siamo</a>
            </li>
            <li>
              <a href="lacucina.html">La Cucina</a>
            </li>
            <li>
              <a href="eventi.html">Eventi</a>
            </li>
            <li>
              <a href="contatti.html">Contatti</a>
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
