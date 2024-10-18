<?php
  session_start();
  include "functionHTML.php";
  include "function.php";
  $nomePagina = "eliminaEvento";
?>



<?php
  if (!isset($_SESSION["username"])) {
    deviLoggarti();
  }
  else {
    $amministratore = $_SESSION["amministratore"];
    $username = $_SESSION["username"];

    if ($amministratore == 0) {
      deviEssereAdmin($username);
    }
    else { #Utente loggato come admi --> mostro le azioni che può compiere ?>

      <p>Scegli quale evento vuoi eliminare</p>
      <?php
        $listaEventi = ottieniListaEventi();
      ?>

      <div>
        <form method="POST" action="controllocancellazioneevento.php">
          <table>
            <tr>
              <th>Nome Evento</th>
              <th>Data Evento</th>
              <th>Descrizione Evento</th>
              <th>Immagine</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_assoc($listaEventi)) {
            ?>
            <tr>
                <td><?=$row['NomeEvento']?></td>
                <td><?=$row['DataEvento']?></td>
                <td><?=$row['Descrizione']?></td>
                <td><?=$row['Immagine']?></td>
                <td><input type="radio" name="idEvento" value="<?=$row['IDEvento']?>" </td>
            </tr>
            <?php
                }
            ?>
          </table>
          <br><br>
          <input type="submit" name="invio" id="invio" value="ELIMINA">
        </form>
      </div>

  <?php
    }
  }
  ?>