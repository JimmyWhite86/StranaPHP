<?php
  session_start();
  
  include 'includes/init.php';
  
  $nomePagina = "index";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Home</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina);?>


<main id="mioMain">

  <h1 class="visually-hidden">Pagina principale dell'associazione culturale "Stranamore"</h1>
  
  <!-- Hero Section -->
  <section class="hero-section bg-nero text-center text-white d-flex align-items-center" role="banner">
    <h2 class="visually-hidden">Hero Section di Stranamore</h2>
    <div class="container hero-content" ng-app="myAppHome" ng-controller="myCtrl">
      <div class="row justify-content-center">
        <p class="m-0 p-0 fontHeroSopra hidden" id="heroSopra" >Associazione Culturale e Circolo ARCI</p>
        <p class="px-1 fontHeroCentro" id="heroCentro">
          <!--<span class="visually-hidden">stranamore</span>--> <!-- Se metto questa riga Wave mi da un errore di contrasto-->
        </p>
        <img src="Immagini/Logo_Stranamore_01.jpg" class="img-fluid myImgHero" alt="Logo dell'associazione culturale Stranamore">
        <p class="m-0 p-0 pb-2 fontHeroSotto hidden" id="heroSotto">PROMUOVIAMO CULTURA, INCLUSIONE E SOCIALITA'</p>
      </div>
    </div>
  </section>
  
  
  <!-- sessione centrale -->
  <div class="bg-giallo container-fluid justify-content-center mioFlowRoot">

    <!-- Chi siamo breve -->
    <div class="containerIndexCentrale container-fluid justify-content-center bg-nero w-75 mt-2 rounded-3 myShadowBianca"
         style="color: white;">
      <h3 class="pt-5 text-center fontStranaTitoli" id="chiSiamoIndex">chi siamo</h3>
      <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8">
          <p class="testoHome">
            Siamo un'associazione di promozione sociale affiliata ad ARCI, impegnata nella diffusione di cultura, arte
            e opportunità di socializzazione sul nostro territorio. Organizziamo attività, eventi e iniziative che mirano
            a creare spazi inclusivi e partecipativi, dove le persone possano incontrarsi, condividere idee e coltivare
            passioni comuni. Crediamo nella cultura come strumento di crescita individuale e collettiva, e ci impegniamo
            a valorizzare la comunità attraverso l'arte, la creatività e il dialogo.
          </p>
          <div class="text-end mb-3">
            <a href="chi_siamo.php" class="btn bottoneGiallo2 bottoneBabas" aria-label="Scopri di più su chi siamo">
              Conoscici meglio
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- La cucina breve -->
    <div class="containerIndexCentrale container-fluid justify-content-center bg-nero w-75 mt-2 mb-2 rounded-3 myShadowBianca"
         style="color: white;">
      <h3 class="pt-5 text-center fontStranaTitoli" id="laCucinaIndex">la cucina</h3>
      <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8">
          <p class="testoHome">
            Offriamo un servizio mensa e bar dedicato a tuttə lə socə, con piatti preparati utilizzando ingredienti di
            qualità. Promuoviamo la stagionalità dei prodotti e valorizziamo le eccellenze delle produzioni locali.
          </p>
          <div class="text-end mb-3">
            <a href="la_cucina.php" class="btn bottoneGiallo2 bottoneBabas" aria-label="Clicca per conoscere il menu">
              Cosa bolle in pentola
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Eventi breve -->
    <div class="containerIndexCentrale container-fluid justify-content-center bg-nero w-75 mt-2 mb-2 rounded-3 myShadowBianca"
         style="color: white;">
      <h3 class="pt-5 text-center fontStranaTitoli" id="eventiIndex">eventi</h3>
      <div class="row justify-content-center">
        <div class="col-sm-10 col-md-8">
          <p class="testoHome">
            Organizziamo incontri e dibattiti su temi di attualità, coinvolgendo esperti e figure autorevoli per
            aiutarci a comprendere meglio cosa accade nel mondo.
            Ospitiamo presentazioni di libri, ma non ci fermiamo qui: ci piace anche divertirci con concerti e dj set,
            perché non siamo sempre così seri.
          </p>
          <div class="text-end mb-3">
            <a href="eventi.php" class="btn bottoneBabas bottoneGiallo2 ">Guarda i prossimi eventi</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Card Section -->
  <section>
    <div class="container-fluid text-center bg-azzurro">
      <div class="row justify-content-center">

        <div class="m-2 card col-md-4 myShadowNera" style="width: 20em;" role="region" aria-label="Iscriviti alla nostra newsletter">
          <i class="bi bi-envelope-paper-heart fa-10x iconeRosse"></i>
          <div class="card-body">
            <h4>Iscriviti alla nostra NewsLetter</h4>
            <p>Rimani aggiornato sulle nostre iniziative e non perderti nessun evento!</p>
            <p>
              La nostra NewsLetter ha cadenza settimanale e viene usata per tenerti informato sugli eventi organizzati
              dal nostro circolo.
            </p>
          </div>
          <div class="card-footer">
            <a href="https://associazione-stranamore.voxmail.it/user/register" class="btn bottoneRosso"
               aria-label="Iscriviti alla newsletter per stranamore">
              ISCRIVITI
            </a>
          </div>
        </div>

        <div class="m-2 card col-md-4 myShadowNera" style="width: 20em;" role="region" aria-label="Dona il tuo 8x1000">
          <i class="bi bi-piggy-bank fa-10x iconeGialle"></i>
          <div class="card-body">
            <h4>Dona il tuo 5x1000</h4>
            <p>Tutte le nostre iniziative sono volte ad autofinanziarci</p>
            <p>Il tuo contributo per noi è davvero importante.</p>
          </div>
          <div class="card-footer">
            <a href="" class="btn bottoneGiallo" aria-label="Clicca per donare il tuo 8x1000">DONA</a>
          </div>
        </div>

        <div class="m-2 card col-md-4 myShadowNera" style="width: 20em;" role="region" aria-label="Proponici un evento">
          <i class="bi bi-mic-fill fa-10x iconeAzzurre"></i>
          <div class="card-body">
            <h4>Vuoi proporre un dibattito o un evento?</h4>
            <p>Usa il form per contattarci</p>
            <p>Siamo sempre alla ricerca di incontri, musica e spettacoli che possano animare il nostro circolo.
              Facci sapere la tua proposta.</p>
          </div>
          <div class="card-footer">
            <a href="contatti.php" class="btn bottoneAzzurro" aria-label="Clicca per contattarci">CONTATTACI</a>
          </div>
        </div>

      </div>
    </div>
  </section>
  
</main>

  <!-- Footer -->
  <?php HTMLfooter($nomePagina);?>

</body>
</html>

