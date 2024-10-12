document.addEventListener('DOMContentLoaded', function() {
    const uploadSignatureButton = document.getElementById('uploadSignatureButton');
    
    if (uploadSignatureButton) {
        uploadSignatureButton.addEventListener('click', uploadSignature);
    }

    // Código para obtener datos de 'setting.php'
    fetch('../setting.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById("firmas").innerText = data.cantidad;
        })
        .catch(error => {
            // console.error('Error al obtener el perfil del usuario:', error);
        });
});


function openTab(tabName) {
    var i, tabcontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
  //  document.getElementById(tabName).style.display = "block";

    if (tabName === 'perfil') {
        showUserProfile();
    }
}

function showUserProfile() {
    fetch('getUserProfile.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById("fullName").innerText = data.fullName;
            document.getElementById("email").innerText = data.email;
            document.getElementById("documentId").innerText = data.documentId;
        })
        .catch(error => {
            console.error('Error al obtener el perfil del usuario:', error);
        });
}

function changePassword() {
    openTab('changePasswordForm');
}

function submitChangePassword() {
    var currentPassword = document.getElementById('currentPassword').value;
    var newPassword = document.getElementById('newPassword').value;
    var confirmNewPassword = document.getElementById('confirmNewPassword').value;

    if (newPassword !== confirmNewPassword) {
        // alert("Las nuevas contraseñas no coinciden");
        Swal.fire(`Las nuevas contraseñas no coinciden!`, "", "error");
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../changePassword.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            // alert(xhr.responseText); 
            Swal.fire(`${xhr.responseText}!`, "", "success");
            if (xhr.responseText === "Contraseña cambiada exitosamente") {
                openTab('perfil'); 
            }
        } else {
            // alert('Error al cambiar la contraseña');
            Swal.fire(`Error al cambiar la contraseña!`, "", "error");
        }
    };
    xhr.send('currentPassword=' + encodeURIComponent(currentPassword) +
             '&newPassword=' + encodeURIComponent(newPassword));
}

function logout() {
    fetch('../logout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(response => {
        if (response.ok) {
            window.location.href = 'index.php';
        } else {
            console.error('Error al cerrar sesión');
        }
    })
    .catch(error => {
        console.error('Error al cerrar sesión:', error);
    });
}

let globalSignatureFile = null;
let globalSignaturePassword = '';


function uploadSignature() {
    console.log('Subiendo firma electrónica...');
    var signatureFileInput = document.getElementById('signatureFile').files[0];
    var signaturePasswordInput = document.getElementById('signaturePassword').value;

    if (!signatureFileInput || !signaturePasswordInput) {
        // alert("Por favor, asegúrese de haber subido la firma y proporcionado la contraseña.");
        Swal.fire(`Por favor, asegúrese de haber subido la firma y proporcionado la contraseña.`, "", "warning");

        return;
    }

    var formData = new FormData();
    formData.append('signatureFile', signatureFileInput);
    formData.append('signaturePassword', signaturePasswordInput);

    var reader = new FileReader();
    reader.onload = function(event) {
        var base64String = btoa(event.target.result);
        localStorage.setItem('signatureFileBase64', base64String);
        localStorage.setItem('signaturePassword', signaturePasswordInput);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../upload_signature.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = xhr.responseText.trim();
                    // console.log('Respuesta del servidor:', response);
                    Swal.fire("Firma subida correctamente!", "", "success");
                    // Esperar 2 segundos (2000 ms) antes de recargar la página
                    setTimeout(() => {
                        window.location.reload();
                    }, 2500);
                } else {
                    var response = xhr.responseText.trim();
                    var jsonResponse = JSON.parse(response);
                       if (jsonResponse.error) {
                            // alert(jsonResponse.error);
                            Swal.fire(`${jsonResponse.error}!`, "", "error"); 
                            setTimeout(() => {
                                window.location.reload();
                            }, 1600);
                       }
                       else{
                        // console.error('Error al subir la firma electrónica:', xhr.status);
                        Swal.fire("Error al comunicarse con el servidor. Estado!"+ xhr.status , "", "error");
                       }
                    
                }
            }
        };
        xhr.send(formData);
    };

    reader.readAsBinaryString(signatureFileInput);
}


