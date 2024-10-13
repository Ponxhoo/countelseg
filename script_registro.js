document.getElementById('registerBtn').addEventListener('click', function() {
    var cedula = document.getElementById('cedula_reg');
    var pasaporte = document.getElementById('pasaporte_reg');
     
    if (cedula.checked) {
        var documentType='cedula';
    }else{
        if (pasaporte.checked) {
            var documentype='pasaporte';
        }
    }

    // Obtener 
    // var documentType = document.getElementById('documentType').value;
    // verifica si el radio con id decula esta checked 
    // entonces documentype es cedula
    // sino es pasaport

    var documentId = document.getElementById('documentId').value;
    var fullName = document.getElementById('fullName').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    
    // Validar si todos los campos están llenos
    if (documentType === '' || documentId === '' || fullName === '' || username === '' || password === '' || email === '') {
        alert('Por favor, llene todas las casillas.');
        return;
    }

    // Hacer la solicitud al servidor para registrar el usuario
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Respuesta del servidor
            var response = xhr.responseText;
            console.log(response);
            window.location.href = "index.php";
        }
    };
    xhr.send('documentType=' + encodeURIComponent(documentType) +
             '&documentId=' + encodeURIComponent(documentId) +
             '&fullName=' + encodeURIComponent(fullName) +
             '&username=' + encodeURIComponent(username) +
             '&password=' + encodeURIComponent(password) +
             '&email=' + encodeURIComponent(email));
});
