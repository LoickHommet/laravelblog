@extends('layouts.layout')


@section('title')
Le titre est présent
@endsection


@section('content')

<h1>Ajout de article</h1>

@if ($errors->any()) 
    @foreach ($errors->all() as $error) 
        <p style="color:red"> {{$error}} </p>
    @endforeach
@endif

<form action="{{route('ajoutpost')}} " method="post" class="row justify-items: center;" enctype="multipart/form-data">
    @csrf
    <div class="col-7">
        <label for="text" >Title :</label>
        <input type="text" id="title" name="title" class="form-control" required>
    </div >
    <div class="col-7">
        <label for="text"  >Description :</label>
        <input type="text" id="description" name="description" class="form-control" required>
    </div >
    <div class="col-7" text-align="center">
        <label for="text" >Resumer :</label>
        <textarea type="text" id="extrait" name="extrait" class="form-control" required> </textarea>
    </div >
    <div class="button my-3">
        <button type="submit" class="btn btn-primary">Ajouter un article</button>
        <a href=" {{route('postlist')}} " class="btn btn-warning">
            Retour a la liste
        </a>
        
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" required name="picture" accept="*">
    </div>

    <label>Catétegorie de l'article</label>
    <div>
        @foreach ($categories as $category )
        <div class="from-ckeck form-cheack-inligne">
            <input type="checkbox" id="check-{{$category->id}}" name="categories[]" value="{{$category->id}}" class="form-control-input">
            <label for="check-{{$category->id}}" class="form-check-inligne">{{$category->content}}</label>
        </div>            
        @endforeach

    </div>
</form>




@endsection
 
