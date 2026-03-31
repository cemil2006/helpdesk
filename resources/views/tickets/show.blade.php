<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Ticket #{{ $ticket->id }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label><strong>Titel:</strong></label>
                        <p>{{ $ticket->title }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Beschrijving:</strong></label>
                        <p>{{ $ticket->description }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Status:</strong></label>
                        <p><span class="badge bg-secondary">{{ optional($ticket->status)->state ?? '—' }}</span></p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Prioriteit:</strong></label>
                        <p>{{ $ticket->priority }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Categorieën:</strong></label>
                        <p>
                            @forelse($ticket->categories as $category)
                            <span class="badge bg-info">{{ $category->name }}</span>
                            @empty
                            <span class="text-muted">—</span>
                            @endforelse
                        </p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Aangemaakt op:</strong></label>
                        <p>{{ $ticket->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary">Bewerken</a>
                    <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Terug</a>
                </div>
            </div>
        </div>
    </div>
</div>