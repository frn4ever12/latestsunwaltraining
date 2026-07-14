const initiateMap = (link) => {
    const mapContainer = document.getElementById('map');
    if (!mapContainer) {
        console.error('Map container not found. Please add a <div id="map"></div> to your HTML.');
        return;
    }

    fetch(link)
    .then(response => response.json())
    .then(yourDataset => {
        const source = new ol.source.XYZ({
            url: `https://api.os.uk/maps/raster/v1/zoomstack_light/{z}/{x}/{y}.png?key=pT2MMlUBTI3KC2dtK4qp`,
            attributions: 'Contains OS data © Crown copyright and database right ' + new Date().getFullYear()
        });

        const vectorSource = new ol.source.Vector({
            features: new ol.format.GeoJSON().readFeatures(
                yourDataset, {
                    dataProjection: 'EPSG:4326',
                    featureProjection: 'EPSG:3857'
                }
            )
        });

        function getLightColor() {
            const r = Math.floor(Math.random() * 32) + 224;
            const g = Math.floor(Math.random() * 32) + 224;
            const b = Math.floor(Math.random() * 32) + 224;
            return `rgb(${r}, ${g}, ${b})`;
        }

        const styleFunction = (feature) => {
            const geometryType = feature.getGeometry().getType();

            const pointStyle = new ol.style.Style({
                image: new ol.style.Circle({
                    radius: 8,
                    fill: new ol.style.Fill({
                        color: 'blue'
                    }),
                    stroke: new ol.style.Stroke({
                        color: 'white',
                        width: 2
                    })
                }),
                text: new ol.style.Text({
                    text: feature.get('name'),
                    font: '12px Arial',
                    fill: new ol.style.Fill({
                        color: 'black'
                    }),
                    stroke: new ol.style.Stroke({
                        color: 'white',
                        width: 3
                    }),
                    offsetY: 15
                })
            });

            const polygonStyle = new ol.style.Style({
                stroke: new ol.style.Stroke({
                    width: 1.25
                }),
                fill: new ol.style.Fill({
                    color: getLightColor()
                }),
                text: new ol.style.Text({
                    text: feature.get('text') || '',
                    font: '12px Arial',
                    fill: new ol.style.Fill({
                        color: 'black'
                    }),
                    textAlign: 'center',
                    textBaseline: 'middle'
                })
            });

            return geometryType === 'Point' ? pointStyle : polygonStyle;
        };

        const vectorLayer = new ol.layer.Vector({
            source: vectorSource,
            style: styleFunction
        });

        const map = new ol.Map({
            layers: [
                new ol.layer.Tile({
                    source: source
                }),
                vectorLayer
            ],
            target: 'map',
            view: new ol.View({
                constrainResolution: true,
                center: ol.proj.fromLonLat([83.6671, 27.6280]),
                zoom: 11
            })
        });

        const popup = document.getElementById('popup') || createPopupElement();

        const updateCursor = function(pixel) {
            const targetElement = map.getTargetElement();
            if (!targetElement) return;
            
            try {
                const hit = map.hasFeatureAtPixel(pixel, {
                    layerFilter: (layer) => layer === vectorLayer,
                    hitTolerance: 5
                });
                targetElement.style.cursor = hit ? 'pointer' : '';
            } catch (error) {
                console.warn('Error updating cursor:', error);
                if (targetElement) {
                    targetElement.style.cursor = '';
                }
            }
        };

        // Helper function to find the ward data by ward number
        function getWardDataByNumber(wardNumber) {
            // If the ward number matches directly with a key in wardGenderData
            if (window.wardGenderData[wardNumber]) {
                return window.wardGenderData[wardNumber];
            }
            
            // Look for a ward name that contains the ward number
            for (const wardName in window.wardGenderData) {
                if (wardName.includes(`Ward ${wardNumber}`) || 
                    wardName.includes(`Ward-${wardNumber}`) || 
                    wardName.endsWith(` ${wardNumber}`) ||
                    wardName === wardNumber) {
                    return window.wardGenderData[wardName];
                }
            }
            
            // Return empty data if no match found
            return { male_count: 0, female_count: 0, total_count: 0 };
        }

        map.on('pointermove', function(evt) {
            if (evt.dragging) {
                return;
            }
            
            updateCursor(evt.pixel);
            
            try {
                const pixel = evt.pixel;
                const feature = map.forEachFeatureAtPixel(pixel, function(feature) {
                    if (feature.getGeometry().getType() === 'Polygon' || 
                        feature.getGeometry().getType() === 'Point' ||
                        feature.getGeometry().getType() === 'MultiPolygon') {
                        return feature;
                    }
                    return null;
                }, {
                    layerFilter: layer => layer === vectorLayer,
                    hitTolerance: 5 
                });

                if (feature) {
                    let pixelCoords;
                    
                    if (feature.getGeometry().getType() === 'Polygon') {
                        const polygonCoordinates = feature.getGeometry().getInteriorPoint().getCoordinates();
                        pixelCoords = map.getPixelFromCoordinate(polygonCoordinates);
                    } else if (feature.getGeometry().getType() === 'MultiPolygon') {
                        const polygonCoordinates = feature.getGeometry().getPolygon(0).getInteriorPoint().getCoordinates();
                        pixelCoords = map.getPixelFromCoordinate(polygonCoordinates);
                    } else {
                        const coordinates = feature.getGeometry().getCoordinates();
                        pixelCoords = map.getPixelFromCoordinate(coordinates);
                    }

                    // Get ward identifier - look for WARD property first, then text/name
                    const wardId = feature.get('WARD') || feature.get('text') || feature.get('name') || 'N/A';
                    
                    // Look up the ward data by ward number
                    const wardData = getWardDataByNumber(wardId);

                    // Format the ward name for display
                    const displayName = `Ward ${wardId}`;

                    // Enhanced popup with more analytics
                    popup.innerHTML = `
                        <div class="card-body p-3" style="min-width: 250px;">
                            <h5 class="card-title text-primary mb-3">${displayName}</h5>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-user text-primary mb-1"></i>
                                        <div class="fw-bold">${wardData.male_count || 0}</div>
                                        <small class="text-muted">पुरुष</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-user text-danger mb-1"></i>
                                        <div class="fw-bold">${wardData.female_count || 0}</div>
                                        <small class="text-muted">महिला</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center p-2 bg-gradient text-white rounded">
                                <i class="fas fa-users mb-1"></i>
                                <div class="fw-bold fs-5">${wardData.total_count || 0}</div>
                                <small>कुल आवेदन</small>
                            </div>
                            <button class="btn btn-sm btn-primary w-100 mt-3" onclick="viewWardDetails('${wardId}')">
                                <i class="fas fa-info-circle me-1"></i> विस्तृत विवरण हेर्नुहोस्
                            </button>
                        </div>
                    `;

                    popup.style.position = 'absolute';
                    popup.style.left = `${pixelCoords[0]}px`;
                    popup.style.top = `${pixelCoords[1]}px`;
                    popup.style.display = 'block';
                } else {
                    popup.style.display = 'none';
                }
            } catch (error) {
                console.warn('Error in pointermove handler:', error);
                popup.style.display = 'none';
            }
        });

        
        map.on('moveend', function() {
            try {
                if (popup.style.display === 'block') {
                    const center = map.getView().getCenter();
                    const pixel = map.getPixelFromCoordinate(center);
                    
                    if (pixel && Array.isArray(pixel) && pixel.length === 2) {
                        map.dispatchEvent({
                            type: 'pointermove',
                            pixel: pixel,
                            coordinate: center,
                            dragging: false
                        });
                    }
                }
            } catch (error) {
                console.warn('Error in moveend handler:', error);
            }
        });
    })
    .catch(error => {
        console.error('Error loading GeoJSON or initializing map:', error);
        initiateFallbackMap(link);
    });
};

