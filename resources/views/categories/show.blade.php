@extends('layouts.app')


@section('content')

    <h4>Latest Posts in  '{{ $category->name }}' ({{ $posts->total() }})</h4>

    @include('posts._postlist')

@stop
