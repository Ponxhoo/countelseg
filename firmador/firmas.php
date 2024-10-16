<?php
session_start();
?>
<!doctype html>
<html lang="en" dir="ltr">

<?php include './partials/head.php' ?>



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

			<div class="geex-content__section geex-content__form">
				<div class="geex-content__form__wrapper">
					<div class="geex-content__form__wrapper__item geex-content__form__left">
						<div class="geex-content__todo__header__title">
							<button class="geex-btn geex-btn--primary geex-btn__add-modal"><i class="uil-plus"></i>
								Agregar Firma</button>
						</div>

					</div>
				</div>


				<table  id="tbl">
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
					<tfoot>
						<tr>
							<td colspan="3">
								<p  style="width: 100%;">
									<b>Leyenda:</b> <br> </p>
								<p> Firmas caducadas en color <b style="color: red;">ROJO</b></p>
								<p> Firmas proximas a caducar en color <b style="color: orange;">NARANJA</b></p>
							</td>
						</tr>
					</tfoot>
				</table>







            </div>

        </div>



		<div class="geex-content__modal__form" id="modal1">
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
	<script src="../signatures.js"></script>


	<?php include './partials/script.php' ?>
	<!-- endinject-->


</body>
<style>
	/* table {
		width: 100%;
		border-collapse: collapse;
	}

	th,
	td {
		text-align: left;
		padding: 8px;
		width: 33%;

	
	}

	th {
		color: #011053 ;
		background-color: #f2f2f2;
	} */

	 /* Estilos generales para la tabla */
#tbl {
    width: 100%; /* Se adapta al ancho del contenedor */
    border-collapse: collapse; /* Elimina los espacios entre celdas */
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
}

/* Estilos para las celdas */
#tbl th, #tbl td {
    padding: 12px; /* Espacio interno de las celdas */
    border: 1px solid #ddd; /* Bordes finos */
}

/* Colores para las filas */
#tbl tr:nth-child(even) {
    background-color: #f9f9f9; /* Color de fondo alternado */
}

#tbl th {
    background-color: #3885C9; /* Fondo verde para el encabezado */
    color: white; /* Texto blanco */
}

/* Hacer que la tabla se vea bien en pantallas pequeñas */
@media screen and (max-width: 768px) {
    #tbl {
        font-size: 14px; /* Reducir el tamaño de fuente */
    }
    #tbl th, #tbl td {
        padding: 8px; /* Reducir el padding en pantallas pequeñas */
    }
}

/* Para pantallas aún más pequeñas, como móviles */
@media screen and (max-width: 480px) {
    #tbl {
        font-size: 12px; /* Aún más pequeño para móviles */
    }
    #tbl th, #tbl td {
        padding: 5px; /* Reducir el padding aún más */
    }

    /* Convertir la tabla a un formato de lista */
    #tbl, #tbl thead, #tbl tbody, #tbl th, #tbl td, #tbl tr {
        display: block;
    }

    /* Ocultar el encabezado de la tabla en móviles */
    #tbl thead tr {
        display: none;
    }

    /* Mostrar cada celda en bloque con una etiqueta */
    #tbl tr {
        margin-bottom: 15px; /* Separar las filas */
    }

    #tbl td {
        position: relative;
        padding-left: 50%;
        text-align: right;
    }

    #tbl td:before {
        content: attr(data-label); /* Agregar el nombre de la columna antes de cada celda */
        position: absolute;
        left: 0;
        width: 45%;
        padding-left: 10px;
        text-align: left;
        font-weight: bold;
    }
}

</style>

</html>