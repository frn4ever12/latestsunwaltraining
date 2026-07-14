const fs = require('fs');

const topojson = JSON.parse(fs.readFileSync('sunwal-wards.topojson', 'utf8'));

// Simple TopoJSON to GeoJSON conversion
function topojsonToGeojson(topology, objectName) {
  const object = topology.objects[objectName];
  const arcs = topology.arcs;
  const transform = topology.transform;
  
  // Function to decode arc
  function decodeArc(arc) {
    const coords = [];
    let x = 0, y = 0;
    
    for (const point of arc) {
      x += point[0];
      y += point[1];
      
      // Apply transform if present
      if (transform) {
        coords.push([
          transform.scale[0] * x + transform.translate[0],
          transform.scale[1] * y + transform.translate[1]
        ]);
      } else {
        coords.push([x, y]);
      }
    }
    
    return coords;
  }
  
  // Function to resolve geometry
  function resolveGeometry(geometry) {
    if (geometry.type === 'Polygon') {
      return {
        type: 'Polygon',
        coordinates: geometry.arcs.map(arc => {
          if (arc[0] >= 0) {
            return decodeArc(arcs[arc[0]]);
          } else {
            // Negative arc index means reverse
            return decodeArc(arcs[-arc[0] - 1]).reverse();
          }
        })
      };
    } else if (geometry.type === 'MultiPolygon') {
      return {
        type: 'MultiPolygon',
        coordinates: geometry.arcs.map(polygon => 
          polygon.map(arc => {
            if (arc[0] >= 0) {
              return decodeArc(arcs[arc[0]]);
            } else {
              return decodeArc(arcs[-arc[0] - 1]).reverse();
            }
          })
        )
      };
    }
    return geometry;
  }
  
  // Convert features
  const features = object.geometries.map(geom => ({
    type: 'Feature',
    properties: geom.properties,
    geometry: resolveGeometry(geom)
  }));
  
  return {
    type: 'FeatureCollection',
    features: features
  };
}

const geojson = topojsonToGeojson(topojson, 'sunwal_wards');

console.log('Converted to GeoJSON');
console.log('Total features:', geojson.features.length);

// Show sample
console.log('Sample feature:', JSON.stringify(geojson.features[0], null, 2).substring(0, 500));

fs.writeFileSync('sunwal-wards.geojson', JSON.stringify(geojson, null, 2));
console.log('Saved to sunwal-wards.geojson');
