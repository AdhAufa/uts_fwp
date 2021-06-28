@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="tittle">
        </div>
        <div class="form-group mt-2">
            <label for="title">Author</label>
            <input type="text" class="form-control" name="author">
        </div>
        <div class="form-group mt-2">
            <label for="title">Publisher</label>
            <input type="text" class="form-control" name="publisher">
        </div>
        <div class="form-group mt-2">
            <label for="formFile" class="form-label">Sampul Buku</label>
            <input class="form-control" name="book_cover" type="file" id="formFile">
        </div>

        <div class="form-group mt-2">
            <button type="submit" class="form-control btn btn-primary">Submit</button>
        </div>

    </form>
</div>
    
@endsection