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
												<a class="geex-btn__add-modal_password">
													<i class="uil uil-user"></i>
													Cambiar Contraseña
												</a>
											</li>
										</ul>
									</div>
									<div class="geex-content__header__popup__footer">
										<a onclick="logout()" class="geex-content__header__popup__footer__link">
											<i class="uil uil-arrow-up-left"></i>Cerrar Sesión
										</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

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

            <div class="geex-content__section geex-content__form">
                <div class="geex-content__form__wrapper">
                    <div class="geex-content__form__wrapper__item geex-content__form__left">
                        <div class="geex-content__todo__header__title">
                            <button class="geex-btn geex-btn--primary geex-btn__add-modal"><i class="uil-plus"></i>
                                Agregar Firma</button>
                        </div>

                    </div>
                </div>


                <table width="100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de Vencimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="signaturesList">
                        <!-- Aquí se insertan las filas dinámicamente -->
                    </tbody>
                </table>






            </div>

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
}
</style>

</html>