@extends('layouts.app')

@section('content')
    <div class="pt-4 container-lg p-responsive">
        <div class="Subhead">
            <div class="Subhead-heading">Редактирование пользователя</div>
        </div>

        <div class="clearfix">
            <div class="col-6 float-left">
                <livewire:user-edit-form :user="$user"/>
            </div>
            <div class="col-6 float-right mt-6">
                <livewire:key-list :user="$user"/>
            </div>
        </div>
    </div>
@endsection
