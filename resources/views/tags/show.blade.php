@extends('layouts.app')


@section('content')

    <h4>Latest Posts tagged with '{{ $tag->name }}' ({{ $posts->total() }})</h4>

    @include('posts._postlist')

@stop
