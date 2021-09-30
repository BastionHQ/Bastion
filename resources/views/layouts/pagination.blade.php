<div>
    @if ($paginator->hasPages())
        <nav class="paginate-container">
            <div class="pagination">
                @if ($paginator->onFirstPage())
                    <span class="previous_page" aria-disabled="true">Предыдущая страница</span>
                @else
                    <span class="previous_page" wire:click="previousPage" wire:loading.attr="disabled">
                        Предыдущая страница
                    </span>
                @endif

                @for($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if($i === $paginator->currentPage())
                        <em aria-current="page">{{ $i }}</em>
                    @else
                        <span wire:click="gotoPage({{ $i }})">{{ $i }}</span>
                    @endif
                @endfor

                @if ($paginator->hasMorePages())
                    <span class="next_page" wire:click="nextPage" wire:loading.attr="disabled">
                        Следующая страница
                    </span>
                @else
                    <span class="next_page" aria-disabled="true">Следующая страница</span>
                @endif
            </div>
        </nav>
    @endif
</div>
