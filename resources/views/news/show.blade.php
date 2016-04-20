@extends('layouts.app')

@section('title', $newsItem->title)

@section('content')
    <div><a href="{{ route('news') }}"><i class="fa fa-chevron-left"></i> все новости</a></div>
    <h1>{{ $newsItem->title }}</h1>
    {!! $newsItem->text !!}
    <div class="news-date"><i class="fa fa-clock-o"></i> {{ $newsItem->published_at }}</div>
@endsection