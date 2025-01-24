<?php
  
  #-----------------------------------------------------------------
  # Funzione per generare la sezione head delle pagine
  function generaHeadSection() { ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Associazione culturale, APS, ARCI, promozione sociale">
    <meta name="description" content="Associazione Culturale Stranamore">
    <meta name="author" content="Bianchi Andrea">
    <meta name="robots" content="noindex, nofollow"> <!-- Utilizzato per impedire ai motori di ricerca di indicizzare la pagina -->
    <!--<meta name="robots" content="index, follow"> Una volta messo on line il sito corretto, utilizzare questo tag al posto di quello precedente -->
    <!--TODO: Da definire in ottica SEO -->
    <meta property="og:title" content="Associazione Culturale Stranamore">
    <meta property="og:description"
          content="Promuoviamo cultura, inclusione e socialità attraverso eventi, arte e creatività.
                   Scopri di più sui nostri progetti e attività.">
    <meta property="og:image" content="URL_dell_immagine_di_anteprima">
    <meta property="og:url" content="URL_del_sito_web">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    
    <!-- Libreria per le icone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <!-- Collegamento ai miei files CSS -->
    <link href="<?= BASE_URL ?>CSS/base_css.css" rel="stylesheet" type="text/css">
    <link href="<?= BASE_URL ?>CSS/fontCSS.css" rel="stylesheet" type="text/css">
    
    <!-- Font Babas Neue -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <!-- CDN JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <!-- CDN Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    
    <!-- Icone -->
    <script src="https://kit.fontawesome.com/1a45214b57.js" crossorigin="anonymous"></script>
    
    <!-- Collegamento al mio modulo JS -->
    <script src="<?= BASE_URL ?>modulo.js"></script>
    <?php
  }
#-----------------------------------------------------------------
?>