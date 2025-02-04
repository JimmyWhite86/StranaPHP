const PurgeCSS = require('purgecss').PurgeCSS;
const fs = require('fs');
const path = require('path');

const outputDir = path.join(__dirname, 'CSS', 'purged');

// Crea la directory 'purged' se non esiste
if (!fs.existsSync(outputDir)) {
  fs.mkdirSync(outputDir, { recursive: true });
}

const purgeCSSResults = new PurgeCSS().purge({
  content: ['./**/*.php', './**/*.html'],
  css: ['./CSS/*.css'],
  safelist: {
    standard: [/^bg-/, /^font-/, /^btn-/],
  },
});

purgeCSSResults.then(result => {
  result.forEach(output => {
    const outputPath = path.join(outputDir, path.basename(output.file));
    fs.writeFileSync(outputPath, output.css, 'utf-8');
    console.log(`File scritto: ${outputPath}`);
  });
}).catch(error => {
  console.error('Errore durante l\'esecuzione di PurgeCSS:', error);
});