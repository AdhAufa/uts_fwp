@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="my-2">
            <a href="{{ route('book.create') }}" class="btn btn-primary">Create New Data</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">NO.</th>
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
                     <td>{{$book -> tittle}}</td>
                     <td>{{$book -> author}}</td>
                     <td>{{$book -> publisher}}</td>   
                     <td>
                        <form action="{{ route('book.destroy', $book -> id)}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('book.edit', $book -> id)}}" class="btn btn-success">Edit</a>
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