function createPopupElement() {
    const popupDiv = document.createElement('div');
    popupDiv.id = 'popup';
    popupDiv.className = 'ol-popup';
    popupDiv.style.display = 'none';
    popupDiv.style.position = 'absolute';
    popupDiv.style.backgroundColor = 'white';
    popupDiv.style.padding = '15px';
    popupDiv.style.border = '1px solid #ccc';
    popupDiv.style.borderRadius = '4px';
    popupDiv.style.boxShadow = '0 1px 4px rgba(0,0,0,0.2)';
    popupDiv.style.zIndex = '1000';
    document.body.appendChild(popupDiv);
    return popupDiv;
}

function initiateFallbackMap(link) {
    console.log('Falling back to OpenStreetMap');
    const mapContainer = document.getElementById('map');
    if (!mapContainer) {
        console.error('Map container not found. Please add a <div id="map"></div> to your HTML.');
        return;
    }
    
    fetch(link)
    .then(response => response.json())
    .then(yourDataset => {
        const source = new ol.source.OSM();
        
        const vectorSource = new ol.source.Vector({
            features: new ol.format.GeoJSON().readFeatures(
                yourDataset, {
                    dataProjection: 'EPSG:4326',
                    featureProjection: 'EPSG:3857'
                }
            )
        });

        function getLightColor() {
            const r = Math.floor(Math.random() * 32) + 224;
            const g = Math.floor(Math.random() * 32) + 224;
            const b = Math.floor(Math.random() * 32) + 224;
            return `rgb(${r}, ${g}, ${b})`;
        }

        const styleFunction = (feature) => {
            const geometryType = feature.getGeometry().getType();

            const pointStyle = new ol.style.Style({
                image: new ol.style.Circle({
                    radius: 8,
                    fill: new ol.style.Fill({
                        color: 'blue'
                    }),
                    stroke: new ol.style.Stroke({
                        color: 'white',
                        width: 2
                    })
                }),
                text: new ol.style.Text({
                    text: feature.get('name'),
                    font: '12px Arial',
                    fill: new ol.style.Fill({
                        color: 'black'
                    }),
                    stroke: new ol.style.Stroke({
                        color: 'white',
                        width: 3
                    }),
                    offsetY: 15
                })
            });

            const polygonStyle = new ol.style.Style({
                stroke: new ol.style.Stroke({
                    width: 1.25
                }),
                fill: new ol.style.Fill({
                    color: getLightColor()
                }),
                text: new ol.style.Text({
                    text: feature.get('text') || '',
                    font: '12px Arial',
                    fill: new ol.style.Fill({
                        color: 'black'
                    }),
                    textAlign: 'center',
                    textBaseline: 'middle'
                })
            });

            return geometryType === 'Point' ? pointStyle : polygonStyle;
        };

        const vectorLayer = new ol.layer.Vector({
            source: vectorSource,
            style: styleFunction
        });

        const map = new ol.Map({
            layers: [
                new ol.layer.Tile({
                    source: source
                }),
                vectorLayer
            ],
            target: 'map',
            view: new ol.View({
                constrainResolution: true,
                center: ol.proj.fromLonLat([83.6671, 27.6280]),
                zoom: 11
            })
        });

        const popup = document.getElementById('popup') || createPopupElement();

        const updateCursor = function(pixel) {
            const targetElement = map.getTargetElement();
            if (!targetElement) return;
            
            try {
                const hit = map.hasFeatureAtPixel(pixel, {
                    layerFilter: (layer) => layer === vectorLayer,
                    hitTolerance: 5
                });
                targetElement.style.cursor = hit ? 'pointer' : '';
            } catch (error) {
                console.warn('Error updating cursor:', error);
                if (targetElement) {
                    targetElement.style.cursor = '';
                }
            }
        };

        // Helper function to find the ward data by ward number for fallback map
        function getWardDataByNumber(wardNumber) {
            // If the ward number matches directly with a key in wardGenderData
            if (window.wardGenderData[wardNumber]) {
                return window.wardGenderData[wardNumber];
            }
            
            // Look for a ward name that contains the ward number
            for (const wardName in window.wardGenderData) {
                if (wardName.includes(`Ward ${wardNumber}`) || 
                    wardName.includes(`Ward-${wardNumber}`) || 
                    wardName.endsWith(` ${wardNumber}`) ||
                    wardName === wardNumber) {
                    return window.wardGenderData[wardName];
                }
            }
            
            // Return empty data if no match found
            return { male_count: 0, female_count: 0, total_count: 0 };
        }

        map.on('pointermove', function(evt) {
            updateCursor(evt.pixel);
            
            try {
                const pixel = evt.pixel;
                const feature = map.forEachFeatureAtPixel(pixel, function(feature) {
                    if (feature.getGeometry().getType() === 'Polygon' || 
                        feature.getGeometry().getType() === 'Point' ||
                        feature.getGeometry().getType() === 'MultiPolygon') {
                        return feature;
                    }
                    return null;
                }, {
                    layerFilter: layer => layer === vectorLayer,
                    hitTolerance: 5
                });

                if (feature) {
                    let pixelCoords;
                    
                    if (feature.getGeometry().getType() === 'Polygon') {
                        const polygonCoordinates = feature.getGeometry().getInteriorPoint().getCoordinates();
                        pixelCoords = map.getPixelFromCoordinate(polygonCoordinates);
                    } else if (feature.getGeometry().getType() === 'MultiPolygon') {
                        const polygonCoordinates = feature.getGeometry().getPolygon(0).getInteriorPoint().getCoordinates();
                        pixelCoords = map.getPixelFromCoordinate(polygonCoordinates);
                    } else {
                        const coordinates = feature.getGeometry().getCoordinates();
                        pixelCoords = map.getPixelFromCoordinate(coordinates);
                    }

                    // Get ward identifier - look for WARD property first, then text/name
                    const wardId = feature.get('WARD') || feature.get('text') || feature.get('name') || 'N/A';
                    
                    // Look up the ward data by ward number
                    const wardData = getWardDataByNumber(wardId);

                    // Format the ward name for display
                    const displayName = `Ward ${wardId}`;

                    // Enhanced popup with more analytics
                    popup.innerHTML = `
                        <div class="card-body p-3" style="min-width: 250px;">
                            <h5 class="card-title text-primary mb-3">${displayName}</h5>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-user text-primary mb-1"></i>
                                        <div class="fw-bold">${wardData.male_count || 0}</div>
                                        <small class="text-muted">पुरुष</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center p-2 bg-light rounded">
                                        <i class="fas fa-user text-danger mb-1"></i>
                                        <div class="fw-bold">${wardData.female_count || 0}</div>
                                        <small class="text-muted">महिला</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center p-2 bg-gradient text-white rounded">
                                <i class="fas fa-users mb-1"></i>
                                <div class="fw-bold fs-5">${wardData.total_count || 0}</div>
                                <small>कुल आवेदन</small>
                            </div>
                            <button class="btn btn-sm btn-primary w-100 mt-3" onclick="viewWardDetails('${wardId}')">
                                <i class="fas fa-info-circle me-1"></i> विस्तृत विवरण हेर्नुहोस्
                            </button>
                        </div>
                    `;

                    popup.style.position = 'absolute';
                    popup.style.left = `${pixelCoords[0]}px`;
                    popup.style.top = `${pixelCoords[1]}px`;
                    popup.style.display = 'block';
                } else {
                    popup.style.display = 'none';
                }
            } catch (error) {
                console.warn('Error in pointermove handler:', error);
                popup.style.display = 'none';
            }
        });
    })
    .catch(error => console.error('Error loading GeoJSON for fallback map:', error));
}

