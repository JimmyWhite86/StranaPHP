<?php
  # ------------------------------------
  # Funzione per connettersi al DataBase.
  function connetti() {
    $dbname = "Strana01";
    $host = "localhost";
    $username = "root";
    $password = "root";
    $charset = "utf8mb4";
    
    /* Parametri per hosting register */
    /*
     * $dbname = "assogz_zouwun86";
    $host = "assogz-zouwun86.db.tb-hosting.com";
    $username = "assogz_zouwun86";
    $password = "UDb5zs584V@KVAq";
    $charset = "utf8mb4";
    */
    
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
  # Funzione per sanificare input
  function sanificaInput($inputDaSanificare) {
    return htmlspecialchars(trim($inputDaSanificare ?? ''), ENT_QUOTES, 'UTF-8'); // Operatore di coalescenza nulla
  }
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione cerca utente
  function cercaUtente ($username) {
    try {
      // Validazione dell'ìnput
      if (empty($username)) {
        return ['successo' => false, 'errore' => 'Username non può essere vuoto'];
      }
      
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
      
      $stmt = $conn->query($sql);
      $listaEventi = $stmt->fetchAll();
      
      return $listaEventi;
      
    } catch (PDOException $e) {
      die("[ottieniListaEventi] => Errore: " . $e->getMessage());
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
        userNavBar($nomePagina); // Questa funzione non è al momento utilizzata. Pensata nel caso in cui si voglia creare un'area utente in un secondo momento.
      }
    }
  }
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per controllare se utente loggato è amministratore o no
  function controlloAdmin ($username) {
    try {
      $conn = connetti();
      $sql = "SELECT admin FROM User WHERE UserName = :username";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->execute();
      $row = $stmt->fetch(); // Recupero il risultato della query
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
      $conn = connetti();
      if (!$conn) {
        return ['success' => false, 'errore' => 'errore di connessione'];
      }
      
      // Validazione dell'idEvento
      if (!filter_var($idEvento, FILTER_VALIDATE_INT)) {
        return ['success' => false, 'errore' => 'id non valido'];
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
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per contare quanti piatti appartengono ad una determinata categoria
  function contaCategoriePiatti ($disponibilitaPiatto) {
    
    try {
      $listaPiattiDisponibili = piattiInArray($disponibilitaPiatto);
      
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

//      Per debug
//      echo "<pre>";
//      echo "<hr>";
//      echo "Funzione contaCategoriePiatti: <br>";
//      print_r($categorie);
//      echo "</pre><br><br>";
      
      return $categorie;
      
    } catch (PDOException $e) {
      // die ("[contaCategoriePiatti] => Errore: " . $e->getMessage());
      error_log("[contaCategoriaPiatti] => Errore: " . $e->getMessage());
      throw new RuntimeException("[contaCategoriaPiatti] => Errore: " . $e->getMessage());
    }
  }
  # ------------------------------------
  
  
  
  # ------------------------------------
  # Funzione che trasforma i piatti disponibili in un array associativo
  function piattiInArray ($disponibilitaPiatto) {
    try {
      $conn = connetti();
      
      if (!is_int($disponibilitaPiatto) || !in_array($disponibilitaPiatto, [0, 1, 2])) {
        die ("[piattiInArray] => Il valore di \$disponibilitaPiatto non è un intero");
      }
      
      switch ($disponibilitaPiatto) {
        case 0:
          $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = FALSE";
          break;
        case 1:
          $sql = "SELECT * FROM menuCucina WHERE disponibilitaPiatto = TRUE";
          break;
        case 2:
          $sql = "SELECT * FROM menuCucina";
          break;
        default:
          die ("[piattiInArray] => Valore di \$attivi non valido");
      }

//      Per debug
//      echo "<pre>";
//      echo "Esegue query: " . $sql . "<br>";
//      echo "</pre>";
      
      $stmt = $conn->query($sql);
      $listaPiattiInArray = $stmt->fetchAll();

//      Per debug
//      echo "<pre>";
//      echo "<hr>";
//      echo "Funzione piattiInArray: <br>";
//      print_r($listaPiattiInArray);
//      echo "</pre><br><br>";
//
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
  # Funzione per eliminare l'intero menu
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
  function ottieniDatiEvento ($idEvento) {
    $conn = connetti ("Strana01");
    if (!$conn) {
      return ['successo' => false, 'errore' => 'Errore di connessione'];
    }
    
    $sql = "SELECT * FROM Eventi WHERE IDEvento=:idEvento";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idEvento' => $idEvento]);
    
    if ($stmt->rowCount() === 0) {
      echo "<h1>Evento non trovato $idEvento</h1>";
      //return ['successo' => false, 'nomeEvento' => ''];
    } else {
      //ottengo i dati dell'evento per poi comunicarli all'utente
      $datiEvento = $stmt->fetch(PDO::FETCH_ASSOC);
      return $datiEvento;
    }
  }
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per richiamare i dati del piatto selezionato da modificare
  function ottieniDatiPiatto($idPiatto) {
    $conn = connetti();
    if (!$conn) {
      return ['successo' => false, 'errore' => 'Errore di connessione'];
    }
    
    $sql = "SELECT * FROM menuCucina WHERE idPiatto=:idPiatto";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['idPiatto' => $idPiatto]);
    
    if ($stmt->rowCount() === 0) {
      return ['successo' => false, 'nomePiatto' => ''];
    } else {
      $datiPiatto = $stmt->fetch(PDO::FETCH_ASSOC);
      return $datiPiatto;
    }
  }
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per eliminare un utente
  function eliminaUtente($idUtente) {
    try {
      $conn = connetti();
      if (!$conn) {
        return ['successo' => false, 'errore' => 'errore di connessione'];
      }
      
      // Controllo che l'utente selezionato sia presente nel db
      $sqlCheck = "SELECT * FROM User WHERE IDUser = :idUtente";
      $stmtCheck = $conn->prepare($sqlCheck);
      $stmtCheck->execute(['idUtente' => $idUtente]);
      if ($stmtCheck->rowCount() === 0) {
        return ['successo' => false, 'errore' => 'utente non trovato', 'idUtente' => $idUtente];
      }
      
      // Ottengo i dati dell'utente
      $datiUtente = $stmtCheck->fetch();
      $nomeUtente = $datiUtente['UserName'];
      // var_dump($datiUtente);
      
      // Aggiorno lo stato dell'utente ad eliminato
      $sqlUpdate = "UPDATE User SET utenteAttivo = FALSE WHERE IDUser = :idUtente";
      $stmtUpdate = $conn->prepare($sqlUpdate);
      $stmtUpdate->execute(['idUtente' => $idUtente]);
      
      // Ritorno il risultato della query di update
      if ($stmtUpdate->rowCount() > 0) {
        return ['successo' => true, 'nomeUtente' => $nomeUtente];
      } else {
        return ['successo' => false, 'nomeUtente' => $nomeUtente];
      }
      
    } catch (PDOException $e) {
      return ['successo' => false, 'errore' => $e->getMessage()];
    }
  }
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per richiamare una lista di utenti
  function ottieniListaUtenti ($attivi) {
    try {
      $conn = connetti();
      if (!$conn) {
        return ["successo" => false, 'errore' => 'errore di connessione'];
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
      
      $stmt = $conn->query($sql);
      $listaUtenti = $stmt->fetchAll();
      
      return $listaUtenti;
      
    } catch (PDOException $e) {
      return ['successo' => false, 'errore' => $e->getMessage()];
    }
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
      
      // Validazione input
      if (empty($nomePiatto) || empty($categoriaPiatto) || !is_numeric($prezzoPiatto) || $prezzoPiatto < 0) {
        return false;
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
  # Funzione per importare le immagini negli eventi
  function gestisciImmagine() {
    if (isset($_FILES['immagine']) && $_FILES['immagine']['error'] === 0) {
      $imageName = $_FILES['immagine']['name'];
      $imageTmp = $_FILES['immagine']['tmp_name'];
      $imageType = $_FILES['immagine']['type'];
      
      $dimensioneMassima = 1048576 * 3;
      if ($_FILES['immagine']['size'] > $dimensioneMassima) {
        return false; // Errore: dimensione troppo grande
      }
      
      $estensioniAmmesse = ["image/jpg", "image/jpeg", "image/png"];
      if (!in_array($imageType, $estensioniAmmesse)) {
        return false; // Errore: formato non supportato
      }
      
      $uploadPercorso = $_SERVER['DOCUMENT_ROOT'] . "/StranaPHP/Immagini/";
      
      // *** RIMOSSO IL BLOCCO DI CREAZIONE DELLA DIRECTORY ***
      
      $imagePath = $uploadPercorso . basename($imageName);
      
      if (move_uploaded_file($imageTmp, $imagePath)) {
        return "/Immagini/" . basename($imageName);
      } else {
        return false; // Errore durante lo spostamento del file (probabilmente directory non esistente)
      }
    }
    
    return null; // Nessuna immagine caricata
  }
  # ------------------------------------
  
  # ------------------------------------
  # Funzione per inserire nuovo evento
  function inserisciEvento($nomeEventoNew, $dataEventoNew, $descrizioneNew, $imagePath) {
    try {
      $conn = connetti();
      if (!$conn) {
        return ["successo" => false, 'errore' => 'errore di connessione', 'codiceErrore' => 3];
      }
      
      // Controllo che i campi non siano vuoti
      if (empty($nomeEventoNew) || empty($dataEventoNew) || empty($imagePath)) {
        return ["successo" => false, 'errore' => 'i campi non sono stati compilati'];
      }
      
      // Sanifico gli input
      $nomeEventoNew = sanificaInput($nomeEventoNew);
      $dataEventoNew = sanificaInput($dataEventoNew);
      $descrizioneNew = sanificaInput($descrizioneNew);
      
      // Controllo se esistono già eventi con stessa data && stesso nome
      $sqlCheck = "SELECT COUNT(*) FROM Eventi WHERE NomeEvento = :nomeEvento AND DataEvento = :dataEvento AND eliminato = 0";
      $stmtCheck = $conn->prepare($sqlCheck);
      $stmtCheck->execute([
        ':nomeEvento' => $nomeEventoNew,
        ':dataEvento' => $dataEventoNew,
      ]);
      $eventoEsiste = $stmtCheck->fetchColumn();
      if ($eventoEsiste > 0) {
        return ["successo" => false, 'errore' => "Evento già presente a sistema", 'codiceErrore' => 0];
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
        ':eliminato' => 0, ];
      try {
        $stmtInsert->execute($parametri);
      } catch (Exception $e) {
        return ['successo' => false, 'errore' => 'Errore: ' . $e->getMessage(), 'codiceErrore' => 1];
      }
      if ($stmtInsert->rowCount() > 0) {
        return ['successo' => true, 'messaggio' => 'Evento creato'];
      } else {
        return ['successo' => false, 'errore' => 'Errore creazione', 'codiceErrore' => 2];
      }
    } catch (Exception $e) {
      return ['successo' => false, 'errore' => $e->getMessage(), 'codiceErrore' => 3];
    }
  }
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per creare un nuovo utente
  function creaUtente($usernameNew, $passwordNew) {
    try {
      $conn = connetti();
      if (!$conn) {
        return ['successo' => false, 'messaggio' => 'errore di connessione', 'codiceErro' => 3];
      }
      
      // Sanifico lo username
      $usernameNew = sanificaInput($usernameNew);
      
      // Verifico che non ci siano utenti con lo stesso username
      $sqlCheck = "SELECT COUNT(*) FROM User WHERE Username = :username AND utenteAttivo = 1";
      $stmtCheck = $conn->prepare($sqlCheck);
      $stmtCheck->execute([':username' => $usernameNew]);
      $utenteEsiste = $stmtCheck->fetchColumn();
      if ($utenteEsiste > 0) {
        return ["successo" => false, 'messaggio' => "Utente già presente a sistema", 'codiceErrore' => 0];
      }
      
      // Hash della password
      $passwordHash = password_hash($passwordNew, PASSWORD_DEFAULT);
      
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
        return ['successo' => false, 'messaggio' => 'Errore creazione', 'codiceErrore' => 2];
      }
      
    } catch (Exception $e) {
      return ['successo' => false, 'messaggio' => 'Errore durante l\'esecuzione: ' . $e->getMessage()];
    }
  }
  # ------------------------------------
  
  
  # ------------------------------------
  # Funzione per validare gli indirizzi email
  # toDO: Funzione ancora da implementare
  function validaIndirizzoEmail($indirizzoEmail) {
    // Rimuovo caratteri
    $emailSanificata = filter_var($indirizzoEmail, FILTER_SANITIZE_EMAIL);
    
    // Valido l'indirizzo email
    if (!filter_var($emailSanificata, FILTER_VALIDATE_EMAIL)) {
      return ['successo' => false, 'messaggio' => 'Indirizzo email non valido'];
    } else {
      return ['successo' => true, 'messaggio' => 'Indirizzo email valido'];
    }
  }
?>



