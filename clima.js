const API_KEY = 'cff42fb194d7873483ae5150e62783f2'; // Reemplaza con tu clave de OpenWeather

// Función para obtener la ubicación del usuario
function pedirUbicacion() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                obtenerUbicacionUsuario(lat, lon);
            },
            (error) => {
                console.error("Error obteniendo la ubicación del usuario:", error);
                document.getElementById('ubicacion-usuario').textContent = 'No se pudo obtener tu ubicación.';
                obtenerClimaCiudadJuarez(); // Fallback para mostrar el clima de Ciudad Juárez
            }
        );
    } else {
        alert("La geolocalización no está soportada en este navegador.");
        document.getElementById('ubicacion-usuario').textContent = 'Geolocalización no soportada.';
        obtenerClimaCiudadJuarez(); // Fallback
    }
}

// Muestra la ubicación del usuario basada en coordenadas
function obtenerUbicacionUsuario(lat, lon) {
    const urlGeocoding = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`;

    fetch(urlGeocoding)
        .then(response => response.json())
        .then(data => {
            const ciudadUsuario = data.address.city || "Ubicación desconocida";
            document.getElementById('ubicacion-usuario').textContent = `Tu ubicación detectada: ${ciudadUsuario}`;
        })
        .catch(error => {
            console.error("Error al obtener la ubicación con Nominatim:", error);
            document.getElementById('ubicacion-usuario').textContent = 'No se pudo determinar tu ubicación.';
        });
}

// Obtiene el clima de Ciudad Juárez
function obtenerClimaCiudadJuarez() {
    const ciudad = 'Ciudad Juárez';
    const urlClima = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&units=metric&lang=es&appid=${API_KEY}`;

    fetch(urlClima)
        .then(response => response.json())
        .then(data => {
            if (data.cod !== 200) {
                throw new Error('Error al obtener el clima.');
            }

            const ubicacion = `${data.name}, ${data.sys.country}`;
            const temperatura = `${data.main.temp}°C`;
            const descripcion = data.weather[0].description;
            const iconoId = data.weather[0].icon; // Código del icono del clima
            const iconoUrl = `https://openweathermap.org/img/wn/${iconoId}@2x.png`;

            // Actualizar elementos en la página
            document.getElementById('ubicacion-clima').textContent = `${ubicacion}`;
            document.getElementById('temperatura').textContent = `Temperatura: ${temperatura}`;
            document.getElementById('descripcion').textContent = `Descripción: ${descripcion}`;
            document.getElementById('icono').src = iconoUrl; // Añadir el ícono
            document.getElementById('icono').alt = descripcion; // Texto alternativo
        })
        .catch(error => {
            console.error('Error al obtener el clima:', error);
            document.getElementById('ubicacion-clima').textContent = 'Clima: No disponible';
            document.getElementById('temperatura').textContent = 'Temperatura: No disponible';
            document.getElementById('descripcion').textContent = 'Descripción: No disponible';
        });
}

// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    pedirUbicacion();
    obtenerClimaCiudadJuarez();
});
