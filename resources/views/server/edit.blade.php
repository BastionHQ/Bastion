@extends('layouts.server-detail')

@section('server-content')
    <livewire:server-edit-form :server="$server"/>
@endsection
