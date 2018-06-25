@extends('layouts.app')


@section('content')

    <h4>Latest Posts</h4>

    {{ $posts->links() }}

    @foreach($posts as $post)

        @include('posts._post')

    @endforeach

    {{ $posts->links() }}

@stop
