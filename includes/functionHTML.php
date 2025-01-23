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
  # TODO: Da inserire in tutte le pagine che concludono un operazione svolta da admin
  function azioni_amministratore () {
    if (!is_admin()) {
      header("Location: index.php");
      exit();
    }
    ?>
    <div class="">
      <ul>
        <li><a href="crea_evento.php">Aggiungi evento</a></li>
        <li><a href="elimina_evento.php">Evento</a></li>
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
        <a href="home_admin.php">Homepage per Admin</a>
        <a href="gestione_eventi.php">Gestione eventi</a>
        <a href="gestione_cucina.php">Gestione cucina</a>
        <a href="gestione_utenti.php">Gestione utenti</a>
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
  # https://stackoverflow.com/questions/2594211/simple-dynamic-breadcrumb?newreg=a6f4386b257c4a20bc19e66c1cda6629
  function generaBreadcrumb () {
    $separatore = "&raquo"; // Separatore tra le voci della breadcrumb
    $home = "Home";
    
    $path = array_filter(explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
    //    $_SERVER['REQUEST_URI'] restituisce la parte dell'URL che segue il nome del dominio
    //    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ==> Estrae solo il percorso dell'URL, ignorando query string o fragment.
    //        Query string = è la parte dell'URL che segue il punto interrogativo. Contiene i parametri della richiesta HTTP
    //        Fragment = è la parte dell'URL che segue il cancelletto. Viene utilizzato per indicare una sezione specifica della pagina.
    //    explode ==> divide il percorso in un array, separando le voci con lo "/"
    
    // Creo l'URL di base (www.miosito.it)
    //$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $base = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    //    $_SERVER['HTTPS'] ? 'https' : 'http' ==> Restituisce https o http in base al tipo di connessione
    //    $_SERVER['HTTP_HOST'] ==> Restituisce il nome dell'host del server
    //    Combina queste informazioni per creare l'URL di base
    
    // Inizializzo un array che conterrà i link della breadcrumb, inserendo il link alla home
    $breadcrumb = array("<a href=\"$base\">$home</a>");
    
    // Identifico l'ultimo elemento del percorso.
    // $ultimoElemento = end(array_keys($path)); // Riga trovata su stackoverflow, ma non funziona
    $keys = array_keys($path);
    $ultimoElemento = end($keys);
    //    Trovo l'ultimo elemento del path, per fermarmi e non aggiungere il link all'ultimo elemento della breadcrumb
    
    // Costruisco il resto della breadcrumb
    foreach ($path as $x => $crumb) {
      // Formatto il nome della voce rimuovendo l'estensione .php e sostituendo gli underscore con spazi
      $titolo = ucwords(str_replace(array(".php", "_"), array("", " "), $crumb));
      
      if ($x != $ultimoElemento) { // Se non siamo all'ultimo elemento, aggiungo il link
        $breadcrumb[] = "<a href=\"$base$crumb\">$titolo</a>";
      } else { // Se siamo all'ultimo elemento, aggiungo solo il titolo
        $breadcrumb[] = $titolo;
      }
    }
    
    // Restituisco la breadcrumb formattata
    return implode(" $separatore ", $breadcrumb);
    
  }
 
?>


  