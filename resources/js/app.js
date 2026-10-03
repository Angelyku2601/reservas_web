import.meta.glob([
'../fonts/**',
]);
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

async function signUp(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    try {
        await axios.get("http://localhost:8000/sanctum/csrf-cookie", {
            withCredentials: true
        });
        
        const res = await axios.post("http://localhost:8000/api/auth/register", {
            name: formData.get('name'),
            username: formData.get('username'),
            email: formData.get('email'),
            password: formData.get('password'),
            password_confirmation: formData.get('password_confirmation')
        }, {
            withCredentials: true
        });

        window.location.href = "/login";
    } catch(error) {
        console.error(error);
    }
}

form.addEventListener("submit", signUp);