<?php
  
  # Avviso l'utente che deve essere loggato per accedere alla pagina
  function deviLoggarti () { ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
        <h2>Devi essere loggatə per accedere a questa pagina</h2>
        <p>
          Puoi tornare alla <a href="index.php">home page</a>
          o cercare usare la barra di navigazione per cercare la pagina che ti serve
        </p>
      </div>
    </div>
    <?php
  }
  
  
  # Avviso che utente normale sta cercando di accedere a pagine consentite solo per amministratori
  function deviEssereAdmin ($username) {
    echo "<div class='titolo'>";
    echo "<h2>Carə " . $username . " questa area è riservata agli amministratori del sistema</h2>";
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
          <img src="Immagini/Logo_Stranamore_01.jpg" class="d-inline-block align-center" alt="Logo Stranamore">
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
                <?php $nomeLink = "gallery"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="gallery.php">
                  Gallery
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
    <nav class="navbar navbar-expand-lg bg-giallo">

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

            <ul class="navbar-nav" id="myNavBar"> <!-- FIXME: come mai ci sono due <ul>?? -->

              <ul class="navbar-nav" id="myNavBar">

                <li class="nav-item">
                  <?php $nomeLink = "homeAdmin"; ?>
                  <a class="nav-link navLinkAdmin <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                     aria-current="page" href="homeAdmin.php">
                    Home Admin
                  </a>
                </li>

                <li class="nav-item">
                  <span class="mioSpanNav">|</span>
                </li>
                
                <li class="nav-item">
                  <?php $nomeLink = "gestioneCucina"; ?>
                  <a class="nav-link navLinkAdmin <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                     href="gestioneCucina.php">
                    Gestione Cucina
                  </a>
                </li>

                <li class="nav-item">
                  <span class="mioSpanNav">|</span>
                </li>
                
                <li class="nav-item">
                  <?php $nomeLink = "gestioneEventi"; ?>
                  <a class="nav-link navLinkAdmin <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                     href="gestioneEventi.php">
                    Gestione Eventi
                  </a>
                </li>

                <li class="nav-item">
                  <span class="mioSpanNav">|</span>
                </li>
                
                <li class="nav-item">
                  <?php $nomeLink = "gestioneUtenti"; ?>
                  <a class="nav-link navLinkAdmin <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                     href="gestioneUtenti.php">
                    Gestione Utenti
                  </a>
                </li>

                <li class="nav-item">
                  <span class="mioSpanNav">|</span>
                </li>

              </ul>

            </ul>
          </div>

          <div>
            <a href="logout.php">
              <i class="bi bi-box-arrow-left pe-4 nav-link navLinkAdmin mioOver"></i>
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
      <div class="container-fluid">
        
        <div class="p-1 border-bottom" style="border-color: #009fb7"></div> <!-- Riga sopra footer -->
  
        <div class="row justify-content-center">
  
          <div class="col d-flex flex-column align-items-center justify-content-center">
            <h1 class="fontstranaFooter pl-3 ml-3">stranamore</h1>
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
          <div class="col d-flex flex-column align-items-center justify-content-center">
            <p class="align-middle">Sito realizzato da Bianchi Andrea</p>
          </div>
        </div>
      </div>
    </footer>
    <?php
  }
  
  
  # Funzione per generare le card eventi
  function generaCardEventi () {
    $attivi = 2; // Seleziono tutti gli eventi, attivi e non.
    $datiEventi = ottieniListaEventi($attivi );
    
    # Genero le card:
    while ($row = mysqli_fetch_assoc($datiEventi)) {
      if ($row['eliminato'] == 0) { ?>
        <div class="m-2 card col-md-4 evento-card" style="width: 20em;" data-evento="<?= date('Y-m-d', strtotime($row['DataEvento']))?>">
          <img src="<?= $row['Immagine']?>" class="img-fluid myImgCard mt-2" alt="Immagine evento">
          <div class="card-body">
            <h3><?= $row['NomeEvento']?></h3>
            <p><?= $row['Descrizione']?></p>
          </div>
          <div class="card-footer">
            <p><?= date('d M Y', strtotime($row['DataEvento'])) ?></p>
          </div>
        </div>
        <?php
      }
    }
  }
  
  
  #Funzione per generare il menu in maniera dinamica
  function generaMenu() {
    $attivi = 1;
    $listaPiattiDisponibili = piattiInArray();
    $categorie = ottieniCategoriePiatti($attivi);
    
    $categorieOrdinate = [
      'antipasti' => "antipasti",
      'primi' => "primi",
      'secondi' => "secondi",
      'contorni' => "contorni",
      'dolci' => "dolci"
    ];
    
    foreach ($categorieOrdinate as $categoria => $titolo) {
      if ($categorie[$categoria] > 0) {
        echo "<h3 class='fontTipoPiattiMenu text-center'>$titolo</h3>";
        foreach ($listaPiattiDisponibili as $piatto) {
          if ($piatto['categoriaPiatto'] == $categoria) {
            echo "<p class='fontNomePiatto pb-0 mb-0 pl-5 ml-5 mr-5'>{$piatto['nomePiatto']} <span class='fontPrezzoPiatto ml-3'>{$piatto['prezzoPiatto']}€</span></p>";
          }
        }
        echo "<br><hr><br>";
      }
    }
  }
  
  
  # Funzione per generare dinamicamente la tabella con i piatti disponibili
  function generaTabellaPiattiDisponibili() {
    $listaPiattiDisponibili = piattiInArray(); ?>

    <table class="table table-striped table-bordered text-center align-midle">
      <thead class="intestazioneTabella">
      <tr class="intestazioneTabella">
        <th class="intestazioneTabella">ID Piatto</th>
        <th class="intestazioneTabella">Nome Piatto</th>
        <th class="intestazioneTabella">Prezzo</th>
        <th class="intestazioneTabella">Categoria</th>
        <th class="intestazioneTabella">Cuoco</th>
        <th class="intestazioneTabella">Data inserimento</th>
        <th class="intestazioneTabella">Seleziona per eliminare</th>
      </tr>
      </thead>

      <tbody>
      <?php foreach ($listaPiattiDisponibili as $piatto) { ?>
        <tr>
          <td><?= $piatto['idPiatto']?></td>
          <td><?= $piatto['nomePiatto']?></td>
          <td><?= $piatto['prezzoPiatto']?></td>
          <td><?= $piatto['categoriaPiatto']?></td>
          <td><?= $piatto['cuoco']?></td>
          <td><?= $piatto['dataInserimento']?></td>
          <td class="text-center">
            <input type="radio" name="piattoSelezionatoElimina" id="piattoSelezionatoElimina" value="<?= $piatto['idPiatto'] ?>">
          </td>
        </tr>
        <?php
      }
      ?>

      </tbody>
    </table>
    <?php
  }

  
  # Funzione per generare automaticamente avvisi di errore connessione
  function erroreConnessioneHTML ($conn) {?>
    <div class="my-5 row justify-content-center">
      <div class="text-center">
        <h1 class="titoloPagina">Errore di connessione</h1>
      </div>
    </div>

    <section>
      <div class="container-fluid text-center bg-rosso">
        <div class="m-5">
          <h2 class="m-3 p-3" id="titoloEventi">La connessione ha avuto problemi</h2>
          <p><?= mysqli_error($conn) ?></p>
          <a href="homeAdmin.php" class="btn btn-primary mb-3">Home Page Admin</a><br>
          <!-- <a href="eliminaPiatto.php" class="btn btn-primary mb-3">Elimina un piatto dal menu </a>-->
        </div>
      </div>
    </section>
    <?php
  }

