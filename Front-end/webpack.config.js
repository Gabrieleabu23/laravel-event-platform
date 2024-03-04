const path = require('path');

module.exports = {
  entry: './src/index.js', // Il punto di ingresso del tuo progetto
  output: {
    filename: 'bundle.js', // Il nome del file di output dopo la build
    path: path.resolve(__dirname, 'dist'), // La directory di output
  },
  devtool: 'source-map', // Imposta 'source-map' per generare i sourcemaps
  // ... altre configurazioni di Webpack ...
};
