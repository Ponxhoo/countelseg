<div class="container" id="container">
    <div class="form-container sign-up-container">

        <form id="registerForm" class="login100-form validate-form">
            <span class="login100-form-title p-b-43">
                Registro de Usuario
            </span>

            <div class="account-input" data-validate="Campo requerido">
                <select id="documentType" name="documentType">
                    <option value="" disabled selected>Seleccionar tipo de documento</option>
                    <option value="cedula">Cédula</option>
                    <option value="pasaporte">Pasaporte</option>
                </select>
                <span class="focus-input100"></span>
            </div>

            <div class="account-input" data-validate="Campo requerido">
                <input type="text" id="documentId" name="documentId" placeholder="Número de documento">
                <span class="focus-input100"></span>
            </div>

            <div class="account-input" data-validate="Campo requerido">
                <input type="text" id="fullName" name="fullName" placeholder="Nombre completo">
                <span class="focus-input100"></span>
            </div>

            <div class="account-input" data-validate="Campo requerido">
                <input type="text" id="username" name="username" placeholder="Nombre de usuario">
                <span class="focus-input100"></span>
            </div>

            <div class="account-input" data-validate="Campo requerido">
                <input type="password" id="password" name="password" placeholder="Contraseña">
                <span class="focus-input100"></span>
            </div>

            <div class="account-input" data-validate="Correo electrónico válido es requerido: ex@abc.xyz">
                <input type="email" id="email" name="email" placeholder="Correo electrónico">
                <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
                <button type="button" id="registerBtn" class="btn-login100">
                    Registrarse
                </button>
            </div>
        </form>

    </div>
    <div class="form-container sign-in-container">
        
        <form action="#" id="sign-in-container">
            <div class="hide" id="forgot">
                <div class="enter-email">
                    <div class="enter-email-detail">
                        <h1>¿Olvidaste tu contraseña?</h1>
                        <p>Solo ingresa tu correo electrónico para recuperar tu contraseña</p>
                        <div class="account-input ">
                            <i class="far fa-envelope"></i>
                            <input type="email" placeholder="Correo Electrónico" />
                        </div>
                        <div class="">
                            <button class="signIn-form-button">Enviar</button>
                            <p id="slideup" style="cursor: pointer"><u>cerrar</u></p>
                        </div>

                    </div>
                </div>
            </div>
            <h1>Iniciar Sesión</h1>
            <div id="mensajeError" style="color: red;"></div>

            <div class="account-input ">
                <i class="far fa-user"></i>
                <input placeholder="Usuario" id="username_login" name="username_login" />
            </div>
            <div class="account-input">
                <i class="fas fa-lock"></i>
                <input type="password" id="password_login" name="password_login" placeholder="Contraseña" />
            </div>
            <p class="forgot" id="slidedown"> ¿Olvidaste tu contraseña? </p>
            <!-- <button class="signIn-form-button">Iniciar Sesión</button> -->
            
            <button type="button" id="loginBtn" class="login100-form-btn">
                Iniciar sesión
            </button>
        </form>
        
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="square"></div>
            <div class="triangle"></div>
            <div class="circle"></div>
            <div class="square2"></div>
            <div class="triangle2"></div>
            <div class="overlay-panel overlay-left">
                <img src="images/logo.png" alt="logo" style="width: 149px; height: 100px;">
                <h1>Firmador Rápido</h1>
                <p>Sus documentos firmados de forma rápida y segura</p>
                <button class="ghost" id="signIn">Iniciar Sesión</button>

            </div>
            <div class="overlay-panel overlay-right">
                <img src="images/logo.png" alt="logo" style="width: 149px; height: 100px;">
                <h1>Firma Digital Segura</h1>
                <p>Protege tus documentos y firma con confianza desde cualquier lugar. Comienza a simplificar tus
                    procesos hoy.</p>
                <button class="ghost" id="signUp">Registrarse</button>
            </div>

        </div>
    </div>
</div>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
<script src="script.js"></script>
<script src="script_registro.js"></script>



