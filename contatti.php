<?php
  session_start();
  include "includes/init.php";
  $nomePagina = "contatti";
  
  $testoDelTitolo = "mettiti in contatto con strana";
?>

<!DOCTYPE html>
<html lang="it">

<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | Contatti</title>
</head>

<body>

<!-- NAV BAR -->
<?php richiamaNavBar($nomePagina);?>

<main id="mioMain" role="main">

  <!-- "Titolo" della pagina -->
  <?php titoloDellaPagina($testoDelTitolo) ?>

  <!-- Sezione Card -->
  <div class="container-fluid bg-rosso mioContainerContatti text-center myShadowRossa">

    <div>
      <h2 class="fontTitoloSezione text-center">
        VUOI ENTRARE IN CONTATTO CON NOI?
      </h2>
      <br>
      <p class="lead text-left mx-auto">
        Siamo qui per costruire insieme una comunità più inclusiva, creativa e solidale!<br>
        Scrivici per idee, collaborazioni o semplicemente per conoscerci meglio.<br>
        Stranamore: dal 1993, un luogo dove le differenze si incontrano.
      </p>
    </div>

    <div class="row justify-content-center">

      <div class="card m-1 bg-5 myShadowNera" style="width: 18rem;">
        <i role="img" class="bi bi-envelope-at-fill fa-4x iconeRosse" aria-hidden="true"></i>
        <div class="card-body">
          <h3 class="card-title text-uppercase">Scrivici</h3>
          <p class="card-text">Manda una mail al nostro indirizzo</p>
          <p class="card-text">associazione.stranamore@gmail.com</p>
        </div>
        <div class="card-footer">
          <a href="mailto:associazione.stranamore@gmail.com" class="btn bottoneRosso bottoneBabas">Scrivici</a>
        </div>
      </div>

      <div class="card m-1 bg-5 myShadowNera" style="width: 18rem;">
        <i role="img" class="bi bi-telephone-outbound-fill fa-4x iconeGialle" aria-hidden="true"></i>
        <div class="card-body">
          <h3 class="card-title text-uppercase">Mandaci un WhatsApp</h3>
          <p class="card-text">Puoi chiedere informazioni o prenotare un tavolo scrivendo al nostro numero</p>
          <p>351 623 0176</p>
        </div>
        <div class="card-footer">
          <a href="Tel:+393516230176" class="btn bottoneGiallo bottoneBabas">Whatsappaci</a>
        </div>
      </div>

      <div class="card m-1 myShadowNera" style="width: 18rem;">
        <i role="img" class="bi bi-geo-alt-fill fa-4x iconeAzzurre" aria-hidden="true"></i>
        <div class="card-body">
          <h3 class="card-title text-uppercase">Raggiungici</h3>
          <p class="card-text">Vieni a trovarci di persona nella nostra struttura</p>
          <p class="card-text">via Ettore Bignone 89,<br>10064 Pinerolo (TO)</p>
        </div>
        <div class="card-footer">
          <a href="https://maps.app.goo.gl/4MWoWXnPmRvHGW3d9" class="btn bottoneAzzurro bottoneBabas">Raggiungici</a>
        </div>
      </div>
      
    </div>
    
  </div>
  

  <!-- Sezione Orari di Apertura -->
  <div class="container-fluid bg-giallo mioContainerContatti text-center myShadowGialla mb-2 mt-2">
    <div class="row">

      <div class="col-md-6 text-left separatoreVerticale ">
        <h2 class="fontTitoloSezione text-center">
          ORARI DI APERTURA
        </h2>
        <br>
        <p class="lead text-left mx-auto">
          Siamo aperti il<br>
          giovedì e venerdì<br>
          dalle 19:00 alle 23:00<br>
          e sabato<br>
          dalle 19:00 alle 24:00
        </p>
      </div>

      <hr class="d-md-none separatoreSpesso">

      <div class="col-md-6 text-right">
        <h2 class="fontTitoloSezione text-center">SEGUICI SUI SOCIAL</h2>
        <br>
        
        <a href="https://www.facebook.com/StranamorePinerolo" class="btn btn-social-icon btn-facebook">
          <span class="visually-hidden">Facebook</span>
          <i class="bi bi-facebook" aria-hidden="true"></i>
        </a>
        
        <a href="https://www.instagram.com/stranamorepinerolo/" class="btn btn-social-icon btn-instagram">
          <span class="visually-hidden">Instagram</span>
          <i class="bi bi-instagram" aria-hidden="true"></i>
        </a>
        
        <a href="https://youtube.com/@associazionestranamore3422?si=38eKoMVfxpJjKoiX"
           class="btn btn-social-icon btn-youtube">
          <span class="visually-hidden">YouTube</span>
          <i class="bi bi-youtube" aria-hidden="true"></i>
        </a>
      </div>

    </div>
  </div>
  
  <!-- Sezione Form -->
  <div class="container-fluid bg-azzurro mb-1 mioContainerContatti myShadowAzzurra">
    <div class="row justify-content-center">
      <div class="container contact-form border-dark rounded m-3 myShadowNera" >

        <form class="mioFormContatti" ng-app="myAppContatti" ng-controller="validateCtrl" name="formContatti"
              id="formContatti" novalidate>

          <h2 class="fontTitoloSezione text-center mb-3">lasciaci un messaggio</h2>

          <div class="row">
            <div class="col-md-6">

              <!-- NOME -->
              <div class="form-group">
                <label for="nomeFormContatti">
                  Nome<span class="mandatory">*</span>
                </label>
                <span ng-show="formContatti.nomeFormContatti.$touched && formContatti.nomeFormContatti.$error.required"
                      class="mioErrore01" role="alert">
                  Campo obbligatorio
                </span>
                <input type="text" id="nomeFormContatti" name="nomeFormContatti" class="form-control"
                       required aria-required="true" autocomplete="given-name" ng-model="nomeFormContatti"
                       ng-class="{ 'is-pristine': formContatti.nomeFormContatti.$untouched,
                                   'is-invalid': formContatti.nomeFormContatti.$touched && formContatti.nomeFormContatti.$invalid,
                                   'is-valid': formContatti.nomeFormContatti.$touched && formContatti.nomeFormContatti.$valid }">
              </div>

              <!-- EMAIL -->
              <div class="form-group">
                <label for="mailFormContatti">
                  e-mail <span class="mandatory">*</span>
                </label>
                <span ng-show="formContatti.emailFormContatti.$touched && formContatti.emailFormContatti.$error.required"
                      class="mioErrore01" role="alert">
                  Campo obbligatorio
                </span>
                <span ng-show="formContatti.emailFormContatti.$error.email" class="mioErrore01" role="alert">
                  Indirizzo e-mail non valido
                </span>
                <input type="email" autocomplete="email" id="mailFormContatti" name="emailFormContatti"
                       class="form-control" required aria-required="true" ng-model="emailFormContatti"
                       ng-class="{ 'is-pristine': formContatti.emailFormContatti.$untouched,
                                  'is-invalid': formContatti.emailFormContatti.$touched && formContatti.emailFormContatti.$invalid,
                                  'is-valid': formContatti.emailFormContatti.$touched && formContatti.emailFormContatti.$valid }">
              </div>

            </div>

            <!-- TextArea -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="textAreaContatti">
                  Il tuo messaggio<span class="mandatory">*</span>
                </label>
                <span ng-show="formContatti.textAreaContatti.$touched && formContatti.textAreaContatti.$error.required"
                      class="mioErrore01" role="alert">
                  Campo obbligatorio
                </span>
                <textarea name="textAreaContatti" id="textAreaContatti" class="form-control"
                          style="width: 100%; height: 150px;" required aria-required="true"
                          ng-model="textAreaContatti"
                          ng-class="{ 'is-pristine': formContatti.textAreaContatti.$untouched,
                                      'is-invalid': formContatti.textAreaContatti.$touched && formContatti.textAreaContatti.$invalid,
                                      'is-valid': formContatti.textAreaContatti.$touched && formContatti.textAreaContatti.$valid }">
                </textarea>
              </div>

              <!-- Bottone -->
              <!-- TODO: aggiungere un alert di conferma -->
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

</main>

<!-- Footer -->
<?php HTMLfooter("$nomePagina");?>


</body>
</html>
