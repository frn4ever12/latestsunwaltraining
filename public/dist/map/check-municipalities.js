const fs = require('fs');

const data = JSON.parse(fs.readFileSync('municipalities.geojson', 'utf8'));

console.log('Total features:', data.features.length);

// Check first feature properties
console.log('Sample properties:', JSON.stringify(data.features[0].properties, null, 2));

// Filter for Sunwal
const sunwalFeatures = data.features.filter(feature => {
  const props = feature.properties;
  return Object.values(props).some(val => 
    typeof val === 'string' && val.toLowerCase().includes('sunwal')
  );
});

console.log(`Found ${sunwalFeatures.length} features for Sunwal`);
if (sunwalFeatures.length > 0) {
  console.log('Sunwal sample properties:', JSON.stringify(sunwalFeatures[0].properties, null, 2));
}
