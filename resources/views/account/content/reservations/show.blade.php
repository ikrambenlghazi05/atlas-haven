@extends('account/layouts/contentNavbarLayout')

@section('title', 'Détails de Réservation')

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
                        <i class="bx bx-calendar-check me-2" style="color: #e1a140;"></i> Détails de Réservation
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
                                        <i class="bx bx-detail me-2" style="color: #e1a140;"></i> Informations de
                                        Réservation
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Date d'arrivée:</strong></p>
                                        <p>{{ $reservation->check_in->format('d M Y') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Date de départ:</strong></p>
                                        <p>{{ $reservation->check_out->format('d M Y') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Prix Total:</strong></p>
                                        <p style="font-weight: 600; color: #914110;">
                                            {{ number_format($reservation->total_price, 2) }} MAD</p>
                                    </div>
                                    @if ($reservation->special_requests)
                                        <div class="mb-3">
                                            <p class="mb-1"><strong style="color: #532200;">Demandes Spéciales:</strong>
                                            </p>
                                            <p>{{ $reservation->special_requests }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
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
                                        <p class="mb-1"><strong style="color: #532200;">Hôtel:</strong></p>
                                        <p>{{ $reservation->room->hotel->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Adresse:</strong></p>
                                        <p>{{ $reservation->room->hotel->address }}, {{ $reservation->room->hotel->city }},
                                            {{ $reservation->room->hotel->country }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Téléphone:</strong></p>
                                        <p>{{ $reservation->room->hotel->phone_number }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong style="color: #532200;">Note:</strong></p>
                                        <p>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="bx bx-star{{ $i <= floor($reservation->room->hotel->rating) ? '' : '-empty' }}"
                                                    style="color: #e1a140;"></i>
                                            @endfor
                                            {{ number_format($reservation->room->hotel->rating, 1) }}/5
                                        </p>
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
                                        <i class="bx bx-bed me-2" style="color: #e1a140;"></i> Détails de la Chambre
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($reservation->room->images->isNotEmpty())
                                                <img src="{{ asset('storage/' . $reservation->room->images->first()->image_path) }}"
                                                    class="img-fluid rounded mb-3" alt="Photo de la chambre"
                                                    style="border: 1px solid #efcfa0;">
                                            @else
                                                <div class="rounded mb-3 d-flex align-items-center justify-content-center"
                                                    style="height: 200px; background-color: rgba(239, 207, 160, 0.1); border: 1px dashed #efcfa0;">
                                                    <span class="text-muted">Aucune image disponible</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <h5 style="color: #532200;">{{ $reservation->room->roomType->name }} - Chambre
                                                {{ $reservation->room->room_number }}</h5>
                                            <p><strong style="color: #532200;">Prix par nuit:</strong>
                                                <span
                                                    style="font-weight: 600; color: #914110;">{{ number_format($reservation->room->price_per_night, 2) }}
                                                    MAD</span>
                                            </p>
                                            <p><strong style="color: #532200;">Capacité:</strong>
                                                {{ $reservation->room->capacity }} personne(s)</p>
                                            <p><strong style="color: #532200;">Superficie:</strong>
                                                {{ $reservation->room->size }} m²</p>
                                            <p>{{ $reservation->room->description }}</p>

                                            @if ($reservation->room->amenities->isNotEmpty())
                                                <h6 class="mt-3" style="color: #532200;">Équipements</h6>
                                                <div class="d-flex flex-wrap gap-2">
                                                    @foreach ($reservation->room->amenities as $amenity)
                                                        <span class="badge"
                                                            style="background-color: #efcfa0; color: #532200;">
                                                            <i class="bx bx-{{ $amenity->icon }} me-1"></i>
                                                            {{ $amenity->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($reservation->room->reviews->isEmpty())
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"
                                        style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                        <h5 style="color: #532200;">
                                            <i class="bx bx-edit me-2" style="color: #e1a140;"></i> Laisser un Avis
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('account.reservations.review.store', $reservation) }}"
                                            method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="rating" class="form-label"
                                                    style="color: #532200;">Note</label>
                                                <select class="form-select" id="rating" name="rating" required
                                                    style="border-color: #efcfa0;">
                                                    <option value="">Sélectionner une note</option>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}">{{ $i }} -
                                                            {{ $i == 1 ? 'Médiocre' : ($i == 2 ? 'Passable' : ($i == 3 ? 'Bien' : ($i == 4 ? 'Très bien' : 'Excellent'))) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="comment" class="form-label" style="color: #532200;">Votre
                                                    Avis</label>
                                                <textarea class="form-control" id="comment" name="comment" rows="3" required
                                                    style="border-color: #efcfa0;"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bx bx-send me-1"></i> Soumettre
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"
                                        style="background-color: rgba(239, 207, 160, 0.1); border-bottom: 1px solid #efcfa0;">
                                        <h5 style="color: #532200;">
                                            <i class="bx bx-star me-2" style="color: #e1a140;"></i> Votre Avis
                                        </h5>
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
