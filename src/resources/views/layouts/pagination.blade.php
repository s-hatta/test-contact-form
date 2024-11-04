{{-- 前ページ表示 --}}
@if ($paginator->hasPages())
  <nav class="pagination">


    {{-- Previous Page Link --}}
    <div class="pagination-box">
      <div class="pagination-box__prev">
        @if ($paginator->onFirstPage())
          &lt;
        @else
          <a href="{{ $paginator->previousPageUrl() }}">&lt;</a>
        @endif
      </div>
    </div>

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
      {{-- "Three Dots" Separator --}}
      @if (is_string($element))
        <div class="pagination-box">
          {{ $element }}
        </div>
      @endif

      {{-- Array Of Links --}}
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <div class="pagination-box" part="now-page">
              <div class="pagination-box__now-page">
                {{ $page }}
              </div>
            </div>
          @else
            <div class="pagination-box">
              <div class="pagination-box__page">
                <a href="{{ $url }}">{{ $page }}</a>
              </div>
            </div>
          @endif
        @endforeach
      @endif
    @endforeach

    {{-- 次ページ表示 --}}
    <div class="pagination-box">
      <div class="pagination-box_next">
        @if ($paginator->hasMorePages())
          <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
        @else
          &gt;
        @endif
      </div>
    </div>
    </div>
  </nav>
@endif
