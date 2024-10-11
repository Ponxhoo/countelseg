<!doctype html>
<html lang="en" dir="ltr">

<?php include './partials/head.php' ?>

<script>
    window.onload = function() {
		load_notifications();
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
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 20H10C10 20.5304 10.2107 21.0391 10.5858 21.4142C10.9609 21.7893 11.4696 22 12 22C12.5304 22 13.0391 21.7893 13.4142 21.4142C13.7893 21.0391 14 20.5304 14 20H20C20.2652 20 20.5196 19.8946 20.7071 19.7071C20.8946 19.5196 21 19.2652 21 19C21 18.7348 20.8946 18.4804 20.7071 18.2929C20.5196 18.1054 20.2652 18 20 18V11C20 8.87827 19.1571 6.84344 17.6569 5.34315C16.1566 3.84285 14.1217 3 12 3C9.87827 3 7.84344 3.84285 6.34315 5.34315C4.84285 6.84344 4 8.87827 4 11V18C3.73478 18 3.48043 18.1054 3.29289 18.2929C3.10536 18.4804 3 18.7348 3 19C3 19.2652 3.10536 19.5196 3.29289 19.7071C3.48043 19.8946 3.73478 20 4 20V20ZM6 11C6 9.4087 6.63214 7.88258 7.75736 6.75736C8.88258 5.63214 10.4087 5 12 5C13.5913 5 15.1174 5.63214 16.2426 6.75736C17.3679 7.88258 18 9.4087 18 11V18H6V11Z"
                                            fill="#464255" />
                                    </svg>
                                    <span class="geex-content__header__badge bg-info">2</span>
                                </a>
                                <div class="geex-content__header__popup geex-content__header__popup--notification">
                                    <h3 class="geex-content__header__popup__title">
                                        Notificación<span class="content__header__popup__title__count" id="count_noti">5</span>
                                    </h3>
                                    <div class="geex-content__header__popup__content">
                                        <ul class="geex-content__header__popup__items" id="list_noti">
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
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
                                                <?php echo $_SESSION['user'] ?>
                                            </h3>
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
                                        <a onclick="logout()"
                                            class="geex-content__header__popup__footer__link geex-btn geex-btn--primary">
                                            <i class="uil uil-arrow-up-left"></i>Cerrar Sesión
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="geex-content__summary">
                <div class="geex-content__summary__count">
                    <div class="geex-content__summary__count__single primay-bg">
                        <div class="geex-content__summary__count__single__content">
                            <h4 class="geex-content__summary__count__single__subtitle"><a href="firmar.php">Firmar
                                    Documento</a></h4>

                        </div>
                        <div class="geex-content__summary__count__single__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-file-text">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 11 12 11 11 13"></polyline>
                            </svg>

                        </div>
                    </div>
                    <div class="geex-content__summary__count__single danger-bg">
                        <div class="geex-content__summary__count__single__content">
                            <h4 class="geex-content__summary__count__single__subtitle"><a href="firmas.php">Firmas</a>
                            </h4>
                        </div>
                        <div class="geex-content__summary__count__single__icon">
                            <img src="../firmador/assets/img/firma-digital.png" alt="">
                        </div>
                    </div>

                </div>
                <div class="geex-content__summary__balance">
                    <img src="assets/img/balance-bg.svg" class="geex-content__summary__balance__img" alt="Invoice" />
                    <div class="geex-content__summary__balance__content">
                        <span class="geex-content__summary__balance__subtitle">Firmas registradas</span>
                        <h2 class="geex-content__summary__balance__title" id="firmas"></h2>
                    </div>
                </div>
            </div>

            <br>
            <div class="geex-content__wrapper">
                <div class="geex-content__section-wrapper">
                    <div class="geex-content__summary">
                        <div class="geex-content__summary__count">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <button class="geex-content__invoice__chat__btn geex-btn geex-btn--primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" width="54px" height="54px">
                                                <path
                                                    d="M3 17.25V21h3.75l11.09-11.09-3.75-3.75L3 17.25zm17.71-12.04c.39-.39.39-1.02 0-1.41l-2.54-2.54c-.39-.39-1.02-.39-1.41 0l-2.34 2.34 3.75 3.75 2.54-2.54z" />
                                            </svg>

                                            Solicitar Firma Electronica
                                        </button>
                                    </td>
                                    <td>
                                        <button class="geex-content__invoice__chat__btn geex-btn geex-btn--success">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" width="54px" height="54px">
                                                <path
                                                    d="M17.65 6.35c-2.28-2.28-5.98-2.28-8.27 0-2.28 2.28-2.28 5.98 0 8.27 2.28 2.28 5.98 2.28 8.27 0 .29-.29.29-.77 0-1.06-.29-.29-.77-.29-1.06 0-1.84 1.84-4.82 1.84-6.66 0-1.84-1.84-1.84-4.82 0-6.66 1.84-1.84 4.82-1.84 6.66 0 .29.29.77.29 1.06 0 .29-.29.29-.77 0-1.06z" />
                                            </svg>

                                            Renovar Firma Electronica
                                        </button>
                                    </td>
                                    <td>
                                        <button class="geex-content__invoice__chat__btn geex-btn geex-btn--danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" width="54px" height="54px">
                                                <path
                                                    d="M6 2v20l6-6 6 6V2H6zm4.5 14h-3v-2h3v2zm0-4h-3v-2h3v2zm7 4h-6v-2h6v2zm0-4h-6v-2h6v2z" />
                                            </svg>

                                            Solicitar Facturación Electronica
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




        </div>



        </div>

        </div>
        </div>




        </div>
        <!-- Modal para cambiar contraseña -->
        <div class="geex-content__modal__form" id="modal2">
            <div class="geex-content__modal__form__header">
                <h3 class="geex-content__modal__form__title">Cambiar contraseña</h3>
                <button class="geex-content__modal__form__close">
                    <i class="uil-times"></i>
                </button>
            </div>
            <!-- /<form class="geex-content__modal__form__wrapper"> -->

            <div class="geex-content__modal__form__item">
                <input id="currentPassword" type="password" class="geex-content__modal__form__input"
                    placeholder="Contraseña actual" />
            </div>
            <div class="geex-content__modal__form__item">
                <input id="newPassword" type="password" class="geex-content__modal__form__input"
                    placeholder="Contraseña nueva" />
            </div>
            <div class="geex-content__modal__form__item">
                <input id="confirmNewPassword" type="password" class="geex-content__modal__form__input"
                    placeholder="Confirmar nueva contraseña" />
            </div>

            <div class="geex-content__modal__form__item">
                <button onclick="submitChangePassword()" class="geex-content__modal__form__submit">Cambiar</button>
            </div>
            <!-- </form> -->
        </div>
    </main>
    



    <!-- inject:js-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.27.0/dist/apexcharts.min.js"></script>
    <script src="../firmaEC.js"></script>

    

    <?php include './partials/script.php' ?>
    <!-- endinject-->
</body>

</html>