document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('uploadSignatureButton').addEventListener('click', uploadSignature);
    //loadSignatures();
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

        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Las nuevas contraseñas no coinciden",
            footer: ''
          });
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../changePassword.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Contraseña cambiada exitosamente",
                showConfirmButton: false,
                timer: 1500
              });
              setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Error al cambiar la contraseña",
            footer: ''
          });
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

// function uploadSignature() {
//     var signatureFileInput = document.getElementById('signatureFile').files[0];
//     var signaturePasswordInput = document.getElementById('signaturePassword').value;

//     if (!signatureFileInput || !signaturePasswordInput) {
//         alert("Por favor, asegúrese de haber subido la firma y proporcionado la contraseña.");
//         return;
//     }

//     var formData = new FormData();
//     formData.append('signatureFile', signatureFileInput);
//     formData.append('signaturePassword', signaturePasswordInput);

//     var reader = new FileReader();
//     reader.onload = function(event) {
//         var base64String = btoa(event.target.result);
//         localStorage.setItem('signatureFileBase64', base64String);
//         localStorage.setItem('signaturePassword', signaturePasswordInput);

//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', 'upload_signature.php', true);
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState === 4) {
//                 if (xhr.status === 200) {
//                     var response = xhr.responseText.trim();
//                     console.log('Respuesta del servidor:', response);
//                     try {
//                         var jsonResponse = JSON.parse(response);
//                         if (jsonResponse.error) {
//                             alert('Contraseña o archivo incorrecto');
//                         } else {
//                             globalSignatureFile = signatureFileInput;
//                             globalSignaturePassword = signaturePasswordInput;

//                             if (jsonResponse.certificado) {
//                                 updateCertificateDetails(jsonResponse.certificado);
//                             } else {
//                                 getCertificateDetails();
//                             }

//                             document.getElementById('uploadPDF').style.display = 'block';
//                             document.getElementById('uploadSignatureSection').style.display = 'none';
//                         }
//                     } catch (error) {
//                         console.error('Error al analizar la respuesta JSON:', error);
//                         alert('Contraseña o archivo incorrecto');
//                     }
//                 } else {
//                     console.error('Error al subir la firma electrónica:', xhr.status);
//                     alert('Contraseña o archivo incorrecto');
//                 }
//             }
//         };
//         xhr.send(formData);
//     };
//     reader.readAsBinaryString(signatureFileInput);
// }

function uploadSignature() {
    console.log('Subiendo firma electrónica...');
    var signatureFileInput = document.getElementById('signatureFile').files[0];
    var signaturePasswordInput = document.getElementById('signaturePassword').value;

    if (!signatureFileInput || !signaturePasswordInput) {
        alert("Por favor, asegúrese de haber subido la firma y proporcionado la contraseña.");
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
                    }, 1000);
                } else {
                    console.error('Error al subir la firma electrónica:', xhr.status);
                    Swal.fire("Error al comunicarse con el servidor. Estado!"+ xhr.status , "", "error");
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
            viewerFrame.src = 'pdfViewer.html?pdfFile=' + encodeURIComponent(url);
            viewerFrame.style.display = 'block';

            var pdfViewerContainer = document.getElementById('pdfViewerContainer');
            pdfViewerContainer.style.display = 'block';
        };
        fileReader.readAsArrayBuffer(pdfFile);
    } else {
        alert("Por favor, seleccione un archivo PDF.");
    }
}
function signPDF() {
    var qrContainer = document.getElementById('qr-code');
    if (!qrContainer || qrContainer.innerHTML.trim() === '') {
        alert("El código QR aún no ha sido generado. Por favor, genéralo antes de descargar el PDF.");
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
        alert("El código QR aún no ha sido generado. Por favor, genéralo antes de descargar el PDF.");
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

openTab('firmar');


