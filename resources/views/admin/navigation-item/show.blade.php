@extends('layouts.master')

@section('content')
    <a href="{{route('admin.navigation-category.show', $navigationItem->navigationCategory->id)}}">Navigation Category - {{$navigationItem->navigationCategory->name}}</a>
    <h1>Navigation Item - {{$navigationItem->name}}
        <div class="float-right">
            <form action={{route('admin.navigation-item.delete', $navigationItem->id)}} method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </h1>
        <form action={{route('admin.navigation-item.update', $navigationItem->id)}} method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="{{old('name', $navigationItem->name)}}">
                @if($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div>
                <label for="href">link</label>
                <input id="href" name="href" type="text" value="{{old('href', $navigationItem->href)}}">
                @if($errors->has('href'))
                    <div class="alert alert-danger">{{ $errors->first('href') }}</div>
                @endif
            </div>
            <div>
                <label for="order">Order</label>
                <input id="order" name="order" type="text"value="{{old('order', $navigationItem->order)}}">
                @if($errors->has('order'))
                    <div class="alert alert-danger">{{ $errors->first('order') }}</div>
                @endif
            </div>
            <button class="btn btn-primary">Save</button>
        </form>

@stop
