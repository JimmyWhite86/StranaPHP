<?php
# Funzione per generare dinamicamente la tabella con i piatti disponibili
  function generaTabellaPiattiDisponibili() {
    $listaPiattiDisponibili = piattiInArray(); ?>

    <table class="table table-striped table-bordered text-center align-midle">
      <thead class="intestazioneTabella">
      <tr class="intestazioneTabella">
        <th class="intestazioneTabella">ID Piatto</th>
        <th class="intestazioneTabella">Nome Piatto</th>
        <th class="intestazioneTabella">Prezzo</th>
        <th class="intestazioneTabella">Categoria</th>
        <th class="intestazioneTabella">Cuoco</th>
        <th class="intestazioneTabella">Data inserimento</th>
        <th class="intestazioneTabella">Seleziona per eliminare</th>
      </tr>
      </thead>

      <tbody>
      <?php foreach ($listaPiattiDisponibili as $piatto) { ?>
        <tr>
          <td><?= $piatto['idPiatto']?></td>
          <td><?= $piatto['nomePiatto']?></td>
          <td><?= $piatto['prezzoPiatto']?></td>
          <td><?= $piatto['categoriaPiatto']?></td>
          <td><?= $piatto['cuoco']?></td>
          <td><?= $piatto['dataInserimento']?></td>
          <td class="text-center">
            <input type="radio" name="piattoSelezionatoElimina" id="piattoSelezionatoElimina" 
                   value="<?= $piatto['idPiatto'] ?>">
          </td>
        </tr>
        <?php
      }
      ?>

      </tbody>
    </table>
    <?php
  }
  
  ?>