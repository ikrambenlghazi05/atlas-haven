@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des Hôtels')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')
<div class="card animate__animated animate__fadeIn">
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <h5 class="mb-0" style="color: #532200;">
            <i class="bx bx-hotel me-2" style="color: #e1a140;"></i> Liste des Hôtels
        </h5>
        <a href="{{ route('hotels.add') }}" class="btn btn-primary" style="background-color: #e1a140; border-color: #e1a140;">
            <i class="bx bx-plus me-1"></i> Ajouter un Hôtel
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead style="background-color: #efcfa0;">
                    <tr>
                        <th style="color: #532200; width: 15%;">Images</th>
                        <th style="color: #532200;">Nom</th>
                        <th style="color: #532200; width: 10%;">Classement</th>
                        <th style="color: #532200; width: 20%;">Localisation</th>
                        <th style="color: #532200; width: 15%;">Contact</th>
                        <th style="color: #532200; width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotels as $hotel)
                    <tr class="animate__animated animate__fadeIn" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                        <td>
                            @if($hotel->images->count() > 0)
                                <div class="d-flex flex-column">
                                    <!-- Image Principale -->
                                    <div class="position-relative mb-2">
                                        <img src="{{ asset('storage/'.$hotel->images->first()->image_path) }}"
                                             alt="{{ $hotel->name }}"
                                             class="rounded shadow-sm"
                                             width="100"
                                             height="75"
                                             style="object-fit: cover; border: 2px solid #e1a140;">
                                        <span class="position-absolute top-0 start-0 badge" style="background-color: #e1a140;">Principale</span>
                                    </div>

                                    <!-- Galerie d'Images -->
                                    @if($hotel->images->count() > 1)
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach($hotel->images->slice(1, 3) as $image)
                                                <img src="{{ asset('storage/'.$image->image_path) }}"
                                                     alt="Image hôtel"
                                                     class="rounded"
                                                     width="40"
                                                     height="30"
                                                     style="object-fit: cover; border: 1px solid #efcfa0;">
                                            @endforeach
                                            @if($hotel->images->count() > 4)
                                                <div class="rounded d-flex align-items-center justify-content-center"
                                                     style="width: 40px; height: 30px; background-color: #efcfa0; color: #532200;">
                                                    +{{ $hotel->images->count() - 4 }}
                                                </div>
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
                                <span class="fw-semibold" style="color: #532200;">{{ $hotel->name }}</span>
                                <small class="text-muted">{{ Str::limit($hotel->description, 50) }}</small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rating-display" data-rating="{{ $hotel->rating ?: 0 }}">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bx {{ $i <= $hotel->rating ? 'bxs-star' : 'bx-star' }} me-1"
                                           style="color: {{ $i <= $hotel->rating ? '#e1a140' : '#efcfa0' }};"></i>
                                    @endfor
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span style="color: #532200;">{{ $hotel->city }}, {{ $hotel->country }}</span>
                                <small class="text-muted">{{ Str::limit($hotel->address, 30) }}</small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span style="color: #532200;">{{ $hotel->phone_number }}</span>
                                @if($hotel->email)
                                <small class="text-muted">{{ Str::limit($hotel->email, 20) }}</small>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('hotels.edit', $hotel) }}"
                                   class="btn btn-sm btn-icon me-2 action-btn"
                                   title="Modifier"
                                   style="background-color: rgba(225, 161, 64, 0.1); color: #e1a140;">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('hotels.delete', $hotel) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-icon action-btn"
                                            title="Supprimer"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet hôtel ?')"
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
        @if($hotels->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            <nav aria-label="Navigation">
                <ul class="pagination">
                    {{ $hotels->links() }}
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
            });
            row.addEventListener('mouseleave', function() {
                this.classList.remove('animate__pulse');
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

    .table-hover tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(83, 34, 0, 0.1);
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: var(--gold-primary);
        border-color: var(--gold-primary);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--gold-dark);
        border-color: var(--gold-dark);
        transform: translateY(-2px);
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
        font-size: 0.65rem;
    }

    .rating-display {
        display: flex;
        align-items: center;
    }
</style>
@endsection
