<?php
  
  
  
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
      if ($tmp) {
        return ['successo' => true, 'nomePiatto' => $nomePiatto];
      }
      else {
        return ['successo' => false, 'nomePiatto' => $nomePiatto];
      }
    }
    mysqli_close($conn);
  }
  