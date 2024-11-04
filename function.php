<?php
# ------------------------------------
# Funzione per connettersi al DataBase.
# Il nome del DB deve essere riportato in un secondo momento all'interno del codice.
function connetti($db) {
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $conn = mysqli_connect ($dbserver, $dbuser, $dbpass, $db);
    return $conn;
}
# ------------------------------------

# ------------------------------------
# Funzione cerca utente
function cercaUtente ($username) {
  
  $conn = connetti("Strana01");
  if (!$conn) {
    die ("[cercaUtente] => Connessione fallita: " . mysqli_connect_error());
  }
  
  $sql = "SELECT * FROM User WHERE UserName = '$username'"; #Seleziono tutti i campi del record dove username corrisponde a $username
  $tmp = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($tmp) != 0) {
    $row = mysqli_fetch_assoc($tmp); #Recupera la riga del risultato come array associativo.
    mysqli_close($conn);
    return $row;
  } else {
    mysqli_close($conn);
    return false;
  }
}
# ------------------------------------

# ------------------------------------
# Restituisce informazioni su tutti gli eventi presenti in tabella eventi
function ottieniListaEventi () {
    $conn = connetti("Strana01");
    if (!$conn) {
      die ("[ottieniListaEventi] => Connessione fallita: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM Eventi ORDER BY dataEvento ASC";
    $datiEventi = mysqli_query($conn, $query);
    if(!$datiEventi) {
      die("[ottieniListaEventi] => Errore db " . mysqli_error($conn));
    }
    
    mysqli_close($conn);
    return $datiEventi;
}
# ------------------------------------

# ------------------------------------
# Funzione che richiama la nav bar in base all'utente loggato
function richiamaNavBar($nomePagina) {
    if (!isset($_SESSION['username'])) {
      normalNavBar($nomePagina);
    }
    else {
      $tipoUtente = $_SESSION['admin'];
      if ($tipoUtente == 1) {
        adminNavBar($nomePagina);
      }
      if ($tipoUtente == 0) {
        userNavBar($nomePagina);
      }
    }
}
# ------------------------------------

# ------------------------------------
# Funzione per controllare se utente loggato è amministratore o no
function controlloAdmin ($username) {
  $conn = connetti ("Strana01");
  if (!$conn) {
    die ("[controlloAdmin] => Connessione fallita: " . mysqli_connect_error());
  }
  
  $sql = "SELECT admin FROM user WHERE UserName = '$username'";
  $tmp = mysqli_query ($conn, $sql);
  $row = mysqli_fetch_assoc($tmp);
  $valoreAmministratore = $row['admin'];
  
  if ($valoreAmministratore == 1) {
    return true;
  } else {
    return false;
  }
}
# ------------------------------------

# ------------------------------------
# Funzione per eliminare un evento già salvato
function eliminaEvento ($idEvento) {
  $conn = connetti ("Strana01");
  if (!$conn) {
    die("[eliminaEvento] => Connessione fallita: " . mysqli_connect_error());
  }
  $sql = "SELECT IDEvento, NomeEvento, DataEvento FROM Eventi WHERE IDEvento='$idEvento'";
  $tmp = mysqli_query($conn, $sql);
  $nRow = mysqli_num_rows($tmp);
  if ($nRow == 0) {
    //echo "<h1>Evento non trovato $idEvento</h1>";
    return ['successo' => false, 'nomeEvento' => ''];
  }
  else {
    //ottengo i dati dell'evento per poi comunicarli all'utente
    $datiEvento = mysqli_fetch_assoc($tmp);
    $nomeEvento = $datiEvento['NomeEvento'];
    
    $sql = "UPDATE Eventi SET eliminato=TRUE WHERE IDEvento='$idEvento'";
    $tmp = mysqli_query($conn, $sql);
    if ($tmp) {
      //echo "Evento $nomeEvento (ID: $idEvento) cancellato correttamente";
      //return true;
      return ['successo' => true, 'nomeEvento' => $nomeEvento];
    }
    else {
      //echo "Errore cancellazione evento $nomeEvento (ID: $idEvento)";
      //return false;
      return ['successo' => false, 'nomeEvento' => $nomeEvento];
    }
  }
  mysqli_close($conn);
}
# ------------------------------------

# ------------------------------------
# Restituisce informazioni su tutti gli eventi presenti in tabella eventi
function ottieniListaPiattiDisponibili ()
{
  $conn = connetti("Strana01");
  if (!$conn) {
    die ("[ottieniListaPiattiDisponibili] => Connessione fallita: " . mysqli_connect_error());
  }
  
  $query = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = '1'";
  $listaPiattiDisponibili = mysqli_query($conn, $query);
  if (!$listaPiattiDisponibili) {
    die("Errore db " . mysqli_error($conn));
  }
  return $listaPiattiDisponibili;
}
# ------------------------------------

# ------------------------------------
# Funzione per ottenere le categorie dei piatti disponibili
function ottieniCategoriePiattiDisponbili () {
  $listaPiattiDisponibili = ottieniListaPiattiDisponibili();
  
  $qtyAntipasti = 0;
  $qtyPrimi = 0;
  $qtySecondi = 0;
  $qtyContorni = 0;
  $qtyDolci = 0;
  
  while ($row = mysqli_fetch_assoc($listaPiattiDisponibili)) {
    if ($row['categoriaPiatto'] == 'antipasti') {
      $qtyAntipasti++;
    }if ($row['categoriaPiatto'] == 'primi') {
      $qtyPrimi++;
    }
    if ($row['categoriaPiatto'] == 'secondi') {
      $qtySecondi++;
    }
    if ($row['categoriaPiatto'] == 'contorni'){
      $qtyContorni++;
    }
    if ($row['categoriaPiatto'] == 'dolci') {
      $qtyDolci++;
    }
  }
  
  return [
    'antipasti' => $qtyAntipasti,
    'primi' => $qtyPrimi,
    'secondi' => $qtySecondi,
    'contorni' => $qtyContorni,
    'dolci' => $qtyDolci,
    
  ];
}
# ------------------------------------

# ------------------------------------
# Funzione che trasforma i piatti disponibili in un array associativo
function piattiInArray () {
  $conn = connetti("Strana01");
  if (!$conn) {
    die("[piattiInArray] => Connessione fallita: " . mysqli_connect_error());
  }
  
  $query = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = '1'";
  $tmp = mysqli_query($conn, $query);
  
  if (!$tmp) {
    die("Errore nella query " . mysqli_error($conn));
  }
  
  $piattiDisponibili = [];
  while ($row = mysqli_fetch_assoc($tmp)) {
    $listaPiattiDisponibili[] = $row;
  }
  
  mysqli_close($conn);
  return $listaPiattiDisponibili;  //FIXME: verificare come mai l'IDE me lo segnala come arancione (ChatGPT non ha aiutato)
  
}
# ------------------------------------


?>