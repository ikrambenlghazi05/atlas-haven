@extends('account/layouts/contentNavbarLayout')

@section('title', 'Mes Avis')

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
                        <i class="bx bx-star me-2" style="color: #e1a140;"></i> Mes Avis
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: rgba(239, 207, 160, 0.1);">
                                <tr>
                                    <th style="color: #532200;">Hôtel</th>
                                    <th style="color: #532200;">Chambre</th>
                                    <th style="color: #532200;">Note</th>
                                    <th style="color: #532200;">Date</th>
                                    <th style="color: #532200;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-hotel me-2" style="color: #e1a140;"></i>
                                                {{ $review->room->hotel->name ?? 'N/A' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-bed me-2" style="color: #e1a140;"></i>
                                                {{ $review->room->room_number ?? 'N/A' }}
                                            </div>
                                        </td>
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="bx bx-star{{ $i <= $review->rating ? '' : '' }}"
                                                    style="color: {{ $i <= $review->rating ? '#e1a140' : '#ddd' }};"></i>
                                            @endfor
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-calendar me-2" style="color: #e1a140;"></i>
                                                {{ $review->created_at->format('d M Y') }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('account.reviews.edit', $review) }}" class="btn btn-sm"
                                                    style="background-color: rgba(225, 161, 64, 0.1); color: #532200;">
                                                    <i class="bx bx-edit"></i> Modifier
                                                </a>
                                                <form action="{{ route('account.reviews.destroy', $review) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm"
                                                        style="background-color: rgba(220, 53, 69, 0.1); color: #dc3545;"
                                                        onclick="return confirm('Êtes-vous sûr ?')">
                                                        <i class="bx bx-trash"></i> Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <i class="bx bx-star text-muted" style="font-size: 2rem;"></i>
                                            <p class="text-muted mt-2 mb-0">Aucun avis trouvé</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <style>
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(239, 207, 160, 0.3);
            padding: 1.25rem 1.5rem;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(239, 207, 160, 0.05);
        }

        .btn {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background-color: #e1a140;
            border-color: #e1a140;
        }

        .pagination .page-link {
            color: #532200;
        }
    </style>
@endsection
