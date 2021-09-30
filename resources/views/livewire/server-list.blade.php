<div>
    <div wire:init="load" wire:poll.10s>
        @if($readyToLoad)
            @forelse ($servers as $server)
                <div class="Box">
                    <div class="Box-row d-flex flex-items-center">
                        <div class="flex-auto">
                            <strong>{{ $server->title }}</strong>
                            <div class="text-small color-text-tertiary">
                                {{ $server->host }}
                            </div>
                        </div>
                        @if($status = $server->status)
                            <a href="{{ route('server.history', $server) }}"
                               class="State State--{{  $status->is_success  ? 'open' : 'closed' }} State--small mr-4 no-underline"
                            >
                                {{ $status->created_at->diffForHumans() }}
                            </a>
                        @endif
                        <a href="{{ route('server.edit', $server) }}" type="button" class="btn btn-sm">Подробнее</a>
                        <a href="#" wire:click.prevent="destroy({{ $server->id }})" type="button"
                           class="btn btn-sm btn-danger ml-2">Удалить</a>
                    </div>
                </div>
            @empty
                <div class="Box">
                    <div class="blankslate">
                        <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt=""
                             class="mb-3"/>
                        <h3 class="mb-1">Серверы не добавлены</h3>
                        <p>Вы еще не добавили ни одного сервера, начните прямо сейчас!</p>
                        <livewire:server-create-button/>
                    </div>
                </div>
            @endforelse
        @else
            <div class="Box">
                @include('_components.loading')
            </div>
        @endif
    </div>
</div>
