@extends('layouts.frontend')
@section('cartTotal', $cartTotal)
@section('content')
    <div class="page-delivery">
        <main class="main-delivery">
            <img class="delivery-decor delivery-decor-1" src="/img/delivery/delivery-decor.png" alt="delivery-decor" />
            <img class="delivery-decor delivery-decor-2" src="/img/delivery/delivery-decor-1.png" alt="delivery-decor" />


            <section class='section delivery'>
                <div class="container  delivery__container">
                    <div class="delivery__body">
                        <div class="delivery__body-item">
                            <h2 class="delivery__title">Доставка</h2>

                            <div class="delivery__item ">
                                <p class="icon-delivery">Мы осуществляем доставку по г. Зеленоград и его окрестностям.</p>

                                <p class="icon-clock"><b>Заказы принимаются c 9:00 до 22:00.</b></p>
                            </div>

                            <div class="delivery__item ">
                                <p class="icon-free"><b>Бесплатная доставка </b> по Зеленограду и Андреевке от 2000 руб.
                                </p>
                                <p>При заказе менее 2000 руб. стоимость доставки 250 руб.</p>
                                <p> В праздничные дни доставка платная.</p>
                                <p>Интервал доставки 2 часа.</p>
                                <p>При указании точного времени заказ будет доставлен в интервале +-20 минут. Стоимость
                                    доставки
                                    точно ко времени 300 руб.</p>
                                <p>В праздники 7-8 марта интервал будет увеличен до 5 часов.</p>
                            </div>


                            <div class="delivery__item">
                                <p class="icon-delivery-location"><b>Самовывоз – 0 руб.</b></p>
                                <p>Доставка в Алабушево, Горетовка, Баранцево, Лугинино - 350 руб.</p>
                                <p>Доставка в Менделеево, Чашниково Брехово, Ржавки, Елино - 350 руб.</p>
                                <p>Доставка в Фирсановка, Дурыкино, Льялово, Чёрная грязь - 450 руб.</p>
                                <p>Доставка в Сходня, Лыткино, Подрезково, Юрлово - 500 руб.</p>
                            </div>

                            <div class="delivery__item">
                                <h3 class="delivery__item-title">Адрес салона:</h3>
                                <p>Корпус 1824, ориентир магазин Дикси</p>
                                <p><b>Минимальная сумма заказа</b> по доставке 500 рублей.</p>
                            </div>


                            <div class="delivery__item">
                                <h3 class="delivery__item-title icon-attention mb38">В случае если вы не знаете адрес
                                    получателя, а знаете только телефон. </h3>

                                <p>Перед доставкой заказа <b>наши менеджеры</b> контакт-центра <b>созваниваются с
                                        получателем</b> заказа
                                    и уточняют адрес и подходящее время доставки. </p>
                                <p>
                                    Если получателя не окажется по указанному адресу, курьер возвращает букет в салон.
                                    Повторная
                                    доставка осуществляется в случае доплаты за выезд курьера. По истечению 24 часа с
                                    момента
                                    несостоявшейся доставки заказ оплачивается повторно, поскольку цветы являются
                                    скоропортящимся
                                    товаром. Если Вы отказываетесь от повторной доставки, стоимость заказа не возвращается,
                                    так
                                    как компанией были понесены полные расходы.
                                </p>
                            </div>


                            <img class="delivery__body-decor" src="/img/delivery/delivery-decor-2.png"
                                 alt="delivery-decor" />

                        </div>
                        <div class="delivery__body-item delivery__body-item--animation">
                            <h2 class="delivery__title">Оплата</h2>

                            <div class="delivery__item">
                                <p class="mb38">При оформлении заказа у нас на сайте Вам доступны следующие способы
                                    оплаты:
                                </p>
                            </div>

                            <div class="delivery__item">
                                <h3 class="delivery__item-title"> В салоне:</h3>

                                <ul>
                                    <li class="icon-triangle">Наличными в салоне при самовывозе;</li>
                                    <li class="icon-triangle">Банковской картой в салоне при самовывозе;</li>
                                    <li class="icon-triangle">Выезд курьера для приема оплаты наличными на адрес, отличный
                                        от адреса доставки
                                        (согласовать с менеджером контакт-центра).</li>
                                </ul>

                            </div>
                            <div class="delivery__item">
                                <h3 class="delivery__item-title">ОНЛАЙН:</h3>

                                <ul>
                                    <li class="icon-triangle">Банковские карты: Visa, MasterCard, Maestro, Мир;</li>
                                    <li class="icon-triangle">Электронные деньги: Яндекс.Деньги, WebMoney, QIWI Кошелек;
                                    </li>
                                    <li class="icon-triangle">Интернет-банкинг: Сбербанк Онлайн, Альфа-Клик, Интернет-банк
                                        Промсвязьбанка,
                                        MasterPass;</li>
                                    <li class="icon-triangle">Мобильные платежи: Билайн, МТС, Мегафон.</li>
                                </ul>
                            </div>
                            <div class="delivery__item">
                                <h3 class="delivery__item-title"> ДОПОЛНИТЕЛЬНО:</h3>
                                <ul>
                                    <li class="icon-triangle">Безналичным расчетом (выставление счета по Вашим реквизитам).
                                    </li>
                                </ul>
                            </div>

                            <div class="delivery__item">
                                <p>Возврат денежных средств в случае безналичной оплаты производится в течение 3-4 рабочих
                                    дней. </p>
                            </div>

                            <img class="delivery__payment-img" src="/img/delivery/delivery-payment.png"
                                 alt="delivery-payment-img" />
                        </div>
                    </div>

                    <div class="flowringo">
                        <h2 class="flowringo__title">Flowringo</h2>

                        <div class="flowringo__desc">Быстрый способ создать настроение</div>

                        <a href="{{ route( 'catalog' ) }}" class="btn btn-acent flowringo__btn">Оформить заказ</a>

                        <img src="/img/delivery/flowringo.png" alt="flowringo-img" />
                    </div>
                </div>
            </section>

        </main>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
