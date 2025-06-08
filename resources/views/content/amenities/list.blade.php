@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des commodités')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="card animate__animated animate__fadeIn">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h5 class="card-title mb-0" style="color: #532200;">
                <i class="bx bx-list-ul me-2" style="color: #e1a140;"></i> Liste des commodités
            </h5>
            <a href="{{ route('amenities.add') }}" class="btn btn-primary"
                style="background-color: #e1a140; border-color: #e1a140;">
                <i class="bx bx-plus me-1"></i> Ajouter
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background-color: #efcfa0;">
                        <tr>
                            <th style="color: #532200; width: 50px;">Icône</th>
                            <th style="color: #532200;">Nom</th>
                            <th style="color: #532200;">Description</th>
                            <th style="color: #532200; width: 90px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($amenities as $amenity)
                            <tr class="animate__animated animate__fadeIn"
                                style="animation-delay: {{ $loop->index * 0.05 }}s;">
                                <td>
                                    @if ($amenity->icon)
                                        <div class="avatar avatar-md">
                                            <i class="bx {{ $amenity->icon }} bx-md" style="color: #e1a140;"></i>
                                        </div>
                                    @else
                                        <div class="avatar avatar-md">
                                            <i class="bx bx-question-mark bx-md" style="color: #efcfa0;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-semibold" style="color: #532200;">{{ $amenity->name }}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{ Str::limit($amenity->description, 50) }}</span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('amenities.edit', $amenity) }}"
                                            class="btn btn-sm btn-icon me-2 action-btn" title="Modifier"
                                            style="background-color: rgba(225, 161, 64, 0.1); color: #e1a140;">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="{{ route('amenities.delete', $amenity) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon action-btn" title="Supprimer"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commodité ?')"
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
            @if ($amenities->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    <nav aria-label="Navigation">
                        <ul class="pagination">
                            {{ $amenities->links() }}
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
    </style>
@endsection
