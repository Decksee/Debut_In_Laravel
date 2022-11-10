@extends('layouts.app')

@section('content')
    Titre:{{ $post->title }}
    <br>
    Image:
    {{-- <span>{{ $post->image ? $post->image->path : 'Pas d\'image pour ce post' }}</span> --}}
    <img src="{{ Storage::url($post->image->path) }}" alt="">
    <br>
    <hr>
      @forelse ( $post->comments as $comment )
        <span>{{ $comment->content }} - créé le {{ $comment->created_at->format('d/m/Y') }}</span>
        <br>
        <br>
    @empty
    <span>Aucun commentaire pour ce post.</span>
    @endforelse

    {{-- <span>Commentaire le plus récent : {{ $post->latestComment->content }}</span> --}}

    <hr>
    <h3>Listes des tags</h3>
    @forelse ($post->tags  as $tag )
    <span>{{ $tag->name }}</span>

    @empty
    <span>Aucun tag pour ce post</span>
    @endforelse

    <hr>

    <span> Nom de l'artiste de l'image :{{ $post->imageArtist ?  $post->imageArtist->name : 'Néant'  }}</span>

@endsection
