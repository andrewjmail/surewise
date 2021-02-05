@extends('layouts.master')

@section('content')
    <a href="{{route('admin.navigation-category.show', $navigationCategory->id)}}">Navigation Category - {{$navigationCategory->name}}</a>
    <h1>Create Navigation Category</h1>
    </h1>
    <form action={{route('admin.navigation-item.store')}} method="POST">
        @method('POST')
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{old('name')}}">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
            <input name="navigation_category" type="hidden" value="{{$navigationCategory->id}}"
        </div>
        <div>
            <label for="href">link</label>
            <input id="href" name="href" type="text" value="{{ old('href')}}">
            @if($errors->has('href'))
                <div class="alert alert-danger">{{ $errors->first('href') }}</div>
            @endif
        </div>
        <div>
            <label for="order">Order</label>
            <input id="order" name="order" type="number" value="{{old('order')}}">
            @if($errors->has('order'))
                <div class="alert alert-danger">{{ $errors->first('order') }}</div>
            @endif
        </div>
        <button class="btn btn-primary">Save</button>
    </form>


@stop
