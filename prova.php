<?php
  
  function gestisciImmagine() {
    if (isset($_FILES['immagine']) && $_FILES['immagine']['error'] === 0) {
      $imageName = preg_replace('/[^A-Za-z0-9_\.-]/', '_', $_FILES['immagine']['name']);
      $imageTmp = $_FILES['immagine']['tmp_name'];
      $imageType = $_FILES['immagine']['type'];
      
      $dimensioneMassima = 1048576 * 3;
      if ($_FILES['immagine']['size'] > $dimensioneMassima) {
        return false;
      }
      
      $estensioniAmmesse = ["image/jpg", "image/jpeg", "image/png"];
      if (in_array($imageType, $estensioniAmmesse)) {
        $uploadPercorso = __DIR__ . '/../Immagini/';
        if (!is_dir($uploadPercorso)) {
          mkdir($uploadPercorso, 0755, true);
        }
        
        $imagePath = '/Immagini/' . $imageName;
        if (move_uploaded_file($imageTmp, $uploadPercorso . $imageName)) {
          return $imagePath;
        } else {
          return false;
        }
      }
    }
    return null;
  }
  
  # -----------------
  
  
  function gestisciImmagine() {
    if (isset($_FILES['immagine']) && $_FILES['immagine']['error'] === 0) {
      $imageName = $_FILES['immagine']['name'];
      $imageTmp = $_FILES['immagine']['tmp_name'];
      $imageType = $_FILES['immagine']['type'];
      
      $dimensioneMassima = 1048576 * 3;
      if ($_FILES['immagine']['size'] > $dimensioneMassima) {
        return false;
      }
      
      $estensioniAmmesse = ["image/jpg", "image/jpeg", "image/png"];
      if (in_array($imageType, $estensioniAmmesse)) {
        $uploadPercorso = __DIR__ . '/../Immagini/';
        $imagePath = $uploadPercorso . basename($imageName);
        if (move_uploaded_file($imageTmp, $imagePath)) {
          return '/Immagini/' . $imageName;
        } else {
          return false;
        }
      }
    }
    return null;
  }
  
  
  
  # --------------------------
  
  
  function gestisciImmagine() {
    if (isset($_FILES['immagine']) && $_FILES['immagine']['error'] === 0) {
      // ... (validazioni esistenti)
      
      $uploadPercorso = $_SERVER['DOCUMENT_ROOT'] . "/Immagini/"; // Aggiunto slash iniziale per percorso assoluto
      // oppure, se la cartella Immagini è dentro gestione_eventi:
      // $uploadPercorso = $_SERVER['DOCUMENT_ROOT'] . "/gestione_eventi/Immagini/";
      
      // Crea la directory se non esiste (importante per evitare errori)
      if (!is_dir($uploadPercorso)) {
        mkdir($uploadPercorso, 0755, true); // 0755: permessi di lettura/esecuzione per tutti, scrittura per il proprietario; true: crea directory parent se necessario
      }
      
      $imagePath = $uploadPercorso . basename($imageName);
      
      if (move_uploaded_file($imageTmp, $imagePath)) {
        return "/Immagini/" . basename($imageName); // Restituisci il percorso relativo all'URL, non il percorso fisico
        // oppure, se la cartella Immagini è dentro gestione_eventi:
        // return "/gestione_eventi/Immagini/" . basename($imageName);
      } else {
        return false;
      }
    }
    return null;
  }
  
  
  
  
  function gestisciImmagine() {
    if (isset($_FILES['immagine']) && $_FILES['immagine']['error'] === 0) {
      $imageName = $_FILES['immagine']['name'];
      $imageTmp = $_FILES['immagine']['tmp_name'];
      $imageType = $_FILES['immagine']['type'];
      
      $dimensioneMassima = 1048576 * 3;
      if ($_FILES['immagine']['size'] > $dimensioneMassima) {
        return false; // Errore: dimensione troppo grande
      }
      
      $estensioniAmmesse = ["image/jpg", "image/jpeg", "image/png"];
      if (!in_array($imageType, $estensioniAmmesse)) {
        return false; // Errore: formato non supportato
      }
      
      $uploadPercorso = $_SERVER['DOCUMENT_ROOT'] . "/Immagini/";
      
      // *** CREA LA DIRECTORY SE NON ESISTE ***
      if (!is_dir($uploadPercorso)) {
        if (!mkdir($uploadPercorso, 0755, true)) {
          return false; // Errore: impossibile creare la directory
        }
      }
      
      $imagePath = $uploadPercorso . basename($imageName);
      
      if (move_uploaded_file($imageTmp, $imagePath)) {
        return "/Immagini/" . basename($imageName); // Corretto: restituisci solo il nome del file
      } else {
        return false; // Errore durante lo spostamento del file
      }
    }
    
    return null; // Nessuna immagine caricata
  }