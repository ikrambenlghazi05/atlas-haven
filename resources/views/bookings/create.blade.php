@extends('home.layout')

@section('title', 'Réservation')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow" style="border-top: 4px solid var(--gold);">
                    <div class="card-header text-white" style="background-color: var(--puce);">
                        <h4 class="mb-0"><i class="fas fa-calendar-check me-2"></i> Finalisez Votre Réservation</h4>
                    </div>

                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="text-dark">{{ $room->roomType->name }} (Chambre n°{{ $room->room_number }})</h5>
                            <p class="mb-1">
                                <i class="far fa-calendar-alt me-2" style="color: var(--gold);"></i>
                                Du {{ $check_in }} au {{ $check_out }}
                                ({{ $nights }} nuit{{ $nights > 1 ? 's' : '' }})
                            </p>
                            <p class="mb-1">
                                <i class="fas fa-coins me-2" style="color: var(--gold);"></i>
                                {{ number_format($room->price_per_night, 2) }} MAD par nuit
                            </p>
                            <h5 class="mt-3 text-dark">Total : {{ number_format($total_price, 2) }} MAD</h5>
                        </div>

                        <hr style="border-color: var(--gold); opacity: 0.3;">

                        @auth
                            <form method="POST" action="{{ route('bookings.store') }}">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="check_in" value="{{ $check_in }}">
                                <input type="hidden" name="check_out" value="{{ $check_out }}">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom Complet</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth::user()->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Numéro de Téléphone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>

                                <div class="mb-3">
                                    <label for="special_requests" class="form-label">Demandes Spéciales</label>
                                    <textarea class="form-control" id="special_requests" name="special_requests" rows="3"
                                        placeholder="Régime alimentaire, préférences de chambre..."></textarea>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: var(--gold); border-color: var(--gold);">
                                        <i class="fas fa-check-circle me-2"></i> Confirmer la Réservation
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="text-center py-4">
                                <div class="alert alert-info mb-4">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Vous devez être connecté pour réserver cette chambre.
                                </div>
                                <a href="{{ route('login', ['redirect' => url()->current()]) }}" class="btn btn-primary"
                                    style="background-color: var(--gold); border-color: var(--gold);">
                                    <i class="fas fa-sign-in-alt me-2"></i> Se Connecter pour Réserver
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
