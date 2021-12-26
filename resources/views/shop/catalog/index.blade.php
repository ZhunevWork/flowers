@extends('layouts.frontend')
@section('cartTotal', $cartTotal)
@section('content')
    <main class="page-catalog__main">
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

        <div class='container'>
            <form class="form select-form product_filter_btn">
                @csrf
                <div class="select-form__inner">
                    <div class="select-form__head">
                        <h3 class="select-form__title">Подобрать букет</h3>
                        <button type="submit" class="btn select-form__btn btn-acent filter">Показать</button>
                    </div>

                    <div class="select-form__body">
                        <div class="select-form__group">
                            <select name="category_id" class="form-block icon-arrow-down">
                                {{$categoryAll=true}}
                                @foreach($bouquetCategories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $request->category_id) {{$categoryAll=false}} selected="selected"@endif>{{ $category->name }}</option>
                                @endforeach
                                <option value="all" @if($categoryAll==true)selected="selected"@endif>Все категории</option>
                            </select>
                        </div>
                        <div class="select-form__group">
                            <select name="element_id" class="form-block">
                                {{$elementAll=true}}
                                @foreach($elements as $element)
                                    <option value="{{ $element->id }}" @if($element->id == $request->element_id) {{$elementAll=false}} selected="selected"@endif>{{ $element->name }}</option>
                                @endforeach
                                <option value="all" @if($elementAll==true)selected="selected"@endif>Все цветы</option>
                            </select>
                        </div>
                        <div class="select-form__group">
                            <select name="color_id" class="form-block">
                                {{$colorAll=true}}
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" @if($color->id == $request->color_id) {{$colorAll=false}} selected="selected"@endif>{{ $color->name }}</option>
                                @endforeach
                                <option value="all" @if($colorAll==true)selected="selected"@endif>Все цвета</option>
                            </select>
                        </div>
                        <div class="select-form__group">
                            <select name="event_id" class="form-block">
                                {{$eventAll=true}}
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}" @if($event->id == $request->event_id) {{$eventAll=false}} selected="selected"@endif>{{ $event->name }}</option>
                                @endforeach
                                <option value="all" @if($eventAll==true)selected="selected"@endif>Повод</option>
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
                                                   class="filters-price__input" id="input-0" name="price_min" value="{{$request->price_min}}">
                                            <span class="filters-price__text">₽</span>
                                        </label>
                                        <label class="filters-price__label">
                                                        <span class="filters-price__text filters-price__text-rang">-</span>
                                            <input type="number" min="0" max="75000" placeholder="75000"
                                                   class="filters-price__input" id="input-1" name="price_max" value="{{$request->price_max}}">
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
        </div>

        <section class="section product">
            <div class='container product__container'>
                <div class="section__head">
                    <h2 class="section__title">{{ isset($pageName) ? $pageName : 'Все категории' }}</h2>
                </div>

                <div class="product__body">
                    <div class="product__wrapper">
                        @foreach($bouquets as $bouquet)
                        <div class="product__item">
                            <a href="{{ route('product', $bouquet->id) }}">
                                <div class="product__item-img">
                                    <img src="{{ $bouquet->images->first()->url }}" alt="product-img"/>
                                </div>
                            </a>
                            <div class="product__item-body">
                                <div class="product__item-box">
                                    <a href="{{ route('product', $bouquet->id) }}">
                                        <h4 class="product__title">{{ $bouquet->name }}</h4>
                                    </a>
                                </div>
                                <div class="product__item-box">
                                    @if(isset($bouquet->discount_price))
                                        <span class="product__price">{{ $bouquet->discount_price }} Р</span>
                                    @else
                                        <span class="product__price">{{ $bouquet->price }} Р</span>
                                    @endif

                                    <div class="product__count">
                                        <span class="product__count-icon icon-minus"></span>
                                        <span class="product__count-icon product__count-counter" id="quantity{{ $bouquet->id }}">1</span>
                                        <span class="product__count-icon icon-plus"></span>
                                    </div>
                                </div>
                                <div class="product__item-box">
                                    <button class="product__cart icon-cart" id="{{ $bouquet->id }}"></button>
                                    <a href="#" class="btn btn-white product__item-btn" data-path="first"
                                       data-animation="fadeInUp" data-speed="500">Быстрый заказ</a>
                                </div>
                            </div>
                            <div class="product__favorite icon-favorites favorite"></div>
                        </div>
                        @endforeach
                    </div>
                    {{$bouquets->withQueryString()->links('pagination.paginator')}}
                </div>
            </div>
        </section>

    </main>
@endsection
@section('scripts')
    @parent

@endsection
@section('custom_js')
    <script>
        $(document).ready(function () {
            $('.filter').click(function () {
                // event.preventDefault();
                $('.sorting_text').text($(this).find('span').text())
                $.ajax({
                    url: "{{route('catalog')}}",
                    type: "GET",
                    data: {
                        page: {{isset($_GET['page']) ? $_GET['page'] : 1}},
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters,location.pathname.length);
                        let newURL = url + '?'; // http://127.0.0.1:8001/phones?
                        newURL += "&page={{isset($_GET['page']) ? $_GET['page'] : 1}}"; // http://127.0.0.1:8001/phones?orderBy=name-z-a
                        history.pushState({}, '', newURL);
                        $('.product_pagination a').each(function(index, value){
                            let link= $(this).attr('href')
                            $(this).attr('href',link+'&orderBy=')
                        })
                        $('.product__body').html(data)
                        $('.product__body').isotope('destroy')
                        $('.product__body').imagesLoaded( function() {
                            let grid = $('.product__body').isotope({
                                itemSelector: '.product',
                                layoutMode: 'fitRows',
                                fitRows:
                                    {
                                        gutter: 30
                                    }
                            });
                        });
                    }
                });
            })
        })
    </script>

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