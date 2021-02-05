@extends('layouts.master')

@section('content')
    <a href="{{route('admin.navigation.index')}}">Navigations Index</a>
    <h1>Create Navigation</h1>
    </h1>
    <form action={{route('admin.navigation.store')}} method="POST">
        @method('POST')
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value={{ old('name')}}>
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button class="btn btn-primary">Save</button>
    </form>


@stop
