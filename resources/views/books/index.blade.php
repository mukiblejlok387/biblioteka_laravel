<!DOCTYPE html>
<html>
<head><title>Pregled knjiga</title></head>
<body>
<h1>Lista knjiga</h1>

<!-- Logout dugme -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" style="background-color: #e3342f; color: white; padding: 6px 12px; border: none; border-radius: 4px;">
        Logout
    </button>
</form>

<a href="{{ route('books.create') }}">Dodaj novu knjigu</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>Naslov</th><th>Autor</th><th>Žanr</th><th>Godina</th><th>Akcije</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author->name }}</td>
        <td>{{ $book->genre->name }}</td>
        <td>{{ $book->published_year }}</td>
        <td>
            <a href="{{ route('books.edit', $book->id) }}">Uredi</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Obriši</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>