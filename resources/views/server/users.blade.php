@extends('layouts.server-detail')

@section('server-content')
    <div class="pt-4">
        <livewire:server-user-list
            :server="$server"
        />
    </div>
@endsection
