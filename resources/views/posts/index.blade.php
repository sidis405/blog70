@extends('layouts.app')


@section('content')

    <h4>{{ __('blog.latest_posts') }} {{request('month')}} {{request('year')}} ({{ $posts->total() }})</h4>

    @include('posts._postlist')

@stop
