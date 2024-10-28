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

?>