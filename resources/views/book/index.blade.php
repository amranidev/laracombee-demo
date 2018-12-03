@extends('layouts.app')

@section('content')
<div class='container'>
    @foreach($books as $book)
        <h2>{{$book->title}}</h2>
        <p>{{$book->body}}</p>
    @endforeach
</div>

@endsection
