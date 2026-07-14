const fs = require('fs');

const data = JSON.parse(fs.readFileSync('nepal-wards.topojson', 'utf8'));

console.log('Type:', data.type);

// Get the geometry collection
const geometries = data.objects.hermes_NPL_wgs_4.geometries;

// Filter for Sunwal
const sunwalGeometries = geometries.filter(geom => {
  return geom.properties && geom.properties.PALIKA === 'Sunwal';
});

console.log(`Found ${sunwalGeometries.length} wards for Sunwal`);

// Show ward numbers
const wardNumbers = sunwalGeometries.map(geom => geom.properties.WARD).sort((a, b) => a - b);
console.log('Ward numbers:', wardNumbers);

// Show sample properties
console.log('Sample properties:', JSON.stringify(sunwalGeometries[0].properties, null, 2));

// Create a new TopoJSON with only Sunwal wards
const sunwalTopology = {
  type: 'Topology',
  arcs: data.arcs, // Keep all arcs (we'll need to filter these too, but for now keep all)
  transform: data.transform,
  objects: {
    sunwal_wards: {
      type: 'GeometryCollection',
      geometries: sunwalGeometries
    }
  }
};

fs.writeFileSync('sunwal-wards.topojson', JSON.stringify(sunwalTopology, null, 2));
console.log('Saved to sunwal-wards.topojson');

// Now convert to GeoJSON
// We need to resolve the arcs to get actual coordinates
// For simplicity, let's use a library or implement basic conversion
console.log('Note: Need to convert TopoJSON to GeoJSON for use in map');
