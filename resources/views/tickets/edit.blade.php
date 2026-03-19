<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ticket Bewerken</div>
                <div class="card-body">
                    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Titel</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title" name="title" value="{{ $ticket->title }}" required>
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Beschrijving</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" rows="5" required>{{ $ticket->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label">Prioriteit</label>
                            <select class="form-control @error('priority') is-invalid @enderror"
                                id="priority" name="priority" required>
                                <option value="">Selecteer prioriteit</option>
                                <option value="low" {{ old('priority', $ticket->priority) === 'low' ? 'selected' : '' }}>Laag</option>
                                <option value="medium" {{ old('priority', $ticket->priority) === 'medium' ? 'selected' : '' }}>Gemiddeld</option>
                                <option value="high" {{ old('priority', $ticket->priority) === 'high' ? 'selected' : '' }}>Hoog</option>
                            </select>
                            @error('priority')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ticket_status_id" class="form-label">Status</label>
                            <select class="form-control @error('ticket_status_id') is-invalid @enderror"
                                id="ticket_status_id" name="ticket_status_id" required>
                                <option value="">Selecteer status</option>
                                @foreach($ticketstatuses as $status)
                                    <option value="{{ $status->id }}" {{ old('ticket_status_id', $ticket->ticket_status_id) == $status->id ? 'selected' : '' }}>{{ $status->state }}</option>
                                @endforeach
                            </select>
                            @error('ticket_status_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Ticket Bijwerken</button>
                        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Annuleren</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>