// Function to view detailed ward information
function viewWardDetails(wardId) {
    const wardData = getWardDataByNumber(wardId);
    
    // Show SweetAlert with detailed ward information
    Swal.fire({
        title: `वार्ड ${wardId} - विस्तृत विवरण`,
        html: `
            <div class="text-start">
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <div class="card bg-light p-3 text-center">
                            <i class="fas fa-user fa-2x text-primary mb-2"></i>
                            <h4 class="fw-bold mb-0">${wardData.male_count || 0}</h4>
                            <small class="text-muted">पुरुष सहभागी</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-light p-3 text-center">
                            <i class="fas fa-user fa-2x text-danger mb-2"></i>
                            <h4 class="fw-bold mb-0">${wardData.female_count || 0}</h4>
                            <small class="text-muted">महिला सहभागी</small>
                        </div>
                    </div>
                </div>
                <div class="card bg-gradient text-white p-4 text-center mb-3">
                    <i class="fas fa-users fa-3x mb-2"></i>
                    <h3 class="fw-bold mb-0">${wardData.total_count || 0}</h3>
                    <small>कुल आवेदन संख्या</small>
                </div>
                <div class="row g-2">
                    <div class="col-6">
                        <div class="text-center">
                            <small class="text-muted">पुरुष प्रतिशत</small>
                            <h5 class="fw-bold">${wardData.total_count > 0 ? ((wardData.male_count / wardData.total_count) * 100).toFixed(1) : 0}%</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <small class="text-muted">महिला प्रतिशत</small>
                            <h5 class="fw-bold">${wardData.total_count > 0 ? ((wardData.female_count / wardData.total_count) * 100).toFixed(1) : 0}%</h5>
                        </div>
                    </div>
                </div>
            </div>
        `,
        width: '500px',
        confirmButtonText: 'बन्द गर्नुहोस्',
        confirmButtonColor: '#667eea'
    });
}