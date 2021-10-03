<div>
    <div wire:init="load">
        @if($readyToLoad)
            @forelse ($users as $user)
                <div class="Box">
                    <div class="Box-row d-flex flex-items-center">
                        <div class="flex-auto">
                            <strong>{{ $user->last_name }} {{ $user->name }}</strong>
                            <div class="text-small color-text-tertiary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <a href="#" wire:click.prevent="destroy({{ $user->id }})" type="button"
                           class="btn btn-sm btn-danger ml-2">Удалить</a>
                    </div>
                </div>
            @empty
                <div class="Box">
                    <div class="blankslate">
                        <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt=""
                             class="mb-3"/>
                        <h3 class="mb-1">Нет пользователей</h3>
                        <p>Вы не добавили на сервер ни одного пользователя</p>
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
