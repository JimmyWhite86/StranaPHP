<?php

# Funzione per connettersi al DataBase.
# Il nome del DB deve essere riportato in un secondo momento all'interno del codice.
function connetti($db) {
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $conn = mysqli_connect ($dbserver, $dbuser, $dbpass, $db);
    return $conn;
}

# Funzione cerca utente
function cercaUtente ($username) {
  $conn = connetti("whitecar");

  if (!$conn) {
    die ("Connessione fallita: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM utenti WHERE username = '$username'"; #Seleziono tutti i campi del record dove username corrisponde a $username
  $tmp = mysqli_query($conn, $sql);

  if (mysqli_num_rows($tmp) != 0) {
    $row = mysqli_fetch_assoc($tmp); #Recupera la riga del risultato come array associativo.
    mysqli_close($conn);
    return $row;
  }

  else {
    mysqli_close ($conn);
    return false;
  }

}






?>