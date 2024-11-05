<?php
  
  function generaMenu () {
    $listaPiattiDisponibili = piattiInArray();
    $categorie = ottieniCategoriePiattiDisponbili();
    
    
    if ($categorie['antipasti'] > 0) {
      echo "<h3>Antipasti</h3>";
      while ($listaPiattiDisponibili) {
        if ($listaPiattiDisponibili['categoriaPiatto'] == 'antipasti') { ?>
          <p><?=$row['nomePiatto']?></p>
          <p><?=$row['prezzoPiatto']?></p>
<?php
        }
      }
    }
    
    if ($categorie['primi'] > 0) {
      echo "<h3>Primi</h3>";
      while ($listaPiattiDisponibili) {
        if ($listaPiattiDisponibili['categoriaPiatto'] == 'primi') { ?>
          <p><?=$row['nomePiatto']?></p>
          <p><?=$row['prezzoPiatto']?></p>
          <?php
        }
      }
    }
    
    if ($categorie['secondi'] > 0) {
      echo "<h3>Secondi</h3>";
      while ($listaPiattiDisponibili) {
        if ($listaPiattiDisponibili['categoriaPiatto'] == 'secondi') { ?>
          <p><?=$row['nomePiatto']?></p>
          <p><?=$row['prezzoPiatto']?></p>
          <?php
        }
      }
    }
    
    if ($categorie['contorni'] > 0) {
      echo "<h3>Contorni</h3>";
      while ($listaPiattiDisponibili) {
        if ($listaPiattiDisponibili['categoriaPiatto'] == 'contorni') { ?>
          <p><?=$row['nomePiatto']?></p>
          <p><?=$row['prezzoPiatto']?></p>
          <?php
        }
      }
    }
    
    if ($categorie['dolci'] > 0) {
      echo "<h3>Dolci</h3>";
      while ($listaPiattiDisponibili) {
        if ($listaPiattiDisponibili['categoriaPiatto'] == 'dolci') { ?>
          <p><?=$row['nomePiatto']?></p>
          <p><?=$row['prezzoPiatto']?></p>
          <?php
        }
      }
    }
    
}




  function generaCardEventi () {
  $datiEventi = ottieniListaEventi();

  while ($row = mysqli_fetch_assoc($datiEventi)) {
  if ($row['eliminato'] == 0) { ?>
  <div class="m-2 card col-md-4 evento-card" style="width: 20em;" data-evento="<?= date('Y-m-d', strtotime($row['DataEvento'])) ?>">
    <img src="<?= $row['Immagine']?>" class="img-fluid myImgCard" alt="Immagine evento">
    <div class="card-body">
      <h3><?= $row['NomeEvento']?></h3>
      <p><?= $row['Descrizione']?></p>
    </div>
    <div class="card-footer">
      <p><?= date('d M Y', strtotime($row['DataEvento'])) ?></p>
    </div>
  </div>
<?php
  }
  }
  }





  function generaTabellaPiattiDisponibili() {
  $listaPiattiDisponibili = piattiInArray();
  $categorie = ottieniCategoriePiattiDisponbili();

  $categorieOrdinate = [
  'antipasti' => "antipasti",
  'primi' => "primi",
  'secondi' => "secondi",
  'contorni' => "contorni",
  'dolci' => "dolci"
  ];

  foreach ($categorieOrdinate as $categoria => $titolo) {
  if ($categorie[$categoria] > 0) { ?>
  <!-- <h3 class='fontChiSiamo01 text-center'>$titolo</h3> -->
<table class="table table-striped table-bordered">
  <thead>
  <tr>
    <th>Nome Piatto</th>
    <th>Prezzo</th>
    <th>Seleziona per eliminare</th>
  </tr>
  </thead>
  <tbody>

<?php
  foreach ($listaPiattiDisponibili as $piatto) {
    if ($piatto['categoriaPiatto'] == $categoria) { ?>
      <tr>
        <td class="fontNomePiatto">
          <?= $piatto["nomePiatto"] ?>
        </td>
        <td class="fontNomePiatto">
          <?= $piatto["prezzoPiatto"] ?>
        </td>
        <td class="text-center">
          <input type="radio" name="piattoDaEliminare" value="<?= $piatto['$idPiatto'] ?>">
        </td>
      </tr
      <?php
    }
  }
  }
  }
  }
