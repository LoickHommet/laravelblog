@extends('layouts.layout')


@section('title')
Le titre est présent
@endsection


@section('content')
@if ($loading)

<p>Chargement...</p>

@else

<h1>Document</h1>
<ul>
@foreach ($posts as $post )
    <li>
        <div class="row"> {{$post->title}}</div>
        <div class="row"> {{$post->description}}</div>
        <div class="row"> {{$post->extrait}}</div>
    </li>
    
@endforeach
</ul>
@endif


@endsection
 
