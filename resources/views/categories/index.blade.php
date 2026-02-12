<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Categorieën</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd
        }
    </style>
</head>

<body>
    <div style="max-width:900px;margin:32px auto;padding:0 16px">
        <h1>Categorieën</h1>
        <p><a href="{{ route('categories.create') }}">+ Nieuwe categorie</a></p>

        @if(session('success'))
        <div style="padding:8px;background:#e6ffed;border:1px solid #b7f0c7">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ Str::limit($category->description ?? '-', 80) }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}">Bekijken</a>
                        |
                        <a href="{{ route('categories.edit', $category->id) }}">Bewerken</a>
                        |
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Weet je zeker dat je deze categorie wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Geen categorieën gevonden.</td>
                </tr>
                @endforelse

                

            </tbody>
        </table>
    </div>
</body>

</html>