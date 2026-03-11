<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Nieuwe ticketstatus</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div style="max-width:700px;margin:32px auto;padding:0 16px">
        <h1>Wijzig ticketstatus</h1>

        <form action="{{ route('ticket-statuses.update', $status) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom:8px">
                <label for="state">Status:</label>
                <input type="text" id="state" name="state" required>
            </div>

            <div>
                <button type="submit">Opslaan</button>
                <a href="{{ route('ticket-statuses.index') }}" style="margin-left:8px">Annuleren</a>
            </div>
        </form>
    </div>
</body>

</html>