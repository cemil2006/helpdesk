<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Nieuwe categorie</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div style="max-width:700px;margin:32px auto;padding:0 16px">
        <h1>Nieuwe categorie</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div style="margin-bottom:8px">
                <div style="margin: 15px 0;">
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" required>
                </div>

            </div>

            <div style="margin-bottom:8px">
                <label for="description">Beschrijving:</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div>
                <button type="submit">Opslaan</button>
                <a href="{{ route('categories.index') }}" style="margin-left:8px">Annuleren</a>
            </div>
        </form>
    </div>
</body>

</html>