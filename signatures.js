
function loadSignatures(dias) {
  fetch("../get_signatures.php?opc=1")
    .then((response) => response.json())
    .then((data) => {
      var signaturesList = document.getElementById("signaturesList");
      signaturesList.innerHTML = ""; // Limpiar la lista antes de agregar nuevos elementos

      data.forEach((signature) => {
        // Verifica si 'validTo_time_t' está definido, sino muestra "Fecha no disponible"
        var expirationDate = signature.validTo_time_t
          ? new Date(signature.validTo_time_t)
          : null;

        // Crear fila (tr)
        var signatureRow = document.createElement("tr");

        if (expirationDate) {
          var currentDate = new Date();
          var tenDaysLater = new Date();
          tenDaysLater.setDate(currentDate.getDate() + dias);

          // Verifica si la firma ya está caducada
          if (expirationDate < currentDate) {
            signatureRow.classList.add("expired"); // Clase CSS para poner el texto en rojo para firmas caducadas
          }
          // Verifica si la firma está por caducar dentro de los próximos "dias" días
          else if (expirationDate >= currentDate && expirationDate <= tenDaysLater) {
            signatureRow.classList.add("expiring-soon"); // Clase CSS para poner el texto en naranja para firmas que expiran pronto
          }
        }

        // Crear columna para el nombre
        var nameCell = document.createElement("td");
        nameCell.textContent = signature.signature_name;
        signatureRow.appendChild(nameCell);

        // Crear columna para la fecha de vencimiento
        var dateCell = document.createElement("td");
        dateCell.textContent = expirationDate
          ? expirationDate.toLocaleDateString()
          : "Fecha no disponible";
        signatureRow.appendChild(dateCell);

        // Crear columna para las acciones
        var actionCell = document.createElement("td");
        actionCell.innerHTML = `  
        <button onclick="processDelete(${signature.id})" class="geex-badge geex-badge--danger-transparent eliminar-btn">
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
    })
    .catch((error) => console.error("Error:", error));
}




function loadSignatures_firmador() {
  fetch("../get_signatures.php?opc=2")
    .then((response) => response.json())
    .then((data) => {
      const selectElement = document.getElementById("firmas");
      
      // Limpiar opciones existentesprof
      selectElement.innerHTML = "";

        const option1 = document.createElement("option");
        option1.value = ""; // Asignar el id como valor de la opción
        option1.text = "Selecione una firma"; // Asignar el nombre como el texto de la opción
        selectElement.appendChild(option1);

      // Recorrer los datos y agregar cada firma como una opción
      data.forEach((signature) => {
        // Crear un nuevo elemento de opción
        const option = document.createElement("option");
        option.value = signature.id; // Asignar el id como valor de la opción
        option.text = signature.signature_name; // Asignar el nombre como el texto de la opción

        // Agregar la opción al select
        selectElement.appendChild(option);
      });
    })
    .catch((error) => console.error("Error:", error));
}


function selectSignature(id) {
  // var signatureId = event.target.getAttribute("data-id");

  fetch("../get_signature_by_id.php?id=" + id)
    .then((response) => response.json())
    .then((data) => {
      lbl_texto.innerHTML = "Firma caduca en: "+data.validTo_time_t;
      localStorage.setItem("selectedSignature", JSON.stringify(data));
      // alert(
      //   `Firma seleccionada con éxito: ${data.signature_name}. Ahora puedes subir y firmar el PDF.`
      // );
      Swal.fire(`Firma seleccionada con éxito:!  ${data.signature_name}!`, "", "success");

      // document.getElementById("uploadPDF").style.display = "block";
      // document.getElementById("uploadSignatureSection").style.display = "none";

      var viewerFrame = document.getElementById('pdfViewerFrame');
      viewerFrame.src = '';
      viewerFrame.style.display = 'block';

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
