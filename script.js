
        const form = document.getElementById('form-validation');
const inputs = form.querySelectorAll('input');


const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


function validateField(input) {
    input.classList.remove('error'); 

    
    if (input.value.trim() === "") {
        input.classList.add('error');
        return false;
    }

    if (input.type === "email" && !emailPattern.test(input.value)) {
        input.classList.add('error');
        return false;
    }

    
    if (input.type === "number" && isNaN(input.value)) {
        input.classList.add('error');
        return false;
    }

    return true;
}


function validatePasswords() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');

    // Limpiar clases de error
    password.classList.remove('error');
    confirmPassword.classList.remove('error');

    // Validar si los campos están vacíos
    if (password.value.trim() === "" || confirmPassword.value.trim() === "") {
        password.classList.add('error');
        confirmPassword.classList.add('error');
        return false;
    }

    // Si las contraseñas no coinciden, agregar clase de error a ambos campos
    if (password.value !== confirmPassword.value) {
        password.classList.add('error');
        confirmPassword.classList.add('error');
        return false;
    }

    return true; // Las contraseñas coinciden y no están vacías
}

// Asignar evento de validación en tiempo real a cada campo
inputs.forEach(input => {
    input.addEventListener('input', () => {
        validateField(input); // Validación de campo individual

        // Si el input es de tipo contraseña, validamos las contraseñas
        if (input.type === "password") {
            validatePasswords(); 
        }
    });
});

// Validación completa al intentar enviar el formulario
form.querySelector('.button input').addEventListener('click', (event) => {
    let isFormValid = true;

    // Validación de todos los campos
    inputs.forEach(input => {
        if (!validateField(input)) {
            isFormValid = false;
        }
    });

    // Validar las contraseñas
    if (!validatePasswords()) {
        isFormValid = false;
    }

    // Si el formulario no es válido, prevenir el envío y mostrar mensaje de error
    if (!isFormValid) {
        event.preventDefault();
        alert("Por favor, completa todos los campos correctamente.");
    }
});



function mostrarSeccion(id) {
    // Ocultar todas las secciones
    const secciones = document.querySelectorAll('.seccion');
    secciones.forEach(seccion => {
        seccion.style.display = 'none';
    });

    // Mostrar la sección seleccionada
    const seccionSeleccionada = document.getElementById(id);
    if (seccionSeleccionada) {
        seccionSeleccionada.style.display = 'block';
    }
}

