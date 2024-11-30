const API_KEY = 'cff42fb194d7873483ae5150e62783f2'; // Reemplaza con tu clave de OpenWeather

// Obtiene el clima para Ciudad Juárez
function obtenerClimaCiudadJuarez() {
    const ciudad = 'Ciudad Juárez';
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&units=metric&lang=es&appid=${API_KEY}`;

    fetch(url)
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
            document.getElementById('ubicacion').textContent = `Ubicación: ${ubicacion}`;
            document.getElementById('temperatura').textContent = `Temperatura: ${temperatura}`;
            document.getElementById('descripcion').textContent = `Descripción: ${descripcion}`;
            document.getElementById('icono').src = iconoUrl; // Añadir el ícono
            document.getElementById('icono').alt = descripcion; // Texto alternativo
        })
        .catch(error => {
            console.error('Error al obtener el clima:', error);
            document.getElementById('ubicacion').textContent = 'Ubicación: No disponible';
            document.getElementById('temperatura').textContent = 'Temperatura: No disponible';
            document.getElementById('descripcion').textContent = 'Descripción: No disponible';
        });
}

// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', obtenerClimaCiudadJuarez);
