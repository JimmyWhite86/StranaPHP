<?php

# Avviso l'utente che deve essere loggato per accedere alla pagina
function deviLoggarti () {
  echo "<div class='titolo'>";
    echo "Devi essere loggato per accedere a questa pagina";
    echo "<p>Puoi tornare alla <a href='index.php'>home</a> o cercare i nostri servizi tramite la barra di navigazione</p>";
    echo "</div>";
}

# Avviso che utente normale sta cercando di accedere a pagine consentite solo per amministratori

function deviEssereAdmin ($username) {
  echo "<div class='titolo'>";
    echo "<h2>Caro <?=$username?>, questa area è riservata agli amministratori del sistema</h2>";
    echo "<p>Puoi tornare alla <a href='index.php'>home</a> o cercare i nostri servizi tramite la barra di navigazione</p>";
  echo "</div>";
}

#Funzione per le scelte che può effettuare l'amministratore
#
function azioni_amministratore () {?>
  <div class="">
    <ul>
      <li><a href="aggiungievento.php">Gestisci gli utenti</a></li>
      <li><a href="eliminaevento.php">Gestisci le prenotazioni</a></li>
    </ul>
  </div>
  <?php
}

# Funzione per stabile se il link  della navBar deve avere classe "active" o "non active" per poi essere gestito con CSS
function statoLink ($nomePagina, $nomeLink) {
    if ($nomePagina == $nomeLink) {
        $statolink = "mioActive";
        return $statolink;
    }
    else {
        $statolink = "mioOver";
        return $statolink;
    }
}


# Funzione per navBar utenti non loggati
function userNavBar($nomePagina) { ?>
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
              <?php $nomeLink = "chisiamo"; ?>
              <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                href="chisiamo.php">
                Chi Siamo
              </a>
            </li>
            
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
  
            
            <li class="nav-item">
              <?php $nomeLink = "lacucina"; ?>
              <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                 href="lacucina.php">
                La Cucina
              </a>
            </li>
            
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
  
            
            <li class="nav-item">
              <?php $nomeLink = "eventi"; ?>
              <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                 href="eventi.php">
                Eventi
              </a>
            </li>
            
            <li class="nav-item"></li>
              <span class="mioSpanNav">|</span>
            </li>
  
            
            <li class="nav-item">
              <?php $nomeLink = "contatti"; ?>
              <a class="nav-link <?php $statoLink = statoLink($nomePagina, $nomeLink); echo "$statoLink"; ?>"
                 href="contatti.php">
                Contatti
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

?>
