<?php
  session_start();
  
  include 'includes/init.php';
  
  $nomePagina = "chi_siamo";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Chi Siamo</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina);?>

<main id="mioMain">

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center myShadowNera">
      <h1 class="titoloPagina">cosa vuol dire strana</h1>
    </div>
  </div>

  <!-- START THE FEATURETTES -->
  <div class="bg-rosso">
    <div class="container marketing bg-bianco">

      <!--<hr class="featurette-divider">-->

      <section class="row featurette bg-bianco" aria-labelledby="chiSiamoTitolo" title="chi siamo">
        <div class="col-md-7">
          <h2 class="fontChiSiamo01 ombraFont" id="chiSiamoTitolo">
            chi siamo
          </h2>
          <p class="lead">
            Stranamore è un'Associazione No Profit fondata nel 1993 e affiliata al circuito ARCI.
            Il nostro obiettivo è quello di promuovere iniziative sociali, culturali, ambientaliste, artistiche,
            ricreative e sportive. Attraverso questi progetti, ci impegniamo a creare uno spazio di dialogo e
            condivisione tra singoli e gruppi, incoraggiando l’autogestione culturale e sostenendo la comunità
            del nostro territorio.
          </p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto" src="Immagini/Staff01.JPG"
               alt="Lo staff di Stranamore nel giardino dell'associazione">
        </div>
      </section>

      <hr class="featurette-divider">

      <section class="row featurette bg-bianco" title="la nostra vision" aria-labelledby="iNostriValoriTitolo">
        <div class="col-md-7 order-md-2">
          <h2 class="fontChiSiamo01 ombraFont" id="iNostriValoriTitolo">
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
          <img class="featurette-image img-fluid mx-auto" src="Immagini/Mani_01.png"
               alt="">
        </div>
      </section>

      <hr class="featurette-divider">

      <section class="row featurette bg-bianco" title="cosa facciamo" aria-labelledby="cosaFacciamoTitolo">
        <div class="col-md-7">
          <h2 class="fontChiSiamo01 ombraFont" id="cosaFacciamoTitolo">
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
          <img class="featurette-image img-fluid mx-auto" src="Immagini/Emi_01.jpg"
               alt="Concerto dei Mahout nello scantinato dell'associazione Stranamore">
        </div>
      </section>

      <!--<hr class="featurette-divider">-->

    </div>
  </div>

  <hr>

  <section class="container-fluid d-flex justify-content-center bg-giallo" aria-labelledby="documentiTitolo" title="documenti">
    <div class="align-content-center bg-bianco text-center container marketing">
      <h3 class="text-center p-3 m-3 fontChiSiamo02 ombraFont" id="documentiTitolo">statuto e atto costitutivo</h3>
      <h4 class="lead">Da questa sezione puoi prendere visione dei documenti che danno vita alla nostra associazione.</h4>
      <br>
      <div class="text-center">
        <a href="Documenti/Statuto%202022.pdf" target="_blank" class="btn bottoneNero bottoneBabas p-3 m-3"
           aria-label="Scarica o consulta lo statuto di Stranamore in formato PDF">
          Scarica lo Statuto
        </a>
        <a href="Documenti/AttoCostitutivo93.pdf" target="_blank" class="btn bottoneNero bottoneBabas p-3 m-3"
           aria-label="Scarica o consulta l'atto costitutivo di Stranamore in formato PDF">
          Scarica l'Atto Costitutivo
        </a>
        <a href="Documenti/InfoPrivacyWix.pdf" target="_blank" class="btn bottoneNero bottoneBabas p-3 m-3"
           aria-label="Scarica l'informativa sulla privacy">
          Scarica l'Informativa Privacy
        </a>
      </div>
    </div>
  </section>

  <hr>

  <section class="container-fluid d-flex justify-content-center bg-azzurro" aria-labelledby="direttivoTitolo">
    <div class="align-content-center bg-bianco container marketing">

      <h3 class="p-3 m-3 fontChiSiamo02 text-center ombraFont" id="direttivoTitolo">il direttivo</h3>

      <h4 class="lead">
        Il nostro direttivo è composto da socə volontarə, che permettono all'associazione di esistere.
      </h4>

      <div class="col-11">
        <ul class="lead">
          <!-- TODO: Aggiornare con i nomi corretti -->
          <li>Federica Guzzo _ Presidente</li>
          <li>Tiziə 0 _ Consigliere</li>
          <li>Tiziə 1 _ Consigliere</li>
          <li>Tiziə 2 _ Consigliere</li>
          <li>Tiziə 3 _ Segretario</li>
          <li>Tiziə 4 _ Tesoriere</li>
          <li>Tiziə 5 _ Vicepresindente</li>
        </ul>

      </div>
    </div>
  </section>

</main>

<hr>

<!-- Footer -->
<?php HTMLfooter($nomePagina);?>

</body>
</html>
