@extends('layouts.master')

@section('content')
    @include('shared.message')
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Tạo menu</h1>
        </div>
        {{ Form::open(['route' => ['menu.store', ['lastUrl' => Request::get('lastUrl')]] ]) }}
            @include('menu::partials.form',["title_submit"=>"Thêm mới"])
        {{ Form::close() }}
    </div>
@endsection
