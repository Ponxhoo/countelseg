document.addEventListener("DOMContentLoaded", function () {
  loadSignatures();
});

// function loadSignatures() {
//     fetch('get_signatures.php')
//         .then(response => response.json())
//         .then(data => {
//             var signaturesList = document.getElementById('signaturesList');
//             signaturesList.innerHTML = '';
//             data.forEach(signature => {
//                 var signatureItem = document.createElement('div');
//                 signatureItem.className = 'signature-item';
//                 signatureItem.innerHTML = `
//                     <p>${signature.signature_name}</p>
//                     <button class="select-button" data-id="${signature.id}">Seleccionar</button>
//                     <button class="delete-button" data-id="${signature.id}">Eliminar</button>
//                 `;
//                 signaturesList.appendChild(signatureItem);
//             });

//             var selectButtons = document.getElementsByClassName('select-button');
//             for (var i = 0; i < selectButtons.length; i++) {
//                 selectButtons[i].addEventListener('click', selectSignature);
//             }

//             var deleteButtons = document.getElementsByClassName('delete-button');
//             for (var i = 0; i < deleteButtons.length; i++) {
//                 deleteButtons[i].addEventListener('click', deleteSignature);
//             }
//         })
//         .catch(error => console.error('Error:', error));
// }

function loadSignatures() {
  fetch("../get_signatures.php")
    .then((response) => response.json())
    .then((data) => {
      var signaturesList = document.getElementById("signaturesList");
      signaturesList.innerHTML = ""; // Limpiar la lista antes de agregar nuevos elementos

      data.forEach((signature) => {
        // Verifica si 'validTo_time_t' está definido, sino muestra "Fecha no disponible"
        var expirationDate = signature.validTo_time_t
          ? signature.validTo_time_t
          : "Fecha no disponible";

        // Crear fila (tr)
        var signatureRow = document.createElement("tr");

        // Crear columna para el nombre
        var nameCell = document.createElement("td");
        nameCell.textContent = signature.signature_name;
        signatureRow.appendChild(nameCell);

        // Crear columna para la fecha de vencimiento
        var dateCell = document.createElement("td");
        dateCell.textContent = expirationDate;
        signatureRow.appendChild(dateCell);

        // Crear columna para las acciones
        var actionCell = document.createElement("td");
        actionCell.innerHTML = `
                  
<button onclick="processDelete(${signature.id})" class="geex-badge geex-badge--danger-transparent eliminar-btn" onclick="confirmDelete()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M3 6H5H21" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M19 6L18.417 19.159C18.3745 20.0252 17.994 20.8495 17.3484 21.4593C16.7028 22.0691 15.8494 22.4148 14.9624 22.4149H9.0376C8.15062 22.4148 7.29718 22.0691 6.65161 21.4593C6.00604 20.8495 5.62548 20.0252 5.583 19.159L5 6" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M10 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M14 11V17" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M18 6L16.5 3.5C16.2266 3.01562 15.7425 2.737 15.2 2.737H8.8C8.25747 2.737 7.77341 3.01562 7.5 3.5L6 6" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Eliminar
</button> `;

        signatureRow.appendChild(actionCell);

        // Añadir la fila a la tabla
        signaturesList.appendChild(signatureRow);
      });

      // Manejar eventos para los botones de eliminar
      //   var deleteButtons = document.getElementsByClassName("eliminar-btn");
      //   for (var i = 0; i < deleteButtons.length; i++) {
      //     deleteButtons[i].addEventListener("click", function () {
      //       // Aquí puedes poner la lógica para eliminar la firma
      //       console.log("Firma eliminada");
      //     });
      //   }
    })
    .catch((error) => console.error("Error:", error));
}

function selectSignature(event) {
  var signatureId = event.target.getAttribute("data-id");

  fetch("get_signature_by_id.php?id=" + signatureId)
    .then((response) => response.json())
    .then((data) => {
      localStorage.setItem("selectedSignature", JSON.stringify(data));
      alert(
        `Firma seleccionada con éxito: ${data.signature_name}. Ahora puedes subir y firmar el PDF.`
      );

      document.getElementById("uploadPDF").style.display = "block";
      document.getElementById("uploadSignatureSection").style.display = "none";
    })
    .catch((error) => console.error("Error:", error));
}

function deleteSignature(id) {
  return fetch("../delete_signature.php?id=" + id)
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        // loadSignatures();
        return true;
      } else {
        return false;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      return false;
    });
}

function confirmDelete() {
  document.getElementById("deleteModal").style.display = "block";
}

function closeModal() {
  document.getElementById("deleteModal").style.display = "none";
}


async function processDelete(id) {
  const result = await Swal.fire({
    title: "Seguro que desea eliminar esta firma?",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: "Eliminar",
    denyButtonText: `Cancelar`,
  });

  if (result.isConfirmed) {


    // Aquí esperamos a que deleteSignature termine
    const bnd = await deleteSignature(id);

    if (bnd) {
      // alert("Elemento eliminado.");
        Swal.fire("Elemento eliminado!", "", "success");
        setTimeout(() => {
            window.location.reload();
        }, 1000);

       
    } else {
      
      Swal.fire("Error al eliminar el elemento.!", "", "error");
      setTimeout(() => {
        window.location.reload();
    }, 1000);

    }
  } else if (result.isDenied) {
    Swal.fire("No has confirmado", "", "info");
  }
}
