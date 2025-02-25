<?php
  # Funzione per richiamare la navBar per utenti loggati come admin
  function adminNavBar($nomePagina) { ?>
    <nav class="navbar navbar-expand-lg bg-nero" aria-label="menù di navigazione">
      <a href="#mioMain" class="skip text-center" tabindex="0">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->
      
      <div class="container-fluid">
        
        <a class="navbar-brand fontstranaBase" href="index.php">
          <img src="<?= BASE_URL ?>Immagini/Logo_Stranamore_03.jpg" class="d-inline-block align-center"
               alt="Logo dell'associazione culturale Stranamore">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Apre o chiude la navigazione">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse fontNavAdmin" id="navbarNav">
          <div class="d-flex justify-content-center flex-grow-1">
            
            <ul class="navbar-nav" id="myNavBar">
              
              <li class="nav-item">
                <?php
                  $nomeLink = "homeAdmin";
                  $isActive = ($nomePagina == $nomeLink);
                ?>
                <a class="nav-link navLinkAdmin <?php echo htmlspecialchars(statoLink($nomePagina, $nomeLink), ENT_QUOTES, 'UTF-8'); ?>"
                   <?= $isActive ? 'aria-current="page"' : '' ?> href="<?= BASE_URL ?>home_admin.php">
                  Home Admin
                </a>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav" aria-hidden="true">|</span>
              </li>
              
              <li class="nav-item dropdown d-flex align-content-center">
                <?php
                  $nomeLink = "gestione_eventi";
                  $isActive = ($nomePagina == $nomeLink);
                ?>
                <a href="<?= BASE_URL ?>gestione_eventi.php"
                   class="nav-link navLinkAdmin <?php echo htmlspecialchars(statoLink($nomePagina, $nomeLink), ENT_QUOTES, 'UTF-8'); ?>">
                  Gestione Eventi
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdownEventi" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true"
                   aria-label="Apri menu gestione eventi" >
                  <span class="visually-hidden">Apri menu gestione eventi</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdownEventi">
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>gestione_eventi/crea_evento.php">
                      Nuovo Evento
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>/gestione_eventi/elimina_evento.php">
                      Elimina Evento
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>/gestione_eventi/modifica_evento_00.php">
                      Modifica Evento
                    </a>
                  </li>
                </ul>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav" aria-hidden="true">|</span>
              </li>
              
              <li class="nav-item dropdown d-flex align-content-center">
                <?php
                  $nomeLink = "gestione_cucina";
                  $isActive = ($nomePagina == $nomeLink);
                ?>
                <a href="<?= BASE_URL ?>gestione_cucina.php"
                   class="nav-link navLinkAdmin <?php echo htmlspecialchars(statoLink($nomePagina, $nomeLink), ENT_QUOTES, 'UTF-8'); ?>"
                   <?= $isActive ? 'aria-current="page"' : '' ?>>
                  Gestione Cucina
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdownCucina" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Apri menu gestione cucina">
                  <span class="visually-hidden">Apri menu gestione cucina</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdownCucina">
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/nuovo_menu_00.php">
                      Nuovo Menù
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/elimina_menu.php">
                      Elimina Menù
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/crea_piatto.php">
                      Aggiungi Piatto
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/elimina_piatto.php">
                      Elimina Piatto
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/modifica_piatto_00.php">
                      Modifica Piatto
                    </a>
                  </li>
                </ul>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav" aria-hidden="true">|</span>
              </li>
              
              <li class="nav-item dropdown d-flex align-content-center">
                <?php
                  $nomeLink = "gestione_utenti";
                  $isActive = ($nomePagina == $nomeLink);
                ?>
                <a href="<?= BASE_URL ?>gestione_utenti.php"
                   class="nav-link navLinkAdmin <?php echo htmlspecialchars(statoLink($nomePagina, $nomeLink), ENT_QUOTES, 'UTF-8'); ?>"
                   <?= $isActive ? 'aria-current="page"' : '' ?>>
                  Gestione Utenti
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdownUtenti" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Apri menu gestione utenti">
                  <span class="visually-hidden">Apri menu gestione utenti</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdownUtenti">
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>/gestione_utenti/crea_utente.php">
                      Nuovo Utente
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= BASE_URL ?>/gestione_utenti/elimina_utente.php">
                      Elimina Utente
                    </a>
                  </li>
                </ul>
              </li>
            
            </ul>
          </div>
          
          <div>
            <a href="<?= BASE_URL ?>logout.php" aria-label="logout admin">
              <i class="bi bi-box-arrow-left pe-4 nav-link navLinkAdmin mioOver"></i>
              <span class="visually-hidden">Logout</span>
            </a>
          </div>
        
        </div>
      </div>
    </nav>
    <?php
  }
?>