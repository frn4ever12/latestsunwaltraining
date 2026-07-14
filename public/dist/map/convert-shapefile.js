const shp = require('shpjs');
const fs = require('fs');

shp('5_NepalWards.shp').then(geojson => {
  console.log('Converted to GeoJSON');
  console.log(`Total features: ${geojson.length}`);
  
  // Filter for Sunwal
  const sunwalWards = geojson.filter(feature => {
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
}).catch(err => {
  console.error('Error:', err);
});
