<!DOCTYPE html>
<html>
<head>
    <title>Uredi knjigu</title>
</head>
<body>
    <h1>Uredi knjigu</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Naslov:</label>
        <input type="text" name="title" id="title" value="{{ $book->title }}"><br><br>

        <label for="author_name">Autor:</label>
        <input type="text" name="author_name" id="author_name" value="{{ $book->author->name }}"><br><br>

        <label for="genre_id">Žanr:</label>
        <select name="genre_id" id="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" @if ($book->genre_id == $genre->id) selected @endif>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="published_year">Godina izdavanja:</label>
        <input type="text" name="published_year" id="published_year" value="{{ $book->published_year }}"><br><br>

        <button type="submit">Ažuriraj</button>
    </form>
</body>
</html>