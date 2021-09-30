<div>
    <form wire:submit.prevent="submit">
        <div class="form-group @error('user.last_name') errored @enderror">
            <div class="form-group-header">
                <label for="last_name">Фамилия</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="last_name" type="text" placeholder="Иванов"
                       wire:model="user.last_name"/>
            </div>
            @error('user.last_name')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('user.name') errored @enderror">
            <div class="form-group-header">
                <label for="name">Имя</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="name" type="text" placeholder="Иван" wire:model="user.name"/>
            </div>
            @error('user.name')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('user.email') errored @enderror">
            <div class="form-group-header">
                <label for="email">Эл. почта</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="email" type="email" placeholder="ivan@my.corp"
                       wire:model="user.email"/>
            </div>
            @error('user.email')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-checkbox">
            <label>
                <input type="checkbox" name="set-password" wire:model="set_password" value="1"/>
                Установить пароль
            </label>
            <p class="note">
                Если вы не установите пароль, он будет сгенерирован автоматически
            </p>
        </div>

        @if($set_password)
            <div class="form-group @error('password') errored @enderror">
                <div class="form-group-header">
                    <label for="password">Пароль</label>
                </div>
                <div class="form-group-body">
                    <input class="form-control" id="password" type="password" wire:model="password"/>
                </div>
                @error('password')
                <p class="note error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group @error('password_confirmation') errored @enderror">
                <div class="form-group-header">
                    <label for="password_confirmation">Подтверждение пароля</label>
                </div>
                <div class="form-group-body">
                    <input class="form-control" id="password_confirmation" type="password"
                           wire:model="password_confirmation"/>
                </div>
                @error('password_confirmation')
                <p class="note error">{{ $message }}</p>
                @enderror
            </div>
        @endif

        <div class="form-checkbox">
            <label>
                <input type="checkbox" name="notify" wire:model="notify_user" value="1"/>
                Уведомить пользователя
            </label>
        </div>

        <hr/>

        <button type="submit" class="btn btn-primary">Изменить пользователя</button>
    </form>
</div>
