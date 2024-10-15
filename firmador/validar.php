<?php
session_start();
?>
<!doctype html>
<html lang="en" dir="ltr">

<?php include './partials/head.php' ?>


<head>
    <?php $title = 'Blank' ?>
    <?php include './partials/head.php' ?>
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     openPopup();
        // });

        function openPopup() {
            const popupWidth = 800; // Ancho del popup
            const popupHeight = 600; // Altura del popup

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
<script>
    var dias = <?php echo $_SESSION['dias'] ?>;
    window.onload = function() {
        loadSignatures(dias);
    };
</script>


<body class="geex-dashboard">

    <?php include './partials/header.php' ?>

    <main class="geex-main-content">

        <?php include './partials/sidebar.php' ?>

        <?php include './partials/customizer.php' ?>



        <div class="geex-content">
            <div class="geex-content__header">
                <div class="geex-content__header__content">
                    <h2 class="geex-content__header__title">Firmador Digital</h2>
                    <p class="geex-content__header__subtitle">Sus documentos firmados de forma rápida y segura</p>
                </div>

                <div class="geex-content__header__action">
                    <div class="geex-content__header__customizer">
                        <button class="geex-btn geex-btn__toggle-sidebar">
                            <i class="uil uil-align-center-alt"></i>
                        </button>
                        <button class="geex-btn geex-btn__customizer">
                            <i class="uil uil-pen"></i>
                            <span>Aspecto</span>
                        </button>
                    </div>
                    <div class="geex-content__header__action__wrap">
                        <ul class="geex-content__header__quickaction">

                            <li class="geex-content__header__quickaction__item">
                                <a href="#" class="geex-content__header__quickaction__link">
                                    <img class="user-img" src="assets/img/avatar/profile.png" alt="user" />

                                </a>
                                <div class="geex-content__header__popup geex-content__header__popup--author">
                                    <div class="geex-content__header__popup__header">
                                        <div class="geex-content__header__popup__header__img">
                                            <img src="assets/img/avatar/profile.png" alt="user" />
                                        </div>
                                        <div class="geex-content__header__popup__header__content">
                                            <h3 class="geex-content__header__popup__header__title">
                                                <?php echo $_SESSION['user'] ?></h3>
                                        </div>
                                    </div>
                                    <div class="geex-content__header__popup__content">
                                        <ul class="geex-content__header__popup__items">
                                            <li class="geex-content__header__popup__item">
                                                <a class="geex-btn__add-modal_password ">
                                                    <i class="uil uil-user"></i>
                                                    Cambiar Contraseña
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="geex-content__header__popup__footer">
                                        <a onclick="logout()" class="geex-content__header__popup__footer__link geex-btn geex-btn--primary">
                                            <i class="uil uil-arrow-up-left"></i>Cerrar Sesión
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="geex-content__section geex-content__error">
                <div class="geex-content__error__wrapper">
                    <div class="geex-content__error__content">
                        <iframe src="https://lottie.host/embed/eb41299f-1c44-4293-b498-23bee738b42c/PzonXVHZaf.json"></iframe>
                        <div class="geex-content__pricing__btn-part">
                            <a onclick="openPopup()" class="geex-content__pricing__btn" href="">Validar Documento</a>
                        </div>
                        <h3 class="geex-content__error__subtitle secondary">Validación de documentos firmados</h3>
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