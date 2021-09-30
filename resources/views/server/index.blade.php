@extends('layouts.app')

@section('content')
    <div class="pt-4 container-lg p-responsive">
        <div class="Subhead">
            <div class="Subhead-heading">Список серверов</div>
            @if($servers->isNotEmpty())
                <div class="Subhead-actions">
                    <livewire:server-create-button/>
                </div>
            @endif
        </div>

        <livewire:server-list/>
    </div>
@endsection
