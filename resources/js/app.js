import axios from "axios";
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
window.axios = axios;

const form = document.querySelector("#register_form");

axios.get("http://localhost:8000/api/user", {
    withCredentials: true
}).then(res => {
    console.log(res.data);
}).catch(e => {
    console.error(e);
}) 

async function login(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    try {
        await axios.get("http://localhost:8000/sanctum/csrf-cookie", {
            withCredentials: true
        });
        
        const res = await axios.post("http://localhost:8000/api/auth/login", {
            email: formData.get('email'),
            password: formData.get('password')
        }, {
            withCredentials: true
        });
        function getCookie(name) {
            const cookies = document.cookie.split(";");
            for (let cookie of cookies) {
                // Elimina espacios al inicio
                cookie = cookie.trim();

                // Verifica si empieza con el nombre buscado
                if (cookie.startsWith(name + "=")) {
                    // Devuelve el valor decodificado
                    return cookie.substring(name.length + 1);
                }
                return null;
            }
        }
    } catch(error) {
        console.error(error);
    }
}

form.addEventListener("submit", login);