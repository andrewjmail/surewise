@extends('layouts.master')

@section('content')
    <a href="{{route('admin.navigation.show', $navigationCategory->navigation->id)}}">Navigation - {{$navigationCategory->navigation->name}}</a>
    <h1>Category - {{$navigationCategory->name}}
        <div class="float-right">
            <form action={{route('admin.navigation-category.delete', $navigationCategory->id)}} method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </h1>
    <form action={{route('admin.navigation-category.update', $navigationCategory->id)}} method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{old('name', $navigationCategory->name)}}">
            @if($errors->has('name'))
                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div>
            <label for="name">Colour</label>
            <input id="name" name="colour" type="text" value="{{old('colour', $navigationCategory->colour)}}">
            @if($errors->has('colour'))
                <div class="alert alert-danger">{{ $errors->first('colour') }}</div>
            @endif
        </div>
        <div>
            <label for="order">Order</label>
            <input id="order" name="order" type="number" value="{{old('order', $navigationCategory->order)}}">
            @if($errors->has('order'))
                <div class="alert alert-danger">{{ $errors->first('order') }}</div>
            @endif
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Navigation Item</th>
                    <th>Link</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($navigationCategory->navigationItems as $item)
                    <tr>

                        <td>
                            <input name="items[{{$item->id}}][id]" type="hidden" value="{{$item->id}}">
                            <input name="items[{{$item->id}}][name]" type="text" value="{{$item->name}}" readonly>
                        </td>
                        <td>
                            <input name="items[{{$item->id}}][href]" type="text" value="{{$item->href}}" readonly>
                        </td>
                        <td>
                            <input name="items[{{$item->id}}][order]" type="number" value="{{old('items.' . $item->id . '.order', $item->order)}}">
                            @if($errors->has('items.' . $item->id . '.order'))
                                <div class="alert alert-danger">The order field is required.</div>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success">
                                <a class="text-white" href="{{route('admin.navigation-item.show', $item->id)}}">View Item</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary">Save</button>
    </form>
    <button class="float-right btn btn-primary">
        <a class="text-white" href="{{route('admin.navigation-item.create', ['navigation_category' => $navigationCategory->id])}}">Create Navigation Item</a>
    </button>

@stop
