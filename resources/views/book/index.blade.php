@extends('layouts.app')

@section('content')
<div class='container'>
    <div>
      @foreach($books as $book)
        <ul class="list-group">
            <li class="list-group-item">  
              <h2>{{$book->title}}</h2>
              <p>{{$book->body}}</p>
              <a href="{{route('books.show', ['id' => $book->id])}}" class="btn btn-sm btn-info">Show</a>
            </li>
        </ul>
        <br>
      @endforeach
    </div>
    {{ $books->links() }}
</div>

@endsection
