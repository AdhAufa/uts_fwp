@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <table class="table table-stripped table-hover">
            <thead>
              <tr>
                <th scope="col">NO.</th>
                <th scope="col">Cover</th>
                <th scope="col">Tittle</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">Opsi</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
             @forelse ($books as $book)
                 <tr>
                     <td>{{$no++}}</td>
                     <td>
                        <img src="{{ asset($book->book_cover) }}" width="100" alt="">
                     </td>
                     <td>{{$book -> tittle}}</td>
                     <td>{{$book -> author}}</td>
                     <td>{{$book -> publisher}}</td>   
                     <td>
                        <form action="{{ route('book.destroy', $book -> id)}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('book.edit', $book -> id)}}" class="btn btn-warning">
                         Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                     </td>   
                    </tr>
             @empty
                 <tr>
                     <td colspan="5" class="text-center">Tidak Ada Data</td>
                 </tr>
             @endforelse
            </tbody>
          </table>
    </div>
@endsection
