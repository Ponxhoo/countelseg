
// Función para manejar la solicitud de inicio de sesión
function iniciarSesion() {
    var username = document.getElementById('username_login').value;
    var password = document.getElementById('password_login').value;

    console.log('Usuario: ' + username);
    console.log('Contraseña: ' + password);

    // Hacer la solicitud al servidor para verificar las credenciales
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // Respuesta del servidor
                var response = xhr.responseText;
                console.log(response); // Aquí puedes manejar la respuesta del servidor

                if (response === 'Login exitoso') {
                    // Redirigir a firmaEC.html después de iniciar sesión correctamente
                    window.location.href = "firmador/index.php";
                } else {
                    // Mostrar mensaje de error en la interfaz
                    var mensajeError = document.getElementById('mensajeError');
                    if (mensajeError) {
                        mensajeError.textContent = "Usuario o contraseña incorrectos";
                    } else {
                        console.error('Elemento mensajeError no encontrado en el DOM');
                    }
                }
            } else {
                // Manejar errores de respuesta del servidor si es necesario
                console.error('Error en la solicitud: ' + xhr.status);
            }
        }
    };
    xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));
}

// Manejador de evento para el botón de inicio de sesión
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('loginBtn').addEventListener('click', function() {

        var username = document.getElementById('username_login').value;
        var password = document.getElementById('password_login').value;

        if(username == "" || password == ""){
            (document.getElementById('mensajeError')).textContent = "Debes ingresar un usuario y contraseña"; // Aquí puedes manejar el mensaje de error
            return;
        }else{	
            iniciarSesion();
        }
    });

    // Manejador de evento para presionar la tecla "Enter" en los campos de texto
    document.getElementById('username').addEventListener('keypress', function(e) {
        console.log("diste click");
        // if (e.key === 'Enter') {
        //     iniciarSesion();
        // }
    });

    document.getElementById('password').addEventListener('keypress', function(e) {
        console.log("diste click");
        // if (e.key === 'Enter') {
        //     iniciarSesion();
        // }
    });
// 	function redirectToRecovery() {
//     window.location.href = 'recuperar.html';
// }

// Manejador de evento para el enlace de recuperación de contraseña
// document.querySelector('.txt2 a').addEventListener('click', redirectToRecovery);
});

