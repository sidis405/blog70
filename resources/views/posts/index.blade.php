@extends('layouts.app')


@section('content')

    <h4>Latest Posts {{request('month')}} {{request('year')}} ({{ $posts->total() }})</h4>

    @include('posts._postlist')

@stop
