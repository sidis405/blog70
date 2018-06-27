@extends('layouts.app')

@section('content')

    <h4>Editing "{{ $post->title }}"</h4>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PATCH')
        {{-- <input type="hidden" name="_method" value="PATCH"> --}}
        {{-- {{ method_field('PATCH') }} --}}

        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" name="title" value="{{ old('title', $post->title) }}"></input>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                <option></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id)) selected="" @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="preview">Preview</label>
            <textarea class="form-control" name="preview">{{ old('preview', $post->preview) }}</textarea>
        </div>

        <div class="form-group">
            <label for="body">Article body</label>
            <textarea class="form-control" name="body" rows="5">{{ old('body', $post->body) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tags[]">Tags</label>
            <select name="tags[]" class="form-control" multiple="">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))) selected="" @endif
                    >{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-warning">Update post</button>
        </div>

    </form>


    @can('delete', $post)

        <hr>

        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="form-group">
                <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Are you sure?');">Delete post</button>
            </div>
        </form>

    @endcan

@stop
