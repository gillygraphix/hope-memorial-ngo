const CACHE_NAME = 'hope-memorial-v1';
const OFFLINE_URL = '/offline.html';

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll([
                OFFLINE_URL
            ]);
        })
    );
});

self.addEventListener('fetch', event => {
    // Kama mtu anajaribu kufungua page mpya (navigate) na hana bando
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request).catch(() => caches.match(OFFLINE_URL))
        );
    }
});