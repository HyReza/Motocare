@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-2 mt-8">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-700 text-gray-400 rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="px-4 py-2 bg-gray-800 text-white hover:bg-gray-700 rounded transition duration-300">
                Previous
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex space-x-2">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2 bg-gray-700 text-gray-400 rounded">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 bg-blue-600 text-white rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-4 py-2 bg-gray-800 text-white hover:bg-gray-700 rounded transition duration-300">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="px-4 py-2 bg-gray-800 text-white hover:bg-gray-700 rounded transition duration-300">
                Next
            </a>
        @else
            <span class="px-4 py-2 bg-gray-700 text-gray-400 rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
@endif
