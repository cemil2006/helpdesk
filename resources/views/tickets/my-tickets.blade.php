<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Mijn Tickets</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                Nieuw Ticket
            </a>
        </div>
    </div>

    <!-- Filter Formulier -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('tickets.my') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="priority" class="form-label">Prioriteit</label>
                    <select class="form-control" id="priority" name="priority">
                        <option value="">Alle prioriteiten</option>
                        <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Laag</option>
                        <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Gemiddeld</option>
                        <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>Hoog</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="category_id" class="form-label">Categorie</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Alle categorieën</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filteren</button>
                    <a href="{{ route('tickets.my') }}" class="btn btn-secondary w-100 ms-2">Reset</a>
                </div>
            </form>
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
                <th>Categorieën</th>
                <th>Aangemaakt op</th>
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
                <td>
                    @forelse($ticket->categories as $category)
                    <span class="badge bg-info">{{ $category->name }}</span>
                    @empty
                    <span class="text-muted">—</span>
                    @endforelse
                </td>
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
    <div class="alert alert-info">
        Je hebt nog geen tickets aangemaakt. <a href="{{ route('tickets.create') }}">Maak er één aan</a>
    </div>
    @endif
</div>