?>






        <!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">home page admin</h1>
  </div>
</div>

<section>
  <div class="container-fluid bg-rosso">
    <div class="row justify-content-center">
      <!--      <h2 class="text-center m-3">, scegli un'azione </h2>-->

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Cucina</h2>
        <ul class="list-unstyled">
          <li><a href="nuovoMenu.php">Crea un nuovo menù</a></li>
          <li><a href="cancellaMenu.php">Elimina il menu presente</a></li>
          <li><a href="aggiungiPiatto.php">Aggiungi un singolo piatto al menu</a></li>
          <li><a href="eliminaPiatto.php.php">Elimina un singolo piatto dal menu</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Eventi</h2>
        <ul class="list-unstyled">
          <li><a href="aggiungievento.php">Aggiungi un nuovo evento</a></li>
          <li><a href="eliminaevento.php.php">Elimina un evento</a></li>
          <li><a href="modificaEvento.php">Modifica un evento</a></li>
        </ul>
      </div>

      <div class="bg-bianco m-3 p-3 col-md-4 col-lg-3 col-11">
        <h2 class="text-center">Gestione Utenti</h2>
        <ul class="list-unstyled">
          <li><a href="creaUtente.php">Crea un nuovo utente con privilegi da Admin</a></li>
          <li><a href="eliminaUtente.php">Elimina un utente</a></li>
        </ul>
      </div>

    </div>
  </div>
</section>





<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">elimina un singolo piatto</h1>
  </div>
</div>

<!-- Sottotilo della pagina-->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h2><?=$username?> Scegli quale piatto vuoi eliminare.</h2>
  </div>
</div>

<form method="POST" action="controlloCancellazionePiatto.php">
  <div class="containerTabella my-5"> <!-- Mantiene il layout centrato e con margine verticale -->
    <div class="row justify-content-center">  <!-- Riga per definire il layout. Centra la colonna orizzontalmente-->
      <div class="col-10"> <!-- colonna che occupa 10 parti su 12 -->
        <?php generaTabellaPiattiDisponibili() ?>
      </div>
    </div>
    <div class="text-center mt-4">
      <input type="submit" name="invio" id="invio" value="ELIMINA" class="btn btn-danger">
    </div>
  </div>
</form>
<?php











  function eliminaEvento ($idEvento) {
    $conn = connetti ("Strana01");
    if (!$conn) {
      die("[eliminaEvento] => Connessione fallita: " . mysqli_connect_error());
    }
    $sql = "SELECT IDEvento, NomeEvento, DataEvento FROM Eventi WHERE IDEvento='$idEvento'";
    $tmp = mysqli_query($conn, $sql);
    $nRow = mysqli_num_rows($tmp);
    if ($nRow == 0) {
//echo "<h1>Evento non trovato $idEvento</h1>";
      return ['successo' => false, 'nomeEvento' => ''];
    }
    else {
//ottengo i dati dell'evento per poi comunicarli all'utente
      $datiEvento = mysqli_fetch_assoc($tmp);
      $nomeEvento = $datiEvento['NomeEvento'];
      
      $sql = "UPDATE Eventi SET eliminato=TRUE WHERE IDEvento='$idEvento'";
      $tmp = mysqli_query($conn, $sql);
      if ($tmp) {
//echo "Evento $nomeEvento (ID: $idEvento) cancellato correttamente";
//return true;
        return ['successo' => true, 'nomeEvento' => $nomeEvento];
      }
      else {
//echo "Errore cancellazione evento $nomeEvento (ID: $idEvento)";
//return false;
        return ['successo' => false, 'nomeEvento' => $nomeEvento];
      }
    }
    mysqli_close($conn);
  }

?>