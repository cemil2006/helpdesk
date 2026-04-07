<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status #{{ $ticketstatus->id }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Status #{{ $ticketstatus->id }}</div>
                    <div class="card-body">
                        <p><strong>Status:</strong> {{ $ticketstatus->state }}</p>
                        <p><strong>Aangemaakt op:</strong> {{ $ticketstatus->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('ticketstatuses.index') }}" class="btn btn-secondary">Terug</a>
                        <a href="{{ route('ticketstatuses.edit', $ticketstatus) }}" class="btn btn-primary">Bewerk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>