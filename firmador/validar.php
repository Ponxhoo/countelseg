<!doctype html>
<html lang="en" dir="ltr">

<head>
    <?php $title = 'Blank' ?>
    <?php include './partials/head.php' ?>
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     openPopup();
        // });

        function openPopup() {
            const popupWidth = 800;  // Ancho del popup
            const popupHeight = 600;  // Altura del popup

            // Calcula la posición del popup para que esté centrado
            const left = (screen.width - popupWidth) / 2;
            const top = (screen.height - popupHeight) / 2;

            // Abrir una nueva ventana sin barra de herramientas, barra de navegación, sin botones de minimizar/maximizar
            window.open(
                'https://vol.uanataca.com/es', 
                'popupWindow', 
                `width=${popupWidth},height=${popupHeight},top=${top},left=${left},toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no`
            );
        }
    </script>
</head>

<body class="geex-dashboard">
    <?php include './partials/header.php' ?>

    <main class="geex-main-content">
        <?php include './partials/sidebar.php' ?>
        <?php include './partials/customizer.php' ?>

        <div class="geex-content__section geex-content__error">
				<div class="geex-content__error__wrapper">
					<div class="geex-content__error__content">
					<iframe src="https://lottie.host/embed/eb41299f-1c44-4293-b498-23bee738b42c/PzonXVHZaf.json"></iframe>
						<div class="geex-content__pricing__btn-part">
							<a onclick="openPopup()" class="geex-content__pricing__btn" href="">Validar Documento</a>
						</div>
						<h3 class="geex-content__error__subtitle secondary">Volver a Cargar el Validador</h3>     
						<p class="geex-content__error__desc">Utilice la herramienta de validación para verificar la firma y asegurar la integridad del documento.</p>
					</div><!-- .page-content -->
				</div>
			</div>
    </main>

    <!-- inject:js-->
    <?php include './partials/script.php' ?>
    <!-- endinject-->
</body>

</html>
