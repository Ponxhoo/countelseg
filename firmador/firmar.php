<!doctype html>
<html lang="en" dir="ltr">

<?php include './partials/head.php' ?>
<script>
    window.onload = function() {
        loadSignatures_firmador();
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
                                            <h3 class="geex-content__header__popup__header__title">Mahabub Alam</h3>
                                            <span class="geex-content__header__popup__header__subtitle">CEO,
                                                PixcelsThemes</span>
                                        </div>
                                    </div>
                                    <div class="geex-content__header__popup__content">
                                        <ul class="geex-content__header__popup__items">
                                            <li class="geex-content__header__popup__item">
                                                <a class="geex-content__header__popup__link" href="#">
                                                    <i class="uil uil-user"></i>
                                                    Profile
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="geex-content__header__popup__footer">
                                        <a href="#" class="geex-content__header__popup__footer__link">
                                            <i class="uil uil-arrow-up-left"></i>Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <table>
                <tr>
                    <td valign="top" style="width: 5%;">
                        <div class="geex-content__section geex-content__form "  style="width: 90%;"  >
                            <div class="geex-content__form__wrapper">
                                <div class="geex-content__form__wrapper__item geex-content__form__left">
                                    <div class="geex-content__todo__header__title">
                                        <label for="firmas">Seleccione una firma</label>
                                    </div>
                                    <div class="geex-content__core__action__select">
                                        <select class="asset_select" name="firmas" onchange="selectSignature(this.value)" id="firmas">
                                            
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                            <path d="M13.9873 19.217C13.7177 19.2146 13.4596 19.1076 13.2674 18.9186L3.08562 8.73681C2.90015 8.54478 2.79752 8.28759 2.79984 8.02062C2.80216 7.75366 2.90924 7.49829 3.09802 7.30951C3.2868 7.12073 3.54217 7.01365 3.80914 7.01133C4.0761 7.00901 4.3333 7.11164 4.52533 7.29711L13.9873 16.7591L23.4493 7.29711C23.5432 7.19986 23.6555 7.12229 23.7798 7.06893C23.904 7.01557 24.0376 6.98748 24.1728 6.98631C24.308 6.98513 24.442 7.01089 24.5672 7.06209C24.6923 7.11328 24.806 7.18889 24.9016 7.28449C24.9972 7.38009 25.0728 7.49377 25.124 7.6189C25.1752 7.74403 25.2009 7.8781 25.1998 8.0133C25.1986 8.14849 25.1705 8.2821 25.1171 8.40632C25.0638 8.53054 24.9862 8.64289 24.889 8.73681L14.7071 18.9186C14.515 19.1076 14.2568 19.2146 13.9873 19.217Z" fill="#AB54DB" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="geex-content__invoice__chat__amount">
                                <label for="invoice_amount">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                        <circle cx="14" cy="14" r="13" stroke="#A3A3A3" stroke-width="2" fill="none" />
                                        <path d="M9 7H16L19 10V21H9V7Z" stroke="#A3A3A3" stroke-width="1.5" fill="none" />
                                        <path d="M16 7V10H19" stroke="#A3A3A3" stroke-width="1.5" fill="none" />
                                    </svg>

                                </label>
                                <input type="file" id="pdfFile" name="pdfFile" />
                            </div>

                            <div class="geex-content__invoice__chat__content">
                                <div class="geex-content__invoice__chat__content__single">
                                    <button class="geex-btn geex-btn--primary" onclick="openPDFViewer()">
                                        <i class="uil-eye"></i> Visualizar y firmar PDF</button>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td valign="top" style="width: 80%;">
                        <div class="geex-content__section geex-content__form"  >

                        <iframe id="pdfViewerFrame" style="width: 100%; height: 600px;" frameborder="0"></iframe>
            

                        </div>

                    </td>
                </tr>
            </table>




        </div>



        <div class="geex-content__modal__form">
            <div class="geex-content__modal__form__header">
                <h3 class="geex-content__modal__form__title">Subir Firma Electrónica</h3>
                <button class="geex-content__modal__form__close">
                    <i class="uil-times"></i>
                </button>
            </div>
            <!-- /<form class="geex-content__modal__form__wrapper"> -->
            <div class="geex-content__modal__form__item">
                <input id="signatureFile" type="file" name="firma" class="geex-content__modal__form__input"
                    placeholder="firma" accept=".p12" />
            </div>
            <div class="geex-content__modal__form__item">
                <input id="signaturePassword" type="password" name="Clavefirma" class="geex-content__modal__form__input"
                    placeholder="Clave" />
            </div>

            <div class="geex-content__modal__form__item">
                <button id="uploadSignatureButton" class="geex-content__modal__form__submit">Guardar</button>
            </div>
            <!-- </form> -->
        </div>
        </div>
        </div>
    </main>

    <!-- inject:js-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.27.0/dist/apexcharts.min.js"></script>
    <script src="../firmaEC.js"></script>
    <script src="../signatures.js"></script>


    <?php include './partials/script.php' ?>
    <!-- endinject-->


</body>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        width: 33%;
        /* Ajusta este valor según sea necesario */
        
    }

    th {
        background-color: #f2f2f2;
        color: #011053 !important;
    }
</style>

</html>