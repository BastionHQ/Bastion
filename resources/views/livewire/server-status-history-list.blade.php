<div>
    <div wire:init="load" wire:poll.10s>
        @if(!empty($history))
            <h3 class="h6 pr-2 py-1">
                <span class="color-bg-canvas pl-2 pr-3">September <span class="color-text-secondary">2021</span></span>
            </h3>

            @foreach($history as $item)
                <div class="TimelineItem">
                    <div
                        class="TimelineItem-badge color-bg-{{ $item->is_success ? 'success' : 'danger' }}-inverse color-text-white">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" class="octicon">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009a1.82 1.82 0 00.35.31c.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371a1.82 1.82 0 00.35-.31l.007-.008a.75.75 0 011.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.989 1.989 0 01-.184.213 3.32 3.32 0 01-.53.445A3.766 3.766 0 018 12c-.946 0-1.652-.308-2.126-.63a3.323 3.323 0 01-.673-.604 1.975 1.975 0 01-.042-.053l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044z"></path>
                        </svg>
                    </div>
                    <div class="TimelineItem-body">
                        {{ $item->created_at->diffForHumans() }} {{ $item->message }}
                    </div>
                </div>
            @endforeach

            {{ $history->links('layouts.pagination') }}
        @else
            <div class="Box">
                @include('_components.loading')
            </div>
        @endif
    </div>
</div>
