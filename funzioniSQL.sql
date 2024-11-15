#Funzione per ripopolare eventi
UPDATE Eventi SET eliminato = TRUE;

#Funzione per ripopolare i piatti
UPDATE menuCucina SET disponibilitàPiatto = TRUE;

#Funzione per ripopolare utenti
UPDATE User SET utenteAttivo = TRUE;

