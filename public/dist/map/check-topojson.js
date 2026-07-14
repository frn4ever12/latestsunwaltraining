const fs = require('fs');

const data = JSON.parse(fs.readFileSync('nepal-wards.topojson', 'utf8'));

console.log('Type:', data.type);
console.log('Objects:', Object.keys(data.objects));

// Check the structure
const firstObjectKey = Object.keys(data.objects)[0];
console.log('First object structure:', JSON.stringify(data.objects[firstObjectKey], null, 2).substring(0, 500));

// Look for Sunwal in the geometries
function findSunwal(obj, path = '') {
  if (typeof obj === 'string' && obj.toLowerCase().includes('sunwal')) {
    console.log('Found Sunwal at:', path, '=', obj);
  } else if (typeof obj === 'object' && obj !== null) {
    Object.keys(obj).forEach(key => {
      findSunwal(obj[key], path + '.' + key);
    });
  }
}

findSunwal(data);
