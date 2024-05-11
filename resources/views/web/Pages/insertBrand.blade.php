@extends('web.pages.montag_layout')
@section('title', 'Insert Brand Page')
@section('content')
    @include('web.Pages.header')
    <div class="container">
        <h2>Insert Brand</h2>
        <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="url">url:</label>
                <input type="url" class="form-control" id="url" name="url">
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @include('web.Pages.footer')
    @include('web.Pages.mob_header')
@endsection