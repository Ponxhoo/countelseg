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
                                            <h3 class="geex-content__header__popup__header__title">Mahabub Alam</h3>
                                            <span class="geex-content__header__popup__header__subtitle">CEO, PixcelsThemes</span>
                                        </div>
                                    </div>
                                    <div class="geex-content__header__popup__content">
                                        <ul class="geex-content__header__popup__items">
                                            <li class="geex-content__header__popup__item">
                                                <a class="geex-content__header__popup__link" href="#">
                                                    <i class="uil uil-user"></i>
                                                    Perfil
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

            <div class="geex-content__wrapper">
                <div class="geex-content__section-wrapper">
                    <div class="geex-content__summary">
                        <div class="geex-content__summary__balance">
                            <img src="assets/img/balance-bg.svg" class="geex-content__summary__balance__img" alt="Invoice" />
                            <div class="geex-content__summary__balance__content">
                                <span class="geex-content__summary__balance__subtitle">Firmas</span>
                                <h2 class="geex-content__summary__balance__title" id="cont_firmas"></h2>
                                <span class="geex-content__summary__balance__time"></span>
                                <span class="geex-content__summary__balance__chip">Revisar</span>
                            </div>
                        </div>


                        <div class="geex-content__summary__count">
                            <div class="geex-content__summary__count__single primay-bg">
                                <div class="geex-content__summary__count__single__content">
                                    <h4 class="geex-content__summary__count__single__title">982</h4>
                                    <p class="geex-content__summary__count__single__subtitle">Invoice Sent</p>
                                </div>
                                <div class="geex-content__summary__count__single__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M26.9908 5.10791C26.7542 4.84524 26.4229 4.68728 26.0699 4.66878C25.7168 4.65027 25.3709 4.77274 25.1081 5.00925L12.7148 16.1626L6.94277 10.3906C6.81978 10.2632 6.67265 10.1617 6.50998 10.0918C6.34731 10.0219 6.17235 9.98512 5.99531 9.98358C5.81827 9.98204 5.6427 10.0158 5.47884 10.0828C5.31497 10.1499 5.16611 10.2489 5.04091 10.3741C4.91572 10.4992 4.81672 10.6481 4.74968 10.812C4.68264 10.9758 4.6489 11.1514 4.65044 11.3285C4.65198 11.5055 4.68876 11.6804 4.75864 11.8431C4.82852 12.0058 4.93009 12.1529 5.05744 12.2759L11.7241 18.9426C11.9656 19.184 12.2905 19.3235 12.6319 19.3325C12.9732 19.3414 13.305 19.219 13.5588 18.9906L26.8921 6.99058C27.1548 6.75397 27.3127 6.42272 27.3312 6.06968C27.3498 5.71663 27.2273 5.37069 26.9908 5.10791Z" fill="#464255" />
                                        <path d="M25.1085 13.0093L12.7152 24.1626L6.94321 18.3906C6.69174 18.1478 6.35494 18.0134 6.00534 18.0164C5.65575 18.0195 5.32133 18.1597 5.07412 18.4069C4.82691 18.6541 4.68668 18.9885 4.68364 19.3381C4.68061 19.6877 4.815 20.0245 5.05788 20.276L11.7245 26.9426C11.966 27.1841 12.291 27.3236 12.6323 27.3325C12.9737 27.3415 13.3054 27.2191 13.5592 26.9906L26.8925 14.9906C27.1473 14.752 27.2983 14.423 27.3131 14.0742C27.3279 13.7255 27.2054 13.3848 26.9718 13.1254C26.7383 12.866 26.4123 12.7086 26.0639 12.6868C25.7155 12.6651 25.3725 12.7809 25.1085 13.0093Z" fill="#464255" />
                                    </svg>
                                </div>
                            </div>
                            <div class="geex-content__summary__count__single danger-bg">
                                <div class="geex-content__summary__count__single__content">
                                    <h4 class="geex-content__summary__count__single__title">45</h4>
                                    <p class="geex-content__summary__count__single__subtitle">Pending Invoice</p>
                                </div>
                                <div class="geex-content__summary__count__single__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M15.9997 1.33321C13.0989 1.33321 10.2632 2.19339 7.85132 3.80498C5.4394 5.41658 3.55953 7.7072 2.44945 10.3872C1.33936 13.0672 1.04891 16.0161 1.61483 18.8612C2.18075 21.7063 3.57761 24.3196 5.62878 26.3708C7.67995 28.4219 10.2933 29.8188 13.1384 30.3847C15.9834 30.9506 18.9324 30.6602 21.6124 29.5501C24.2924 28.44 26.583 26.5602 28.1946 24.1482C29.8062 21.7363 30.6664 18.9007 30.6664 15.9999C30.6618 12.1114 29.1151 8.38358 26.3655 5.63404C23.616 2.8845 19.8881 1.33779 15.9997 1.33321ZM15.9997 27.9999C13.6263 27.9999 11.3062 27.2961 9.33284 25.9775C7.35945 24.6589 5.82138 22.7848 4.91313 20.5921C4.00488 18.3994 3.76724 15.9866 4.23026 13.6588C4.69328 11.331 5.83617 9.19282 7.5144 7.51459C9.19263 5.83636 11.3308 4.69347 13.6586 4.23045C15.9864 3.76743 18.3992 4.00507 20.5919 4.91332C22.7846 5.82157 24.6587 7.35964 25.9773 9.33303C27.2959 11.3064 27.9997 13.6265 27.9997 15.9999C27.9958 19.1813 26.7303 22.2313 24.4807 24.4809C22.2311 26.7305 19.1811 27.996 15.9997 27.9999Z" fill="#464255" />
                                        <path d="M18.9433 7.55344C18.1839 7.05351 17.3108 6.75286 16.4046 6.67923C15.4984 6.60559 14.5882 6.76134 13.758 7.13211C12.8218 7.54836 12.0291 8.23143 11.4792 9.09587C10.9292 9.96031 10.6463 10.9677 10.666 11.9921V12.0001C10.6671 12.3537 10.8086 12.6925 11.0594 12.9417C11.3101 13.191 11.6497 13.3305 12.0033 13.3294C12.357 13.3284 12.6957 13.1869 12.945 12.9361C13.1943 12.6853 13.3337 12.3457 13.3327 11.9921C13.3191 11.4931 13.4503 11.0009 13.7106 10.5749C13.9709 10.149 14.3491 9.80763 14.7993 9.59211C15.224 9.3921 15.6928 9.30424 16.161 9.33692C16.6292 9.3696 17.0813 9.52172 17.474 9.77878C17.8246 10.0106 18.1154 10.3221 18.3227 10.6877C18.53 11.0533 18.6479 11.4627 18.6669 11.8826C18.6859 12.3025 18.6054 12.7209 18.4319 13.1037C18.2584 13.4865 17.9969 13.8229 17.6687 14.0854C16.756 14.7825 16.0122 15.6761 15.4923 16.7001C14.9725 17.7241 14.6901 18.852 14.666 20.0001C14.6666 20.1752 14.7017 20.3485 14.7693 20.51C14.8369 20.6715 14.9356 20.8182 15.0598 20.9416C15.1841 21.0649 15.3314 21.1626 15.4934 21.2291C15.6554 21.2955 15.8289 21.3294 16.004 21.3288C16.1791 21.3282 16.3524 21.2931 16.5139 21.2255C16.6754 21.1579 16.8221 21.0592 16.9454 20.935C17.0688 20.8107 17.1665 20.6634 17.233 20.5014C17.2994 20.3394 17.3333 20.1659 17.3327 19.9908C17.3582 19.2435 17.5512 18.5115 17.8974 17.8488C18.2435 17.186 18.734 16.6094 19.3327 16.1614C19.9879 15.6361 20.5098 14.9634 20.8559 14.1982C21.202 13.4329 21.3624 12.5968 21.3242 11.7578C21.286 10.9188 21.0502 10.1008 20.636 9.37015C20.2218 8.63954 19.6409 8.01708 18.9407 7.55344H18.9433Z" fill="#464255" />
                                        <path d="M16.0003 25.3335C16.7367 25.3335 17.3337 24.7365 17.3337 24.0001C17.3337 23.2637 16.7367 22.6668 16.0003 22.6668C15.2639 22.6668 14.667 23.2637 14.667 24.0001C14.667 24.7365 15.2639 25.3335 16.0003 25.3335Z" fill="#464255" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="geex-content__section-wrapper">
                        <div class="geex-content__summary">
                            <div class="geex-content__summary__count__single success-bg">
                                <div class="geex-content__summary__count__single__content">
                                    <h4 class="geex-content__summary__count__single__title">73</h4>
                                    <p class="geex-content__summary__count__single__subtitle">Paid Invoice</p>
                                </div>
                                <div class="geex-content__summary__count__single__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M15.9997 1.33335C13.0989 1.33335 10.2632 2.19353 7.85132 3.80513C5.4394 5.41672 3.55953 7.70734 2.44945 10.3873C1.33936 13.0673 1.04891 16.0163 1.61483 18.8613C2.18075 21.7064 3.57761 24.3197 5.62878 26.3709C7.67995 28.4221 10.2933 29.8189 13.1384 30.3849C15.9834 30.9508 18.9324 30.6603 21.6124 29.5502C24.2924 28.4402 26.583 26.5603 28.1946 24.1484C29.8062 21.7365 30.6664 18.9008 30.6664 16C30.6618 12.1116 29.1151 8.38372 26.3655 5.63418C23.616 2.88464 19.8881 1.33793 15.9997 1.33335ZM15.9997 28C13.6263 28 11.3062 27.2962 9.33284 25.9776C7.35945 24.6591 5.82138 22.7849 4.91313 20.5922C4.00488 18.3995 3.76724 15.9867 4.23026 13.6589C4.69328 11.3312 5.83617 9.19296 7.5144 7.51473C9.19263 5.8365 11.3308 4.69361 13.6586 4.23059C15.9864 3.76757 18.3992 4.00521 20.5919 4.91346C22.7846 5.82171 24.6587 7.35978 25.9773 9.33317C27.2959 11.3066 27.9997 13.6266 27.9997 16C27.9962 19.1815 26.7307 22.2317 24.4811 24.4814C22.2314 26.7311 19.1812 27.9965 15.9997 28Z" fill="#464255" />
                                        <path d="M21.7648 11.684L14.7061 18.1546L11.6088 15.0573C11.4858 14.93 11.3387 14.8284 11.176 14.7585C11.0133 14.6886 10.8384 14.6518 10.6613 14.6503C10.4843 14.6488 10.3087 14.6825 10.1449 14.7495C9.98099 14.8166 9.83212 14.9156 9.70693 15.0408C9.58174 15.166 9.48274 15.3148 9.41569 15.4787C9.34865 15.6426 9.31492 15.8181 9.31646 15.9952C9.318 16.1722 9.35478 16.3472 9.42466 16.5098C9.49453 16.6725 9.59611 16.8196 9.72346 16.9426L13.7235 20.9426C13.9664 21.1857 14.2939 21.3255 14.6374 21.3329C14.981 21.3404 15.3142 21.2149 15.5675 20.9826L23.5675 13.6493C23.8281 13.4103 23.9831 13.0775 23.9983 12.7241C24.0136 12.3708 23.8878 12.0259 23.6488 11.7653C23.4097 11.5047 23.077 11.3497 22.7236 11.3344C22.3703 11.3192 22.0254 11.4449 21.7648 11.684Z" fill="#464255" />
                                    </svg>
                                </div>
                            </div>
                            <div class="geex-content__summary__count__single warning-bg">
                                <div class="geex-content__summary__count__single__content">
                                    <h4 class="geex-content__summary__count__single__title">168</h4>
                                    <p class="geex-content__summary__count__single__subtitle">Unpaid Invoices</p>
                                </div>
                                <div class="geex-content__summary__count__single__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M15.9997 1.33322C13.0989 1.33322 10.2632 2.1934 7.85132 3.805C5.4394 5.41659 3.55953 7.70721 2.44945 10.3872C1.33936 13.0672 1.04891 16.0162 1.61483 18.8612C2.18075 21.7063 3.57761 24.3196 5.62878 26.3708C7.67995 28.422 10.2933 29.8188 13.1384 30.3847C15.9834 30.9506 18.9324 30.6602 21.6124 29.5501C24.2924 28.44 26.583 26.5602 28.1946 24.1482C29.8062 21.7363 30.6664 18.9007 30.6664 15.9999C30.6618 12.1115 29.1151 8.38359 26.3655 5.63405C23.616 2.88451 19.8881 1.3378 15.9997 1.33322ZM15.9997 27.9999C13.6263 27.9999 11.3062 27.2961 9.33284 25.9775C7.35945 24.6589 5.82138 22.7848 4.91313 20.5921C4.00488 18.3994 3.76724 15.9866 4.23026 13.6588C4.69328 11.331 5.83617 9.19283 7.5144 7.5146C9.19263 5.83637 11.3308 4.69348 13.6586 4.23046C15.9864 3.76744 18.3992 4.00508 20.5919 4.91333C22.7846 5.82158 24.6587 7.35965 25.9773 9.33304C27.2959 11.3064 27.9997 13.6265 27.9997 15.9999C27.9958 19.1813 26.7303 22.2313 24.4807 24.4809C22.2311 26.7305 19.1811 27.996 15.9997 27.9999Z" fill="#464255" />
                                        <path d="M16.0003 8.00001C15.6467 8.00001 15.3076 8.14048 15.0575 8.39053C14.8075 8.64058 14.667 8.97972 14.667 9.33334V18.6667C14.667 19.0203 14.8075 19.3594 15.0575 19.6095C15.3076 19.8595 15.6467 20 16.0003 20C16.354 20 16.6931 19.8595 16.9431 19.6095C17.1932 19.3594 17.3337 19.0203 17.3337 18.6667V9.33334C17.3337 8.97972 17.1932 8.64058 16.9431 8.39053C16.6931 8.14048 16.354 8.00001 16.0003 8.00001Z" fill="#464255" />
                                        <path d="M16.0003 23.9999C16.7367 23.9999 17.3337 23.403 17.3337 22.6666C17.3337 21.9302 16.7367 21.3332 16.0003 21.3332C15.2639 21.3332 14.667 21.9302 14.667 22.6666C14.667 23.403 15.2639 23.9999 16.0003 23.9999Z" fill="#464255" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <button class="geex-content__invoice__chat__btn geex-btn geex-btn--primary" style="width:400px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="54px" height="54px">
                                        <path d="M3 17.25V21h3.75l11.09-11.09-3.75-3.75L3 17.25zm17.71-12.04c.39-.39.39-1.02 0-1.41l-2.54-2.54c-.39-.39-1.02-.39-1.41 0l-2.34 2.34 3.75 3.75 2.54-2.54z" />
                                    </svg>

                                    Solicitar Firma Electronica
                                </button>
                            </td>
                            <td>
                                <button class="geex-content__invoice__chat__btn geex-btn geex-btn--success" style="width:400px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="54px" height="54px">
                                        <path d="M17.65 6.35c-2.28-2.28-5.98-2.28-8.27 0-2.28 2.28-2.28 5.98 0 8.27 2.28 2.28 5.98 2.28 8.27 0 .29-.29.29-.77 0-1.06-.29-.29-.77-.29-1.06 0-1.84 1.84-4.82 1.84-6.66 0-1.84-1.84-1.84-4.82 0-6.66 1.84-1.84 4.82-1.84 6.66 0 .29.29.77.29 1.06 0 .29-.29.29-.77 0-1.06z" />
                                    </svg>

                                    Renovar Firma Electronica
                                </button>
                            </td>
                            <td>
                                <button class="geex-content__invoice__chat__btn geex-btn geex-btn--danger" style="width:400px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="54px" height="54px">
                                        <path d="M6 2v20l6-6 6 6V2H6zm4.5 14h-3v-2h3v2zm0-4h-3v-2h3v2zm7 4h-6v-2h6v2zm0-4h-6v-2h6v2z" />
                                    </svg>

                                    Solicitar Facturación Electronica
                                </button>
                            </td>
                        </tr>
                    </table>

                    <!-- <div class="geex-content__invoice__chat__wrapper">



                    </div> -->

                </div>



            </div>

        </div>
        </div>




        </div>
    </main>

    <!-- inject:js-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.27.0/dist/apexcharts.min.js"></script>

    <?php include './partials/script.php' ?>
    <!-- endinject-->
</body>

</html>