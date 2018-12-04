@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{route('books.index')}}">Back to the store</a>
    <br><br><br>
    <h2>{{$book->title}}</h2>
    <p>{{$book->body}}</p>
</div>

@endsection