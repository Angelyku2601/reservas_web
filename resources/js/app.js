import.meta.glob([
    '../fonts/**',
]);

import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

window.axios = axios;
console.log("APP.JS NUEVO CARGADO");

// ==========================================
// REGISTRO
// ==========================================

const registerForm = document.querySelector("#register_form");

async function signUp(event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    try {
        // Obtener cookie CSRF
        await axios.get(
            "http://localhost:8000/sanctum/csrf-cookie",
            {
                withCredentials: true
            }
        );

        // Registrar usuario
        await axios.post(
            "http://localhost:8000/api/auth/register",
            {
                name: formData.get("name"),
                username: formData.get("username"),
                email: formData.get("email"),
                password: formData.get("password"),
                password_confirmation: formData.get("password_confirmation")
            },
            {
                withCredentials: true
            }
        );

        // Registro exitoso
        window.location.href = "/login";

    } catch (error) {
        console.error("Error al registrar:", error);
    }
}

if (registerForm) {
    registerForm.addEventListener("submit", signUp);
}


// ==========================================
// LOGIN
// ==========================================

const loginForm = document.querySelector("#login_form");

async function login(event) {
    event.preventDefault();
     

    console.log("FORMULARIO LOGIN INTERCEPTADO");

    const formData = new FormData(event.target);

    try {
        // Obtener cookie CSRF
        await axios.get(
            "http://localhost:8000/sanctum/csrf-cookie",
            {
                withCredentials: true
            }
        );

        // Enviar credenciales a RLC-API
        await axios.post(
            "http://localhost:8000/api/auth/login",
            {
                email: formData.get("email"),
                password: formData.get("password")
            },
            {
                withCredentials: true
            }
        );

        console.log("Inicio de sesión exitoso");

        // Mandar al usuario a la página principal
        window.location.href = "/pagina-principal";

    } catch (error) {
        console.error("Error al iniciar sesión:", error);
    }
}

if (loginForm) {
    loginForm.addEventListener("submit", login);
}