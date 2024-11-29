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
    
    try {
      $conn = connetti();
      if (!$conn) {
        throw new PDOException("[ottieniListaEventi] => Connessione fallita: " . mysqli_connect_error());
      }
      
      // Prepara la query in base al valore di $attivi
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
      
      $smt = $conn->query($sql);
      $listaEventi = $smt->fetchAll();
      
      return $listaEventi;
      
    } catch (PDOException $e) {
      die("[cercaUtente] => Errore: " . $e->getMessage());
    }
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
    try {
      
      // Mi connetto al db
      $conn = connetti();
      if (!$conn) {
        throw new PDOException();
      }
      
      // Controllo che l'evento selezionato sia presente nel db
      $sqlCheck = "SELECT * FROM Eventi WHERE idEvento = :idEvento";
      $stmtCheck = $conn->prepare($sqlCheck);
      $stmtCheck->execute(['idEvento' => $idEvento]);
      if ($stmtCheck->rowCount() == 0) {
        return ['successo' => false, 'nomeEvento' => '']; // L'evento selezionato non è stato trovato all'interno del db
      }
      
      // ottengo i dati dell'evento
      $datiEvento = $stmtCheck->fetch();
      $nomeEvento = $datiEvento['NomeEvento'];
      //var_dump($datiEvento);
      
      // Aggiorno lo stato dell'evento a eliminato
      $sqlUpdate = "UPDATE Eventi SET eliminato = TRUE WHERE idEvento = :idEvento";
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->execute(['idEvento' => $idEvento]);
      
      // Ritorno il risultato della query di update
      if ($stmtUpdate->rowCount() > 0) {
        // Evento eliminato correttamente
        return ['successo' => true, 'nomeEvento' => $nomeEvento];
      } else {
        return ['successo' => false, 'nomeEvento' => $nomeEvento];
      }
      
    } catch (PDOException $e) {
      return ['successo' => false, 'errore' => $e->getMessage()];
    }
  }
  
  function provaEliminaEvento ($idEvento) {
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
# Funzione per ottenere contare quanti piatti appartengono ad una determinata categoria
  function contaCategoriePiatti ($attivi) {
    try {
      $listaPiattiDisponibili = piattiInArray($attivi);
      
      $categorie = [
        'antipasti' => 0,
        'primi' => 0,
        'secondi' => 0,
        'contorni' => 0,
        'dolci' => 0,
      ];
      
      foreach ($listaPiattiDisponibili as $piatto) {
        if(isset($categorie[$piatto['categoriaPiatto']])) {
          $categorie[$piatto['categoriaPiatto']]++;
        }
      }
      
      return $categorie;
    } catch (PDOException $e) {
      die ("[contaCategoriePiatti] => Errore: " . $e->getMessage());
    }
  }
# ------------------------------------



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
  try {
    $conn = connetti();
    if (!$conn) {
      throw new PDOException("[eliminaPiatto] => Connessione fallita: " . mysqli_connect_error());
    }
    
    // Controllo se il piatto esiste
    $sqlSelect = "SELECT * FROM menuCucina WHERE idPiatto= :idPiatto";
    $stmtSelect = $conn->prepare($sqlSelect);
    $stmtSelect->execute(['idPiatto' => $idPiatto]);
    
    if ($stmtSelect->rowCount() === 0) { // Il piatto non è stato trovato all'interno del db
      return ['successo' => false, 'nomePiatto' => ''];
    } else {
      
      // Recupero i dati del piatto
      $datiPiatto = $stmtSelect->fetch();
      $nomePiatto = $datiPiatto['nomePiatto'];
      
      // Aggiorno la disponibilità del piatto
      $sqlUpdate = "UPDATE menuCucina SET disponibilitaPiatto=FALSE WHERE idPiatto= :idPiatto";
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->execute(['idPiatto' => $idPiatto]);
      
      if ($stmtUpdate->rowCount() > 0) {
        return ['successo' => true, 'nomePiatto' => $nomePiatto];
      } else {
        return ['successo' => false, 'nomePiatto' => $nomePiatto];
      }
    }
  } catch (PDOException $e) {
    return ['successo' => false, 'errore' => $e->getMessage()];
  }
}
# ------------------------------------


