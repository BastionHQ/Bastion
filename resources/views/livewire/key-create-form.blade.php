<div>
    <form wire:submit.prevent="submit">
        <div class="form-group @error('name') errored @enderror">
            <div class="form-group-header">
                <label for="name">Название ключа</label>
            </div>
            <div class="form-group-body">
                <input class="form-control" id="name" type="text" placeholder="Основной ключ" wire:model="name"/>
            </div>
            @error('name')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group @error('key') errored @enderror">
            <div class="form-group-header">
                <label for="key">Rsa-ключ</label>
            </div>
            <div class="form-group-body">
                <textarea class="form-control" id="key" placeholder="ssh-rsa ..." wire:model="key"></textarea>
            </div>
            @error('key')
            <p class="note error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Добавить ключ</button>
    </form>
</div>
