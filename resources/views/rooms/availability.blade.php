@extends('home.layout')

@section('title', 'Disponibilité des Chambres')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="text-dark" style="font-family: 'Playfair Display', serif;">Chambres Disponibles</h2>
            <a href="{{ url('/') }}" class="btn btn-outline-primary"
                style="border-color: var(--gold); color: var(--gold);">
                <i class="fas fa-arrow-left me-2"></i> Retour à l'accueil
            </a>
        </div>

        <div class="alert alert-info"
            style="background-color: var(--light-sand); border-color: var(--gold); color: var(--dark);">
            <i class="fas fa-info-circle me-2" style="color: var(--gold);"></i>
            Affichage des chambres {{ $roomType->name }} disponibles du {{ $check_in }} au {{ $check_out }}
            ({{ $nights }} nuit{{ $nights > 1 ? 's' : '' }})
        </div>

        @if ($rooms->isEmpty())
            <div class="alert alert-warning"
                style="background-color: var(--light-sand); border-color: var(--burnt-orange); color: var(--dark);">
                <i class="fas fa-exclamation-triangle me-2" style="color: var(--burnt-orange);"></i>
                Aucune chambre disponible pour les dates sélectionnées. Veuillez essayer d'autres dates.
            </div>
        @else
            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm" style="border-top: 3px solid var(--gold);">
                            <img src="{{ $room->featured_image
                                ? '/storage/' . $room->featured_image->image_path
                                : 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80' }}"
                                loading="lazy" class="card-img-top" alt="{{ $room->roomType->name }}"
                                style="height: 200px; object-fit: cover;">

                            <div class="card-body">
                                <h5 class="card-title text-dark">{{ $room->roomType->name }}</h5>
                                <p class="text-muted">Chambre n°{{ $room->room_number }}</p>

                                <div class="d-flex justify-content-between mb-3">
                                    <span class="fw-bold"
                                        style="color: var(--gold);">{{ number_format($room->price_per_night, 2) }}
                                        MAD/nuit</span>
                                    <span class="fw-bold" style="color: var(--puce);">Total :
                                        {{ number_format($room->price_per_night * $nights, 2) }} MAD</span>
                                </div>

                                <div class="mb-3">
                                    @foreach ($room->amenities->take(3) as $amenity)
                                        <span class="badge me-1 mb-1"
                                            style="background-color: var(--light-sand); color: var(--burnt-orange); border: 1px solid var(--gold);">
                                            <i class="fas fa-{{ $amenity->icon }} me-1"></i> {{ $amenity->name }}
                                        </span>
                                    @endforeach
                                </div>

                                <div class="d-grid">
                                    <a href="{{ route('bookings.create', [
                                        'room_id' => $room->id,
                                        'check_in' => $check_in,
                                        'check_out' => $check_out,
                                    ]) }}"
                                        class="btn btn-primary"
                                        style="background-color: var(--gold); border-color: var(--gold);">
                                        <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
@push('styles')
    <style>
        :root {
            --gold: #d4af37;
            --light-sand: #f5f5dc;
            --dark: #333;
            --burnt-orange: #cc5500;
            --puce: #eec9b7;
        }

        body {
            background-color: var(--light-sand);
        }
    </style>
