@extends('layouts.app')

@section('content')
        @include('posts._post', ['fullPost' => true])
@stop
