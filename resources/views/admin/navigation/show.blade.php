@extends('layouts.master')

@section('content')
    <a href="{{route('admin.navigation.index')}}">Navigations Index</a>
    <h1>Navigation - {{$navigation->name}}
        <div class="float-right">
            <form action={{route('admin.navigation.delete', $navigation->id)}} method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </h1>
    <form action={{route('admin.navigation.update', $navigation->id)}} method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{old('name', $navigation->name)}}">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Colour</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($navigation->categories as $category)
                    <tr>

                        <td>
                            <input name="categories[{{$category->id}}][id]" type="hidden" value="{{$category->id}}">
                            <input type="text" readonly value="{{$category->name}}">
                        </td>
                        <td>
                            <input type="text" readonly value="{{$category->colour}}">
                        </td>
                        <td>
                            <input name="categories[{{$category->id}}][order]" type="number" value="{{old('categories.' . $category->id . '.order', $category->order)}}">
                            @if($errors->has('categories.' . $category->id . '.order'))
                                <div class="alert alert-danger">The order field is required.</div>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success">
                                <a class="text-white" href="{{route('admin.navigation-category.show', $category->id)}}">View Category</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary">Save</button>
    </form>
    <button class="float-right btn btn-primary">
        <a class="text-white" href="{{route('admin.navigation-category.create', ['navigation' => $navigation->id])}}">Create Navigation Category</a>
    </button>


@stop