# -------------------------------------------------------
# FUNZIONI PER LA PAGINA controlla_login.php
# Creo dinamicamente gli avvisi della pagina che viene visualizzata quando l'utente effettua il login
  
  # Utente Loggato senza privilegi da admin
  function loginUtenteStandard ($username) { ?>
    <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h2> Bentornatə <?= $username ?>, accesso effettuato correttamente </h2>
      </div>
    </div>
    <?php
  }
  
  #Utente loggato con privilegi da admin
  function loginUtenteAdmin ($username) { ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h1> Ciao <?= $username ?>! Accesso effettuato come Admin </h1>
        <hr>
        <h3></h3>
        <a href="homeAdmin.php">Homepage per Admin</a>
        <a href="gestioneEventi.php">Gestione eventi</a>
        <a href="gestioneCucina.php">Gestione cucina</a>
        <a href="gestioneUtenti.php">Gestione utenti</a>
      </div>
    </div>
  <?php
  }
  
  # Utente ha inserito password errata
  function inseritoPswErrata () {   ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h2> Hai inserito una password errata </h2>
        <hr>
        <h3>Prova nuovamente ad effettuare il login</h3>
        <a href="login.php">LogIn</a>
      </div>
    </div>
<?php
  }
  
  # Il nome utente inserito durante il login non è stato trovato nel db
  function nomeUtenteNonTrovato () { ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h2> Non abbiamo trovato lo username da te inserito </h2>
        <hr>
        <h3>Prova nuovamente ad effettuare il login</h3>
        <a href="login.php">LogIn</a>
      </div>
    </div>
<?php
  }
  
  # Il form non è stato compilato correttamente
  function erroreCompilazioneForm () { ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h2 class="m-3 p-3"> Non abbiamo trovato lo username da te inserito </h2>
        <hr>
        <h3>Prova nuovamente ad effettuare il login</h3>
        <a href="login.php">LogIn</a>
      </div>
    </div>
  <?php
  }
  
  # Utente già loggato
  function utenteGiaLoggato ($username) { ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h2 class="m-3 p-3"> <?= $username ?>, hai già effettuato l'accesso!</h2>
      </div>
    </div>
<?php
  }
?>
