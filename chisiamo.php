<?php
  session_start();
  $nomePagina = "chisiamo";
  include "functionHTML.php";
  include "function.php";
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
<body ng-app="myAppHome" ng-controller="myCtrl">

  <!-- NAV BAR -->
  <?php richiamaNavBar($nomePagina);?>

  <main id="mioMain" role="main">

    <!-- "Titolo" della pagina -->
    <div class="my-5 row justify-content-center">
      <div class="text-center">
        <h1 class="titoloPagina">cosa vuol dire strana</h1>
      </div>
    </div>

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
     
    <?php HTMLfooter($nomePagina);?>

</body>
</html>
