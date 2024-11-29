<?php
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
  
  // -------------------------------
  
  function eliminaUtente($idUtente) {
    $conn = connetti ();
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
  ?>



