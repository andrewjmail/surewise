@extends('layouts.master')

@section('content')
    <a href="{{route('admin.navigation.show', $navigation->id)}}">Navigation - {{$navigation->name}}</a>
    <h1>Create Navigation Category</h1>
    </h1>
    <form action={{route('admin.navigation-category.store')}} method="POST">
        @method('POST')
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{old('name')}}">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
            <input name="navigation" type="hidden" value="{{$navigation->id}}"
        </div>
        <div>
            <label for="colour">Colour</label>
            <input id="colour" name="colour" type="text" value="{{old('colour')}}">
            @if($errors->has('colour'))
                <div class="alert alert-danger">{{ $errors->first('colour') }}</div>
            @endif
        </div>
        <div>
            <label for="order">Order</label>
            <input id="order" name="order" type="text" value="{{old('order')}}">
            @if($errors->has('order'))
                <div class="alert alert-danger">{{ $errors->first('order') }}</div>
            @endif
        </div>
        <button class="btn btn-primary">Save</button>
    </form>


@stop
