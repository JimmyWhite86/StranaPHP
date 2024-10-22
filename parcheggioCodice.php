<?php
  
  # Funzione per visualizzare la navBar utenti non loggati
  function adminNavBar($nomePagina) { ?>
    <nav class="navbar navbar-expand-lg bg-nero">
      
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
                <?php $nomeLink = "nuovoMenu"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="nuovoMenu.php">
                  Nuovo Menu
                </a>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>
              
              
              <li class="nav-item">
                <?php $nomeLink = "modificaMenu"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="modificaMenu.php">
                  Modifica Menu
                </a>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>
              
              
              <li class="nav-item">
                <?php $nomeLink = "aggiungiEvento"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="aggiungievento.php.php">
                  Aggiungi Evento
                </a>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>
              
              
              <li class="nav-item">
                <?php $nomeLink = "eliminaEvento"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="eliminaevento.php">
                  Elimina Evento
                </a>
              </li>
              
              <li class="nav-item">
                <span class="mioSpanNav">|</span>
              </li>
              
              <li class="nav-item">
                <?php $nomeLink = "creaUtente"; ?>
                <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                   href="creaUtene.php">
                  Crea nuovo utente
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
  ?>