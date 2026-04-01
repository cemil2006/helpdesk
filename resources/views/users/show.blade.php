<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>User #{{ $user->id }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label><strong>Naam:</strong></label>
                        <p>{{ $user->name }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Email:</strong></label>
                        <p>{{ $user->email }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Role:</strong></label>
                        <p>
                            @if($user->role === 'admin')
                            <span class="badge bg-danger">Admin</span>
                            @elseif($user->role === 'moderator')
                            <span class="badge bg-warning">Moderator</span>
                            @else
                            <span class="badge bg-secondary">Gebruiker</span>
                            @endif
                        </p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Aangemaakt op:</strong></label>
                        <p>{{ $user->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Bewerken</a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Terug</a>
                </div>
            </div>
        </div>
    </div>
</div>