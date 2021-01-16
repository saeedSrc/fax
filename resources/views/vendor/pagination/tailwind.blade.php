@if ($paginator->hasPages())
    <ul class="pager">
        @if ($paginator->hasMorePages())
            <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next"> ← بعدی</a></li>
        @else
            <li class="disabled next"><span>بعدی ←</span></li>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

      @if($paginator->onFirstPage())
                <li class="disabled previous"><span> قبلی →</span></li>
            @else
                <li class="previous"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"> قبلی →</a></li>
            @endif
    </ul>
@endif