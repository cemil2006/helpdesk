<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Categorie: {{ $category->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div style="max-width:800px;margin:32px auto;padding:0 16px">
        <h1>{{ $category->name }}</h1>

        <p><strong>Beschrijving</strong></p>
        <div style="padding:12px;border:1px solid #eee;background:#fafafa">{{ $category->description ?? '-' }}</div>

        <p style="margin-top:12px">
            <a href="{{ route('categories.edit', $category) }}">Bewerken</a>
            |
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Verwijder deze categorie?')">Verwijderen</button>
        </form>
        |
        <a href="{{ route('categories.index') }}">Terug naar overzicht</a>
        </p>

        <p style="color:#666;font-size:90%">Aangemaakt: {{ $category->created_at?->format('d-m-Y H:i') ?? '-' }}</p>
    </div>
</body>

</html>