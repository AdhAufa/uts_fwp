@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route ('book.update', $book->id)}}" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
       <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="tittle" value="{{ $book->tittle}}">
        </div>
        <div class="form-group mt-2">
            <label for="title">Author</label>
            <input type="text" class="form-control" name="author" value="{{ $book->author}}">
        </div>
        <div class="form-group mt-2">
            <label for="title">Publisher</label>
            <input type="text" class="form-control" name="publisher" value="{{ $book->publisher}}">
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label">Sampul Buku</label>
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset($book->book_cover) }}" width="150" alt="" srcset="">
                </div>

                <div class="col-md-10 d-flex align-items-center">
                    <input class="form-control" name="book_cover" type="file" id="formFile">
                </div>
            </div>
        </div>
        
        <div class="form-group mt-2">
            <button type="submit" class="form-control btn btn-primary">Submit</button>
        </div>

    </form>
</div>
    
@endsection