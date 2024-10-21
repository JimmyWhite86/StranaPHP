<?php 
  session_start();
  $nomePagina = "index";
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

  <!-- Fobnt Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <title>Stranamore | Home</title>

</head>
<body ng-app="myAppHome" ng-controller="myCtrl">


  <?php richiamaNavBar($nomePagina);?>
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
          <a href="login.php">
            <i class="bi bi-box-arrow-in-right pe-4 nav-link mioOver"></i>
          </a>
        </div>
      
      </div>  
    </div>
  </nav>

  <main id="mioMain" role="main">
    
    <!-- Hero Section -->
    <section class="hero-section bg-rosso text-center text-white d-flex align-items-center">
      <div class="container hero-content">
        <div class="row justify-content-center">
          <div class="col-md-8 bg-nero">
            <h2 class="m-0 p-0 pt-2 babasTitolo" id="">Associazione Culturale e Circolo ARCI</h2>
            <h1 class="m-0 p-0" id="fontHeroCentro">stranamore</h1>
            <h3 class="m-0 p-0 pb-2" id="fontHeroSotto">Promuoviamo cultura, inclusione e socialità</h3> 
          </div>
        </div> 
      </div>
    </section>

    <!-- sessione centrale -->
    <div class="bg-giallo container-fluid justify-content-center mioFlowRoot">

      <!-- Chi siamo breve -->
      <div class="container-fluid justify-content-center bg-nero w-75 mt-2" style="color: white;">
        <h3 class="pt-5 text-center fontstranaTitoli">chi siamo</h3>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-8">
            <p class="testoHome">
              Siamo un'associazione di promozione sociale affiliata ARCI.
              Promuvoiamo cultura, arte e socializzazione sul nostro territorio.
              Per le persone associate è presente la cucina.
            </p>
            <br>
            <a href="chisiamo.php">Scopri di piu</a>
          </div>
        </div>
      </div>

      <!-- La cucina breve -->
      <div class="container-fluid justify-content-center bg-nero w-75 mt-2 mb-2" style="color: white;">
        <h3 class="pt-5 text-center fontstranaTitoli">la cucina</h3>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-8">
            <p class="testoHome">
              La nostra cucina è aperta per tutte le persone associate.
              Cerchiamo di proporre piatti con ingredienti di qualità promuovendo la stagionalità dei cibi.
              Possiamo anche organizzare menu fissi per feste o grandi tavolate.
            </p>
            <br>
            <a href="chisiamo.php">Scopri di piu</a>
          </div>
        </div>
      </div>

      <!-- Eventi breve -->
      <div class="container-fluid justify-content-center bg-nero w-75 mt-2 mb-2" style="color: white;">
        <h3 class="pt-5 text-center fontstranaTitoli">eventi</h3>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-8">
            <p class="testoHome">
              Organiziamo incontri e dibattiti su temi di attualità.
              Inviatiamo persone autorevoli che possano spiegarci cosa succede nel mondo. 
              Ospitiamo presentazioni di libri.
              Ma non siamo sempre seri. Ci piacciano anche concerti e dj set.
            </p>
            <br>
            <a href="chisiamo.php">Scopri di piu</a>
          </div>
        </div>
      </div>

    </div>




    <!-- NewsLetter e 8x1000 -->
    <section>
      <div class="container-fluid text-center bg-azzurro">
        <div class="row justify-content-center">
          
          <div class="m-2 card col-md-4" style="width: 20em;">
            <!-- <img src="Immagini/Newletter_Azzurra_100_01.png" class="img-fluid myImgCard"> -->
            <i class="bi bi-envelope-paper-heart fa-10x iconeRosse"></i>
            <div class="card-body">
              <h3>Iscriviti alla nostra NewsLetter</h3>
              <p>Rimani aggiornato sulle nostre iniziative e non perderti nessun evento!</p>
              <p>La nostra NewsLetter ha cadenza settimanale e serve per comunicare con i nostri soci.</p>
            </div>
            <div class="card-footer">
              <a href="" class="btn bottoneRosso">Iscriviti</a>
            </div>
          </div>

          <div class="m-2 card col-md-4" style="width: 20em;">
            <!-- <img src="Immagini/Moneta_Rossa_01.png" class="img-fluid myImgCard"> -->
            <i class="bi bi-piggy-bank fa-10x iconeGialle"></i>
            <div class="card-body">
              <h3>Dona il tuo 5x1000</h3>
              <p>Tutte le nostre iniziative sono volte ad autofinanziarci</p>
              <p>Il tuo contributo per noi è davvero importante.</p>
            </div>
            <div class="card-footer">
              <a href="" class="btn bottoneGiallo">Dona</a>
            </div>
          </div>

          <div class="m-2 card col-md-4" style="width: 20em;">
            <!-- <img src="Immagini/Contattaci_Giallo_50_01.png" class="img-fluid myImgCard"> -->
            <i class="bi bi-mic-fill fa-10x iconeAzzurre"></i>
            <div class="card-body">
              <h3>Vuoi proporre un dibattito o un evento?</h3>
              <p>Usa il form per contattarci</p>
              <p>Siamo sempre alla ricerca di incontri, musica e spettacoli che possano animare il nostro circolo. 
                Facci sapere la tua proposta.</p>
            </div>
            <div class="card-footer">
              <a href="contatti.php" class="btn bottoneAzzurro">Contattaci</a>
            </div>
          </div>

        </div>
      </div>
    </section>



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