# ------------------------------------
# Funzione per eliminare un singolo piatto dal menu
  function eliminaInteroMenu () {
    try {
      $conn = connetti();
      if (!$conn) {
        throw new PDOException("[eliminaInteroMenu] => Connessione fallita: " . mysqli_connect_error());
      }
      $sql = "UPDATE menuCucina SET disponibilitaPiatto=FALSE";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      
      if ($stmt->rowCount() > 0) {
        return ['successo' => true];
      } else {
        return ['successo' => false];
      }
      
    } catch (PDOException $e) {
      return ['successo' => false, 'errore' => $e->getMessage()];
    }
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


# ------------------------------------
# Funzione per aggiungere un piatto al menu
  function aggiungiPiatto ($nomePiatto, $descrizionePiatto, $categoriaPiatto, $prezzoPiatto, $cuoco, $disponibilitaPiatto, $dataInserimento) {
    try {
      $conn = connetti();
      
      if(!$conn) {
        die ("[aggiungiPiatto] => Connessione fallita: " . mysqli_connect_error());
      }
      
      $sqlInsert = "INSERT INTO menuCucina (nomePiatto, descrizionePiatto, categoriaPiatto, prezzoPiatto, cuoco, disponibilitaPiatto, dataInserimento)
                    VALUES (:nomePiatto, :descrizionePiatto, :categoriaPiatto, :prezzoPiatto, :cuoco, :disponibilitaPiatto, :dataInserimento)";
      $stmtInsert = $conn->prepare($sqlInsert);
      $stmtInsert->execute([
        ':nomePiatto' => $nomePiatto,
        ':descrizionePiatto' => $descrizionePiatto,
        ':categoriaPiatto' => $categoriaPiatto,
        ':prezzoPiatto' => $prezzoPiatto,
        ':cuoco' => $cuoco,
        ':disponibilitaPiatto' => $disponibilitaPiatto,
        ':dataInserimento' => $dataInserimento,
      ]);
      
      if ($stmtInsert->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
      
    } catch (PDOException $e) {
      return false;
    }
  }
# ------------------------------------


# ------------------------------------
# Funzione per creare un evento
function creaEvento($nomeEvento, $dataEvento, $descrizioneEvento, $immagine) {
  try {
    $conn = connetti();
    if(!$conn) {
      throw new Exception ("Connessione fallita: " . mysqli_connect_error() . "Numero errore: " . mysqli_connect_errno());
    }
    
    // Verifico che l'evento non sia già presente nel db
    $sqlCheck = "SELECT * FROM Evento WHERE NomeEvento = :nomeEvento AND DataEvento = :dataEvento"; // Controllo che non ci siano eventi con lo stesso nome e la stessa data. Un evento può ripetersi in date diverse.
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->execute([':nomeEvento' => $nomeEvento, ':dataEvento' => $dataEvento]);
    if ($stmtCheck->rowCount() > 0) {
      return ['successo' => false, 'messaggio' => 'Evento già presente'];
    }
    
    // Preparo la variabile per l'immagine
    $pathNameImmagine = null;
    
    // Processo l'immagine se caricata
    if (isset($immagine) && $immagine['error'] === UPLOAD_ERR_OK) {
      $immagineCaricata = caricaImmagini($immagine);
      if ($immagineCaricata['successo']) {
        $pathNameImmagine = $immagineCaricata['pathname'];
      } else {
        return ['successo' => false, 'messaggio' => $immagineCaricata['messaggio']];
      }
    }
    
    // Inserisco l'evento
    $sqlInsert = "INSERT INTO Eventi (NomeEvento, DataEvento, Descrizione, eliminato, immagine)
                  VALUES (:nomeEvento, :dataEvento, :descrizioneEvento, :eliminato, :pathNameImmagine ) ";
    $stmtInsert = $conn->prepare($sqlInsert);
    $parametri = [
      ':nomeEvento' => $nomeEvento,
      ':dataEvento' => $dataEvento,
      ':pathNameImmagine' => $pathNameImmagine,
      ':descrizioneEvento' => $descrizioneEvento,
      ':eliminato' => 0,
    ];
    $stmtInsert->execute($parametri);
    
    if ($stmtInsert->rowCount() > 0) {
      return ['successo' => true, 'messaggio' => 'Evento creato'];
    } else {
      return ['successo' => false, 'messaggio' => 'Errore creazione'];
    }
  } catch (PDOException $e) {
    return ['successo' => false, 'messaggio' => $e->getMessage()];
  }
}
# ------------------------------------


# ------------------------------------
# Funzione per importare le immagini negli eventi
function gestisciImmagine() {
  if (isset($_FILES['immagine']) && $_FILES['immagine']['error'] === 0) {
    $imageName = $_FILES['immagine']['name'];
    $imageTmp = $_FILES['immagine']['tmp_name'];
    $imageType = $_FILES['immagine']['type'];
    
    $estensioniAmmesse = ["image/jpg", "image/jpeg", "image/png"];
    if (in_array($imageType, $estensioniAmmesse)) {
      $uploadPercorso = "immagini/";
      $imagePath = $uploadPercorso . basename($imageName);
      
      if (move_uploaded_file($imageTmp, $imagePath)) {
        return $imagePath;
      } else {
        return false;
      }
    }
  }
  return null;
}
  # ------------------------------------
  
  # ------------------------------------
  # Funzione per inserire nuovo evento
function inserisciEvento($nomeEventoNew, $dataEventoNew, $descrizioneNew, $imagePath) {
  try {
    $conn = connetti();
    
    // Controllo se esistono già eventi con stessa data && stesso nome
    $sqlCheck = "SELECT COUNT(*) FROM Eventi WHERE NomeEvento = :nomeEvento AND DataEvento = :dataEvento AND eliminato = 0";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->execute([
      ':nomeEvento' => $nomeEventoNew,
      ':dataEvento' => $dataEventoNew,
    ]);
    $eventoEsiste = $stmtCheck->fetchColumn();
    if ($eventoEsiste > 0) {
      return ["successo" => false, 'messaggio' => "Evento già presente a sistema", 'codiceErrore' => 0];
    }
    
    // Inserisco il nuovo evento a sistema
    $sqlInsert = "INSERT INTO Eventi (NomeEvento, DataEvento, Descrizione, eliminato, Immagine)
                    VALUES (:nomeEvento, :dataEvento, :descrizioneEvento, :eliminato, :pathNameImmagine ) ";
    $stmtInsert = $conn->prepare($sqlInsert);
    $parametri = [
      ':nomeEvento' => $nomeEventoNew,
      ':dataEvento' => $dataEventoNew,
      ':pathNameImmagine' => $imagePath,
      ':descrizioneEvento' => $descrizioneNew,
      ':eliminato' => 0,
    ];
    try {
      $stmtInsert->execute($parametri);
    } catch (Exception $e) {
      return ['successo' => false, 'messaggio' => 'Errore: ' . $e->getMessage(), 'codiceErrore' => 1];
    }
    if ($stmtInsert->rowCount() > 0) {
      return ['successo' => true, 'messaggio' => 'Evento creato'];
    } else {
      return ['successo' => false, 'messaggio' => 'Errore creazione', 'codiceErrore' => 2];
    }
  } catch (Exception $e) {
    return ['successo' => false, 'messaggio' => $e->getMessage(), 'codiceErrore' => 3];
  }
}
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per creare un nuovo utente
  function creaUtente($usernameNew, $passwordNew) {
    try {
      $conn = connetti();
      
      // Verifico che non ci siano utenti con lo stesso username
      $sqlCheck = "SELECT COUNT(*) FROM User WHERE Username = :username AND utenteAttivo = 1";
      $stmtCheck = $conn->prepare($sqlCheck);
      $stmtCheck->execute([':username' => $usernameNew]);
      $utenteEsiste = $stmtCheck->fetchColumn();
      if ($utenteEsiste > 0) {
        return ["successo" => false, 'messaggio' => "Utente già presente a sistema", 'codiceErrore' => 0];
      }
      
      // Hash della password
      $passwordHash = password_hash($passwordNew, PASSWORD_DEFAULT); // TODO: Quale algo devo usare?
      
      // Inserisco l'utente
      $sqlInsert = "INSERT INTO User (Username, Password, admin, utenteAttivo) VALUES (:username, :password, :admin, :utenteAttivo)";
      $stmtInsert = $conn->prepare($sqlInsert);
      $parametri = [
        ':username' => $usernameNew,
        ':password' => $passwordHash,
        ':admin' => 1,
        ':utenteAttivo' => 1,
      ];
      try {
        $stmtInsert->execute($parametri);
      } catch (Exception $e) {
        return ['successo' => false, 'messaggio' => 'Errore: ' . $e->getMessage(), 'codiceErrore' => 1];
      }
      
      if ($stmtInsert->rowCount() > 0) {
        return ['successo' => true, 'messaggio' => 'Utente creato'];
      } else {
        return ['successo' => false, 'messaggio' => 'Errore creazione'];
      }
      
    } catch (Exception $e) {
      return ['successo' => false, 'messaggio' => 'Errore durante l\'esecuzione: ' . $e->getMessage()];
    }
  }

?>



