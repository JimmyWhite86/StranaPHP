<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "aggiungiEvento";
?>



<?php

  if (!isset($_SESSION["username"])) {  # Utente non loggato
    deviLoggarti();
  }
  else { # Utente loggato

    $amministratore = $_SESSION ["amministratore"];
    $username = $_SESSION ["username"];

    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin($username);
    }
    else { # Utente è admin --> controllo che i dati inseriti siano corretti
      if ( isset($_POST["eventoNew"]) && $_POST["eventoNew"] && isset($_POST["dataNew"]) && $_POST["dataNew"] && isset($_POST["descrizioneNew"]) && $_POST["descrizioneNew"]) {
        $eventoNew = $_POST["eventoNew"];
        $dataNew = $_POST["dataNew"];
        $descrizioneNew = $_POST["descrizioneNew"];

        $upload_percorso = "immagini/";
        $file_tmp = $_FILES['immagini']['tmp_name'];
        $file_nome = $_FILES['immagini']['name'];
        $pathnameImmagine = "$upload_percorso"."$file_nome";
        move_uploaded_file($file_tmp, $upload_percorso.$file_nome);

        $conn = connetti ("Strana01");
        if (!$conn) {
          echo "<p>La connessione ha avuto problemi".mysqli_error($conn);
          azioni_amministratore();
        }
        else {

          $sql = "SELECT nomeEvento FROM Eventi WHERE nomeEvento = 'eventoNew'";
          $tmp = mysqli_query($conn,$sql);
          $numeroRighe = mysqli_num_rows($tmp);

          if ($numeroRighe == 0) {  # Vuol dire che nella tabella non ci sono altri eventi con quel nome
            $sql = "INSERT INTO Eventi (NomeEvento, DataEvento, Immagine, Descrizione)
                    VALUES ('$eventoNew', '$dataNew', '$pathnameImmagine', '$descrizioneNew')";
            $tmp = mysqli_query($conn, $sql);
            if ($tmp) {
              echo "<div class='titolo'>";
                echo "<h2>Nuovo evento memorizzato</h2>";
              echo "</div>";
              azioni_amministratore();
            }
            else {
              echo "<p>Ci sono stati problemi con l'inserimento del nuovo evento</p>";
              azioni_amministratore();
            }
          }
            else {
              echo "<p>Evento già presente</p>";
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


  ?>