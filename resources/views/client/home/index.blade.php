@extends('client.layouts.app')
@section('title')
    @lang('app.app-name')
@endsection
@section('content')
    @foreach($categories as $category)
        @if($category->products->count() > 0)
            @include('client.home.categories')
        @endif
    @endforeach
@endsection