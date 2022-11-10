@extends('layouts.app')

@section('content')

<h1>Liste des Articles</h1>
    @if ($posts->count() > 0)
        @foreach( $posts as $post)
        <h3><a href="{{route('posts.show', ['id' => $post->id] )}}">{{ $post->title }}</a></h2>
        @endforeach

    @else
        <span>Aucune informations dans la BD</span>
    @endif

@endsection
