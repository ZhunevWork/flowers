@extends('layouts.frontend')
@section('cartTotal', $cartTotal)
@section('content')
    <div class="page-card">
        <main class="main-card">
            <div class="product-card card">

                <div class="card__slider">
                    <div class="card__slider-nav slider-nav">

                        @foreach($bouquet->images as $image)
                            @if($loop->first)
                                <div class="slider-nav__item active" tabindex="{{ $loop->count }}">
                                    <img src="{{ $bouquet->images->first()->url }}" alt="card-img">
                                </div>
                            @else
                                <div class="slider-nav__item" tabindex="{{ $loop->count }}"><img src="{{ $image->url }}" alt="card-img"></div>
                            @endif
                        @endforeach
                    </div>
                    <div class="card__slider-block slider-block">
                        <div class="swiper-wrapper">
                            @foreach($bouquet->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ $image->url }}" alt="card-img">
                                <div class="product__favorite icon-favorites favorite"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card__info">
                    <h1 class="card__info-title">{{ $bouquet->name }}</h1>

                    <span class="card__info-status icon-checked">{{ ($bouquet->in_stock) ? "В наличии" : "Нет на складе" }}</span>

                    <div class="card__info-block">
                        <p><b>Размер:</b> {{ $bouquet->all_size }}</p>
                        <p><b>Высота:</b> {{ $bouquet->height }} см</p>
                        <p><b>Состав:</b>
                            @foreach($bouquet->elements as $element)
                                @if($loop->last)
                                    {{ $element->name }}
                                @else
                                    {{ $element->name . ", " }}
                                @endif
                            @endforeach
                        </p>
                    </div>


                    <p>{{ $bouquet->description }}</p>

                    <p class="icon-drop">{{ $bouquet->durability }}</p>

                    <div class="card__info-size size-card">
                        <p> <b>Размер букета: </b></p>

                        <div class="size-card__block">
                            @foreach($bouquet->sizes as $size)
                                @if($loop->first)
                                    <button class="size-card__item active">{{ $size->name }}</button>
                                @else
                                    <button class="size-card__item">{{ $size->name }}</button>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="card__price">
                        @if(isset( $bouquet->discount_price ))
                        <div class="card__price-carrent">{{ $bouquet->discount_price }} P</div>
                        <div class="card__price-old">{{ $bouquet->price }} P</div>
                        @else
                        <div class="card__price-carrent">{{ $bouquet->price }} P</div>
                        @endif
                    </div>

                    <button data-da="card,0,567.98" class="btn addToCart" id="{{ $bouquet->id }}">Оформить заказ</button>
                </div>
            </div>


            <section class="section product">
                <div class='container product__container'>
                    <div class="section__head">
                        <h2 class="section__title">С этим товаром покупают</h2>

                        <a href="{{ route('catalog') }}?category_id=8" class="btn-action">
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
        </main>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
@section('cart_js')
    <script>
        $(document).ready(function () {
            $('.addToCart').click(function (event) {
                event.preventDefault()

                let id = parseInt($(this).attr('id'));
                let quantity = 1
                let size = $('.active').text()
                let total_quantity = parseInt($('#cart').text())

                total_quantity += 1
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
