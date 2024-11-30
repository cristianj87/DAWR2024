document.getElementById("loginForm").addEventListener("submit", function(event) {
    const usuario = document.getElementById("usuario").value.trim();
    const password = document.getElementById("password").value.trim();

    if (usuario === "" || password === "") {
        event.preventDefault();
        document.getElementById("error-msg").textContent = "Por favor, completa todos los campos.";
    }
});
