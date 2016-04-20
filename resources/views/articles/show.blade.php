@extends('layouts.app')

@section('title', $article->title ? $article->title : $article->name)

@section('content')
    <div><a href="{{ route('articles') }}"><i class="fa fa-chevron-left"></i> все статьи</a></div>
    <h1>{{ $article->name }}</h1>
    {!! $article->text !!}
@endsection