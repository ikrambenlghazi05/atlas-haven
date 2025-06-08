@extends('layouts/contentNavbarLayout')

@section('title', 'Tous les Avis')

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
                        <i class="bx bx-star me-2" style="color: #e1a140;"></i> Tous les Avis
                    </h5>
                    <div class="d-flex">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                <i class="bx bx-search" style="color: #532200;"></i>
                            </span>
                            <input type="text" class="form-control" id="search-reviews" placeholder="Rechercher des avis...">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                            style="background-color: rgba(40, 167, 69, 0.1); border-color: rgba(40, 167, 69, 0.3); color: #28a745;">
                            <div class="d-flex align-items-center">
                                <i class="bx bx-check-circle me-2"></i>
                                <div>{{ session('success') }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Fermer"></button>
                            </div>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: rgba(239, 207, 160, 0.2);">
                                <tr>
                                    <th style="color: #532200;">ID</th>
                                    <th style="color: #532200;">Utilisateur</th>
                                    <th style="color: #532200;">Hôtel</th>
                                    <th style="color: #532200;">Chambre</th>
                                    <th style="color: #532200;">Note</th>
                                    <th style="color: #532200;">Commentaire</th>
                                    <th style="color: #532200;">Date</th>
                                    <th style="color: #532200;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td>#{{ $review->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2">
                                                    <span class="avatar-initial rounded-circle"
                                                        style="background-color: #efcfa0; color: #532200;">
                                                        {{ substr($review->user->name, 0, 1) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="fw-semibold">{{ $review->user->name }}</span><br>
                                                    <small class="text-muted">{{ $review->user->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">{{ $review->room->hotel->name }}</span><br>
                                            <small class="text-muted">{{ $review->room->hotel->city }}</small>
                                        </td>
                                        <td>
                                            <span class="badge" style="background-color: #efcfa0; color: #532200;">
                                                #{{ $review->room->room_number }}
                                            </span><br>
                                            <small>{{ $review->room->roomType->name }}</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="me-2">{{ $review->rating }}.0</span>
                                                <div>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="bx bx-star{{ $i <= $review->rating ? '' : '' }}"
                                                            style="color: {{ $i <= $review->rating ? '#e1a140' : '#ddd' }};"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-truncate" style="max-width: 250px;"
                                                title="{{ $review->comment }}">
                                                {{ $review->comment }}
                                            </div>
                                        </td>
                                        <td>
                                            {{ $review->created_at->format('d M Y') }}<br>
                                            <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('admin.reviews.destroy', $review) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-icon"
                                                        style="background-color: rgba(220, 53, 69, 0.1); color: #dc3545;"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?')"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <i class="bx bx-star text-muted" style="font-size: 2rem;"></i>
                                            <p class="text-muted mt-2 mb-0">Aucun avis trouvé</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Affichage de {{ $reviews->firstItem() }} à {{ $reviews->lastItem() }} sur {{ $reviews->total() }}
                            entrées
                        </div>
                        <div>
                            {{ $reviews->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('search-reviews');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });
    </script>
@endsection
