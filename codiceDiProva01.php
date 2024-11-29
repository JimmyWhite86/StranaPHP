<?php
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
  
  ?>