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

?>
