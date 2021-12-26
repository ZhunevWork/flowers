@if ($paginator->hasPages())
    <div class="pagging">
        <div class="container">
            <div class="pagging__inner">
{{--                <button class="pagging__arrow pagging__arrow-prev icon-arrow-down"></button>--}}
{{--                <ul class="pagging-list">--}}
{{--                    <li class="active"><a href="#" class="pagging__link ">1</a></li>--}}
{{--                    <li><a href="#" class="pagging__link">2</a></li>--}}
{{--                    <li><a href="#" class="pagging__link">3</a></li>--}}
{{--                    <li><a href="#" class="pagging__link">4</a></li>--}}
{{--                    <li><a href="#" class="pagging__link">5</a></li>--}}
{{--                    <li><a href="#" class="pagging__link">6</a></li>--}}
{{--                    <li><a href="#" class="pagging__link">7</a></li>--}}
{{--                </ul>--}}
{{--                <button class="pagging__arrow pagging__arrow-next icon-arrow-down"></button>--}}


        <ul class="pagination pagging-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>

            </div>
        </div>
    </div>
@endif
