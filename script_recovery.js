function sendRecoveryCode() {
    const cedula = document.getElementById('cedula').value;
    const email = document.getElementById('email_recovery').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_recovery_code.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(response.success);
                    window.location.href = 'verificar_codigo.html';  // Redirigir a la página de verificación
                } else if (response.error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error...",
                        text: response.error,
                      
                      });
                    // alert(response.error);
                }
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: xhr.status,
                    
                  });
                // alert('Error: ' + xhr.status);
            }
        }
    };

    xhr.send(`cedula=${cedula}&email=${email}`);
}

