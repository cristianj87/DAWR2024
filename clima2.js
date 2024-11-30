const API_KEY = 'cff42fb194d7873483ae5150e62783f2'; // Reemplaza con tu clave de OpenWeather

// Obtiene el clima de una ubicación específica
function obtenerClima(lat, lon) {
    const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&lang=es&appid=${API_KEY}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.cod !== 200) {
                throw new Error('Error al obtener el clima.');
            }

            const ubicacion = `${data.name}, ${data.sys.country}`;
            const temperatura = `${data.main.temp}°C`;
            const descripcion = data.weather[0].description;

            document.getElementById('ubicacion').textContent = `Ubicación: ${ubicacion}`;
            document.getElementById('temperatura').textContent = `Temperatura: ${temperatura}`;
            document.getElementById('descripcion').textContent = `Descripción: ${descripcion}`;
        })
        .catch(error => {
            console.error('Error al obtener el clima:', error);
            document.getElementById('ubicacion').textContent = 'Ubicación: No disponible';
            document.getElementById('temperatura').textContent = 'Temperatura: No disponible';
            document.getElementById('descripcion').textContent = 'Descripción: No disponible';
        });
}

// Obtiene la ubicación del usuario
function obtenerUbicacion() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const { latitude, longitude } = position.coords;
                obtenerClima(latitude, longitude);
            },
            (error) => {
                console.error('Error al obtener la geolocalización:', error);

                // Solicitar ubicación manualmente si falla la geolocalización
                const ciudadPredeterminada = prompt(
                    'No se pudo obtener la ubicación automáticamente. Ingresa tu ciudad:'
                );

                if (ciudadPredeterminada) {
                    buscarPorCiudad(ciudadPredeterminada);
                } else {
                    document.getElementById('ubicacion').textContent = 'Ubicación: No disponible';
                }
            }
        );
    } else {
        alert('Tu navegador no admite geolocalización. Ingresa tu ciudad.');
        const ciudadManual = prompt('Ingresa tu ciudad:');
        if (ciudadManual) {
            buscarPorCiudad(ciudadManual);
        }
    }
}

// Busca el clima por nombre de ciudad
function buscarPorCiudad(ciudad) {
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&units=metric&lang=es&appid=${API_KEY}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.cod !== 200) {
                throw new Error('Ciudad no encontrada.');
            }

            const ubicacion = `${data.name}, ${data.sys.country}`;
            const temperatura = `${data.main.temp}°C`;
            const descripcion = data.weather[0].description;

            document.getElementById('ubicacion').textContent = `Ubicación: ${ubicacion}`;
            document.getElementById('temperatura').textContent = `Temperatura: ${temperatura}`;
            document.getElementById('descripcion').textContent = `Descripción: ${descripcion}`;
        })
        .catch(error => {
            console.error('Error al buscar el clima por ciudad:', error);
            document.getElementById('ubicacion').textContent = 'Ubicación: No disponible';
            document.getElementById('temperatura').textContent = 'Temperatura: No disponible';
            document.getElementById('descripcion').textContent = 'Descripción: No disponible';
        });
}

// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', obtenerUbicacion);
