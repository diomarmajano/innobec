
    function validarFormulario() {
        const validar = /^[a-zA-Z\s]+$/;
        var nombre = document.getElementById('nombre').value;
        if (!validar.test(nombre)) {
            alert("El campo Nombre no puede estar vacio y solo puede contener letras");
            return false;
        }
        var apellido = document.getElementById('apellido').value;
        if (!validar.test(apellido)) {
            alert("El campo Apellido no puede estar vacio y solo puede contener letras");
            return false;
        }

        var edad = document.getElementById('edad').value;
        if (!/^\d+$/.test(edad)) {
            alert("El campo Edad debe ser un número.");
            return false;
        }
        var email = document.getElementById('email').value;
        if (email === "") {
            alert("El campo Correo Electrónico no puede estar vacío");
            return false;
        }
        var password = document.getElementById('password').value;
        if (password.length < 6) {
            alert("La contraseña debe tener al menos 6 caracteres");
            return false;
        }

        return true;
    }
    document.querySelector('form').addEventListener('submit', function(event) {
        if (!validarFormulario()) {
            event.preventDefault(); 
        }
    });
