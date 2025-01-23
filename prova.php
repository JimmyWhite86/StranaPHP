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
  # Funzione per richiamare la navBar per utenti loggati come admin
  # TODO: Rendere responsive
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
                <span class="mioSpanNavAdmin">|</span>
              </li>

              <li class="nav-item">
                <?php $nomeLink = "gestioneCucina"; ?>
                <a class="nav-link navLinkAdmin <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="gestioneCucina.php">
                  Gestione Cucina
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                  Gestione Eventi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="aggiungievento.php">Nuovo Evento</a></li>
                  <li><a class="dropdown-item" href="eliminaevento.php">Elimina Evento</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown d-flex align-content-center">
                <a href="gestioneEventi.php" class="nav-link">
                  Gestione Eventi
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Apri Menu</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="aggiungievento.php">Nuovo Evento</a></li>
                  <li><a class="dropdown-item" href="eliminaevento.php">Elimina Evento</a></li>
                </ul>
              </li>
              
              
              <li class="nav-item">
                <span class="mioSpanNavAdmin">|</span>
              </li>

              <li class="nav-item">
                <?php $nomeLink = "gestioneEventi"; ?>
                <a class="nav-link navLinkAdmin <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="gestioneEventi.php">
                  Gestione Eventi
                </a>
              </li>

              <li class="nav-item">
                <span class="mioSpanNavAdmin">|</span>
              </li>

              <li class="nav-item">
                <?php $nomeLink = "gestioneUtenti"; ?>
                <a class="nav-link navLinkAdmin <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="gestioneUtenti.php">
                  Gestione Utenti
                </a>
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
  
  
  
  
  # -----------------------------------------------------------------
  # Funzione per generare la breadcrumb
  function generaBreadcrumb() { ?>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="homeAdmin.php">Home Admin</a></li>
        <li class="breadcrumb-item"><a href="gestioneCucina.php">Gestione Cucina</a></li>
        <li class="breadcrumb-item active" aria-current="page">Elimina Piatto</li>
      </ol>
    </nav>
    <?php
  }
?>


#-----------------------------------------------------------------
  # Funzione per generare la breadcrumb in modo dinamico
  # TODO: Cambiare nomi variabili (Mettere in ITA)
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



<?php

// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
    // This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
    

    // This will build our "base URL" ... Also accounts for HTTPS :)
    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    // Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
    $breadcrumbs = Array("<a href=\"$base\">$home</a>");

    // Find out the index for the last value in our path array
    $last = end(array_keys($path));

    // Build the rest of the breadcrumbs
    foreach ($path AS $x => $crumb) {
        // Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

        // If we are not on the last index, then display an <a> tag
        if ($x != $last)
            $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
        // Otherwise, just display the title (minus)
        else
            $breadcrumbs[] = $title;
    }

    // Build our temporary array (pieces of bread) into one big string :)
    return implode($separator, $breadcrumbs);
}

?>

<p><?= breadcrumbs() ?></p>
<p><?= breadcrumbs(' > ') ?></p>
<p><?= breadcrumbs(' ^^ ', 'Index') ?></p>