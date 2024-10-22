<?php

# Avviso l'utente che deve essere loggato per accedere alla pagina
  function deviLoggarti () {
    echo "<div class='titolo'>";
    echo "Devi essere loggato per accedere a questa pagina";
    echo "<p>Puoi tornare alla <a href='index.php'>home</a> o cercare i nostri servizi tramite la barra di navigazione</p>";
    echo "</div>";
  }

# Avviso che utente normale sta cercando di accedere a pagine consentite solo per amministratori
  
  function deviEssereAdmin ($username) {
    echo "<div class='titolo'>";
    echo "<h2>Caro" . $username . "questa area è riservata agli amministratori del sistema</h2>";
    echo "<p>Puoi tornare alla <a href='index.php'>home</a> o cercare i nostri servizi tramite la barra di navigazione</p>";
    echo "</div>";
  }


#Funzione per le scelte che può effettuare l'amministratore
  function azioni_amministratore () {?>
    <div class="">
      <ul>
        <li><a href="aggiungievento.php">Gestisci gli utenti</a></li>
        <li><a href="eliminaevento.php">Gestisci le prenotazioni</a></li>
      </ul>
    </div>
    <?php
  }


# Funzione per stabile se il link della navBar deve avere classe "active" o "non active" per poi essere gestito con CSS
  function statoLink ($nomePagina, $nomeLink) {
    if ($nomePagina == $nomeLink) {
      $statolink = "mioActive";
    }
    else {
      $statolink = "mioOver";
    }
    return $statolink;
  }


# Funzione per visualizzare la navBar utenti non loggati
  function normalNavBar($nomePagina) { ?>
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
                <?php $nomeLink = "index"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   aria-current="page" href="index.php">
                  Home
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "chisiamo"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="chisiamo.php">
                  Chi Siamo
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "lacucina"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="lacucina.php">
                  La Cucina
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "eventi"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="eventi.php">
                  Eventi
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "contatti"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="contatti.php">
                  Contatti
                </a>
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
    <?php
  }
  
  
  
# Funzione per richiamare la navBar per utenti loggati come admin
  function adminNavBar($nomePagina) { ?>
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
                <?php $nomeLink = "index"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   aria-current="page" href="index.php">
                  Home
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "nuovoMenu"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="nuovoMenu.php">
                  Nuovo Menu
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "modificaMenu"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="modificaMenu.php">
                  Modifica Menu
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "aggiungiEvento"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="aggiungievento.php.php">
                  Aggiungi Evento
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "eliminaEvento"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="eliminaevento.php">
                  Elimina Evento
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>

              <li class="nav-item">
                <?php $nomeLink = "creaUtente"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="creaUtene.php">
                  Crea nuovo utente
                </a>
              </li>
            </ul>
          </div>

          <div class="d-flex justify-content-center flex-grow-1">

            <ul class="navbar-nav" id="myNavBar">
              <li class="nav-item">
                <?php $nomeLink = "index"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   aria-current="page" href="index.php">
                  Home
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "chisiamo"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="chisiamo.php">
                  Chi Siamo
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "lacucina"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="lacucina.php">
                  La Cucina
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "eventi"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="eventi.php">
                  Eventi
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>


              <li class="nav-item">
                <?php $nomeLink = "contatti"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="contatti.php">
                  Contatti
                </a>
              </li>
            </ul>
          </div>



          <div>
            <a href="logout.php">
              <i class="bi bi-box-left pe-4 nav-link mioOver"></i>
            </a>
          </div>

        </div>
      </div>
    </nav>
    <?php
  }

  # Funzione per visualizzare il footer
  function HTMLfooter ($nomePagina) { ?>

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
            <?php $nomeLink = "index";?>
            <a href="index.php" class="<?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>">Home</a>
          </li>
          <li>
            <?php $nomeLink = "chisiamo";?>
            <a href="chisiamo.php" class="<?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>">Chi Siamo</a>
          </li>
          <li>
            <?php $nomeLink = "lacucina";?>
            <a href="lacucina.php" class="<?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>">La Cucina</a>
          </li>
          <li>
            <?php $nomeLink = "eventi";?>
            <a href="eventi.php" class="<?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>">Eventi</a>
          </li>
          <li>
            <?php $nomeLink = "contatti";?>
            <a href="contatti.php" class="<?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>">Contatti</a>
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
<?php
  }
?>
