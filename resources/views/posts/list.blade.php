@extends('layouts.layout')


@section('title')
Le titre est présent
@endsection


@section('content')
@if ($loading)

<p>Chargement...</p>

@else

<h1>Document</h1>
<div class="row">
    <div class="col-3">
        <a href="{{route('ajoutpost')}}" class="btn btn-warning w-100">Ajout</a>
    </div>
</div>


@foreach ($posts as $post )
      
        <div class="card" style="width: 18rem; ">
            <img src="{{ asset("storage/$post->picture") }}"
            class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                @foreach ($categories as $category )
                    <span>{{$category->content}}</span>
                @endforeach

           <div class="row">
            <a href="{{route('postsDetails', $post->id)}}" class="btn btn-primary">Voir les details</a>
            <form method="post" action="{{route('removePost', $post->id )}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger my-2  " href="{{route('removePost', $post->id)}}">Supprimer</button>
            </form>
            <a href="{{route('update', $post->id)}}" class="btn btn-warning">Modif</a>
           </div>

        </div>
    </div>
     
    
    
@endforeach

@endif


@endsection
 
