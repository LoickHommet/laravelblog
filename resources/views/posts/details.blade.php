@extends('layouts.layout')


@section('title')
Le titre est présent
@endsection


@section('content')

<h1>Details de article</h1>
<div class="row">
    <div class="card" style="width:75% ;">
        <div class="card-body">
          <h5 class="card-title">{{$posts->title}}</h5>
          <p class="card-text">{{$posts->extrait}}</p>
             <a href=" {{route('postlist')}} " class="card-link">Retour a la liste </a>
             <form method="post" action="{{route('removePost', $posts->id )}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger my-2" href="{{route('removePost', $posts->id)}}">Supprimer post</button>
            </form>
         </div>
    </div>
</div>

<h1>Commentaire</h1>

<form method="post" action="{{route('commentAdd', $posts->id)}}">
    @csrf
    <div class="from-group">
        <label >Ajouter un commentaire</label>
        <input type="text" class="form-control" name="content" required>
    </div>
    <button class="btn btn-primary" type="submit">Ajouter un commentaire</button>
</form>
<p>
    @foreach ($posts->categories as $category)
    @csrf
        {{$category->content}}
    @endforeach
</p>

@foreach ($posts->comments as $comment )
    <p>{{$comment->content}} </p>
    
    <form action=" {{route('deleteComment', $comment->id)}}" method="post" >
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    
@endforeach


@endsection
 
