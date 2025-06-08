@extends('account/layouts/contentNavbarLayout')

@section('title', 'Mes Réservations')

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
                        <i class="bx bx-calendar me-2" style="color: #e1a140;"></i> Mes Réservations
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: rgba(239, 207, 160, 0.1);">
                                <tr>
                                    <th style="color: #532200;">Hôtel</th>
                                    <th style="color: #532200;">Chambre</th>
                                    <th style="color: #532200;">Arrivée</th>
                                    <th style="color: #532200;">Départ</th>
                                    <th style="color: #532200;">Prix Total</th>
                                    <th style="color: #532200;">Statut</th>
                                    <th style="color: #532200;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->room->hotel->name }}</td>
                                        <td>
                                            {{ $reservation->room->room_number }}
                                            <span class="badge" style="background-color: #efcfa0; color: #532200;">
                                                {{ $reservation->room->roomType->name }}
                                            </span>
                                        </td>
                                        <td>{{ $reservation->check_in->format('d M Y') }}</td>
                                        <td>{{ $reservation->check_out->format('d M Y') }}</td>
                                        <td style="font-weight: 600; color: #914110;">
                                            {{ number_format($reservation->total_price, 2) }} MAD</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : ($reservation->status == 'cancelled' ? 'danger' : 'info')) }}">
                                                {{ ucfirst(__($reservation->status)) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('account.reservations.show', $reservation) }}"
                                                class="btn btn-sm"
                                                style="background-color: rgba(225, 161, 64, 0.1); color: #532200;">
                                                <i class="bx bx-show me-1"></i> Détails
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="bx bx-calendar text-muted" style="font-size: 2rem;"></i>
                                            <p class="text-muted mt-2 mb-0">Aucune réservation trouvée</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
