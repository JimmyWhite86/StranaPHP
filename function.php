<?php
# ------------------------------------
# Funzione per connettersi al DataBase.
#
  function connetti() {
    $dbname = "Strana01";
    $host = "localhost";
    $username = "root";
    $password = "root";
    $charset = "utf8mb4";
    
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
  
    try {
      $conn = new PDO($dsn, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Imposta la modalità di errore su eccezione
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Imposta il fetch mode predefinito su associativo;
      return $conn;
    } catch (PDOException $e) {
      die("Funzione connetti: Connessione fallita: " . $e->getMessage());
    }
  }
# ------------------------------------


# ------------------------------------
# Funzione cerca utente
  function cercaUtente ($username) {
    try {
      // Uso la funzione connetti() per connettermi al database
      $conn = connetti(); // Usa la funzione connetti per preparare la connessione
      
      // Preparo la query SQL
      $sql = "SELECT * FROM User WHERE UserName = :username"; // Seleziono tutti i campi del record dove username corrisponde a $username
      $stmt = $conn->prepare($sql);
      
      // Associo i parametri e lo eseguo
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->execute();
      
      // Recupero il risultato
      $utente = $stmt->fetch(); // Restituisce un singolo record
      
      // Restituisco il risultato
      return $utente ? $utente : null; // Se non trova risultati restituisce il valore null
    } catch (PDOException $e) {
        die ("Errore nella funzione cercaUtente: " . $e->getMessage());
      } finally { // Chiusura esplicita della connessione. La connessione viene altrimenti chiusa quando finisce la funzione. TODO: Lascio la chiusura esplicita?
      $conn = null;
    }
}
# ------------------------------------


# ------------------------------------
# Restituisce informazioni su tutti gli eventi presenti in tabella eventi
  function ottieniListaEventi ($attivi) {
    $conn = connetti ("Strana01");
    if (!$conn) {
      die ("[ottieniListaEventi] => Connessione fallita: " . mysqli_connect_error());
    }
    
    // Prepara la query in base al valore di $attivi
    $sql = "";
    switch ($attivi) {
      case 0: // Eventi non attivi
        $sql = "SELECT * FROM Eventi WHERE Eliminato = TRUE ORDER BY dataEvento ASC";
        break;
      case 1: // Eventi attivi
        $sql = "SELECT * FROM Eventi WHERE Eliminato = FALSE ORDER BY dataEvento ASC";
        break;
      case 2: // Tutti gli eventi
        $sql = "SELECT * FROM Eventi ORDER BY dataEvento ASC";
        break;
      default:
        die ("[ottieniListaEventi] => Valore di \$attivi non valido");
    }
    
    // Eseguo la query:
    $datiEventi = mysqli_query($conn, $sql);
    if (!$datiEventi) {
      die ("[ottieniListaEventi] => Errore db: " . mysqli_error($conn));
    }
    
    // Chiudo sessione e ritorno i dati
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
    try {
      $conn = connetti();
      $sql = "SELECT admin FROM user WHERE UserName = :username";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();
      $row = $stmt->fetch(); // Recuper il risultato della query
      if ($row && $row['admin'] == 1) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      die("Errore nella funzione controlloAdmin: " . $e->getMessage());
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
# RESTITUISCE I VALORI DEI PIATTI PRESENTI NEL DB
# A seconda del valore che viene passato nella funzione restituisce
# 0 => I piatti che sono "non attivi"
# 1 => I piatti che sono "attivi"
# 2 => Tutti i piatti, attivi e non attivi"
  function ottieniListaPiatti ($attivi) {
    try {
      $conn = connetti();
      
      switch ($attivi) {
        case 0: // Seleziono i piatti non attivi
          $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = 0";
          break;
        case 1: // Seleziono i piatti attivi
          $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = 1";
          break;
        case 2: // Seleziono tutti i piatti
          $sql = "SELECT * FROM menuCucina";
          break;
        default:
          die ("[ottieniListaPiatti] => Valore di \$attivi non valido");
      }
      
      $stmt = $conn->prepare($sql);
      $listaPiatti = $stmt->execute();
      
      return $listaPiatti;
      
    } catch (PDOException $e) {
      die ("[ottieniListaPiatti] => Errore: " . $e->getMessage());
    }
  }
  
  function provaOttieniListaPiatti ($attivi) {
    $conn = connetti("Strana01");
    if (!$conn) {
      die ("[ottieniListaPiattiDisponibili] => Connessione fallita: " . mysqli_connect_error());
    }
    
    // Preparo le query in base ai valori di attivi
    $sql = "";
    switch ($attivi) {
      case 0: // Seleziono i piatti non attivi
        $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = 0";
        break;
      case 1: // Seleziono i piatti attivi
        $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = 1";
        break;
      case 2: // Seleziono tutti i piatti
        $sql = "SELECT * FROM menuCucina";
        break;
      default:
        die ("[ottieniListaPiatti] => Valore di \$attivi non valido");
    }
    
    // Eseguo la query
    $listaPiatti = mysqli_query($conn, $sql);
    if (!$listaPiatti) {
      die ("[ottieniListaPiatti] => Errore db: " . mysqli_error($conn));
    }
    
    // Chiudo la connessione e restituisco i dati
    mysqli_close($conn);
    return $listaPiatti;
  }
# ------------------------------------


# ------------------------------------
# Funzione per ottenere contare quanti piatti appartengono ad una determinata categoria
  function contaCategoriePiatti ($attivi) {
    try {
      $listaPiattiDisponibili = ottieniListaPiatti($attivi);
      $conn = connetti();
      
      $categorie = [
        'antipasti' => 0,
        'primi' => 0,
        'secondi' => 0,
        'contorni' => 0,
        'dolci' => 0,
      ];
      
      while ($listaPiattiDisponibili) {
        if (isset($categorie[$listaPiattiDisponibili['categoriaPiatto']])) {
          $categorie[$listaPiattiDisponibili['categoriaPiatto']]++;
        }
      }
      return $categorie;
    } catch (PDOException $e) {
      die ("contaCategoriePiatti -> Errore " . $e->getMessage());
    }
  }
# ------------------------------------
  function ProvaContaCategoriePiatti ($attivi) {
    $listaPiattiDisponibili = ottieniListaPiatti($attivi);
    
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
# Funzione che trasforma i piatti disponibili in un array associativo
  function piattiInArray ($disponibilitaPiatto) {
    try {
      $conn = connetti();
      
      $sql = '';
      switch ($disponibilitaPiatto) {
        case 0:
          $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiattto = '0'";
          break;
        case 1:
          $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = '1'";
          break;
        case 2:
          $sql = "SELECT * FROM menuCucina";
          break;
        default:
          die ("[piattiInArray] => Valore di \$attivi non valido");
      }
      
      $stmt = $conn->query($sql);
      $listaPiattiInArray = $stmt->fetchAll();
      
      return $listaPiattiInArray;
      
    } catch (PDOException $e) {
      die("Piatti in array => Errore nella connessione o query: " . $e->getMessage());
    }
  }
# ------------------------------------


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


# ------------------------------------
# Funzione per richiamare una lista di utenti
  function ottieniListaUtenti ($attivi) {
    $conn = connetti("Strana01");
    if (!$conn) {
      die ("[ottieniListaUtenti] => Connessione fallita " . mysqli_connect_error());
    }
    
    // Prepara la query in base al valore di $attivi
    $sql = "";
    switch ($attivi) {
      case 0: // Utenti non attivi
        $sql = "SELECT * FROM User WHERE utenteAttivo = FALSE ORDER BY IDUser ASC";
        break;
      case 1: // Utenti attivi
        $sql = "SELECT * FROM User WHERE utenteAttivo = TRUE ORDER BY IDUser ASC";
        break;
      case 2: // Tutti gli utenti, attivi e non
        $sql = "SELECT * FROM User ORDER BY IDUser ASC";
        break;
      default:
        die ("[ottieniListaUtenti] => Valore di \$attivi non valido");
    }
    
    $datiUtenti = mysqli_query($conn, $sql);
    if (!$datiUtenti) {
      die ("[ottieniListaUtenti] => Errore nella query di ricerca " . mysqli_error($conn));
    }
    mysqli_close($conn);
    return $datiUtenti;
  }
# ------------------------------------

?>