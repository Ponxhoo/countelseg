<!doctype html>
<html lang="en" dir="ltr">

<?php include './partials/head.php' ?>

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

            <div class="geex-content__summary">
                <div class="geex-content__summary__count">
                    <div class="geex-content__summary__count__single primay-bg">
                        <div class="geex-content__summary__count__single__content">
                            <h4 class="geex-content__summary__count__single__subtitle"><a href="firmar.php">Firmar Documento</a></h4>

                        </div>
                        <div class="geex-content__summary__count__single__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
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
                            <h4 class="geex-content__summary__count__single__subtitle"><a href="firmas.php">Firmas</a></h4>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="54px" height="54px">
                                                <path d="M3 17.25V21h3.75l11.09-11.09-3.75-3.75L3 17.25zm17.71-12.04c.39-.39.39-1.02 0-1.41l-2.54-2.54c-.39-.39-1.02-.39-1.41 0l-2.34 2.34 3.75 3.75 2.54-2.54z" />
                                            </svg>

                                            Solicitar Firma Electronica
                                        </button>
                                    </td>
                                    <td>
                                        <button class="geex-content__invoice__chat__btn geex-btn geex-btn--success">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="54px" height="54px">
                                                <path d="M17.65 6.35c-2.28-2.28-5.98-2.28-8.27 0-2.28 2.28-2.28 5.98 0 8.27 2.28 2.28 5.98 2.28 8.27 0 .29-.29.29-.77 0-1.06-.29-.29-.77-.29-1.06 0-1.84 1.84-4.82 1.84-6.66 0-1.84-1.84-1.84-4.82 0-6.66 1.84-1.84 4.82-1.84 6.66 0 .29.29.77.29 1.06 0 .29-.29.29-.77 0-1.06z" />
                                            </svg>

                                            Renovar Firma Electronica
                                        </button>
                                    </td>
                                    <td>
                                        <button class="geex-content__invoice__chat__btn geex-btn geex-btn--danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="54px" height="54px">
                                                <path d="M6 2v20l6-6 6 6V2H6zm4.5 14h-3v-2h3v2zm0-4h-3v-2h3v2zm7 4h-6v-2h6v2zm0-4h-6v-2h6v2z" />
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
				<input id="newPassword" type="password"  class="geex-content__modal__form__input"
					placeholder="Contraseña nueva" />
			</div>
			<div class="geex-content__modal__form__item">
				<input id="confirmNewPassword" type="password"  class="geex-content__modal__form__input"
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