@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des Utilisateurs')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="card animate__animated animate__fadeIn">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h5 class="card-title mb-0" style="color: #532200;">
                <i class="bx bx-group me-2" style="color: #e1a140;"></i> Liste des Utilisateurs
            </h5>
            <a href="{{ route('users.add') }}" class="btn btn-primary"
                style="background-color: #e1a140; border-color: #e1a140;">
                <i class="bx bx-plus me-1"></i> Ajouter un Utilisateur
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background-color: #efcfa0;">
                        <tr>
                            <th style="color: #532200; width: 60px;">Photo</th>
                            <th style="color: #532200;">Nom</th>
                            <th style="color: #532200;">Email</th>
                            <th style="color: #532200;">Téléphone</th>
                            <th style="color: #532200; width: 100px;">Rôle</th>
                            <th style="color: #532200; width: 120px;">Membre depuis</th>
                            <th style="color: #532200; width: 90px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="animate__animated animate__fadeIn"
                                style="animation-delay: {{ $loop->index * 0.05 }}s;">
                                <td>
                                    <div class="avatar avatar-md">
                                        <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('assets/img/avatars/default-avatar.png') }}"
                                            alt="Avatar" class="rounded-circle" width="40" height="40"
                                            style="object-fit: cover; border: 2px solid #e1a140;">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-semibold" style="color: #532200;">{{ $user->full_name }}</span>
                                        <small
                                            class="text-muted">{{ '@' . Str::slug($user->first_name . $user->last_name) }}</small>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->role === 'ADMIN' ? 'primary' : 'secondary' }}"
                                        style="background-color: {{ $user->role === 'ADMIN' ? '#e1a140' : '#efcfa0' }}; color: #532200;">
                                        {{ $user->role === 'ADMIN' ? 'Admin' : 'Utilisateur' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-nowrap" title="{{ $user->created_at->format('d/m/Y H:i') }}"
                                        data-bs-toggle="tooltip">
                                        {{ $user->created_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="btn btn-sm btn-icon me-2 action-btn" title="Modifier"
                                            style="background-color: rgba(225, 161, 64, 0.1); color: #e1a140;">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="{{ route('users.delete', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon action-btn" title="Supprimer"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"
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
            @if ($users->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    <nav aria-label="Navigation">
                        <ul class="pagination">
                            {{ $users->links() }}
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
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

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
