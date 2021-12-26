@extends('layouts.frontend')
@section('cartTotal', $cartTotal)
@section('content')
    <main class="main-checkout">
        <div class='container checkout__container'>

            <section class="section basket">
                <h2 class="section__title basket__title">Корзина</h2>
                <div class="basket__body">
                    <div class="basket__col">
                        <div class="basket__item">
                            <div class="basket__item-box">
                                @foreach($cartBouquets as $cartBouquet)
                                <div class="basket__item-product">
                                    <div class="basket__item-img">
                                        <img src="{{$cartBouquet->attributes['img']}}" alt="basket-img" />
                                    </div>
                                    <div class="basket__item-info">
                                        <div class="basket__item-info--group">
                                            <h3 class="basket__item-title">{{$cartBouquet->name}} {{$cartBouquet->attributes['size']}}</h3>
                                            <div class="basket__product-price basket__item-product--price">
                                                {{$cartBouquet->price}} p</div>
                                        </div>
                                        <div class="basket__item-info--group">
                                            <span>Количество</span>
                                            <div class="product__count">
                                                <span class="product__count-icon icon-minus"></span>
                                                <span class="product__count-icon product__count-counter">{{$cartBouquet->quantity}}</span>
                                                <span class="product__count-icon icon-plus"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="basket__item-box">
                                <div class="basket__price">
                                    <a href="#" class="basket__promo icon-promo"><span>Промокод или бонусы</span></a>

                                    <div class="basket__price-box">
                                        <span>Доставка:</span>
                                        <div class="basket__product-price basket__price-delivery">
                                            {{ $delivery }} ₽
                                        </div>
                                    </div>
                                    @if(isset($discount))
                                    <div class="basket__price-box">
                                        <span>Скидка:</span>
                                        <div class="basket__product-price basket__price-discount">
                                            – {{ $discount }} ₽
                                        </div>
                                    </div>
                                    @endif
                                    <div class="basket__price-box">
                                        <span class="bold">Итог:</span>
                                        <div class="basket__product-price basket__price-total">
                                            {{ $cartTotalPrice }} ₽
                                        </div>
                                    </div>
                                    <div class="basket__price-box">
                                        <span>Вы получите:</span>
                                        <div class="basket__price-bonus">
                                            300 <span>бонусов</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basket__col">
                        <div class="basket__item">
                            <div class="basket__item-box">
                                <div class="basket__item-recipient item-recipient">
                                    <div class="item-recipient__head">
                                        <h3 class="basket__item-title">Выберите получателя</h3>
                                        <span class="icon-arrow-down item-recipient__btn"></span>

                                        <div class="item-recipient__drop">
                                            <div class="item-recipient__drop-item">Я получу заказ</div>
                                            <div class="item-recipient__drop-item another">Другой получатель</div>
                                        </div>
                                    </div>
                                    <div class="item-recipient__body">
                                        <div class="item-recipient__recipient"></div>
                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Ваше имя">
                                        </div>
                                        <div class="item-recipient__input">
                                            <input type="tel" placeholder="Ваш телефон">
                                        </div>
                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Дата доставки">
                                        </div>
                                        <div class="item-recipient__input item-recipient__input-time">
                                            <input type="text" placeholder="Время доставки">
                                        </div>
                                    </div>
                                    <div class="item-recipient__time time-order">
                                        <div class="time-order__head">
                                       <span class="tab-item-nav time-order__head-item active"
                                             data-tab="#tab_1">Промежуток
                                          времени</span>
                                            <span class="tab-item-nav time-order__head-item" data-tab="#tab_2">Точное время
                                          (+250₽)</span>
                                        </div>
                                        <div class="time-order__body">
                                            <div class="tab-item-body time-order__body-item active" id="tab_1">
                                                <ul class="time-order__list">
                                                    <li class="time-order__time">9:00 - 11:00 </li>
                                                    <li class="time-order__time">11:00 - 13:00 </li>
                                                    <li class="time-order__time">13:00 - 15:00 </li>
                                                    <li class="time-order__time">15:00 - 17:00 </li>
                                                    <li class="time-order__time">17:00 - 19:00 </li>
                                                    <li class="time-order__time">19:00 - 21:00 </li>
                                                    <li class="time-order__time">10:00 - 12:00 </li>
                                                    <li class="time-order__time">12:00 - 14:00 </li>
                                                    <li class="time-order__time">14:00 - 16:00 </li>
                                                    <li class="time-order__time">16:00 - 18:00 </li>
                                                    <li class="time-order__time">18:00 - 20:00 </li>
                                                    <li class="time-order__time">20:00 - 22:00 </li>
                                                </ul>
                                                <div class="time-order__footer">
                                                    <label class="checkbox__label postal__label">
                                                        <input type="checkbox" checked>
                                                        <span
                                                            class="checkbox__control postal__checkbox-control icon-check"></span>
                                                        Отправить фото с получателем
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="tab-item-body time-order__body-item" id="tab_2">

                                          <div class="time-order__exact">
                                             <div class="time-order__exact-input">
                                                <input type="text" maxlength="2" placeholder="12">
                                                <span>часы</span>
                                             </div>
                                             <div class="time-order__exact-input">
                                                <input type="text" maxlength="2" placeholder="55">
                                                <span>минуты</span>
                                             </div>
                                             <!--
                                                <input class="time-order__exact-item">12<span>часы</span></input>
                                             <div class="time-order__exact-item">55<span>минуты</span></div>
                                             -->
                                          </div>

                                                <div class="time-order__footer">
                                                    <label class="checkbox__label postal__label">
                                                        <input type="checkbox" checked>
                                                        <span
                                                            class="checkbox__control postal__checkbox-control icon-check"></span>
                                                        Отправить фото с получателем
                                                    </label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basket__item-box">
                                <div class="basket__item-address">
                                    <div class="item-recipient__head">
                                        <h3 class="basket__item-title">Адрес доставки</h3>
 					<label class="checkbox__label address__label">
                                       			<input type="checkbox" checked>
                                       		<span class="checkbox__control address__checkbox-control icon-check"></span>
                                       					Уточнить адрес у получателя
                                    	</label>
                                    </div>
                                    <div class="item-recipient__body">

                                        <div class="item-recipient__input item-recipient__select">
                                            <select name="form[]" class="icon-arrow-down">
                                                <option value="1" selected="selected">Город</option>
                                                <option value="2">Наименование</option>
                                                <option value="3">Наименование</option>
                                                <option value="4">Наименование</option>
                                                <option value="5">Наименование</option>
                                                <option value="6">Наименование</option>

                                            </select>
                                        </div>

                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Дом">
                                        </div>
                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Улица">
                                        </div>
                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Этаж">
                                        </div>
                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Квартира">
                                        </div>
                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Номер подьезда">
                                        </div>
                                        <div class="item-recipient__input">
                                            <input type="text" placeholder="Код домофона">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="basket__col">
                        <div class="basket-postal postal">
                            <h3 class="basket__item-title">Открытка</h3>
                            <div class="postal__body">
                                <div class="postal__col">
                                 <textarea class="basket__textarea"
                                           placeholder="Введите сюда текст открытки"></textarea>
                                </div>
                                <div class="postal__col">
                                    <textarea class="basket__textarea" placeholder="Комментарий к заказу"></textarea>
                                </div>
                                <div class="postal__col postal__col-check">
                                    <div class="basket__check-box postal__check-box">
                                        <label class="checkbox__label postal__label">
                                            <input type="checkbox" checked>
                                            <span class="checkbox__control postal__checkbox-control icon-check"></span>
                                            Отправить заказ анонимно
                                        </label>
                                        <label class="checkbox__label postal__label">
                                            <input type="checkbox">
                                            <span class="checkbox__control postal__checkbox-control icon-check"></span>
                                            Отправить фото с получателем
                                        </label>
                                    </div>
                                    <button class="btn basket__btn btn-acent">Оплатить</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


            <section class="section product">
                <div class='container product__container'>
                    <div class="section__head">
                        <h2 class="section__title">К этому товару добавляют</h2>


                        <a href="catalog.html" class="btn-action">
                            <span>Смотреть все</span>
                            <span class="btn-action__icon icon-arrow-down"></span>
                        </a>
                    </div>


                    <div class="product__body">
                        <div class="product__container-slider">
                            <div class="product__wrapper">
                                @foreach($hits as $hit)
                                    <div class="product__item">
                                        <a href="{{ route('product', $hit->id) }}">
                                            <div class="product__item-img">
                                                <img src="{{ $hit->images->first()->url }}" alt="product-img"/>
                                            </div>
                                        </a>
                                        <div class="product__item-body">
                                            <div class="product__item-box">
                                                <a href="{{ route('product', $hit->id) }}">
                                                    <h4 class="product__title">{{ $hit->name }}</h4>
                                                </a>
                                            </div>
                                            <div class="product__item-box">
                                                @if(isset($hit->discount_price))
                                                    <span class="product__price">{{ $hit->discount_price }} Р</span>
                                                @else
                                                    <span class="product__price">{{ $hit->price }} Р</span>
                                                @endif
                                                <div class="product__count">
                                                    <span class="product__count-icon icon-minus"></span>
                                                    <span class="product__count-icon product__count-counter" id="quantity{{ $hit->id }}">1</span>
                                                    <span class="product__count-icon icon-plus"></span>
                                                </div>
                                            </div>
                                            <div class="product__item-box">
                                                <button class="product__cart icon-cart" id="{{ $hit->id }}"></button>
                                                <a href="#" class="btn btn-white product__item-btn" data-path="first"
                                                   data-animation="fadeInUp"
                                                   data-speed="500">Быстрый заказ</a>
                                            </div>
                                        </div>
                                        <div class="product__favorite icon-favorites favorite"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
@section('scripts')
    @parent

@endsection
@section('cart_js')
    <script>
        $(document).ready(function () {
            $('.product__cart').click(function (event) {
                event.preventDefault()

                let id = $(this).attr('id')
                let size = 'S'
                let quantityId = "#quantity"+id
                let quantity = parseInt(document.querySelector(quantityId).textContent)
                let total_quantity = parseInt($('#cart').text())

                total_quantity += quantity
                $('#cart').text(total_quantity)

                $.ajax({
                    url: "{{ route('addToCart') }}",
                    type: "POST",
                    data: {
                        id: id,
                        quantity: quantity,
                        attributes: {
                            size: size
                        },
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        console.log(data)
                    },
                    error: (data) => {
                        console.log(data)
                    }
                });
            })
        });
    </script>
@endsection
