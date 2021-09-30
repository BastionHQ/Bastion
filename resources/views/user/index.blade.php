@extends('layouts.app')

@section('content')
    <div class="pt-4 container-lg p-responsive">
        <div class="Subhead">
            <div class="Subhead-heading">Список пользователей</div>
            @if($users->isNotEmpty())
                <div class="Subhead-actions">
                    <livewire:user-create-button/>
                </div>
            @endif
        </div>

        <livewire:user-list/>
    </div>
@endsection
