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

    $query = "SELECT * FROM Eventi ORDER BY dataEvento ASC"; //TODO: Forse dovrei richiamare solo eventi attivi?
    $datiEventi = mysqli_query($conn, $query); // TODO: per essere piu consistente dovrei chiamare la variabili sql e non query
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
function ottieniCategoriePiattiDisponbili () { // TODO: correggere errore battitura
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
# Funzione per eliminare un singolo piatto dal menu
  function eliminaPiatto ($idPiatto) {
    $conn = connetti ("Strana01");
    if (!$conn) {
      die("[eliminaPiatto] => Connessione fallita: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM menuCucina WHERE idPiatto='$idPiatto'";
    $tmp = mysqli_query($conn, $sql);
  
    if (!$tmp) {
      die("[eliminaPiatto] => Errore nella query di selezione: " . mysqli_error($conn));
    }
    
    $nRow = mysqli_num_rows($tmp);
    
    if ($nRow == 0) {
      return ['successo' => false, 'nomePiatto' => ''];
    } else {
        //ottengo i dati del piatto per poi comunicarli all'utente
        $datiPiatto = mysqli_fetch_assoc($tmp);
        $nomePiatto = $datiPiatto['nomePiatto'];
        
        $sql = "UPDATE menuCucina SET disponibilitaPiatto=FALSE WHERE idPiatto='$idPiatto'";
        $tmp = mysqli_query($conn, $sql);
        
        if (!$tmp) {
          die("[eliminaPiatto] => Errore nella query di aggiornamento: " . mysqli_error($conn));
        }
        if ($tmp) { // TODO: è necessario questo if? Non posso usare direttamente l'else dopo?
          return ['successo' => true, 'nomePiatto' => $nomePiatto];
        }
        else {
          return ['successo' => false, 'nomePiatto' => $nomePiatto];
        }
      }
    mysqli_close($conn);
  }
# ------------------------------------

# ------------------------------------
# Funzione per eliminare un singolo piatto dal menu
function eliminaInteroMenu () {
  $conn = connetti ("Strana01");
  if (!$conn) {
    die("[eliminaInteroMenu] => Connessione fallita: " . mysqli_connect_error());
  }
  
  $sql = "SELECT * FROM menuCucina";
  $tmp = mysqli_query($conn, $sql);
  
  if (!$tmp) {
    die("[eliminaInteroMenu] => Errore nelal query di selezione: " . mysqli_error($conn));
  }
  
  $nRow = mysqli_num_rows($tmp);
  
  if ($nRow == 0) {
    return ['successo' => false];
  } else {
    $sql = "UPDATE menuCucina SET disponibilitaPiatto = FALSE";
    $tmp = mysqli_query($conn, $sql);
    
    if (!$tmp) {
      die("[eliminaInteroMenu] => Errore nella query di aggiornamento: " . mysqli_error($conn));
    }
    if ($tmp) {
      return ['successo' => true];
    } else {
      return ['successo' => false];
    }
  }
  mysqli_close($conn);
}
# ------------------------------------


# ------------------------------------
# Funzione per verifica utente loggato come admin TODO: la prova l'ho fatta nella pagina modificaEvento. Al primo tentativo non funzionava. o la implemento o la tolgo da tutte e due le pagine
                                                    // Eventualmente provare con un if
  /*function verificaUtenteLoggato ($_SESSION) {
    if (!isset($_SESSION["username"])) {
      return 0; // Utente non loggato
    }
    else {
      $amministratore = $_SESSION["admin"];
      $username = $_SESSION["username"];
      if ($amministratore == 0) {
        return 1; // Utente loggato senza privilegi di admin
      }
      else {
        return 2; // Utente loggato come admin
      }
    }
  }*/
# ------------------------------------
# ------------------------------------
  
  
  # ------------------------------------
# Funzione per richiamare i dati dell'evento selezionato da modificare
  function eventoDaModificareSelezionato ($idEvento) {
    $conn = connetti ("Strana01");
    if (!$conn) {
      die("[eliminaEvento] => Connessione fallita: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM Eventi WHERE IDEvento='$idEvento'";
    $tmp = mysqli_query($conn, $sql);
    $nRow = mysqli_num_rows($tmp);
    if ($nRow == 0) {
      //echo "<h1>Evento non trovato $idEvento</h1>";
      return ['successo' => false, 'nomeEvento' => ''];
    }
    else {
      //ottengo i dati dell'evento per poi comunicarli all'utente
      $datiEvento = mysqli_fetch_assoc($tmp);
      mysqli_close($conn);
      return $datiEvento;
    }
  }
# ------------------------------------
  
# ------------------------------------
# Funzione per eliminare un utente
  function eliminaUtente($idUtente) {
    $conn = connetti ("Strana01");
    if(!$conn) {
      die ("[eliminaUtente] => Connessione fallita: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM User WHERE IDUser = '$idUtente'";
    $tmp = mysqli_query($conn, $sql);
    if (!$tmp) {
      die ("[eliminaUtente] => Errore nella query di selezione: " . mysqli_error($conn));
    }
    $nRow = mysqli_num_rows($tmp);
    if ($nRow == 0) {
      return ['successo' => false, 'nomeUtente' => ''];
    } else {
      // Ottengo i dati dell'utente per comunicarli all'utente
      $datiUtente = mysqli_fetch_assoc($tmp);
      $nomeUtente = $datiUtente['UserName'];
      $sql = "UPDATE User SET utenteAttivo = FALSE WHERE IDUser = '$idUtente'";
      $tmp = mysqli_query($conn, $sql);
      if (!$tmp) {
        die ("[eliminaUtente] => Errore nella query di aggiornamento" . mysqli_error($conn));
      } else {
        return ['successo' => true, 'nomeUtente' => $nomeUtente];
      }
    }
    mysqli_close($conn);
  }
  
# ------------------------------------
# Funzione per richiamare una lista di utenti
  
  function ottieniListaUtenti () {
    $conn = connetti("Strana01");
    if (!$conn) {
      die ("[ottieniListaUtenti] => Connessione fallita " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM User WHERE utenteAttivo = '1' ORDER BY IDUser ASC";
    $datiUtenti = mysqli_query($conn, $sql);
    if (!$datiUtenti) {
      die ("[ottieniListaUtenti] => Errore nella query di ricerca " . mysqli_error($conn));
    }
    mysqli_close($conn);
    return $datiUtenti;
  }

?>