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
  $conn = connetti("Strana01");

  if (!$conn) {
    die ("Connessione fallita: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM User WHERE UserName = '$username'"; #Seleziono tutti i campi del record dove username corrisponde a $username
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

# Restituisce informazioni su tutti gli eventi presenti in tabella eventi
function ottieniListaEventi () {
    $conn = connetti("Strana01");
    if (!$conn) {
      die ("Connessione fallita: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM Eventi";
    $datiEventi = mysqli_query($conn, $query);
    if(!$datiEventi) {
      die("Errore db " . mysqli_error($conn));
    }
    return $datiEventi;
}

# Funzione che richiama la nav bar in base all'utente loggato
function richiamaNavBar($nomePagina)  {
    if (!isset($_SESSION['username'])) {
      menuNavi($nomePagina);
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

}






?>