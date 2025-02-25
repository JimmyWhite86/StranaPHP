<?php
    
    #------------------------------------------------------ #
    # FUNZIONI PHP PER LA CREAZIONE DINAMICA DI PAGINE HTML #
    #------------------------------------------------------ #
    
    
    #-----------------------------------------------------------------
    # Avviso l'utente che deve essere loggato per accedere alla pagina
    function deviLoggarti () { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione">Devi essere loggatə per accedere a questa pagina</h2>
          <a href="<?= BASE_URL?>/login.php" class="btn bottoneAzzurro bottoneBabas w-auto mx-auto d-block">LOGIN</a>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    
    
    #-----------------------------------------------------------------
    # Avviso che utente normale sta cercando di accedere a pagine consentite solo agli amministratori
    function deviEssereAdmin ($username) { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione">Devi essere admin per accedere a questa pagina</h2>
          <a href="<? BASE_URL ?>/index.php" class="btn bottoneAzzurro bottoneBabas w-auto mx-auto d-block">HOME</a>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    
    
    #-----------------------------------------------------------------
    # Funzione per stabile se il link della navBar deve avere classe "active" o "non active" per poi essere gestito con CSS
    function statoLink($nomePagina, $nomeLink ) {
        if ($nomePagina == $nomeLink) {
            return "mioActive";
        }
        return "nav-link";
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
              <div class="m-2 card col-md-4 evento-card d-flex flex-column myShadowBianca" style="width: 20em;"
                   data-evento="<?= date('Y-m-d', strtotime($evento['DataEvento']))?>">

                <div class="">
                  <p class="dataEvento mb-0"><?= date('d M Y', strtotime($evento['DataEvento'])) ?></p>
                  <p class="orarioEvento"><?= date('H:i', strtotime($evento['orarioEvento'])) ?></p>
                </div>

                <img src="<?= BASE_URL . $evento['Immagine']?>" class="img-fluid myImgCard mt-2" alt="" loading="lazy"
                  aria-hidden="true">

                <div class="card-body">
                  <h3 class="titoloEvento"><?= $evento['NomeEvento']?></h3>
                </div>

                <div class="card-footer mt-auto">
                  <button class="btn bottoneAzzurro" onclick="toggleDescrizione(this)">SCOPRI DI PIU'</button>
                  <p class="descrizioneEvento" style="display: none;"> <?= $evento['Descrizione'] ?></p>
                </div>

              </div>
                <?php
            }
        }
    }
    #-----------------------------------------------------------------
    
    
    #-----------------------------------------------------------------
    #Funzione per generare il menu della cucina in maniera dinamica
    function generaMenu($disponibilitaPiatto) {
        $listaPiattiDisponibili = piattiInArray($disponibilitaPiatto);
        $categorie = contaCategoriePiatti($disponibilitaPiatto);
        
        $categorieOrdinate = [
            'antipasti' => "antipasti",
            'primi' => "primi",
            'secondi' => "secondi",
            'contorni' => "contorni",
            'dolci' => "dolci"
        ];
        
        $ultimaCategoria = end($categorieOrdinate);
        foreach ($categorieOrdinate as $categoria => $titolo) {
            if ($categorie[$categoria] > 0) { ?>
              <h2 class='fontTipoPiattiMenu text-center ombraFont'><?= $titolo ?></h2>
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
                }
                if ($categoria !== $ultimaCategoria) { ?>
                  <!--<br><i class="fa-regular fa-plate-utensils"></i><br>-->
                  <img src="<?= BASE_URL?>/Immagini/lineaSeparazioneMenu.png"  class="separatoreMenu" alt="">
                  <!-- <br><br><br>-->
                    <?php
                }
            }
        }
    }
    #-----------------------------------------------------------------
    
    
    #-----------------------------------------------------------------
    # Funzione per generare dinamicamente la tabella con i piatti disponibili
    function generaTabellaPiatti($disponbilitaPiatto) {
        $listaPiattiDisponibili = piattiInArray($disponbilitaPiatto); ?>

      <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle myShadowNera table-hover">
          <thead class="intestazioneTabella">
          <tr class="intestazioneTabella text-uppercase">
            <th class="intestazioneTabella miaColonnaImmagineTabella">ID Piatto</th>
            <th class="intestazioneTabella">Nome Piatto</th>
            <th class="intestazioneTabella">Prezzo</th>
            <th class="intestazioneTabella">Categoria</th>
            <th class="intestazioneTabella miaColonnaImmagineTabella">Cuoco</th>
            <th class="intestazioneTabella">Data inserimento</th>
            <th class="intestazioneTabella">Seleziona</th>
          </tr>
          </thead>
  
          <tbody>
          <?php foreach ($listaPiattiDisponibili as $piatto) { ?>
            <tr>
              <td class="miaColonnaImmagineTabella"><?= $piatto['idPiatto']?></td>
              <td><?= $piatto['nomePiatto']?></td>
              <td><?= $piatto['prezzoPiatto']?></td>
              <td><?= $piatto['categoriaPiatto']?></td>
              <td class="miaColonnaImmagineTabella"><?= $piatto['cuoco']?></td>
              <td><?= $piatto['dataInserimento']?></td>
              <td class="text-center">
                <label for="piattoSelezionatoElimina<?=$piatto['idPiatto']?>" class="visually-hidden">
                  Selezione <?= $piatto['nomePiatto'] ?>
                </label>
                <input type="radio" name="piattoSelezionatoElimina" id="piattoSelezionatoElimina<?=$piatto['idPiatto']?>" value="<?= $piatto['idPiatto'] ?>">
              </td>
            </tr>
              <?php
          }
          ?>
  
          </tbody>
        </table>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    
    
    #-----------------------------------------------------------------
    # FUNZIONI PER LA PAGINA controlla_login.php
    # Creo dinamicamente gli avvisi della pagina che viene visualizzata quando l'utente effettua il login
    #-----------------------------------------------------------------
    # Utente Loggato senza privilegi da admin
    function loginUtenteStandard ($username) { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione">Accesso effettuato correttamente</h2>
          <h3>Bentornatə <?= $username ?></h3>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    #Utente loggato con privilegi da admin
    function loginUtenteAdmin ($username) { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione fontVerde">Accesso effettuato correttamente</h2>
          <h3>Bentornatə <?= $username ?></h3>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    # Utente ha inserito password errata
    function inseritoPswErrata () {   ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione fontRosso">La password inserita non è corretta</h2>
          <p>Prova a effettuare nuovamente l'accesso</p>
          <a href="<?= BASE_URL?>/login.php" class="btn bottoneAzzurro bottoneBabas w-auto mx-auto d-block">LOGIN</a>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    # Il nome utente inserito durante il login non è stato trovato nel db
    function nomeUtenteNonTrovato () { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione fontRosso">Il nome utente da te inserito è errato</h2>
          <p>Prova a effettuare nuovamente l'accesso</p>
          <a href="<?= BASE_URL?>/login.php" class="btn bottoneAzzurro bottoneBabas w-auto mx-auto d-block">LOGIN</a>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    # Il form non è stato compilato correttamente
    function erroreCompilazioneForm () { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione fontRosso">Ci sono stati dei problemi</h2>
          <p>Prova a effettuare nuovamente l'accesso</p>
          <a href="<?= BASE_URL?>/login.php" class="btn bottoneAzzurro bottoneBabas w-auto mx-auto d-block">LOGIN</a>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    # Utente già loggato
    function utenteGiaLoggato ($username) { ?>
      <div class="container-fluid d-flex justify-content-center bg-rosso py-4 my-4 myShadowRossa">
        <div class="row bg-bianco col-10 col-sm-6 text-center my-5 py-5 myShadowNera rounded-3">
          <h2 class="fontTitoloSezione fontRosso">Hai già effettuato l'accesso</h2>
        </div>
      </div>
        <?php
    }
    #-----------------------------------------------------------------
    #-----------------------------------------------------------------
    
    
    # -----------------------------------------------------------------
    # Funzione per generare il titolo della pagina
    # Al momento usato solo per la pagina di login
    function titoloDellaPagina($testoDelTitolo) { ?>
      <div class="my-5">
        <div class="text-center myShadowNera">
          <h1 class="titoloPagina px-2"><?= $testoDelTitolo ?></h1>
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


  