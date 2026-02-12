<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Categorie bewerken</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div style="max-width:700px;margin:32px auto;padding:0 16px">
        <h1>Categorie bewerken</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom:8px">
                <label>Naam</label><br>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" required style="width:100%;padding:8px">
                @error('name')<div style="color:#c00">{{ $message }}</div>@enderror
            </div>

            <div style="margin-bottom:8px">
                <label>Beschrijving</label><br>
                <textarea name="description" rows="4" style="width:100%;padding:8px">{{ old('description', $category->description) }}</textarea>
                @error('description')<div style="color:#c00">{{ $message }}</div>@enderror
            </div>

            <div>
                <button type="submit">Opslaan</button>
                <a href="{{ route('categories.index') }}" style="margin-left:8px">Annuleren</a>
            </div>
        </form>
    </div>
</body>

</html>