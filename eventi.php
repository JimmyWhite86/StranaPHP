<?php
  session_start();
  include "function.php";
  include "functionHTML.php";
  $nomePagina = "eventi";
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <?php generaHeadSection(); ?>
  <title>Stranamore | <?php echo "$nomePagina"; ?></title>
</head>
<body>

<?php richiamaNavBar($nomePagina); ?>

<!-- "Titolo" della pagina -->
<div class="my-5 row justify-content-center">
  <div class="text-center">
    <h1 class="titoloPagina">gli eventi di strana</h1>
  </div>
</div>

<section>
  <div class="container-fluid text-center bg-giallo">
    <div class="">
      <h2 class="pt-3 fontTitoloSezione" id="titoloEventi"></h2>
    </div>
    <div class="row justify-content-center" id="containerEventi">
      <?php generaCardEventi(); ?>
    </div>
    <div class="row justify-content-center mb-4">
      <div class="d-flex flex-wrap gap-2 justify-content-center col-12 col-md-4 mt-5 mb-5">
        <button type="button" onclick="aggiornaTitolo(filtraEventi('futuri'))" class="btn btn-primary">Eventi futuri</button>
        <button type="button" onclick="aggiornaTitolo(filtraEventi('passati'))" class="btn btn-primary">Eventi passati</button>
        <button type="button" onclick="aggiornaTitolo(filtraEventi('tutti'))" class="btn btn-primary">Tutti gli eventi</button>
      </div>
    </div>
  </div>
</section>

<?php HTMLfooter($nomePagina); ?>

<!-- Funzione per mostrare solo eventi futuri al caricamento della pagina -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    filtraEventi('futuri');
    aggiornaTitolo(0);
  });
</script>

</body>
</html>
