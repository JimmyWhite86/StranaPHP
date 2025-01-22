<?php
  
  #------------------------------------------------------------------#
  #----- FUNZIONI PHP PER LA CREAZIONE DINAMICA DI PAGINE HTML ------#
  #------------------------------------------------------------------#
  
  
  #-----------------------------------------------------------------
  # Avviso l'utente che deve essere loggato per accedere alla pagina
  function deviLoggarti () { ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center m-5 p-5">
        <h2>Devi essere loggatə per accedere a questa pagina</h2>
        <p>
          Puoi tornare alla <a href="index.php" aria-label="Home Page">home page</a>
          o cercare usare la barra di navigazione per cercare la pagina che ti serve
        </p>
      </div>
    </div>
    <?php
  }
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Avviso che utente normale sta cercando di accedere a pagine consentite solo agli amministratori
  function deviEssereAdmin ($username) { ?>
    <div class='titolo'>
      <h2>Carə <?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?> questa area è riservata agli amministratori del sistema</h2>
      <p>Puoi tornare alla <a href="index.php" aria-label="Home Page">home</a> o cercare i nostri servizi tramite la barra di navigazione</p>
    </div>
    <?php
  }
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  #Funzione per le scelte che può effettuare l'amministratore
  # TODO: Da inserire in tutte le pagine che conculdono un operazione svolta da admin
  function azioni_amministratore () {
    if (!is_admin()) {
      header("Location: index.php");
      exit();
    }
    ?>
    <div class="">
      <ul>
        <li><a href="aggiungievento.php">Aggiungi evento</a></li>
        <li><a href="eliminaevento.php">Evento</a></li>
        <!-- TODO: Inserire anche le altre opzioni-->
      </ul>
    </div>
    <?php
  }
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Funzione per stabile se il link della navBar deve avere classe "active" o "non active" per poi essere gestito con CSS
  function statoLink ($nomePagina, $nomeLink) {
    return $nomePagina == $nomeLink ? "mioActive" : "mioOver";
  }
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Funzione per visualizzare la navBar utenti non loggati
  function normalNavBar($nomePagina) { ?>
    <nav class="navbar navbar-expand-lg bg-nero">
      <a href="#mioMain" class="skip text-center" tabindex="0">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->

      <div class="container-fluid">
        <a class="navbar-brand fontstranaBase" href="index.php">
          <img src="Immagini/Logo_Stranamore_01.jpg" class="d-inline-block align-center"
               alt="Logo dell'associazione culturale Stranamore">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fontNav" id="navbarNav" role="navigation" aria-label="main navigation">
          <div class="d-flex justify-content-center flex-grow-1">

            <ul class="navbar-nav" id="myNavBar">
              <?php
                $links = [
                  "index" => "Home",
                  "chisiamo" => "Chi Siamo",
                  "lacucina" => "La Cucina",
                  "eventi" => "Eventi",
                  "gallery" => "Gallery",
                  "contatti" => "Contatti"
                ];
                $ultimoElemento = array_key_last($links); // Prendo l'ultimo elemento dell'array che contiene i link _ https://www.php.net/manual/it/function.array-key-last.php
                foreach ($links as $nomeLink => $testoLink) { ?>
                  <li class="nav-item">
                    <a class="nav-link <?php echo htmlspecialchars(statoLink($nomePagina, $nomeLink), ENT_QUOTES, 'UTF-8'); ?>"
                       aria-current="page" href="<?= htmlspecialchars($nomeLink, ENT_QUOTES, 'UTF-8') ?>.php"
                       aria-label="<?= htmlspecialchars($testoLink, ENT_QUOTES, 'UTF-8') ?>" >
                      <?= htmlspecialchars($testoLink, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                  </li>
                  <?php
                  if ($nomeLink != $ultimoElemento) { ?> <!-- Se non è l'ultimo elemento, aggiungo il separatore -->
                    <li class="nav-item">
                      <span class="mioSpanNav">|</span>
                    </li>
                    <?php
                  }
                }
              ?>
            </ul>

          </div>

          <div>
            <a href="login.php" aria-label="login admin">
              <i class="bi bi-box-arrow-in-right pe-4 nav-link mioOver"></i>
            </a>
          </div>

        </div>
      </div>
    </nav>
    <?php
  }
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Funzione per richiamare la navBar per utenti loggati come admin
  # TODO: Colori stato link
  function adminNavBar($nomePagina) { ?>
    <nav class="navbar navbar-expand-lg bg-nero">
      <a href="#mioMain" class="skip text-center" tabindex="0">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->
      <div class="container-fluid">
        <a class="navbar-brand fontstranaBase" href="index.php">
          <img src="Immagini/Logo_Stranamore_03.jpg" class="d-inline-block align-center" alt="logo stranamore">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fontNavAdmin" id="navbarNav" role="navigation" aria-label="main navigation">
          <div class="d-flex justify-content-center flex-grow-1">
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

              <li class="nav-item dropdown d-flex align-content-center">
                <a href="gestioneEventi.php" class="nav-link">
                  Gestione Eventi
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Apri Menu</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="aggiungievento.php">Nuovo Evento</a></li>
                  <li><a class="dropdown-item" href="eliminaevento.php">Elimina Evento</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>

              <li class="nav-item dropdown d-flex align-content-center">
                <a href="gestioneCucina.php" class="nav-link">
                  Gestione Cucina
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Apri Menu</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="nuovoMenu.php">Nuovo Menù</a></li>
                  <li><a class="dropdown-item" href="eliminaMenu.php">Elimina Menù</a></li>
                  <li><a class="dropdown-item" href="aggiungiPiatto.php">Aggiungi Piatto</a></li>
                  <li><a class="dropdown-item" href="eliminaPiatto.php">Elimina Piatto</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>

              <li class="nav-item dropdown d-flex align-content-center">
                <a href="gestioneUtenti.php" class="nav-link">
                  Gestione Utenti
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Apri Menu</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="creaUtente.php">Nuovo Utente</a></li>
                  <li><a class="dropdown-item" href="eliminaUtente.php">Elimina Utente</a></li>
                </ul>
              </li>

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
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Funzione per visualizzare il footer
  function HTMLfooter ($nomePagina) { ?>

    <footer class="text-center bg-nero" aria-label="Footer principale">
      <div class="container-fluid">

        <div class="p-1 border-bottom" style="border-color: #009fb7"></div> <!-- Riga sopra footer -->

        <div class="row justify-content-center">

          <div class="col d-flex flex-column align-items-center justify-content-center">
            <p class="fontFooterSopra mb-0 mt-4">Associazione culturale e circolo ARCI</p>
            <p class="fontStranaFooter pl-3 ml-3 mt-0 mb-0">stranamore</p>
            <p class="fontFooterSotto mt-0">Promuoviamo cultura, inclusione e socialità</p>
          </div>

          <div class="p-1 border-bottom d-block d-md-none" id="separatoreFooter01" style="border-color: #009fb7"></div>

          <div class="col text-center">
            <p class="fontFooter01">Link Utili</p>
            <ul class="list-unstyled">
              
              <?php
                
                $links = [
                  "https://www.arci.it/" => "Arci Nazionale",
                  "https://www.arcitorino.it/" => "Arci Torino",
                  "https://www.arciovest.it/" => "Arci Ovest",
                ];
                
                foreach ($links as $nomeLink => $testoLink) { ?>
                  <li>
                    <a href="<?= htmlspecialchars($nomeLink, ENT_QUOTES, 'UTF-8') ?>"
                       class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                      <?= htmlspecialchars($testoLink, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                  </li>
                  <?php
                }
              
              ?>
            </ul>
          </div>

          <div class="col text-center">

            <p class="fontFooter01">Social</p>

            <a href="https://www.facebook.com/StranamorePinerolo" class="socialIcon p-2" title="Link alla pagina Facebook"
               aria-label="Vai alla pagina Facebook di Stranamore" tabindex="15">
              <i class="fa-brands fa-square-facebook fa-3x" role="img" title="Facebook icon"></i>
            </a>

            <a href="" class="socialIcon p-2" title="Link alla pagine Twitter"
               aria-label="Vai alla pagina Twitter di Stranamore" tabindex="16">
              <i class="fa-brands fa-square-x-twitter fa-3x" role="img" title="X / Twitter Icon"></i>
            </a>
            <br>

            <a href="https://www.instagram.com/stranamorepinerolo/" class="socialIcon p-2" title="Link alla pagina Instagram"
               aria-label="Vai alla pagina Instagram di Stranamore" tabindex="17">
              <i class="fa-brands fa-square-instagram fa-3x" role="img" title="Instagram icon"></i>
            </a>

            <a href="" class="socialIcon p-2" title="Link alla pagina YouTube"
               aria-label="Vai alla pagina Youtube di Stranamore" tabindex="18">
              <i class="fa-brands fa-square-youtube fa-3x" role="img" title="YouTube Icon"></i>
            </a>
          </div>

          <div class="col text-center">
            <p class="fontFooter01">Contatti</p>
            <ul class="list-unstyled">
              <li>
                <a href="https://maps.app.goo.gl/mb7UeN8NNaJD1kC78"
                   class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                  <i class="fas fa-home me-3"></i> Via Ettore Bignone, 89, 10064 Pinerolo TO
                </a>
              </li>
              <li>
                <a href="mailto:associazione.stranamore@gmail.com"
                   class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                  <i class="fa fa-envelope me-3"></i>associazione.stranamore@gmail.com
                </a>
              </li>
              <li>
                <a href="Tel:+393516230176"
                   class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
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
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Funzione per generare le card eventi
  function generaCardEventi () {
    $attivi = 2; // Seleziono tutti gli eventi, attivi e non.
    $datiEventi = ottieniListaEventi($attivi);
    
    # Genero le card:
    foreach ($datiEventi as $evento) {
      if ($evento['eliminato'] == 0) { ?>
        <div class="m-2 card col-md-4 evento-card" style="width: 20em;" data-evento="<?= date('Y-m-d', strtotime($evento['DataEvento']))?>">
          <img src="<?= $evento['Immagine']?>" class="img-fluid myImgCard mt-2" alt="Immagine evento" loading="lazy">
          <div class="card-body">
            <h3><?= $evento['NomeEvento']?></h3>
            <p><?= $evento['Descrizione']?></p>
          </div>
          <div class="card-footer">
            <p><?= date('d M Y', strtotime($evento['DataEvento'])) ?></p>
          </div>
        </div>
        <?php
      }
    }
  }
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  #Funzione per generare il menu in maniera dinamica
  function generaMenu($disponibilitaPiatto) {
    $listaPiattiDisponibili = piattiInArray($disponibilitaPiatto);
    $categorie = contaCategoriePiatti($disponibilitaPiatto);

//    Per debug
//    echo "<pre>";
//    echo "<hr>";
//    echo "generaMenu";
//    print_r($listaPiattiDisponibili);
//    echo "</pre><br><br>";
    
    $categorieOrdinate = [
      'antipasti' => "antipasti",
      'primi' => "primi",
      'secondi' => "secondi",
      'contorni' => "contorni",
      'dolci' => "dolci"
    ];
    
    foreach ($categorieOrdinate as $categoria => $titolo) {
      if ($categorie[$categoria] > 0) { ?>
        <h3 class='fontTipoPiattiMenu text-center'><?= $titolo ?></h3>
        <?php
        foreach ($listaPiattiDisponibili as $piatto) {
          if ($piatto['categoriaPiatto'] == $categoria) { ?>
            <p class='fontNomePiatto pb-0 mb-0 pl-5 ml-5 mr-5'>
              <?= $piatto['nomePiatto'] ?>
              <span class='fontPrezzoPiatto ml-3'>
                <?= $piatto['prezzoPiatto'] ?>€
              </span>
            </p>
            <?php
          }
        } ?>
        <br><hr><br>
        <?php
      }
    }
  }
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Funzione per generare dinamicamente la tabella con i piatti disponibili
  function generaTabellaPiatti($disponbilitaPiatto) {
    $listaPiattiDisponibili = piattiInArray($disponbilitaPiatto); ?>

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
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # FUNZIONI PER LA PAGINA controlla_login.php
  # Creo dinamicamente gli avvisi della pagina che viene visualizzata quando l'utente effettua il login
  #-----------------------------------------------------------------
  # Utente Loggato senza privilegi da admin
  function loginUtenteStandard ($username) { ?>
    <div class="container-fluid d-flex justify-content-center bg-giallo pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h2> Bentornatə <?= $username ?>, accesso effettuato correttamente </h2>
      </div>
    </div>
    <?php
  }
  #-----------------------------------------------------------------
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
  #-----------------------------------------------------------------
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
  #-----------------------------------------------------------------
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
  #-----------------------------------------------------------------
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
  #-----------------------------------------------------------------
  # Utente già loggato
  function utenteGiaLoggato ($username) { ?>
    <div class="container-fluid d-flex justify-content-center bg-rosso pb-4 pt-4 mt-4 mb-4">
      <div class="row bg-bianco justify-content-center col-6 text-center">
        <h2 class="m-3 p-3"> <?= $username ?>, hai già effettuato l'accesso!</h2>
      </div>
    </div>
    <?php
  }
  #-----------------------------------------------------------------
  #-----------------------------------------------------------------
  
  
  #-----------------------------------------------------------------
  # Funzione per generare la sezione head delle pagine
  function generaHeadSection() { ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Associazione culturale, APS, ARCI, promozione sociale">
    <meta name="description" content="Associazione Culturale Stranamore">
    <meta name="author" content="Bianchi Andrea">
    <meta name="robots" content="noindex, nofollow"> <!-- Utilizzato per impedire ai motori di ricerca di indicizzare la pagina -->
    <!--<meta name="robots" content="index, follow"> Una volta messo on line il sito corretto, utilizzare questo tag al posto di quello precedente -->
    <!--TODO: Da definire in ottica SEO -->
    <meta property="og:title" content="Associazione Culturale Stranamore">
    <meta property="og:description"
          content="Promuoviamo cultura, inclusione e socialità attraverso eventi, arte e creatività.
                   Scopri di più sui nostri progetti e attività.">
    <meta property="og:image" content="URL_dell_immagine_di_anteprima">
    <meta property="og:url" content="URL_del_sito_web">

    <!-- CDN POPPER JS BOOTSTRAP -->
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>-->

    <!-- CDN CSS e JS BOOTSTRAP -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>-->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Libreria per le icone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Collegamento ai miei files CSS -->
    <link href="base_css.css" rel="stylesheet" type="text/css">
    <link href="fontCSS.css" rel="stylesheet" type="text/css">

    <!-- Font Babas Neue -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!-- CDN JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- CDN Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

    <!-- Icone -->
    <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>

    <!-- Collegamento al mio modulo JS -->
    <script src="modulo.js"></script>
    <?php
  }
  #-----------------------------------------------------------------
  
  
  # -----------------------------------------------------------------
  # Funzione per generare il titolo della pagina -- TODO: inserire uno switch per assegnare dinamicamente il nome della pagina.
  #                                                 TODO: Trovare un modo per gestire eventuali sottotitoli
  function titoloDellaPagina($nomePagina) { ?>
    <div class="my-5 row justify-content-center">
      <div class="text-center">
        <h1 class="titoloPagina">log in</h1>
      </div>
    </div>
    <?php
  }
  #-----------------------------------------------------------------


  #-----------------------------------------------------------------
  # Funzione per generare la breadcrumb in modo dinamico
  function generaBreadcrumb() {
    // Struttura gerarchica delle pagine con i link
    $breadcrumbMap = [
      "homeAdmin.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"]
      ],
      "gestioneCucina.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"],
        ["label" => "Gestione Cucina", "link" => "gestioneCucina.php"]
      ],
      "nuovoMenu00.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"],
        ["label" => "Gestione Cucina", "link" => "gestioneCucina.php"],
        ["label" => "Nuovo Menu", "link" => "nuovoMenu00.php"]
      ],
      "aggiungiPiatto.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"],
        ["label" => "Gestione Cucina", "link" => "gestioneCucina.php"],
        ["label" => "Nuovo Piatto", "link" => "aggiungiPiatto.php"]
      ],
      "eliminaPiatto.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"],
        ["label" => "Gestione Cucina", "link" => "gestioneCucina.php"],
        ["label" => "Elimina Piatto", "link" => "eliminaPiatto.php"]
      ],
      "gestioneEventi.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"],
        ["label" => "Gestione Eventi", "link" => "gestioneEventi.php"]
      ],
      "aggiungievento.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"],
        ["label" => "Gestione Eventi", "link" => "gestioneEventi.php"],
        ["label" => "Nuovo Evento", "link" => "aggiungievento.php"]
      ],
      "modificaEvento.php" => [
        ["label" => "Home Admin", "link" => "homeAdmin.php"],
        ["label" => "Gestione Eventi", "link" => "gestioneEventi.php"],
        ["label" => "Modifica Evento", "link" => "modificaEvento.php"]
      ]
    ];
    
    // Recupera il nome della pagina corrente
    $currentPage = basename($_SERVER['PHP_SELF']);
    
    // Controlla se la pagina corrente è nella mappa
    if (isset($breadcrumbMap[$currentPage])) {
      $breadcrumbItems = $breadcrumbMap[$currentPage];
    } else {
      // Se la pagina non è definita, ritorna una breadcrumb di fallback
      $breadcrumbItems = [["label" => "Home Admin", "link" => "homeAdmin.php"]];
    }
    
    // Stampa la breadcrumb
    echo '<nav aria-label="breadcrumb">';
    echo '<ol class="breadcrumb">';
    
    // Genera gli elementi della breadcrumb
    $totalItems = count($breadcrumbItems);
    foreach ($breadcrumbItems as $index => $item) {
      if ($index < $totalItems - 1) {
        // Elementi non attivi con link
        echo '<li class="breadcrumb-item"><a href="' . $item['link'] . '">' . $item['label'] . '</a></li>';
      } else {
        // Ultimo elemento attivo senza link
        echo '<li class="breadcrumb-item active" aria-current="page">' . $item['label'] . '</li>';
      }
    }
    
    echo '</ol>';
    echo '</nav>';
  }
?>


  