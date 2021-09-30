@extends('layouts.app')

@section('content')
    <div class="pt-4 container-lg p-responsive">
        <div class="Subhead">
            <div class="Subhead-heading">Сервер {{ $server->title }}</div>
        </div>

        <div class="width-full border-bottom color-border-secondary">
            <div class="UnderlineNav width-full box-shadow-none">
                <nav class="UnderlineNav-body">
                    <a class="UnderlineNav-item{{ Route::is('server.edit') ? ' selected' : '' }}" href="{{ route('server.edit', $server) }}">
                        Редактирование
                    </a>
                    <a class="UnderlineNav-item{{ Route::is('server.history') ? ' selected' : '' }}" href="{{ route('server.history', $server) }}">
                        История синхронизации
                    </a>
                    <a class="UnderlineNav-item{{ Route::is('server.users') ? ' selected' : '' }}" href="{{ route('server.users', $server) }}">
                        Пользователи
                    </a>
                </nav>
            </div>
        </div>

        @yield('server-content')
    </div>
@endsection
