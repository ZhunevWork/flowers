<!DOCTYPE html>
<html lang="ru">

<head>

    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="shortcut icon" href="/favicon.ico">

    {{--    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />--}}
    @yield('styles')

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
</head>

<body class="main-body">
<div class="wrapper">
    <header id="header" class="header d-flex">
        <div class="header__left d-flex">
            <a href="/" class="header__logo logo">

            </a>

            <div class="header__location location icon-location" data-da="header-menu__list,7,790">
                Выберите город
            </div>
        </div>

        <div class="header__right d-flex">
            <div class="header__phone phone" data-da="header-menu__list,4,992.98">
            </div>

            <div class="header__social social" data-da="header-menu__list,5,992.98">
                <ul class="social__list d-flex">

                </ul>
            </div>
            <nav id="header-menu" class="header-menu">
                <ul class="header-menu__list">
                    <li class="header-menu__item"><a href="{{ route('catalog') }}" class="header-menu__link">Каталог</a></li>
                    <li class="header-menu__item"><a href="{{ route('delivery') }}" class="header-menu__link">Доставка и оплата</a></li>
                    <li class="header-menu__item"><a href="/#" class="header-menu__link">Личный кабинет</a></li>
                    <li class="header-menu__item"><a href="/#my-bonuses" class="header-menu__link">Бонусы</a></li>
                </ul>
            </nav>
            <div class="header__action action d-flex" data-da="header-menu__list,6,600">
                <a href="{{ route('login') }}" class="action__user icon-avatar"></a>
                <a href="{{ route('cart') }}" class="action__cart icon-cart"><span
                        class="action__cart-count cart-count" id="cart">@yield('cartTotal')</span></a>
            </div>
            <div class="header-menu__icon">
                <span></span>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="footer">
        <div class='container footer__container'>
            <div class="footer__body">
                <div class="footer__logo">

                </div>
                <div class="footer__body-inner">
                    <div id="map" class="footer__map map">

                    </div>
                    <div class="footer__content">
                        <div class="row footer__row">
                            <div class="col footer__col">
                                <h4 class="footer__title">адрес</h4>
    

                                <h4 class="footer__title">телефон</h4>
                                <div class="footer__phone phone">
                     
                                </div>
                            </div>
                            <div class="col footer__col">
                                <h4 class="footer__title">страницы</h4>
                                <nav class="footer__nav">
                                    <ul class="footer__nav-list">
                                        <li class="footer__nav-item"><a href="{{ route('catalog') }}" class="footer__nav-link">Каталог</a></li>
                                        <li class="footer__nav-item"><a href="{{ route('delivery') }}" class="footer__nav-link">Доставка и оплата</a></li>
                                        <li class="footer__nav-item"><a href="/#" class="footer__nav-link">Личный кабинет</a></li>
                                        <li class="footer__nav-item"><a href="/#my-bonuses" class="footer__nav-link">Бонусы</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col footer__col">
                                <h4 class="footer__title">соц.сети</h4>
                                <div class="footer__social social">
                                    <ul class="social__list">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <div class="modal ">
        <div id="quick-order" class="modal__body" data-target="first">
            <button class="quick-order__close modal-close icon-modal-close"></button>
            <div class="quick-order">
                <div class="quick-order__body">

                    <div class="quick-order__title">Быстрый заказ</div>

                    <div class="quick-order__product-item">
                        <div class="quick-order__product-item--img">
                            <img src="/img/basket/basket-img.png" alt="basket-img"/>
                        </div>
                        <div class="quick-order__product-item--name"></div>
                    </div>

                    <p class="quick-order__text">Укажите ваши данные и наш менеджер свяжется с вами для оформления
                        заказа</p>
                    <form action="#" class="quick-order__form">
                        <div class="quick-order__form-imput">
                            <input type="text" placeholder="Имя">
                        </div>
                        <div class="quick-order__form-imput">
                            <input type="tel" placeholder="+7 (XXX) XX XX XX">
                        </div>
                        <button class="btn btn-acent quick-order__form-btn">Оформить заказ</button>
                    </form>

                    <div class="quick-order__bonus">
                        <a href="#" class="basket__promo icon-promo"><span>Промокод или бонусы</span></a>
                        <div class="basket__price-bonus">
                            300 <span>бонусов</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="modal__body" data-target="get-code">
            <button class="get-code__close modal-close icon-modal-close"></button>
            <div class="get-code">
                <div class="get-code__body">

                    <div class="get-code__title">Введите код, <br>
                        отправленный на номер
                    </div>
                    <label class="login-label get-code__label">
                        <input type="tel" class="login-label__input get-code__input input" name="tel"
                               placeholder="+7 (8352) 21-71-61" required>
                    </label>

                    <div class="signin-sms__wrap">
                        <input class="sms-input" type="tel" maxlength="1" tabindex="1">
                        <input class="sms-input" type="tel" maxlength="1" tabindex="2">
                        <input class="sms-input" type="tel" maxlength="1" tabindex="3">
                        <input class="sms-input" type="tel" maxlength="1" tabindex="4">
                    </div>

                    <p class="get-code__text">Повторная отправка через 25 секунд</p>

                    <button class="get-code__btn btn">Подтвердить</button>

                </div>
            </div>
        </div>

        <div class="modal__body" data-target="recovery">
            <button class="recovery__close modal-close icon-modal-close"></button>

            <div class="recovery">
                <div class="recovery__body">
                    <div class="recovery__title">Восстановление пароля</div>

                    <p class="recovery__text">Введите электронную почту, указанную <span>при регистрации</span></p>

                    <label class="login-label">
                        <span class="login-label__row">E-mail</span>
                        <input type="email" class="login-label__input input" name="email" placeholder="Е-mail" required>
                    </label>

                    <p class="login-or-register">Вспомнили пароль? <a href="{{ route('login') }}">Войти</a></p>

                    <button class="recovery__btn btn">Восстановить пароль</button>

                </div>
            </div>

        </div>

    </div>
    <script>

    </script>
</div>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.1/isotope.pkgd.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!--<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU"></script>-->
<script src="/js/vendors.js"></script>
<script src="/js/scripts.js"></script>
{{--<script src="{{ asset('js/main.js') }}"></script>--}}
@yield('scripts')
@yield('custom_js')
@yield('cart_js')
</body>

</html>