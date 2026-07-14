const fs = require('fs');

const data = JSON.parse(fs.readFileSync('nepal-wards.geojson', 'utf8'));

// First, let's see what unique VDC_NAME values exist
const vdcNames = new Set();
data.features.forEach(feature => {
  if (feature.properties && feature.properties.VDC_NAME) {
    vdcNames.add(feature.properties.VDC_NAME);
  }
});

console.log('Sample VDC names:', Array.from(vdcNames).slice(0, 20));

// Filter features that contain "Sunwal" in their properties
const sunwalWards = data.features.filter(feature => {
  const props = feature.properties;
  return Object.values(props).some(val => 
    typeof val === 'string' && val.toLowerCase().includes('sunwal')
  );
});

console.log(`Found ${sunwalWards.length} wards for Sunwal`);
if (sunwalWards.length > 0) {
  console.log('Sample properties:', JSON.stringify(sunwalWards[0].properties, null, 2));
}

const result = {
  type: 'FeatureCollection',
  features: sunwalWards
};

fs.writeFileSync('sunwal-wards.geojson', JSON.stringify(result, null, 2));
console.log('Saved to sunwal-wards.geojson');
