<!doctype html>
<html lang="en" dir="ltr">

<?php $title='Blank' ?>

<?php include './partials/head.php' ?>

<body class="geex-dashboard">
	
<?php include './partials/header.php'?>


<main class="geex-main-content">
		

<?php include './partials/sidebar.php'?>
	

<?php include './partials/customizer.php'?>

		<div class="geex-content">
			<div class="geex-content__section geex-content__blank">
				<div class="geex-content__error__wrapper">
					<div class="geex-content__error__content">
						 <iframe src="https://vol.uanataca.com/ec" title="Vol UANATACA"></iframe>
					</div><!-- .page-content -->
				</div>
			</div>
		</div>
	</main>

	<!-- inject:js-->
	<?php include './partials/script.php'?>
	<!-- endinject-->
</body>

</html>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Firmas</title>
</head>
<body>

    <button onclick="openPopup()">Abrir Validador de Firmas</button>

    <script>
        function openPopup() {
            window.open('https://vol.uanataca.com/es', 'popup', 'width=800,height=600');
        }
    </script>

</body>
</html>
