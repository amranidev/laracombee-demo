@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                <h3>All Books</h3>
              </div>
              <div class="card-body">
                @foreach($books as $book)
                  <ul class="list-group">
                      <li class="list-group-item">  
                        <h2>{{$book->title}}</h2>
                        <p>{{$book->body}}</p>
                        <a href="{{route('books.show', ['id' => $book->id])}}" class="btn btn-sm btn-primary">Show</a>
                      </li>
                  </ul>
                  <br>
                @endforeach
              </div>
              <div class="card-footer">
                  {{ $books->links() }}
              </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Recommended for you</h3>
                </div>
                <div class="card-body">
                    @foreach($recommendedBooks as $book)
                      <ul class="list-group">
                          <li class="list-group-item">  
                            <h5>{{$book->title}}</h5>
                            <p>{{$book->body}}</p>
                            <a href="{{route('books.show', ['id' => $book->id])}}" class="btn btn-sm btn-primary">Show</a>
                          </li>
                      </ul>
                      <br>
                    @endforeach      
                </div>
            </div>
        </div>
    <div>
</div>

@endsection
