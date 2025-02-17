unction filtraEventi(sceltaEventi) {
const oggi = new Date().toISOString().split('T')[0]; // Data odierna in formato YYYY-MM-DD
const eventi = document.querySelectorAll('.evento-card'); // Seleziona tutte le card degli eventi
// console.log("Data odierna (oggi):", oggi);
eventi.forEach(evento => {
const dataEventoStr = evento.getAttribute("data-evento"); // Data evento come stringa
// const dataEvento = new Date(dataEventoStr); // Converti la data evento in oggetto Date
// console.log("Data evento [dataEventoStr]:", dataEventoStr, "| Oggetto Date [dataEvento]:", dataEvento);
if (sceltaEventi === 'futuri') {
evento.style.display = dataEventoStr >= oggi ? 'block' : 'none'; // Mostra solo eventi futuri
// console.log(`Evento ${dataEventoStr} (futuro): `, dataEvento >= oggi ? 'mostrato' : 'nascosto');
} else if (sceltaEventi === 'passati') {
evento.style.display = dataEventoStr < oggi ? 'block' : 'none'; // Mostra solo eventi passati
// console.log(`Evento ${dataEventoStr} (passato): `, dataEvento < oggi ? 'mostrato' : 'nascosto');
} else {
evento.style.display = 'block'; // Mostra tutti gli eventi
// console.log(`Evento ${dataEventoStr} (tutti): mostrato`);
}
});
// Restituisce un valore in base al numero selezionato
// Uso questo valore per dare un titolo e informare utente su quale eventi sta guardando
if (sceltaEventi === 'futuri') return 0;
if (sceltaEventi === 'passati') return 1;
return 2;
}

// Funzione per aggiornare il titolo nella pagina eventi
function aggiornaTitolo(tipo) {
const titoloElement = document.getElementById("titoloEventi");
if (tipo === 0) {
titoloElement.textContent = "Scopri gli eventi che abbiamo organizzato per i prossimi giorni!";
} else if (tipo === 1) {
titoloElement.textContent = "Ecco gli eventi che abbiamo organizzato in passato...";
} else {
titoloElement.textContent = "Tutti gli eventi: passati, presenti e futuri!";
}
}