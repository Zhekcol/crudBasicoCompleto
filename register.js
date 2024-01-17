const formulario = document.getElementById('registro');

formulario.addEventListener("submit", (e) => {
    
    const datos = {
        user: formulario.user.value,
        email: formulario.email.value,
        password: formulario.password.value,
    }

    //Validamos nombre de usuario
    if (datos.user == null || datos.user == "") {
        const errorUser = document.querySelector('#errorUser');
        errorUser.innerHTML = '<p style="color: #E21818;">El campo <strong>Usuario</strong> es obligatorio.</p>';
    } else if (datos.user.length < 3) {
        const errorUser = document.querySelector('#errorUser');
        errorUser.innerHTML = '<p style="color: #E21818;">El campo <strong>Usuario</strong> debe ser mayor de 3 caracteres.</p>';
    }

    //Validamos correo electrónico
    let emailValidation = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/

    if (datos.email == null || datos.email == "") {
        const errorEmail = document.querySelector('#errorEmail');
        errorEmail.innerHTML = '<p style="color: #E21818;">El campo<strong>Correo electrónico</strong> es obligatorio.</p>';
    } else if (!emailValidation.test(datos.email)) {
        const errorEmail = document.querySelector('#errorEmail');
        errorEmail.innerHTML = '<p style="color: #E21818;">El <strong>Correo electrónico</strong> no es válido.</p>';
    }

    //Validamos contraseña
    if (datos.password == null || datos.password == "") {
        const errorPassword = document.querySelector('#errorPassword');
        errorPassword.innerHTML = '<p style="color: #E21818;">El campo <strong>Contraseña</strong> es obligatorio.</p>';
    } else if (datos.password.length < 8) {
        const errorPassword = document.querySelector('#errorPassword');
        errorPassword.innerHTML = '<p style="color: #E21818;">La <strong>Contraseña</strong> debe ser mayor de 7 caracteres.</p>';
    }

})