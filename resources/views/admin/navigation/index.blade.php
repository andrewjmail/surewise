@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Navigations
            <button class="float-right btn btn-primary">
                <a class="text-white" href="{{route('admin.navigation.create')}}">Create Navigation</a>
            </button></h1>
        @foreach($navigations as $navigation)
            <h3><a href="{{route('admin.navigation.show', $navigation->id)}}">{{$navigation->name}}</a></h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>Colour</th>
                </tr>
                </thead>
                <tbody>
                @foreach($navigation->categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->colour}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@stop
