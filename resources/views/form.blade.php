@extends('layouts.app')

@section('content')

<h2>Créer un nouveau post</h2>

@if ($errors->any())
    @foreach ($errors->all() as $error )
        <div>{{ $error }}</div>
    @endforeach
@endif

<form method="POST" action="{{route('posts.store') }}" enctype="multipart/form-data">

    @csrf

    <input type="text" name="title" class="border-gray-600 border-2"><br>


	<textarea name="content" cols="20" rows="10"></textarea><br>

    <label for="avatar">Choose a profile picture:</label><br>

    <input type="file"
       id="avatar" name="avatar"
       accept="image/png, image/jpeg"><br>



	<button type="submit" class="bg-green">Créer</button>
</form>

@endsection
