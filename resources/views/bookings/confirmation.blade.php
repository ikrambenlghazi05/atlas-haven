@extends('home.layout')

@section('title', 'Confirmation')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow" style="border-top: 4px solid var(--gold);">
                    <div class="card-header text-white" style="background-color: var(--puce);">
                        <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i> Réservation Confirmée !</h4>
                    </div>

                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle fa-5x text-success mb-3"></i>
                            <h3 class="text-dark">Merci pour votre réservation chez Atlas Haven</h3>
                        </div>

                        <div class="text-start mb-4">
                            <h5 class="text-dark" style="border-bottom: 2px solid var(--gold); padding-bottom: 8px;">Détails
                                de la réservation</h5>
                            <p><strong>Numéro de confirmation :</strong> {{ $reservation->id }}</p>
                            <p><strong>Chambre :</strong> {{ $reservation->room->roomType->name }} (Chambre
                                n°{{ $reservation->room->room_number }})</p>
                            <p><strong>Dates :</strong> {{ $reservation->check_in->format('d/m/Y') }} au
                                {{ $reservation->check_out->format('d/m/Y') }}</p>
                            <p><strong>Total :</strong> {{ number_format($reservation->total_price, 2) }} MAD</p>
                            @if ($reservation->special_requests)
                                <p><strong>Demandes spéciales :</strong> {{ $reservation->special_requests }}</p>
                            @endif
                        </div>

                        <p class="text-muted">Une confirmation a été envoyée à {{ $reservation->guest_email }}</p>

                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <a href="{{ url('/') }}" class="btn btn-primary"
                                style="background-color: var(--gold); border-color: var(--gold);">
                                <i class="fas fa-home me-2"></i> Retour à l'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