<style type="text/css">
    @charset "utf-8";
    /* CSS Document */

    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }



    :root {
        --bg: #F0F4F3;
        --theme: #3AB19B;
        --theme-two: #FFFFFF;
        --text: #697a79;
    }

    body {
        background-image: url('images/fondologin.jpg') !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-attachment: fixed;

        /* background: #000 !important; */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
        /* background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><circle cx="50" cy="50" r="50" fill="%23FBCD44"/></g></svg>'), url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><path d="M 0 80 l 100 -80 v 100 z" fill="%23E35E6A"/></g></svg>'), var(--bg);
  background-repeat: no-repeat;
  background-position: bottom -150px left -70px, top -120px right -100px;
  background-size: 500px, 380px, 100%; */
        font-family: 'Montserrat', sans-serif;
        /* center the main element in the viewport */
        padding: 1rem 0;
    }

    body:after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 101;
        pointer-events: none;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><circle cx="50" cy="50" r="50" fill="%23ffffff22"/></g></svg>'), url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><path d="M 0 80 l 100 -80 v 100 z" fill="%23ffffff22"/></g></svg>');
        background-repeat: no-repeat;
        background-position: bottom -180px left -70px, top -120px right -100px;
        background-size: 500px, 380px;
    }

    h1 {
        font-weight: bold;
        margin: 0;

    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
        margin-bottom: 15px;
    }

    .mt-3 {
        margin-top: 15px;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
        border-bottom: 1px solid black;
        padding: 5px 0;
    }


    button {
        border-radius: 20px;
        border: 1px solid #ffffff !important;
        background: #01182d !important;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
        display: block;
        margin: 0 auto;
        cursor: pointer;
    }

    button:active {
        transform: scale(0.95);
    }

    button:focus {
        outline: none;
    }

    button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    .forgot {
        background: none;
        border: none;
        color: black;
        text-decoration: underline;
        cursor: pointer
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    form h1 {
        color: #01182d !important;
    }

    input {
        background-color: #f5f8f8;
        border: none;
        padding: 6px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .account-input {
        display: flex;
        align-items: center;
        width: 100%;
        background-color: #f5f8f8;
        padding: 0 20px;
        margin: 5px 0;
    }

    .account-input i {
        color: #878787;
    }

    .sign-in-container {
        left: 0;
        width: 60%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(64%);
    }

    .sign-up-container {
        left: 0;
        width: 60%;
        opacity: 0;
        z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
        transform: translateX(66.5%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    /*

@keyframes show {
    0%, 49.99% {
        opacity: 0;
        z-index: 1;
        
    }
    
    50%, 100% {
        opacity: 1;
        z-index: 5;
        
    }
}
*/

    .overlay-container {
        position: absolute;
        top: 0;
        left: 60%;
        width: 60%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;

    }

    .container.right-panel-active .overlay-container {
        transform: translateX(-100%);
        width: 60%;
        left: 40%;
    }

    .overlay {
        background: linear-gradient(to right, #7ee8bc 0%, #20ca89 49%, #2ad892 50%, #1e9a73 100%) no-repeat 0 0/ cover;
        background-size: 100%;
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #7ee8bc, #20ca89);
        background: linear-gradient(to right, #7ee8bc, #20ca89);
        color: #FFFFFF;
        position: relative;
        left: -115%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
        transform: translateX(50%);
        left: -82%;
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0px 95px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
        /*  right: 600px;*/
        left: -5px;
    }

    .container.right-panel-active .overlay-left {
        transform: translateX(0);
        /*  right: 445px;*/
        left: -5px;
    }

    .overlay-right {
        /*  right: 135px;*/
        left: 458px;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
        transform: translateX(20%);
        right: -20px;
    }

    /*shape in form*/
    .container.right-panel-active .overlay-container .overlay .square {
        transition: transform 0.6s ease-in-out;
        transform: translateX(0%) rotate(45deg);
        left: 40px;
    }

    .overlay-container .overlay .square {
        width: 100px;
        height: 100px;
        position: absolute;
        transform: rotate(45deg);
        background-color: #88E9C2;
        transition: transform 0.6s ease-in-out;
        left: 37px;
        top: 30px;
        transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-container .overlay .square2 {
        transition: transform 0.6s ease-in-out;
        transform: translateX(3%) rotate(40deg);
        left: 550px;
    }

    .overlay-container .overlay .square2 {
        width: 30px;
        height: 30px;
        position: absolute;
        transform: rotate(45deg);
        background-color: #88E9C2;
        transition: transform 0.6s ease-in-out;
        left: 547px;
        top: 90px;
        transform: translateX(40%) rotate(40deg);
    }

    .container.right-panel-active .overlay-container .overlay .triangle {
        transition: transform 0.6s ease-in-out;
        transform: translateX(4%) rotate(35deg);
        left: 342px;
    }

    .overlay-container .overlay .triangle {
        width: 0px;
        height: 0px;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        border-bottom: 50px solid #88E9C2;
        position: absolute;
        transition: transform 0.6s ease-in-out;
        left: 339px;
        top: 370px;
        transform: translateX(40%) rotate(35deg);
    }

    .container.right-panel-active .overlay-container .overlay .circle {
        transition: transform 0.6s ease-in-out;
        transform: translateX(4%);
        left: 585px;
    }

    .overlay-container .overlay .circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #88E9C2;
        position: absolute;
        transition: transform 0.6s ease-in-out;
        left: 589px;
        top: 370px;
        transform: translateX(40%);
    }

    .container.right-panel-active .overlay-container .overlay .triangle2 {
        transition: transform 0.6s ease-in-out;
        transform: translateX(4%) rotate(40deg);
        left: 726px;
    }

    .overlay-container .overlay .triangle2 {
        width: 0px;
        height: 0px;
        border-left: 40px solid transparent;
        border-right: 40px solid transparent;
        border-bottom: 60px solid #88E9C2;
        position: absolute;
        transition: transform 0.6s ease-in-out;
        left: 729px;
        top: 300px;
        transform: translateX(40%) rotate(40deg);
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #DDDDDD;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }

    .hide {
        display: none;
    }

    #forgot {
        height: 100%;
        position: absolute;
        background-color: #FFFFFF;
        width: 100%;
        left: 0px;
        top: 0px;
    }

    .enter-email {
        height: 100%;
        display: flex;
        align-items: center;

    }

    .enter-email-detail {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0 50px;
        flex-direction: column;
    }

    .enter-email-detail button {
        margin-top: 20px;
    }

    @media screen and (max-width: 768px) {
        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
            padding: 5px 0;
            /*  border-bottom: 1px solid black;*/
        }

        .signIn-form-button {
            margin-top: 20px;
        }

        form {
            background-color: #FFFFFF;
            display: block;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px 50px;
            height: 100%;
            text-align: center;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 680px;
        }

        .form-container {
            position: absolute;
            left: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            top: 5%;
            width: 100%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateY(50%);
        }

        .sign-up-container {
            left: 0;
            width: 100%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateY(43%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        /*----------------------------
            overlay
    -----------------------------*/
        .overlay-container {
            position: absolute;
            top: 60%;
            left: 0%;
            width: 100%;
            height: 40%;
            overflow: visible;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateY(100%);
            width: 100%;
            top: -40%;
            left: 0%;
        }

        .overlay {
            color: #FFFFFF;
            position: relative;
            left: 0%;
            top: 0%;
            height: 200%;
            width: 100%;
            transform: translateY(0%);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateY(-122%);
            top: 140%;
            left: 0%;
            height: 183%;
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0px 20px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 100%;
            transform: translateY(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateY(-173%);
            height: 85%;
            opacity: 0;
        }

        .container.right-panel-active .overlay-left {
            transform: translateY(25%);
            top: 10%;
            opacity: 1;
        }

        .overlay-right {
            left: 0px;
            height: 60%;
            top: -9%;
            transform: translateY(11%);
        }

        .container.right-panel-active .overlay-right {
            transform: translateY(180%);
            right: -20px;
            height: 85%;
            top: 30%;
        }

        .overlay-container .overlay .square {
            width: 100px;
            height: 100px;
            position: absolute;
            background-color: ##01182D;
            transition: transform 0.6s ease-in-out;
            left: 437px;
            top: 210px;
            transform: translateX(-20%) rotate(55deg);
        }

        .container.right-panel-active .overlay-container .overlay .triangle {
            transition: transform 0.6s ease-in-out;
            transform: translateX(4%) rotate(35deg);
            left: 142px;
        }

        .overlay-forgot {}

        .container.left-panel-active .overlay-forgot {
            width: 100%;
            height: 100%;
            background-color: #FFFFFF;
        }

        .enter-email {
            height: 60%;
            display: flex;
            align-items: center;

        }

        .enter-email-detail {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0 40px;
            flex-direction: column;
        }

        .enter-email-detail button {
            margin-top: 20px;
        }
    }

    @charset "utf-8";
    /* CSS Document */

    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }


    :root {
        --bg: #F0F4F3;
        --theme: #3AB19B;
        --theme-two: #FFFFFF;
        --text: #697a79;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><circle cx="50" cy="50" r="50" fill="%23FBCD44"/></g></svg>'), url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><path d="M 0 80 l 100 -80 v 100 z" fill="%23E35E6A"/></g></svg>'), var(--bg);
        background-repeat: no-repeat;
        background-position: bottom -150px left -70px, top -120px right -100px;
        background-size: 500px, 380px, 100%;
        font-family: 'Montserrat', sans-serif;
        /* center the main element in the viewport */
        padding: 1rem 0;
    }

    body:after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 101;
        pointer-events: none;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><circle cx="50" cy="50" r="50" fill="%23ffffff22"/></g></svg>'), url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g transform="scale(0.8 0.8) translate(5 5)"><path d="M 0 80 l 100 -80 v 100 z" fill="%23ffffff22"/></g></svg>');
        background-repeat: no-repeat;
        background-position: bottom -180px left -70px, top -120px right -100px;
        background-size: 500px, 380px;
    }

    h1 {
        font-weight: bold;
        margin: 0;

    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
        margin-bottom: 15px;
    }

    .mt-3 {
        margin-top: 15px;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
        border-bottom: 1px solid black;
        padding: 5px 0;
    }


    button {
        border-radius: 20px;
        border: 1px solid #58af9b;
        background: #58af9b;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
        display: block;
        margin: 0 auto;
        cursor: pointer;
    }

    button:active {
        transform: scale(0.95);
    }

    button:focus {
        outline: none;
    }

    button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    .forgot {
        background: none;
        border: none;
        color: black;
        text-decoration: underline;
        cursor: pointer
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    form h1 {
        color: #58af9b;
    }

    input {
        background-color: #f5f8f8;
        border: none;
        padding: 6px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .account-input {
        display: flex;
        align-items: center;
        width: 100%;
        background-color: #f5f8f8;
        padding: 0 20px;
        margin: 5px 0;
    }

    .account-input i {
        color: #878787;
    }

    .sign-in-container {
        left: 0;
        width: 60%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(64%);
    }

    .sign-up-container {
        left: 0;
        width: 60%;
        opacity: 0;
        z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
        transform: translateX(66.5%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    /*

@keyframes show {
    0%, 49.99% {
        opacity: 0;
        z-index: 1;
        
    }
    
    50%, 100% {
        opacity: 1;
        z-index: 5;
        
    }
}
*/

    .overlay-container {
        position: absolute;
        top: 0;
        left: 60%;
        width: 60%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;

    }

    .container.right-panel-active .overlay-container {
        transform: translateX(-100%);
        width: 60%;
        left: 40%;
    }

    .overlay {
        background: #01182d !important;
        background: linear-gradient(to right, #4B6CB7 0%, #182848 49%, #642B73 50%, #C6426E 100%) no-repeat 0 0/ cover;
        background-size: 100%;
        background: -webkit-linear-gradient(to right, #4B6CB7, #182848);
        /* Degradado para navegadores antiguos */
        background: linear-gradient(to right, #4B6CB7, #182848, #642B73, #C6426E);
        /* Degradado principal */
        color: #FFFFFF;
        position: relative;
        left: -115%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }


    .container.right-panel-active .overlay {
        transform: translateX(50%);
        left: -82%;
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0px 95px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
        /*  right: 600px;*/
        left: -5px;
    }

    .container.right-panel-active .overlay-left {
        transform: translateX(0);
        /*  right: 445px;*/
        left: -5px;
    }

    .overlay-right {
        /*  right: 135px;*/
        left: 458px;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
        transform: translateX(20%);
        right: -20px;
    }

    /*shape in form*/
    .container.right-panel-active .overlay-container .overlay .square {
        transition: transform 0.6s ease-in-out;
        transform: translateX(0%) rotate(45deg);
        left: 40px;
    }

    .overlay-container .overlay .square {
        width: 100px;
        height: 100px;
        position: absolute;
        transform: rotate(45deg);
        background-color: #88E9C2;
        transition: transform 0.6s ease-in-out;
        left: 37px;
        top: 30px;
        transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-container .overlay .square2 {
        transition: transform 0.6s ease-in-out;
        transform: translateX(3%) rotate(40deg);
        left: 550px;
    }

    .overlay-container .overlay .square2 {
        width: 30px;
        height: 30px;
        position: absolute;
        transform: rotate(45deg);
        background-color: #88E9C2;
        transition: transform 0.6s ease-in-out;
        left: 547px;
        top: 90px;
        transform: translateX(40%) rotate(40deg);
    }

    .container.right-panel-active .overlay-container .overlay .triangle {
        transition: transform 0.6s ease-in-out;
        transform: translateX(4%) rotate(35deg);
        left: 342px;
    }

    .overlay-container .overlay .triangle {
        width: 0px;
        height: 0px;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        border-bottom: 50px solid #88E9C2;
        position: absolute;
        transition: transform 0.6s ease-in-out;
        left: 339px;
        top: 370px;
        transform: translateX(40%) rotate(35deg);
    }

    .container.right-panel-active .overlay-container .overlay .circle {
        transition: transform 0.6s ease-in-out;
        transform: translateX(4%);
        left: 585px;
    }

    .overlay-container .overlay .circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #88E9C2;
        position: absolute;
        transition: transform 0.6s ease-in-out;
        left: 589px;
        top: 370px;
        transform: translateX(40%);
    }

    .container.right-panel-active .overlay-container .overlay .triangle2 {
        transition: transform 0.6s ease-in-out;
        transform: translateX(4%) rotate(40deg);
        left: 726px;
    }

    .overlay-container .overlay .triangle2 {
        width: 0px;
        height: 0px;
        border-left: 40px solid transparent;
        border-right: 40px solid transparent;
        border-bottom: 60px solid #88E9C2;
        position: absolute;
        transition: transform 0.6s ease-in-out;
        left: 729px;
        top: 300px;
        transform: translateX(40%) rotate(40deg);
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #DDDDDD;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }

    .hide {
        display: none;
    }

    #forgot {
        height: 100%;
        position: absolute;
        background-color: #FFFFFF;
        width: 100%;
        left: 0px;
        top: 0px;
    }

    .enter-email {
        height: 100%;
        display: flex;
        align-items: center;

    }

    .enter-email-detail {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0 50px;
        flex-direction: column;
    }

    .enter-email-detail button {
        margin-top: 20px;
    }

    @media screen and (max-width: 768px) {
        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
            padding: 5px 0;
            /*  border-bottom: 1px solid black;*/
        }

        .signIn-form-button {
            margin-top: 20px;
        }

        form {
            background-color: #FFFFFF;
            display: block;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px 50px;
            height: 100%;
            text-align: center;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 680px;
        }

        .form-container {
            position: absolute;
            left: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            top: 5%;
            width: 100%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateY(50%);
        }

        .sign-up-container {
            left: 0;
            width: 100%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateY(43%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        /*----------------------------
            overlay
    -----------------------------*/
        .overlay-container {
            position: absolute;
            top: 60%;
            left: 0%;
            width: 100%;
            height: 40%;
            overflow: visible;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateY(100%);
            width: 100%;
            top: -40%;
            left: 0%;
        }

        .overlay {
            color: #FFFFFF;
            position: relative;
            left: 0%;
            top: 0%;
            height: 200%;
            width: 100%;
            transform: translateY(0%);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateY(-122%);
            top: 140%;
            left: 0%;
            height: 183%;
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0px 20px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 100%;
            transform: translateY(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateY(-173%);
            height: 85%;
            opacity: 0;
        }

        .container.right-panel-active .overlay-left {
            transform: translateY(25%);
            top: 10%;
            opacity: 1;
        }

        .overlay-right {
            left: 0px;
            height: 60%;
            top: -9%;
            transform: translateY(11%);
        }

        .container.right-panel-active .overlay-right {
            transform: translateY(180%);
            right: -20px;
            height: 85%;
            top: 30%;
        }

        .overlay-container .overlay .square {
            width: 100px;
            height: 100px;
            position: absolute;
            background-color: #88E9C2;
            transition: transform 0.6s ease-in-out;
            left: 437px;
            top: 210px;
            transform: translateX(-20%) rotate(55deg);
        }

        .container.right-panel-active .overlay-container .overlay .triangle {
            transition: transform 0.6s ease-in-out;
            transform: translateX(4%) rotate(35deg);
            left: 142px;
        }

        .overlay-forgot {}

        .container.left-panel-active .overlay-forgot {
            width: 100%;
            height: 100%;
            background-color: #FFFFFF;
        }

        .enter-email {
            height: 60%;
            display: flex;
            align-items: center;

        }

        .enter-email-detail {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0 40px;
            flex-direction: column;
        }

        .enter-email-detail button {
            margin-top: 20px;
        }
    }
</style>


<script>
    // Cerrar el formulario de recuperación de contraseña
    document.getElementById('slideup').addEventListener('click', function () {
        document.getElementById('forgot').classList.add('hide');
    });

    // Abrir el formulario de recuperación de contraseña
    document.getElementById('slidedown').addEventListener('click', function () {
        document.getElementById('forgot').classList.remove('hide');
    });

    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });
</script>