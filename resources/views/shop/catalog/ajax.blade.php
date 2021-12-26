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
                    <span class="product__count-icon product__count-counter"
                          id="quantity{{ $bouquet->id }}">1</span>
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


