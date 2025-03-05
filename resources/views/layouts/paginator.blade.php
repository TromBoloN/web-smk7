
@if ($paginator->hasPages())
    <nav class="pagination">
        <ul class="page-numbers">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li class="page-btn" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="{{ $paginator->previousPageUrl() }}" aria-hidden="true"> &lsaquo; Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator--}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-btn active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="page-btn"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if (!$paginator->onLastPage())
                <li class='page-btn @if (!$paginator->hasMorePages()) disabled @endif ' >
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next &rsaquo;</a>
                </li>
            @endif

        </ul>
    </nav>
@endif
