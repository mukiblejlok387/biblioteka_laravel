<!DOCTYPE html>
<html>
<head>
    <title>Dodaj novu knjigu</title>
</head>
<body>
    <h1>Dodaj novu knjigu</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label for="title">Naslov:</label>
        <input type="text" name="title" id="title"><br><br>

        <label for="author_name">Autor:</label>
        <input type="text" name="author_name" id="author_name"><br><br>

        <label for="genre_id">Žanr:</label>
        <select name="genre_id" id="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select><br><br>

        <label for="published_year">Godina izdavanja:</label>
        <input type="text" name="published_year" id="published_year"><br><br>

        <button type="submit">Spasi</button>
    </form>
</body>
</html>