function getCertificateDetails() {
    var signatureFile = document.getElementById('signatureFile').files[0];
    var signaturePassword = document.getElementById('signaturePassword').value;

    var formData = new FormData();
    formData.append('signatureFile', signatureFile);
    formData.append('signaturePassword', signaturePassword);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_signature_details.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = xhr.responseText.trim();
                console.log('Respuesta del servidor:', response);

                if (response.startsWith('{')) {
                    try {
                        var jsonResponse = JSON.parse(response);
                        console.log('JSON parseado correctamente:', jsonResponse);

                        if (jsonResponse.certificado) {
                            updateCertificateDetails(jsonResponse.certificado);
                        } else {
                            console.error('No se encontraron detalles del certificado en la respuesta.');
                        }
                    } catch (error) {
                        console.error('Error al analizar la respuesta JSON:', error);
                    }
                } else {
                    console.error('Respuesta del servidor no es un JSON válido:', response);
                }
            } else {
                console.error('Error al obtener los detalles del certificado:', xhr.status);
            }
        }
    };
    xhr.send(formData);
}

function updateCertificateDetails(certificado) {
    var nombreElement = document.getElementById('nombreCertificado');
    var identificacionElement = document.getElementById('identificacionCertificado');
    var entidadCertificadoraElement = document.getElementById('entidadCertificadora');
    var emitidoElement = document.getElementById('emitidoCertificado');
    var fechaVencimientoElement = document.getElementById('fechaVencimientoCertificado');

    if (nombreElement && identificacionElement && entidadCertificadoraElement && emitidoElement && fechaVencimientoElement) {
        nombreElement.textContent = certificado.nombre;
        identificacionElement.textContent = certificado.identificacion;
        entidadCertificadoraElement.textContent = certificado.entidadCertificadora;
        emitidoElement.textContent = certificado.emitido;
        fechaVencimientoElement.textContent = certificado.fechaVencimiento;
        saveCertificateDetails(certificado);
    } else {
        console.error("Error: No se encontraron uno o más elementos del DOM para mostrar los detalles del certificado.");
    }
}

function saveCertificateDetails(certificado) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_certificate_details.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log('Detalles del certificado guardados correctamente.');
            } else {
                console.error('Error al guardar los detalles del certificado:', xhr.status);
            }
        }
    };

    var jsonData = JSON.stringify(certificado);
    xhr.send(jsonData);
}

let signatureCoordinates = { x: null, y: null };

function addFormField(name, value) {
    var element = document.createElement("input");
    element.type = "hidden";
    element.name = name;
    element.value = value;
    document.forms[0].appendChild(element);
}

function setSignatureCoordinates(x, y) {
    console.log("Coordenadas de la firma seleccionadas:", x, y);
    addFormField('llx', x.toString());
    addFormField('lly', y.toString());
}

function openPDFViewer() {
    var pdfFile = document.getElementById('pdfFile').files[0];
    
    if (pdfFile) {
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            var pdfData = event.target.result;
            var blob = new Blob([pdfData], { type: 'application/pdf' });
            var url = URL.createObjectURL(blob);

            var viewerFrame = document.getElementById('pdfViewerFrame');
            viewerFrame.src = '../pdfViewer.html?pdfFile=' + encodeURIComponent(url);
            viewerFrame.style.display = 'block';

            // var pdfViewerContainer = document.getElementById('pdfViewerContainer');
            // pdfViewerContainer.style.display = 'block';
        };
        fileReader.readAsArrayBuffer(pdfFile);
    } else {
        
        Swal.fire(`Por favor, seleccione un archivo PDF.`, "", "warning");
    }
}
function signPDF() {
    var qrContainer = document.getElementById('qr-code');
    if (!qrContainer || qrContainer.innerHTML.trim() === '') {
        //alert("El código QR aún no ha sido generado. Por favor, genéralo antes de descargar el PDF.");
        Swal.fire(`El código QR aún no ha sido generado. Por favor, genéralo antes de descargar el PDF.`, "", "warning");
        return;
    }

    var newCanvas = document.createElement('canvas');
    var newCtx = newCanvas.getContext('2d');

    newCanvas.width = canvas.width;
    newCanvas.height = canvas.height;

    newCtx.drawImage(canvas, 0, 0);

    var qrImage = qrContainer.querySelector('img');
    newCtx.drawImage(qrImage, ant_mousex, ant_mousey, qrImage.width, qrImage.height);

    newCanvas.toBlob(function(blob) {
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'pdf_firmado_con_QR.pdf';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }, 'application/pdf');
}


