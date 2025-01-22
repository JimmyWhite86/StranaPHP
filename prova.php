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
