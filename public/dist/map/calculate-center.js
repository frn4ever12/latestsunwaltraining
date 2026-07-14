const fs = require('fs');

const geojson = JSON.parse(fs.readFileSync('map.geojson', 'utf8'));

let minX = Infinity, minY = Infinity, maxX = -Infinity, maxY = -Infinity;

geojson.features.forEach(feature => {
  const coords = feature.geometry.coordinates[0]; // Polygon coordinates (array of [lon, lat])
  coords.forEach(coord => {
    const lon = coord[0];
    const lat = coord[1];
    if (lon < minX) minX = lon;
    if (lon > maxX) maxX = lon;
    if (lat < minY) minY = lat;
    if (lat > maxY) maxY = lat;
  });
});

const centerLon = (minX + maxX) / 2;
const centerLat = (minY + maxY) / 2;

console.log('Bounds:');
console.log('Min X (lon):', minX);
console.log('Max X (lon):', maxX);
console.log('Min Y (lat):', minY);
console.log('Max Y (lat):', maxY);
console.log('Center:', centerLon, centerLat);
console.log('Current center in map.js: 83.6408, 27.6058');
