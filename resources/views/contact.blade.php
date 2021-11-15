@extends('layouts.layout')

@section('content')

<div class="container">
    <form action="{{route('contactSend')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" required name="name" class="form-control" placeholder="Votre nom">
        </div>
        <div class="form-group">
            <input type="text" required name="message" class="form-control" placeholder="Votre message">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>
@endsection