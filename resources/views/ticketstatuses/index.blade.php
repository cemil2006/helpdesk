<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketstatussen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
        <h1>Ticketstatussen</h1>
        <p><a href="{{ route('ticket-statuses.create') }}">+ Nieuwe status</a></p>

        @if(session('success'))
        <div style="padding:8px;background:#e6ffed;border:1px solid #b7f0c7">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ticketstatuses as $status)
                <tr>
                    <td>{{ $status->state }}</td>
                    <td>
                        <a href="{{ route('ticket-statuses.show', $status->id) }}">Bekijken</a>
                        |
                        <a href="{{ route('ticket-statuses.edit', $status->id) }}">Bewerken</a>
                        |
                        <form action="{{ route('ticket-statuses.destroy', $status) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Weet je zeker dat je deze status wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2">Geen statussen gevonden.</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</body>

</html>