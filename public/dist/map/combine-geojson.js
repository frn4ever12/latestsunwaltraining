const fs = require('fs');

const municipality = JSON.parse(fs.readFileSync('sunwal-municipality.geojson', 'utf8'));
const wards = JSON.parse(fs.readFileSync('sunwal-wards.geojson', 'utf8'));

// Combine features
const combinedFeatures = [
  ...municipality.features,
  ...wards.features
];

const combinedGeoJSON = {
  type: 'FeatureCollection',
  features: combinedFeatures
};

console.log('Total features:', combinedFeatures.length);
console.log('Municipality features:', municipality.features.length);
console.log('Ward features:', wards.features.length);

fs.writeFileSync('map.geojson', JSON.stringify(combinedGeoJSON, null, 2));
console.log('Saved to map.geojson');
