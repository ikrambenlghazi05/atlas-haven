@extends('layouts/contentNavbarLayout')

@section('title', 'Détails de la Réservation')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="row animate__animated animate__fadeIn">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0" style="color: #532200;">
                        <i class="bx bx-calendar-check me-2" style="color: #e1a140;"></i> Réservation
                        #{{ $reservation->id }}
                    </h5>
                    <span
                        class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : ($reservation->status == 'cancelled' ? 'danger' : 'info')) }}">
                        {{ ucfirst(__($reservation->status)) }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header"
                                    style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                    <h6 style="color: #532200;">
                                        <i class="bx bx-user me-2" style="color: #e1a140;"></i> Informations Client
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Nom :</strong></p>
                                        <p>{{ $reservation->user->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Email :</strong></p>
                                        <p>{{ $reservation->user->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Téléphone :</strong></p>
                                        <p>{{ $reservation->user->phone ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header"
                                    style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                    <h6 style="color: #532200;">
                                        <i class="bx bx-detail me-2" style="color: #e1a140;"></i> Détails de la Réservation
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Date d'arrivée :</strong></p>
                                        <p>{{ $reservation->check_in->format('d M Y') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Date de départ :</strong></p>
                                        <p>{{ $reservation->check_out->format('d M Y') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Prix total :</strong></p>
                                        <p style="font-weight: 600; color: #914110;">
                                            {{ number_format($reservation->total_price, 2) }} MAD</p>
                                    </div>
                                    @if ($reservation->special_requests)
                                        <div class="mb-3">
                                            <p class="mb-1"><strong style="color: #532200;">Demandes spéciales :</strong>
                                            </p>
                                            <p>{{ $reservation->special_requests }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header"
                                    style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                    <h6 style="color: #532200;">
                                        <i class="bx bx-hotel me-2" style="color: #e1a140;"></i> Informations sur l'Hôtel
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Hôtel :</strong></p>
                                        <p>{{ $reservation->room->hotel->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Adresse :</strong></p>
                                        <p>{{ $reservation->room->hotel->address }},
                                            {{ $reservation->room->hotel->city }},
                                            {{ $reservation->room->hotel->country }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Téléphone :</strong></p>
                                        <p>{{ $reservation->room->hotel->phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header"
                                    style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                    <h6 style="color: #532200;">
                                        <i class="bx bx-bed me-2" style="color: #e1a140;"></i> Informations sur la Chambre
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Chambre :</strong></p>
                                        <p>
                                            {{ $reservation->room->room_number }}
                                            <span class="badge" style="background-color: #efcfa0; color: #532200;">
                                                {{ $reservation->room->roomType->name }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Prix/Nuit :</strong></p>
                                        <p style="font-weight: 600; color: #914110;">
                                            {{ number_format($reservation->room->price_per_night, 2) }} MAD</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Capacité :</strong></p>
                                        <p>{{ $reservation->room->capacity }} personne(s)</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Superficie :</strong></p>
                                        <p>{{ $reservation->room->size }} m²</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"
                                    style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                    <h6 style="color: #532200;">
                                        <i class="bx bx-image me-2" style="color: #e1a140;"></i> Photos de la Chambre
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @forelse ($reservation->room->images as $image)
                                            <div class="col-md-3 mb-3">
                                                <div class="card h-100">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                                        class="card-img-top" style="height: 180px; object-fit: cover;">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12 text-center py-4">
                                                <i class="bx bx-image-alt text-muted" style="font-size: 3rem;"></i>
                                                <p class="text-muted mt-2">Aucune photo disponible pour cette chambre</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($reservation->room->reviews->isNotEmpty())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"
                                        style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                        <h6 style="color: #532200;">
                                            <i class="bx bx-star me-2" style="color: #e1a140;"></i> Avis du Client
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($reservation->room->reviews as $review)
                                            <div class="mb-4 pb-3 border-bottom"
                                                style="border-color: #efcfa0 !important;">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="bx bx-star{{ $i <= $review->rating ? '' : '' }}"
                                                                style="color: {{ $i <= $review->rating ? '#e1a140' : '#ddd' }};"></i>
                                                        @endfor
                                                        <span class="ms-2"
                                                            style="color: #532200; font-weight: 500;">{{ $review->user->name }}</span>
                                                    </div>
                                                    <small
                                                        class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                                                </div>
                                                <p>{{ $review->comment }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
