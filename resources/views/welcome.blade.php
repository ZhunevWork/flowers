@extends('layouts.frontend')
@section('cartTotal', $cartTotal)
@section('content')
    <main class="main-page">
        <section class="section home">
            <div class='container home__container'>
                <div class="home-body">
                    <div class="col home-col">
                        <p class="subtitle home__subtitle">Твой букет говорит за тебя</p>
                        <h1 class="title home__title">Цветы и подарки <span>в Зеленограде</span></h1>
                        <a href="{{ route('catalog') }}" class="btn home__btn btn-acent">Перейти к каталогу</a>
                    </div>
                    <div class="col home-col">
                        <img src="/img/home/flower.png" alt="flower-img"/>
                    </div>
                    <div class="col home-col">
                        <form action="{{ route('catalog') }}" class="form select-form">
                            @csrf
                            <div class="select-form__inner">

                                <div class="select-form__head">
                                    <h3 class="select-form__title">Подобрать букет</h3>
                                    <button type="submit" class="btn select-form__btn btn-acent"
                                            data-da="select-form__inner,5,767.98">Показать
                                    </button>
                                </div>

                                <div class="select-form__body">
                                    <div class="select-form__group">
                                        <select name="category_id" class="form-block icon-arrow-down">
                                            @foreach($bouquetCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                                <option value="all" selected="selected">Все категории</option>
                                        </select>
                                    </div>
                                    <div class="select-form__group">
                                        <select name="element_id" class="form-block">
                                            @foreach($elements as $element)
                                                <option value="{{ $element->id }}">{{ $element->name }}</option>
                                            @endforeach
                                            <option value="all" selected="selected">Все цветы</option>
                                        </select>
                                    </div>
                                    <div class="select-form__group">
                                        <select name="color_id" class="form-block">
                                            @foreach($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                            <option value="all" selected="selected">Все цвета</option>
                                        </select>
                                    </div>
                                    <div class="select-form__group">
                                        <select name="event_id" class="form-block">
                                            @foreach($events as $event)
                                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                                            @endforeach
                                            <option value="all" selected="selected">Повод</option>
                                        </select>
                                    </div>
                                    <div class="select-form__group select-form__group--filters">
                                        <span class="select-form__group--price icon-arrow-down">Цена</span>
                                        <div class="search-filters filters">
                                            <div class="filters__item filters-price">
                                                <h3 class="filters-price__title">Ценовой диапазон</h3>
                                                <div class="filters-price__inputs">
                                                    <label class="filters-price__label">
                                                        <input type="number" min="0" max="75000" placeholder="0"
                                                               class="filters-price__input" id="input-0" name="price_min">
                                                        <span class="filters-price__text">₽</span>
                                                    </label>
                                                    <label class="filters-price__label">
                                                        <span
                                                            class="filters-price__text filters-price__text-rang">-</span>
                                                        <input type="number" min="0" max="75000" placeholder="75000"
                                                               class="filters-price__input" id="input-1" name="price_max">
                                                        <span class="filters-price__text">₽</span>
                                                    </label>
                                                </div>
                                                <div class="filters-price__slider" id="range-slider">
                                                    <svg viewBox="0 0 315 77">
                                                        <path
                                                            d="M166.5 76.5001C168.833 71.0001 175.2 60.5001 182 62.5001C188.8 64.5001 192.833 72.6668 194 76.5001H196.967C198.744 75.9345 200.839 74.2962 202.5 70.5001C206 62.5001 208 50.5001 211.5 52.5001C215 54.5001 213 71.0001 216.5 65.5001C220 60.0001 217.5 43.0001 221.5 44.0001C225.5 45.0001 223 60.5 226 65.5001C229 70.5001 227.5 24.5 230.5 24.5C233.5 24.5 237 22.5 238.5 31C240 39.5 249 31.9999 249 24.5C249 17 250.5 -2 254.5 1C258.5 4 255 27.5 258 37.5C261 47.5 256.5 76.5001 306.5 76.5001H196.967C195.748 76.8881 194.678 76.7714 194 76.5001H166.5Z"
                                                            fill="#E4DFF0"/>
                                                        <path
                                                            d="M175 76.8461C172.244 73.4478 164.724 66.9601 156.693 68.1959C148.661 69.4316 143.897 74.4776 142.519 76.8461H139.015C136.916 76.4966 134.441 75.4844 132.48 73.1388C128.346 68.1959 125.984 60.7814 121.85 62.0171C117.716 63.2529 120.078 73.4478 115.944 70.0495C111.81 66.6512 114.763 56.1473 110.038 56.7652C105.314 57.3831 108.267 66.9601 104.723 70.0495C101.18 73.1388 102.952 44.7167 99.4084 44.7167C95.865 44.7167 91.7311 43.4809 89.9594 48.7328C88.1878 53.9847 77.5577 49.3507 77.5577 44.7167C77.5577 40.0827 75.786 28.3431 71.0616 30.1967C66.3371 32.0503 70.471 46.5703 66.9276 52.749C63.3843 58.9277 68.6993 76.8461 9.64337 76.8461H139.015C140.455 77.0858 141.718 77.0137 142.519 76.8461H175Z"
                                                            fill="#E4DFF0"/>
                                                    </svg>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="home__decor home__decor-4"></div>
                    </div>
                </div>
            </div>
            <div class="home__decor home__decor-1"></div>
            <div class="home__decor home__decor-2"></div>
            <div class="home__decor home__decor-3"></div>
        </section>
        <div class="section category">
            <div class="container category__container">
                <div class="category__slider slider">
                    <div class="swiper-container category__slider-container">
                        <div class="swiper-wrapper slider__wrapper">

                            @foreach($bouquetCategories as $category)
                                <div class="swiper-slide slider__item">
                                    <a href="{{ route('catalog') }}?category_id={{ $category->id }}" class="slider__item-link">
                                        <div class="slider__item-img">
                                            <div class="slider__item-img-box">
                                                <img src="{{ $category->image->url }}" alt="catalog-img"/>
                                            </div>
                                        </div>
                                        <h5 class="slider__title">{{ $category->name }}</h5>
                                    </a>
                                </div>
                            @endforeach

                                <div class="swiper-slide slider__item">
                                    <a href="{{ route('constructor') }}" class="slider__item-link">
                                        <div class="slider__item-img">
                                            <div class="slider__item-img-box">
                                                <img src="/img/catalog/8.png" alt="catalog-img"/>
                                            </div>
                                        </div>
                                        <h5 class="slider__title">Собери сам</h5>
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="swiper-navigation">
                        <button class="slider__button-prev btn-action icon-arrow-down"></button>
                        <button class="slider__button-next btn-action icon-arrow-down"></button>
                    </div>
                </div>
            </div>
        </div>
        <section class="section product">
            <div class='container product__container'>
                <div class="section__head">
                    <h2 class="section__title">Хиты продаж</h2>

                    <a href="{{ route('catalog') }}?category_id=8" class="btn-action">
                        <span>Все xиты продаж</span>
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
                                            <span class="product__count-icon product__count-counter" id="quantity_hit{{ $hit->id }}">1</span>
                                            <span class="product__count-icon icon-plus"></span>
                                        </div>
                                    </div>
                                    <div class="product__item-box">
                                        <button class="product__cart icon-cart hit" id="{{ $hit->id }}"></button>
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
        <section class="section product">
            <div class='container product__container'>
                <div class="section__head">
                    <h2 class="section__title">Авторские букеты</h2>

                    <a href="{{ route('catalog') }}?category_id=3" class="btn-action">
                        <span>Все авторские букеты</span>
                        <span class="btn-action__icon icon-arrow-down"></span>
                    </a>
                </div>

                <div class="product__body">
                    <div class="product__container-slider">
                        <div class="product__wrapper">

                            @foreach($authors as $author)
                                <div class="product__item">
                                    <a href="{{ route('product', $author->id) }}">
                                        <div class="product__item-img">
                                            <img src="{{ $author->images->first()->url }}" alt="product-img"/>
                                        </div>
                                    </a>
                                    <div class="product__item-body">
                                        <div class="product__item-box">
                                            <a href="{{ route('product', $author->id) }}">
                                                <h4 class="product__title">{{ $author->name }}</h4>
                                            </a>
                                        </div>
                                        <div class="product__item-box">
                                            @if(isset($author->discount_price))
                                                <span class="product__price">{{ $author->discount_price }}  Р</span>
                                            @else
                                                <span class="product__price">{{ $author->price }}  Р</span>
                                            @endif
                                            <div class="product__count">
                                                <span class="product__count-icon icon-minus"></span>
                                                <span class="product__count-icon product__count-counter" id="quantity_author{{ $author->id }}">1</span>
                                                <span class="product__count-icon icon-plus"></span>
                                            </div>
                                        </div>
                                        <div class="product__item-box">
                                            <button class="product__cart icon-cart author" id="{{ $author->id }}"></button>
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
        <section class="section product">
            <div class='container product__container'>
                <div class="section__head">
                    <h2 class="section__title">Композиции</h2>

                    <a href="{{ route('catalog') }}?category_id=4" class="btn-action">
                        <span>Все композиции</span>
                        <span class="btn-action__icon icon-arrow-down"></span>
                    </a>
                </div>

                <div class="product__body">
                    <div class="product__container-slider">
                        <div class="product__wrapper">

                            @foreach($compositions as $composition)
                                <div class="product__item">
                                    <a href="{{ route('product', $composition->id) }}">
                                        <div class="product__item-img">
                                            <img src="{{ $composition->images->first()->url }}" alt="product-img"/>
                                        </div>
                                    </a>
                                    <div class="product__item-body">
                                        <div class="product__item-box">
                                            <a href="{{ route('product', $composition->id) }}">
                                                <h4 class="product__title">{{ $composition->name }}</h4>
                                            </a>
                                        </div>
                                        <div class="product__item-box">
                                            @if(isset($composition->discount_price))
                                                <span class="product__price">{{ $composition->discount_price }} Р</span>
                                            @else
                                                <span class="product__price">{{ $composition->price }} Р</span>
                                            @endif
                                            <div class="product__count">
                                                <span class="product__count-icon icon-minus"></span>
                                                <span class="product__count-icon product__count-counter" id="quantity_composition{{ $composition->id }}">1</span>
                                                <span class="product__count-icon icon-plus"></span>
                                            </div>
                                        </div>
                                        <div class="product__item-box">
                                            <button class="product__cart icon-cart composition" id="{{ $composition->id }}"></button>
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
        <section class="section product">
            <div class='container product__container'>
                <div class="section__head">
                    <h2 class="section__title">Подарки</h2>

                    <a href="{{ route('catalog') }}?category_id=6" class="btn-action">
                        <span>Все подарки</span>

                        <span class="btn-action__icon icon-arrow-down"></span>
                    </a>
                </div>

                <div class="product__body">
                    <div class="product__container-slider">
                        <div class="product__wrapper">

                            @foreach($presents as $present)
                                <div class="product__item">
                                    <a href="{{ route('product', $present->id) }}">
                                        <div class="product__item-img">
                                            <img src="{{ $present->images->first()->url }}" alt="product-img"/>
                                        </div>
                                    </a>
                                    <div class="product__item-body">
                                        <div class="product__item-box">
                                            <a href="{{ route('product', $present->id) }}">
                                                <h4 class="product__title">{{ $present->name }}</h4>
                                            </a>
                                        </div>
                                        <div class="product__item-box">
                                            @if(isset($present->discount_price))
                                                <span class="product__price">{{ $present->discount_price }} Р</span>
                                            @else
                                                <span class="product__price">{{ $present->price }} Р</span>
                                            @endif
                                            <div class="product__count">
                                                <span class="product__count-icon icon-minus"></span>
                                                <span class="product__count-icon product__count-counter" id="quantity_present{{ $present->id }}">1</span>
                                                <span class="product__count-icon icon-plus"></span>
                                            </div>
                                        </div>
                                        <div class="product__item-box">
                                            <button class="product__cart icon-cart present" id="{{ $present->id }}"></button>
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
    </main>
@endsection
@section('cart_js')
    <script>
        $(document).ready(function () {
            $('.hit').click(function (event) {
                event.preventDefault()

                let id = $(this).attr('id')
                let size = 'S'
                let quantityId = "#quantity_hit"+id
                let quantity = parseInt(document.querySelector(quantityId).textContent)
                console.log(id)
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
    <script>
        $(document).ready(function () {
            $('.author').click(function (event) {
                event.preventDefault()

                let id = $(this).attr('id')
                let size = 'S'
                let quantityId = "#quantity_author"+id
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
    <script>
        $(document).ready(function () {
            $('.composition').click(function (event) {
                event.preventDefault()

                let id = $(this).attr('id')
                let size = 'S'
                let quantityId = "#quantity_composition"+id
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
    <script>
        $(document).ready(function () {
            $('.present').click(function (event) {
                event.preventDefault()

                let id = $(this).attr('id')
                let size = 'S'
                let quantityId = "#quantity_present"+id
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
