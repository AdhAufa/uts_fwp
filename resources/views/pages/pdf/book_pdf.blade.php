<style>
    .table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .table td,
    .table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #ddd;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<h1 style="text-align: center">Daftar semua buku</h1>
<table class="table" style="width: 100%">
    <thead>
        <tr>
            <th scope="col">NO.</th>
            <th scope="col">Tittle</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
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
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Tidak Ada Data</td>
        </tr>
        @endforelse
    </tbody>
</table>