@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des Chambres')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="card animate__animated animate__fadeIn">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h5 class="mb-0" style="color: #532200;">
                <i class="bx bx-bed me-2" style="color: #e1a140;"></i> Liste des Chambres
            </h5>
            <a href="{{ route('rooms.add') }}" class="btn btn-primary"
                style="background-color: #e1a140; border-color: #e1a140;">
                <i class="bx bx-plus me-1"></i> Ajouter une Chambre
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background-color: #efcfa0;">
                        <tr>
                            <th style="color: #532200; width: 150px;">Images</th>
                            <th style="color: #532200;">Détails de la Chambre</th>
                            <th style="color: #532200; width: 200px;">Équipements</th>
                            <th style="color: #532200;">Hôtel</th>
                            <th style="color: #532200; width: 120px;">Prix/Nuit</th>
                            <th style="color: #532200; width: 100px;">Statut</th>
                            <th style="color: #532200; width: 90px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr class="animate__animated animate__fadeIn"
                                style="animation-delay: {{ $loop->index * 0.05 }}s;">
                                <td>
                                    @if ($room->images->count() > 0)
                                        <div class="d-flex flex-column align-items-center">
                                            <!-- Image Principale -->
                                            <div class="position-relative mb-2">
                                                <img src="{{ asset('storage/' . $room->featuredImage->image_path) }}"
                                                    alt="Chambre {{ $room->room_number }}" class="rounded shadow-sm"
                                                    width="100" height="75"
                                                    style="object-fit: cover; border: 2px solid #e1a140;">
                                                <span class="position-absolute top-0 start-0 badge"
                                                    style="background-color: #e1a140; color: white;">
                                                    <i class="bx bxs-star"></i> Principale
                                                </span>
                                            </div>

                                            <!-- Autres Images -->
                                            @if ($room->images->count() > 1)
                                                <div class="d-flex flex-wrap justify-content-center gap-1">
                                                    @foreach ($room->images->where('is_featured', false)->take(3) as $image)
                                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                                            alt="Image chambre" class="rounded" width="40"
                                                            height="30"
                                                            style="object-fit: cover; border: 1px solid #efcfa0;">
                                                    @endforeach
                                                    @if ($room->images->count() > 4)
                                                        <span class="badge"
                                                            style="background-color: #efcfa0; color: #532200;">
                                                            +{{ $room->images->count() - 4 }}
                                                        </span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="rounded d-flex align-items-center justify-content-center"
                                            style="width: 100px; height: 75px; background-color: #efcfa0; color: #532200;">
                                            <i class="bx bx-image-alt bx-lg"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold" style="color: #532200;">#{{ $room->room_number }}</span>
                                        <span style="color: #e1a140; font-weight: 500;">{{ $room->type->name }}</span>
                                        <div class="d-flex gap-2 mt-1">
                                            <span class="badge"
                                                style="background-color: rgba(30, 159, 242, 0.1); color: #1e9ff2;">
                                                <i class="bx bx-user me-1"></i>{{ $room->capacity }}
                                            </span>
                                            <span class="badge"
                                                style="background-color: rgba(239, 207, 160, 0.3); color: #532200;">
                                                <i class="bx bx-ruler me-1"></i>{{ $room->size }}m²
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($room->amenities->count() > 0)
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach ($room->amenities->take(3) as $amenity)
                                                <span class="badge"
                                                    style="background-color: rgba(225, 161, 64, 0.1); color: #532200;">
                                                    <i class="bx bx-{{ $amenity->icon }} me-1"></i>{{ $amenity->name }}
                                                </span>
                                            @endforeach
                                            @if ($room->amenities->count() > 3)
                                                <span class="badge" style="background-color: #efcfa0; color: #532200;">
                                                    +{{ $room->amenities->count() - 3 }}
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted">Aucun</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-semibold" style="color: #532200;">{{ $room->hotel->name }}</span>
                                    <small class="d-block text-muted">{{ $room->hotel->city }},
                                        {{ $room->hotel->country }}</small>
                                </td>
                                <td class="fw-bold" style="color: #e1a140;">{{ number_format($room->price_per_night, 2) }}
                                    MAD</td>
                                <td>
                                    <span class="badge bg-{{ $room->availability ? 'success' : 'danger' }}">
                                        {{ $room->availability ? 'Disponible' : 'Réservée' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('rooms.edit', $room) }}"
                                            class="btn btn-sm btn-icon me-2 action-btn" title="Modifier"
                                            style="background-color: rgba(225, 161, 64, 0.1); color: #e1a140;">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="{{ route('rooms.delete', $room) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon action-btn" title="Supprimer"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')"
                                                style="background-color: rgba(234, 84, 85, 0.1); color: #ea5455;">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($rooms->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    <nav aria-label="Navigation">
                        <ul class="pagination">
                            {{ $rooms->links() }}
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to action buttons
            document.querySelectorAll('.action-btn').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.1)';
                    this.style.boxShadow = '0 2px 8px rgba(0,0,0,0.1)';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = 'none';
                });
            });

            // Add animation to table rows on hover
            document.querySelectorAll('tbody tr').forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.classList.add('animate__pulse');
                    this.style.boxShadow = '0 4px 12px rgba(83, 34, 0, 0.1)';
                    this.style.transform = 'translateY(-2px)';
                });
                row.addEventListener('mouseleave', function() {
                    this.classList.remove('animate__pulse');
                    this.style.boxShadow = 'none';
                    this.style.transform = 'none';
                });
            });
        });
    </script>
    <style>
        :root {
            --gold-primary: #e1a140;
            --gold-light: #efcfa0;
            --gold-dark: #914110;
            --puce: #532200;
            --sand-dollar: #efcfa0;
            --burnt-orange: #914110;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            border-bottom: 1px solid rgba(239, 207, 160, 0.3);
            padding: 1.25rem 1.5rem;
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-striped-bg: rgba(239, 207, 160, 0.05);
            --bs-table-hover-bg: rgba(239, 207, 160, 0.1);
        }

        .table-hover tbody tr {
            transition: all 0.3s ease;
        }

        .action-btn {
            border-radius: 8px !important;
            transition: all 0.3s ease;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--gold-primary);
            border-color: var(--gold-primary);
        }

        .pagination .page-link {
            color: var(--puce);
        }

        .pagination .page-link:hover {
            color: var(--gold-dark);
        }

        .badge {
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
        }
    </style>
@endsection
