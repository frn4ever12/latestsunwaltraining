// Service Worker for PWA
const CACHE_NAME = 'training-portal-v1';
const urlsToCache = [
    '/',
    '/dist/css/premium-dashboard.css',
    '/dist/css/frontend.css',
    '/dist/css/app.css',
    '/dist/css/nepali.datepicker.min.css',
    '/dist/js/nepali.datepicker.min.js',
    '/dist/js/np-fulldate.js',
    '/dist/js/message.js',
    '/dist/map/map.js',
    '/dist/map/map.geojson'
];

// Install Service Worker
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache);
            })
    );
});

// Activate Service Worker
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Fetch Service Worker
self.addEventListener('fetch', event => {
    // Don't intercept POST requests - let them go directly to the network
    if (event.request.method === 'POST') {
        return;
    }
    
    // Don't intercept external CDN requests
    const url = new URL(event.request.url);
    if (url.hostname !== 'localhost' && url.hostname !== '127.0.0.1') {
        return;
    }
    
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    return response;
                }
                return fetch(event.request);
            })
    );
});

// Background Sync
self.addEventListener('sync', event => {
    if (event.tag === 'sync-applications') {
        event.waitUntil(syncApplications());
    }
});

function syncApplications() {
    // Sync offline applications when online
    return fetch('/api/sync-applications', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    });
}

// Push Notifications
self.addEventListener('push', event => {
    const options = {
        body: event.data ? event.data.text() : 'नयाँ सूचना',
        icon: '/dist/img/logo/Government_Logo.png',
        badge: '/dist/img/logo/Government_Logo.png',
        vibrate: [100, 50, 100],
        data: {
            dateOfArrival: Date.now(),
            primaryKey: 1
        }
    };

    event.waitUntil(
        self.registration.showNotification('तालिम पोर्टल', options)
    );
});

// Notification Click
self.addEventListener('notificationclick', event => {
    event.notification.close();
    event.waitUntil(
        clients.openWindow('/')
    );
});
