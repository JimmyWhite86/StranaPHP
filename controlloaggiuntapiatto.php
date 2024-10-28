<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "aggiungiPiatto";
?>

<!DOCTYPE html>
<html lang="it">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="keyword" content="Associazione culturale, APS, ARCI, promozione sociale">
  <meta name="description" content="Associazione Culturale Stranamore">
  <meta name="author" content="Bianchi Andrea">
  
  <!-- CDN CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- JavaScript di Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <!-- Collegamento al mio file CSS -->
  <link href="base_css.css" rel="stylesheet" type="text/css">
  <!-- Libreria per le icone -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  <!-- CDN JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!-- CDN Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <!-- Icone -->
  <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>
  
  <!--  Collegamento al mio modulo JS -->
  <script src="modulo.js" type="text/javascript"></script>
  
  <!-- Font Babas Neue -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  
  <title>Stranamore | Aggiungi Piatto</title>

</head>

<body>

<?php richiamaNavBar($nomePagina) ?>




<?php

  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  }
  else { # Utente loggato

    $amministratore = $_SESSION ["admin"];
    $username = $_SESSION ["username"];

    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    }
    else { # Utente è admin --> controllo che i dati inseriti siano corretti
      if ( isset($_POST["nomePiattoNew"]) && $_POST["nomePiattoNew"] &&
            isset($_POST["categoriaPiattoNew"]) && $_POST["categoriaPiattoNew"] &&
            isset($_POST["prezzoPiattoNew"]) && $_POST["prezzoPiattoNew"]) {
        
        $nomePiattoNew = $_POST["nomePiattoNew"];
        $descrizionePiattoNew = $_POST["descrizionePiattoNew"];
        $categoriaPiattoNew = $_POST["categoriaPiattoNew"];
        $prezzoPiattoNew = $_POST["prezzoPiattoNew"];
        $cuocoPiattoNew = $_POST['cuocoPiattoNew'];
        $disponibilitaPiatto = 1;
        $dataInserimentoPiatto = date("d/m/y");
        
        $conn = connetti ("Strana01");
        if (!$conn) {
          echo "<p>La connessione ha avuto problemi".mysqli_error($conn);
          azioni_amministratore();
        }
        else {

          $sql = "SELECT nomePiatto FROM menuCucina WHERE nomePiatto = '$nomePiattoNew'";
          $tmp = mysqli_query($conn,$sql);
          $numeroRighe = mysqli_num_rows($tmp);

          if ($numeroRighe == 0) {  # Vuol dire che nella tabella non ci sono altri eventi con quel nome
            $sql = "INSERT INTO menuCucina (nomePiatto, descrizionePiatto, categoriaPiatto, prezzoPiatto, cuoco, disponibilitaPiatto, dataInserimento)
                    VALUES ('$nomePiattoNew', '$descrizionePiattoNew', '$categoriaPiattoNew', '$prezzoPiattoNew', '$cuocoPiattoNew', '$disponibilitaPiatto', '$dataInserimentoPiatto')";
            $tmp = mysqli_query($conn, $sql);
            if ($tmp) {
              echo "<div class='titolo'>";
                echo "<h2>Nuovo Piatto memorizzato</h2>";
              echo "</div>";
              azioni_amministratore();
            }
            else {
              echo "<p>Ci sono stati problemi con l'inserimento del nuovo piatto</p>";
              azioni_amministratore();
              echo mysqli_error($conn);
              echo mysqli_error($tmp);
            }
          }
            else {
              echo "<p>Piatto già presente</p>";
              azioni_amministratore();
            }
            mysqli_close($conn);
        }
      }
      else {
        echo "<p> Attenzione $username! Devi compilare tutti i campi per aggiungere l'evento</p>";
      }
    }
  }


  HTMLfooter($nomePagina);?>

</body>
</html>
