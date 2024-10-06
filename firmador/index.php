
<!doctype html>
<html lang="en" dir="ltr">

<?php include './partials/head.php' ?>

<body class="geex-dashboard"> 
	
<?php include './partials/header.php'?>

<main class="geex-main-content">	

<?php include './partials/sidebar.php'?>	

<?php include './partials/customizer.php'?>

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
                            <span class="geex-content__header__popup__header__subtitle">CEO, PixcelsThemes</span>
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

			<div id="photoCarousel" style="width: 50%; height: 50%; margin-left: 25%;"  class="carousel slide geex-sidebar__footer" data-bs-ride="carousel" data-bs-interval="3000">
			<div class="carousel-inner">
				<div class="carousel-item active">
				<img src="../firmador/assets/img/image1.jpg" class="d-block w-100" alt="First Image">
				</div>
				<div class="carousel-item">
				<img src="../firmador/assets/img/image2.jpg" class="d-block w-100" alt="Second Image">
				</div>
				<div class="carousel-item">
				<img src="../firmador/assets/img/image3.jpg" class="d-block w-100" alt="Third Image">
				</div>
				
			</div>
			
			<div class="social-icons">
  <a href="https://www.facebook.com" target="_blank">
    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
  </a>
  <a href="https://www.youtube.com" target="_blank">
    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" alt="YouTube">
  </a>
  <a href="https://www.yourwebsite.com" target="_blank">
    <img src="../firmador/assets/img/globo.png" alt="Página Web">
  </a>
  <a href="https://wa.me/1234567890" target="_blank">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
  </a>
</div>




		</div>

		<style>
			 .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
        }

        .social-icons a {
            text-decoration: none;
        }

        .social-icons img {
            width: 40px;
            height: 40px;
            transition: transform 0.3s ease;
        }

        .social-icons img:hover {
            transform: scale(1.1);
        }
    </style>

			
		</div>
    </main>

    <!-- inject:js-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.27.0/dist/apexcharts.min.js"></script>

	<?php include './partials/script.php'?>
    <!-- endinject-->
</body>

</html>