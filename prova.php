<?php
    $ultimaCategoria = end($categorieOrdinate);
    foreach ($categorieOrdinate as $categoria => $titolo) {
        if ($categorie[$categoria] > 0 && $categoria !== $ultimaCategoria) { ?>
          <h3 class='fontTipoPiattiMenu text-center ombraFont'><?= $titolo ?></h3>
            <?php
            foreach ($listaPiattiDisponibili as $piatto) {
                if ($piatto['categoriaPiatto'] == $categoria) { ?>
                  <p class='fontNomePiatto pb-0 mb-0 pl-5 ml-5 mr-5'>
                      <?= $piatto['nomePiatto'] ?>
                    <span class='fontPrezzoPiatto ml-3'>
            <?= $piatto['prezzoPiatto'] ?>€
          </span>
                  </p>
                    <?php
                }
            } ?>
          <br><br><br>
            <?php
        }
    }
?>