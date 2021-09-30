<div>
    <form wire:submit.prevent="submit">
        <div class="form-group @error('title') errored @enderror">
            <div class="form-group-header">
                <label for="title">Название сервера</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="title" type="text" placeholder="Центральный сервер" wire:model="title"/>
            </div>
            @error('title')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('host') errored @enderror">
            <div class="form-group-header">
                <label for="host">IP-адрес сервера</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="host" type="text" placeholder="127.0.0.1" wire:model="host"/>
            </div>
            @error('host')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('port') errored @enderror">
            <div class="form-group-header">
                <label for="port">Порт ssh-соединения</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="port" type="text" placeholder="22" wire:model="port"/>
            </div>
            @error('port')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('user') errored @enderror">
            <div class="form-group-header">
                <label for="user">Пользователь с правами администратора</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="user" type="text" placeholder="root" wire:model="user"/>
            </div>
            @error('user')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <hr/>

        <button type="submit" class="btn btn-primary">Добавить сервер</button>
    </form>
</div>
