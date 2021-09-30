<div>
    <form wire:submit.prevent="submit">
        <div class="form-group @error('server.title') errored @enderror">
            <div class="form-group-header">
                <label for="title">Название сервера</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="title" type="text" placeholder="Центральный сервер" wire:model="server.title"/>
            </div>
            @error('server.title')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('server.host') errored @enderror">
            <div class="form-group-header">
                <label for="host">IP-адрес сервера</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="host" type="text" placeholder="127.0.0.1" wire:model="server.host"/>
            </div>
            @error('server.host')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('server.port') errored @enderror">
            <div class="form-group-header">
                <label for="port">Порт для ssh-соединения</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="port" type="text" placeholder="22" wire:model="server.port"/>
            </div>
            @error('server.port')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('server.user') errored @enderror">
            <div class="form-group-header">
                <label for="user">Пользователь с правами администратора</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="user" type="text" placeholder="root" wire:model="server.user"/>
            </div>
            @error('server.user')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <hr/>

        <button type="submit" class="btn btn-primary">Изменить сервер</button>
    </form>
</div>
