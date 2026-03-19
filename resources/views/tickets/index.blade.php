
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Tickets</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                Nieuw Ticket
            </a>
        </div>
    </div>

    @if($tickets->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titel</th>
                    <th>Status</th>
                    <th>Prioriteit</th>
                    <th>Aangemaakt op</th>
                    <th>Categorie</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ optional($ticket->status)->state ?? '—' }}</td>
                        <td>{{ $ticket->priority }}</td>
                        <td>{{ $ticket->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-info">Bekijk</a>
                            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-sm btn-warning">Bewerk</a>
                            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Zeker weten?')">Verwijder</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Geen tickets gevonden.</p>
    @endif
</div>
