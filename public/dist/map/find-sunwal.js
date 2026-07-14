const fs = require('fs');

const data = JSON.parse(fs.readFileSync('meta_en.json', 'utf8'));

// Search for Sunwal in the entire data structure
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
