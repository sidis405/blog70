@extends('layouts.app')

@section('content')

    <h4>Create a new article</h4>

    {{-- Crsoss Site Request Forgery - CSRF - OWASP --}}
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{-- {{ csrf_field() }} --}}
        @csrf

        @include('posts._form')

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success">Submit post</button>
        </div>

    </form>

@stop
