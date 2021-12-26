@extends('layouts.frontend')
@section('cartTotal', $cartTotal)
@section('content')

    <main class="main-constructor">

        <div class='container'>

            <div class="constructor">
                <h2 class="constructor__title">Конструктор букета</h2>
                <div class="constructor__body">
                    <div class="constructor__col scroll">
                        <div class="constructor__item-box">
                            <div class="constructor__item-product">
                                <div class="constructor__item-img">
                                    <img src="/img/constructor/constructor-img.png" alt="constructor-img">
                                </div>
                                <div class="constructor__item-info">
                                    <div class="constructor__item-info--group">
                                        <h3 class="constructor__item-title">Название букета</h3>
                                        <div class="constructor__product-price constructor__item-product--price">2000p</div>
                                    </div>
                                    <div class="constructor__item-info--group">
                                        <span>Количество</span>
                                        <div class="product__count">
                                            <span class="product__count-icon icon-minus"></span>
                                            <span class="product__count-icon product__count-counter">1</span>
                                            <span class="product__count-icon icon-plus"></span>
                                        </div>
                                    </div>
                                    <div class="constructor__item-delet icon-plus"></div>
                                </div>
                            </div>
                            <div class="constructor__item-product">
                                <div class="constructor__item-img">
                                    <img src="/img/constructor/constructor-img.png" alt="constructor-img">
                                </div>
                                <div class="constructor__item-info">
                                    <div class="constructor__item-info--group">
                                        <h3 class="constructor__item-title">Название букета</h3>
                                        <div class="constructor__product-price constructor__item-product--price">7000p</div>
                                    </div>
                                    <div class="constructor__item-info--group">
                                        <span>Количество</span>
                                        <div class="product__count">
                                            <span class="product__count-icon icon-minus"></span>
                                            <span class="product__count-icon product__count-counter">1</span>
                                            <span class="product__count-icon icon-plus"></span>
                                        </div>
                                    </div>
                                    <div class="constructor__item-delet icon-plus"></div>

                                </div>
                            </div>
                            <div class="constructor__item-product">
                                <div class="constructor__item-img">
                                    <img src="/img/constructor/constructor-img.png" alt="constructor-img">
                                </div>
                                <div class="constructor__item-info">
                                    <div class="constructor__item-info--group">
                                        <h3 class="constructor__item-title">Название букета</h3>
                                        <div class="constructor__product-price constructor__item-product--price">7000p</div>
                                    </div>
                                    <div class="constructor__item-info--group">
                                        <span>Количество</span>
                                        <div class="product__count">
                                            <span class="product__count-icon icon-minus"></span>
                                            <span class="product__count-icon product__count-counter">1</span>
                                            <span class="product__count-icon icon-plus"></span>
                                        </div>
                                    </div>
                                    <div class="constructor__item-delet icon-plus"></div>

                                </div>
                            </div>
                            <div class="constructor__item-product">
                                <div class="constructor__item-img">
                                    <img src="/img/constructor/constructor-img.png" alt="constructor-img">
                                </div>
                                <div class="constructor__item-info">
                                    <div class="constructor__item-info--group">
                                        <h3 class="constructor__item-title">Название букета</h3>
                                        <div class="constructor__product-price constructor__item-product--price">7000p</div>
                                    </div>
                                    <div class="constructor__item-info--group">
                                        <span>Количество</span>
                                        <div class="product__count">
                                            <span class="product__count-icon icon-minus"></span>
                                            <span class="product__count-icon product__count-counter">1</span>
                                            <span class="product__count-icon icon-plus"></span>
                                        </div>
                                    </div>
                                    <div class="constructor__item-delet icon-plus"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="constructor__col">
                        <div class="constructor__price-total-wrap">
                            <span>Стоимость букета:</span>
                            <span class="constructor__price-total">2500 ₽</span>
                        </div>
                        <button class="btn btn-acent">Добавить в корзину</button>
                    </div>
                </div>
            </div>

            <form action="{{ route('constructor') }}" class="form select-form">
                @csrf
                <div class="select-form__inner">
                    <h3 class="select-form__title constructor__title">Подобрать цветы</h3>
                    <div class="select-form__body">
                        <div class="select-form__group">
                            <select name="category_id" class="form-block">
                                {{$elementCategoriesAll=true}}
                                @foreach($elementCategories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $request->category_id) {{$elementCategoriesAll=false}} selected="selected"@endif>{{ $category->name }}</option>
                                @endforeach
                                <option value="all" @if($elementCategoriesAll==true)selected="selected"@endif>Все категории</option>
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
                                                fill="#E4DFF0" />
                                            <path
                                                d="M175 76.8461C172.244 73.4478 164.724 66.9601 156.693 68.1959C148.661 69.4316 143.897 74.4776 142.519 76.8461H139.015C136.916 76.4966 134.441 75.4844 132.48 73.1388C128.346 68.1959 125.984 60.7814 121.85 62.0171C117.716 63.2529 120.078 73.4478 115.944 70.0495C111.81 66.6512 114.763 56.1473 110.038 56.7652C105.314 57.3831 108.267 66.9601 104.723 70.0495C101.18 73.1388 102.952 44.7167 99.4084 44.7167C95.865 44.7167 91.7311 43.4809 89.9594 48.7328C88.1878 53.9847 77.5577 49.3507 77.5577 44.7167C77.5577 40.0827 75.786 28.3431 71.0616 30.1967C66.3371 32.0503 70.471 46.5703 66.9276 52.749C63.3843 58.9277 68.6993 76.8461 9.64337 76.8461H139.015C140.455 77.0858 141.718 77.0137 142.519 76.8461H175Z"
                                                fill="#E4DFF0" />
                                        </svg>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-acent select-form__btn"
                            data-da="select-form__inner,5,767.98">Показать</button>
                </div>
            </form>
        </div>

        <section class="section product">
            <div class='container product__container'>
                <div class="product__body">
                    <div class="product__wrapper">
                        @foreach($elements as $element)
                        <div class="product__item">
                            <a href="#">
                                <div class="product__item-img">
                                    <img src="{{ $element->image->url }}" alt="product-img" />
                                </div>
                            </a>
                            <div class="product__item-body">
                                <div class="product__item-box">
                                    <a href="#">
                                        <h4 class="product__title">{{ $element->name }}</h4>
                                    </a>
                                </div>
                                <div class="product__item-box">
                                    <span class="product__price">{{ $element->price }} Р</span>

                                    <div class="product__count">
                                        <span class="product__count-icon icon-minus"></span>
                                        <span class="product__count-icon product__count-counter">1</span>
                                        <span class="product__count-icon icon-plus"></span>
                                    </div>
                                </div>
                                <div class="product__item-box">
                                    <a href="#" class="btn btn-white product__item-btn fw" data-path="first"
                                       data-animation="fadeInUp" data-speed="500">Добавить к букету</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
{{--            <div class="pagging">--}}
{{--                <div class="container">--}}
{{--                    <div class="pagging__inner">--}}
{{--                        <button class="pagging__arrow pagging__arrow-prev icon-arrow-down"></button>--}}
{{--                        <ul class="pagging-list">--}}
{{--                            <li class="active"><a href="#" class="pagging__link ">1</a></li>--}}
{{--                            <li><a href="#" class="pagging__link">2</a></li>--}}
{{--                            <li><a href="#" class="pagging__link">3</a></li>--}}
{{--                            <li><a href="#" class="pagging__link">4</a></li>--}}
{{--                            <li><a href="#" class="pagging__link">5</a></li>--}}
{{--                            <li><a href="#" class="pagging__link">6</a></li>--}}
{{--                            <li><a href="#" class="pagging__link">7</a></li>--}}
{{--                        </ul>--}}
{{--                        <button class="pagging__arrow pagging__arrow-next icon-arrow-down"></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            {{$elements->withQueryString()->links('pagination.paginator')}}
        </section>
    </main>

@endsection
@section('scripts')
    @parent

@endsection
