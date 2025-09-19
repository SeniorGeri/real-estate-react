    @props([
        'paginator'
    ])
    @if ($paginator->hasPages())
        <nav aria-label="..." class="pt-33">
            <ul class="pagination">
                @if ($paginator->currentPage() == 1)
                    <li class="page-item disabled">

                        <span class="page-link" tabindex="-1">@lang('frontend.previous')</span>
                    </li>
                @else
                    <li class="page-item">

                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                            tabindex="-1">@lang('frontend.previous')</a>
                    </li>
                @endif
                </li>
                @php
                    $current = $paginator->currentPage();
                    $last = $paginator->lastPage();
                    $start = max(1, $current - 2); // show 2 before current
                    $end = min($last, $current + 2); // show 2 after current
                @endphp


                @if ($start > 1)

                <li class="page-item">

                    <a href="{{ $paginator->url(1) }}" class="page-link">1</a>
                    </li>
                    @if ($start > 2)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                    @endif
                @endif

                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $current)
                    <li class="page-item active">
                        <span class="page-link">{{ $page }}</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a href="{{ $paginator->url($page) }}"
                            class="page-link">{{ $page }}</a>
                    </li>
                    @endif
                @endfor

                @if ($end < $last)
                    @if ($end < $last - 1)
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                    <li class="page-item">
                        <a href="{{ $paginator->url($last) }}"
                            class="page-link">{{ $last }}</a>
                    </li>
                @endif

                @if ($paginator->currentPage() < $paginator->lastPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">@lang('frontend.next')</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" tabindex="-1">@lang('frontend.next')</span>
                    </li>
                @endif


            </ul>
        </nav>
    @endif
