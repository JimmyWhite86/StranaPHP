<?php
#-----------------------------------------------------------------
  # Funzione per richiamare la navBar per utenti loggati come admin
  # TODO: Dinamizzare i colori dei link a seconda dello stato
  function adminNavBar($nomePagina) { ?>
    <nav class="navbar navbar-expand-lg bg-nero">
      <a href="#mioMain" class="skip text-center" tabindex="0">Vai al contenuto principale</a> <!--Salta al contenuto principale della pagina (Accessibilità) -->
      <div class="container-fluid">
        <a class="navbar-brand fontstranaBase" href="index.php">
          <img src="<?= BASE_URL ?>Immagini/Logo_Stranamore_03.jpg" class="d-inline-block align-center" alt="logo stranamore">
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
                   aria-current="page" href="home_admin.php">
                  Home Admin
                </a>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>
              
              <li class="nav-item dropdown d-flex align-content-center">
                <a href="gestione_eventi.php" class="nav-link">
                  Gestione Eventi
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Apri Menu</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>gestione_eventi/crea_evento.php">Nuovo Evento</a></li>
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>/gestione_eventi/elimina_evento.php">Elimina Evento</a></li>
                </ul>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>
              
              <li class="nav-item dropdown d-flex align-content-center">
                <a href="gestione_cucina.php" class="nav-link">
                  Gestione Cucina
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Apri Menu</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/nuovo_menu.php">Nuovo Menù</a></li>
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/elimina_menu.php">Elimina Menù</a></li>
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/crea_piatto.php">Aggiungi Piatto</a></li>
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>gestione_cucina/elimina_piatto.php">Elimina Piatto</a></li>
                </ul>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>
              
              <li class="nav-item dropdown d-flex align-content-center">
                <a href="gestione_utenti.php" class="nav-link">
                  Gestione Utenti
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Apri Menu</span>
                </a>
                <ul class="dropdown-menu dropdownFont" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>/gestione_utenti/crea_utente.php">Nuovo Utente</a></li>
                  <li><a class="dropdown-item" href="<?= BASE_URL ?>/gestione_utenti/elimina_utente.php">Elimina Utente</a></li>
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
?>