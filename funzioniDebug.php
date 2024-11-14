<?php
  
  
  function ottieniListaFunzioni () {
    $conn = connetti ("Strana01");
    if (!$conn) {
      die ("[ottieniListaFunzioni] => Connessione fallita: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM funzioniDebug";
    $listaFunzioni = mysqli_query($conn, $sql);
    if (!$listaFunzioni) {
      die("[ottieniListaFunzioni] => Errore db " . mysqli_error($conn));
    }
    mysqli_close($conn);
    return $listaFunzioni;
  }
  

function ripopolaEventi () {
  $conn = connetti ("Strana01");
  if (!$conn) {
    die ("[popolaEventi] => Connessione fallita: " . mysqli_connect_error()) ;
  }
  
  $sql = "UPDATE Eventi SET eliminato= TRUE";
  $tmp = mysqli_query($conn, $sql);
  if ($tmp) {
    return true;
  } else {
    return false;
  }
  mysqli_close($conn);
}



?>

