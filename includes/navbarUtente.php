<?php
#-----------------------------------------------------------------
  # Funzione per visualizzare la navBar utenti non loggati
  function normalNavBar($nomePagina) { ?>
    <nav class="navbar navbar-expand-lg bg-nero" role="navigation" aria-label="menù di navigazione">
      <a href="#mioMain" class="skip text-center" tabindex="0">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->
      
      <div class="container-fluid">
        
        <a class="navbar-brand fontstranaBase" href="index.php">
          <img src="Immagini/Logo_Stranamore_01.jpg" class="d-inline-block align-center"
               alt="Logo dell'associazione culturale Stranamore">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Apri o chiudi la navigazione">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse fontNav" id="navbarNav">
          <div class="d-flex justify-content-center flex-grow-1">
            
            <ul class="navbar-nav" id="myNavBar">
              <?php
                $links = [
                  "index" => "Home",
                  "chi_siamo" => "Chi Siamo",
                  "la_cucina" => "La Cucina",
                  "eventi" => "Eventi",
                  "gallery" => "Gallery",
                  "contatti" => "Contatti"
                ];
                $ultimoElemento = array_key_last($links); // Prendo l'ultimo elemento dell'array che contiene i link _ https://www.php.net/manual/it/function.array-key-last.php
                foreach ($links as $nomeLink => $testoLink) {
                  $isActive = ($nomePagina == $nomeLink);?>
                  <li class="nav-item">
                    <a class="nav-link <?php echo htmlspecialchars(statoLink($nomePagina, $nomeLink), ENT_QUOTES, 'UTF-8'); ?>"
                       href="<?= htmlspecialchars($nomeLink, ENT_QUOTES, 'UTF-8') ?>.php"
                       aria-label="<?= htmlspecialchars($testoLink, ENT_QUOTES, 'UTF-8') ?>"
                       <?= $isActive ? 'aria-current="page"' : ''?>>
                       <?= htmlspecialchars($testoLink, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                  </li>
                  <?php
                  if ($nomeLink != $ultimoElemento) { ?> <!-- Se non è l'ultimo elemento, aggiungo il separatore -->
                    <li class="nav-item">
                      <span class="mioSpanNav" aria-hidden="true">|</span>
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
              <span class="visually-hidden">Login</span>
            </a>
          </div>
        
        </div>
      </div>
    </nav>
    <?php
  }
  #-----------------------------------------------------------------

?>