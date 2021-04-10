@extends('layouts.master')

@section('content')
    @include('shared.message')
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Edit Menu</h1>
        </div>
        {{ Form::model($obj, array('route'=>array('menu.update', $obj->id), 'method' => 'put')) }}
            @include('menu::partials.form',["title_submit"=>"Cập nhật"])
        {{ Form::close() }}
    </div>
@endsection
