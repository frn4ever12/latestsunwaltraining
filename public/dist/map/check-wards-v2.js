const fs = require('fs');

// Download the file first
const https = require('https');

const url = 'https://raw.githubusercontent.com/mesaugat/geoJSON-Nepal/master/nepal-wards.geojson';

https.get(url, (res) => {
  let data = '';
  res.on('data', chunk => { data += chunk; });
  res.on('end', () => {
    const geojson = JSON.parse(data);
    
    console.log('Total features:', geojson.totalFeatures);
    
    // Search for Sunwal
    const sunwalFeatures = geojson.features.filter(feature => {
      const props = feature.properties;
      return Object.values(props).some(val => 
        typeof val === 'string' && val.toLowerCase().includes('sunwal')
      );
    });
    
    console.log(`Found ${sunwalFeatures.length} features for Sunwal`);
    
    if (sunwalFeatures.length > 0) {
      console.log('Sample properties:', JSON.stringify(sunwalFeatures[0].properties, null, 2));
      
      // Save to file
      const result = {
        type: 'FeatureCollection',
        features: sunwalFeatures
      };
      fs.writeFileSync('sunwal-wards-v2.geojson', JSON.stringify(result, null, 2));
      console.log('Saved to sunwal-wards-v2.geojson');
    } else {
      // Check if there's any variation of the name
      const allNames = new Set();
      geojson.features.forEach(feature => {
        if (feature.properties && feature.properties.VDC_NAME) {
          allNames.add(feature.properties.VDC_NAME);
        }
      });
      
      const similarNames = Array.from(allNames).filter(name => 
        name.toLowerCase().includes('sun') || name.toLowerCase().includes('wal')
      );
      
      console.log('Similar names found:', similarNames);
    }
  });
}).on('error', err => {
  console.error('Error:', err);
});
