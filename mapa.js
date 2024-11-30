const map = L.map('mapa').setView([31.720052, -106.4239453], 16); // CDMX por defecto
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 16,
}).addTo(map);
L.marker([31.720052, -106.4239453]).addTo(map)
    .bindPopup('Aquí nos encontramos.')
    .openPopup();
