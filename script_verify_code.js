function verifyCode() {
    const codigo = document.getElementById('codigo').value;

    const requestData = {
        codigo: codigo
    };

    fetch('verify_code.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert('Error: ' + data.error);
        } else if (data.success) {
            // Mostrar campos de nueva contraseña y confirmar contraseña
            document.getElementById('nueva_contrasena_wrapper').style.display = 'block';
            document.getElementById('confirmar_contrasena_wrapper').style.display = 'block';
            document.getElementById('changePasswordButton').style.display = 'block';
            document.getElementById('verifyCodeButton').style.display = 'none';
            alert('Código verificado, ahora puede cambiar su contraseña.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al verificar el código.');
    });
}

function changePassword() {
    const codigo = document.getElementById('codigo').value;
    const nuevaContrasena = document.getElementById('nueva_contrasena').value;
    const confirmarContrasena = document.getElementById('confirmar_contrasena').value;

    if (nuevaContrasena !== confirmarContrasena) {
        alert('Las contraseñas no coinciden.');
        return;
    }

    const requestData = {
        codigo: codigo,
        nueva_contrasena: nuevaContrasena,
        confirmar_contrasena: confirmarContrasena
    };

    fetch('verify_code.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert('Error: ' + data.error);
        } else if (data.success) {
            alert('Éxito: ' + data.success);
            window.location.href = 'index.html';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al cambiar la contraseña.');
    });
}

document.getElementById('verifyCodeButton').addEventListener('click', verifyCode);
document.getElementById('changePasswordButton').addEventListener('click', changePassword);
