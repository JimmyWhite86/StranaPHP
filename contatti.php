<?php
  session_start();
  $nomePagina = "contatti";
  include "function.php";
  include "functionHTML.php";
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

<main id="mioMain" role="main">

  <!-- "Titolo" della pagina -->
  <div class="my-5 row justify-content-center">
    <div class="text-center">
      <h1 class="titoloPagina">mettiti in contatto con strana</h1>
    </div>
  </div>


  <!-- Sezione Card -->
  <div class="container-fluid bg-giallo text-center mioContainerContatti">
    <!--<h3 class="mioMargin01 fontContatti01">mettiti in contatto con noi!</h3>-->
    <p class="testoHome">
      Vuoi entrare in contatto con noi?<br>
      Siamo qui per costruire insieme una comunità più inclusiva, creativa e solidale!<br>
      Scrivici per idee, collaborazioni o semplicemente per conoscerci meglio.<br>
      Stranamore: dal 1993, un luogo dove le differenze si incontrano.
    </p>

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

  <!-- Footer -->
  <?php HTMLfooter("$nomePagina");?>

</main>

</body>
</html>