function signPDF() {
    var qrContainer = document.getElementById('qr-code');
    if (!qrContainer || qrContainer.innerHTML.trim() === '') {
        // alert("El código QR aún no ha sido generado. Por favor, genéralo antes de descargar el PDF.");
        Swal.fire(`El código QR aún no ha sido generado. Por favor, genéralo antes de descargar el PDF.`, "", "warning");
        return;
    }

    var newCanvas = document.createElement('canvas');
    var newCtx = newCanvas.getContext('2d');

    newCanvas.width = canvas.width;
    newCanvas.height = canvas.height;

    newCtx.drawImage(canvas, 0, 0);

    var qrImage = qrContainer.querySelector('img');
    newCtx.drawImage(qrImage, ant_mousex, ant_mousey, qrImage.width, qrImage.height);

    newCanvas.toBlob(function(blob) {
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'pdf_firmado_con_QR.pdf';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }, 'application/pdf');
}

function load_notifications() {
    fetch('../get_notifications.php')
        .then(response => response.json())
        .then(data => {
            // Obtener las firmas y el conteo de firmas del JSON
            var firmas = data.signatures;
            var conteoFirmas = data.cantidad;

            // Elementos del DOM donde se colocarán los datos
            var listNoti = document.getElementById('list_noti');
            var countNoti = document.getElementById('count_noti');
            var countNoti2 = document.getElementById('count_noti2');
           

            // Limpiar contenido previo
            listNoti.innerHTML = '';

            // Actualizar el conteo de notificaciones
            countNoti.textContent = conteoFirmas;
            countNoti2.textContent = conteoFirmas;

            // Generar el HTML para cada firma
            for (var i = 0; i < firmas.length; i++) {
                var firma = firmas[i];
                
                // Crear el elemento HTML para la firma
                var firmaElement = document.createElement('li');
                firmaElement.classList.add('geex-content__header__popup__item');
                
                // Crear el contenido de la firma
                firmaElement.innerHTML = `
                    <div class="geex-content__header__popup__link">
                        <div class="geex-content__header__popup__item__img">
                            <img src="assets/img/firma-digital copy.png" alt="Popup Img" class="" />
                        </div>
                        <div class="geex-content__header__popup__item__content">
                            <h5 class="geex-content__header__popup__item__title" style="cursor: pointer;">
                                ${firma.signature_name}
                                <span class="geex-content__header__popup__item__time"></span>
                            </h5>
                            <div class="geex-content__header__popup__item__desc">
                                Vencimiento: ${firma.validTo_time_t}
                                <span class="geex-content__header__popup__item__count"></span>
                            </div>
                        </div>
                    </div>
                `;

                // Añadir la funcionalidad de redirección al hacer clic en el h5
                var firmaTitle = firmaElement.querySelector('.geex-content__header__popup__item__title');
                firmaTitle.onclick = function() {
                    window.location.href = 'firmas.php';
                };

                // Añadir la firma al contenedor de la lista de notificaciones
                listNoti.appendChild(firmaElement);
            }
        })
        .catch(error => {
            console.error('Error al obtener las notificaciones:', error);
        });
}





openTab('firmar');