<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "aggiungievento";
?>



<?php
  if (!isset($_SESSION["username"])) {    # Utente non loggato
    deviLoggarti();
  }
  else {    # Utente loggato

    $amministratore = $_SESSION["amministatore"];
    $username = $_SESSION['username'];

    if ($amministratore == 0) {   # Utente non ha diritti di admin
      deviEssereAdmin();
    }
    else {  # Utente loggato con diritti di admin ?>
                  <div class="titolo">
                <h2>Ciao <?=$username?>. Da questa pagina puoi aggiungere un nuovo veicolo al database.</h2>
            </div>
            <div class="formprenotazioni">

                <p>Compila i campi del form sottostante</p>

                <form method="POST" action="controlloaggiuntaevento.php" enctype="multipart/form-data">

                    <label for="eventoNew">Inserisci il titolo dell'evento</label>
                        <input type="text" name="eventoNew" id="eventoNew" class="lungo"><br>

                    <label for="dataNew">Inserisci la data</label>
                        <input type="date" name="dataNew" id="dataNew" class="lungo"><br>

                    <label for="descrizioneNew">Inserisci la descrizione</label>
                        <input type="text" name="descrizioneNew" id="descrizioneNew" class="lungo"><br>

                    <label for="immagine">Aggiungi l'immagine dell'evento</label>
                        <input type="file" name="immagine" id="immagine">

                        <input type="submit" value="Inserisci">

                </form>
            </div>
<?php   }
    }?>