@extends('layouts.app')

@section('content')
<div class='container'>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to the store</a>
    <br><br>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" type="text" id="body" name="body" required></textarea>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
