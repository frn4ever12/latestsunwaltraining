const fs = require('fs');

const data = JSON.parse(fs.readFileSync('meta_en.json', 'utf8'));

// Look for Sunwal in the meta data
Object.keys(data).forEach(key => {
  if (key.toLowerCase().includes('sunwal') || (data[key] && typeof data[key] === 'object' && JSON.stringify(data[key]).toLowerCase().includes('sunwal'))) {
    console.log('Found Sunwal in key:', key);
    console.log(JSON.stringify(data[key], null, 2));
  }
});

// Also check if there's a wards field
console.log('Top-level keys:', Object.keys(data).slice(0, 20));

// Check structure of one entry
const firstKey = Object.keys(data)[0];
console.log('Sample entry structure:', JSON.stringify(data[firstKey], null, 2));
