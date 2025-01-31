<?php #-----------------------------------------------------------------
# Funzione per richiamare la navBar per utenti loggati come admin
# TODO: Dinamizzare i colori dei link a seconda dello stato
  
  function adminNavBar($nomePagina) { ?>
    <nav class="navbar navbar-expand-lg bg-nero" id="navbarNav" role="navigation" aria-label="Menù di navigazione principale">
      <a href="#mioMain" class="skip text-center" tabindex="0">Vai al contenuto principale</a>
      <div class="container-fluid">
        <a class="navbar-brand fontstranaBase" href="index.php">
          <img src="<?= BASE_URL ?>Immagini/Logo_Stranamore_03.jpg" class="d-inline-block align-center" alt="Logo dell'associazione culturale Stranamore">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fontNavAdmin">
          <div class="d-flex justify-content-center flex-grow-1">
            
            <ul class="navbar-nav" id="myNavBar">
              
              <li class="nav-item">
                <?php $nomeLink = "homeAdmin"; ?>
                <a class="nav-link navLinkAdmin <?php if ($nomePagina == $nomeLink) echo 'active'; ?>" aria-current="<?php if ($nomePagina == $nomeLink) echo 'page'; ?>" href="<?= BASE_URL ?>home_admin.php">
                  Home Admin
                </a>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav" aria-hidden="true">|</span>
              </li>
              
              <li class="nav-item dropdown d-flex align-content-center">
                <a href="<?= BASE_URL ?>gestione_eventi.php" class="nav-link">
                  Gestione Eventi
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdownEventi" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Apri menu gestione eventi">
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
                <a href="<?= BASE_URL ?>gestione_cucina.php" class="nav-link">
                  Gestione Cucina
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdownCucina" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Apri menu gestione cucina">
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
                <a href="<?= BASE_URL ?>gestione_utenti.php" class="nav-link">
                  Gestione Utenti
                </a>
                <a class="nav-link dropdown-toggle ps-1" href="#" id="navbarDropdownUtenti" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" aria-label="Apri menu gestione utenti">
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
            <a href="<?= BASE_URL ?>logout.php">
              <i class="bi bi-box-arrow-left pe-4 nav-link navLinkAdmin mioOver"></i>
              <span class="visually-hidden">Logout</span>
            </a>
          </div>
        </div>
      </div>
    </nav>
    
    <script>
      const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

      dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
          const dropdownMenu = toggle.nextElementSibling;
          const isExpanded = toggle.getAttribute('aria-expanded') === 'true';

          toggle.setAttribute('aria-expanded', !isExpanded);
          dropdownMenu.classList.toggle('show');

          if (!isExpanded) {
            // Focus sul primo elemento del menu
            const firstMenuItem = dropdownMenu.querySelector('.dropdown-item');
            if (firstMenuItem) {
              firstMenuItem.focus();
            }
          }
        });
      });

      // Gestione della navigazione da tastiera nei menu a tendina (esempio)
      document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.addEventListener('keydown', (event) => {
          const items = menu.querySelectorAll('.dropdown-item');
          const currentIndex = Array.from(items).indexOf(document.activeElement);

          if (event.key === 'ArrowDown') {
            event.preventDefault(); // Impedisce lo scorrimento della pagina
            const nextIndex = (currentIndex + 1) % items.length;
            items[nextIndex].focus();
          } else if (event.key === 'ArrowUp') {
            event.preventDefault(); // Impedisce lo scorrimento della pagina
            const prevIndex = (currentIndex - 1 + items.length) % items.length;
            items[prevIndex].focus();
          } else if (event.key === 'Escape') {
            menu.previousElementSibling.focus(); // Chiude il menu e riporta il focus sul pulsante
            menu.classList.remove('show');
            menu.previousElementSibling.setAttribute('aria-expanded', 'false');
          }
        });
      });
    </script>
  <?php } #----------------------------------------------------------------- ?>