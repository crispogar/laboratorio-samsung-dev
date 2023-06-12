/* Validación datos desde JavaScript. */

const validacion = (nombre, apellido1, apellido2, email, login, password) => {
    if (nombre === '' || apellido1 === '' || apellido2 === '' || email === '' || login === '' || password === '') {
        return false;
    }
    return true;
}

const validacionNombre = (nombre) => {
    const regex = /[a-zA-ZÀ-ÿ\s]{1,}$/;
    if (regex.test(nombre)) {
        return true;
    }
    return false;
};

const validacionApellidouno = (apellido1) => {
    const regex = /[a-zA-ZÀ-ÿ\s]{1,}$/;
    if (regex.test(nombre)) {
        return true;
    }
    return false;
};

const validacionApellidodos = (apellido2) => {
    const regex = /[a-zA-ZÀ-ÿ\s]{1,}$/;
    if (regex.test(nombre)) {
        return true;
    }
    return false;
};

const validacionEmail = (email) => {
    const regex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    if (regex.test(email)) {
        return true;
    }
    return false;
};

const validacionPassword = (password) => {
    if (password.length >= 4 && password.length <= 8) {
        return true;
    }

    return false;
};

const validacionGeneral = () => {
    const nombre = document.getElementById('nombre').value;
    const apellido1 = document.getElementById('apellido1').value;
    const apellido2 = document.getElementById('apellido2').value;
    const email = document.getElementById('email').value;
    const login = document.getElementById('login').value;
    const password = document.getElementById('password').value;
    const correcto = validacionCampos(nombre, apellido1, apellido2, email, login, password);

    if (!validacionCampos) {
        alert('Por favor, rellena todos los campos para continuar');
        return;
    }

    if (!validacionNombre) {
        alert('Por favor, rellena todos los campos para continuar');
        return;
    }

    if (!validacionApellidouno) {
        alert('Por favor, rellena todos los campos para continuar');
        return;
    }

    if (!validacionApellidodos) {
        alert('Por favor, rellena todos los campos para continuar');
        return;
    }

    if (!validacionEmail) {
        alert('El formato del correo electrónico no es válido');
        return;
    }

    if (!validacionPassword) {
        alert('La extensión de la contraseña no es válida');
        return;
    }
}
