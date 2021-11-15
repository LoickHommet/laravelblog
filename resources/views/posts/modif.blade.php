@extends('layouts.layout')


@section('title')
Le titre est présent
@endsection


@section('content')

<h1>Details de {{$post->title}}</h1>

    @foreach ($errors->all() as $error) 
        <p style="color:red"> {{$error}} </p>
    @endforeach

<div class="row">
    
<form action="{{route('update')}} " method="post" class="row justify-items: center;">
    @csrf
    <div class="col-7">
        <label for="text" >Title :</label>
        <input type="text" id="title" name="title" class="form-control" required value= {{$post->title}}>
    </div >
    <div class="col-7">
        <label for="text"  >Description :</label>
        <input type="text" id="description" name="description" class="form-control" required value={{$post->description}} >
    </div >
    <div class="col-7" text-align="center">
        <label for="text" >Resumer :</label>
        <textarea type="text" id="extrait" name="extrait" class="form-control" required>{{$post->extrait}}</textarea>
    </div >
    <div class="button my-3">
        <button type="submit" class="btn btn-primary">Modifier un article</button>
        <a href=" {{route('postlist')}} " class="btn btn-warning">Retour a la liste</a>  
    </div>
</form>



    <form action="{{route('postupdatepicture', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img src="{{asset("storage/$post->picture")}}" alt="ImgPost" style="width: 600px;">
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" required name="picture" accept="*">
        </div>
    
        <button class="btn btn-success">Modifier image</button>
    </form>


</div>


@endsection
 
