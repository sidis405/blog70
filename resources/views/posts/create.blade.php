@extends('layouts.app')

@section('content')

    <h4>Create a new article</h4>

    {{-- Crsoss Site Request Forgery - CSRF - OWASP --}}
    <form action="{{ route('posts.store') }}" method="POST">

        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{-- {{ csrf_field() }} --}}
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" name="title"></input>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                <option></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="preview">Preview</label>
            <textarea class="form-control" name="preview"></textarea>
        </div>

        <div class="form-group">
            <label for="body">Article body</label>
            <textarea class="form-control" name="body" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="tags[]">Tags</label>
            <select name="tags[]" class="form-control" multiple="">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success">Submit post</button>
        </div>

    </form>

@stop
