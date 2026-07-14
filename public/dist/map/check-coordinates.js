const fs = require('fs');

const municipality = JSON.parse(fs.readFileSync('sunwal-municipality.geojson', 'utf8'));
const wards = JSON.parse(fs.readFileSync('sunwal-wards.geojson', 'utf8'));

// Check municipality coordinates
const munCoords = municipality.features[0].geometry.coordinates[0];
let munMinX = Infinity, munMinY = Infinity, munMaxX = -Infinity, munMaxY = -Infinity;
munCoords.forEach(coord => {
  const [lon, lat] = coord;
  if (lon < munMinX) munMinX = lon;
  if (lon > munMaxX) munMaxX = lon;
  if (lat < munMinY) munMinY = lat;
  if (lat > munMaxY) munMaxY = lat;
});

console.log('Municipality bounds:');
console.log('Min X (lon):', munMinX);
console.log('Max X (lon):', munMaxX);
console.log('Min Y (lat):', munMinY);
console.log('Max Y (lat):', munMaxY);

// Check ward coordinates
let wardMinX = Infinity, wardMinY = Infinity, wardMaxX = -Infinity, wardMaxY = -Infinity;
wards.features.forEach(feature => {
  const coords = feature.geometry.coordinates[0];
  coords.forEach(coord => {
    const [lon, lat] = coord;
    if (lon < wardMinX) wardMinX = lon;
    if (lon > wardMaxX) wardMaxX = lon;
    if (lat < wardMinY) wardMinY = lat;
    if (lat > wardMaxY) wardMaxY = lat;
  });
});

console.log('\nWard bounds:');
console.log('Min X (lon):', wardMinX);
console.log('Max X (lon):', wardMaxX);
console.log('Min Y (lat):', wardMinY);
console.log('Max Y (lat):', wardMaxY);

// Check if they overlap
console.log('\nDo they overlap?');
console.log('X overlap:', wardMaxX >= munMinX && wardMinX <= munMaxX);
console.log('Y overlap:', wardMaxY >= munMinY && wardMinY <= munMaxY);
