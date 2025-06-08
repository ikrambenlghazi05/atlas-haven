@extends('layouts/contentNavbarLayout')

@section('title', 'Ajouter une commodité')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="row animate__animated animate__fadeIn">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                    <h5 class="card-title mb-0" style="color: #532200;">
                        <i class="bx bx-plus-circle me-2" style="color: #e1a140;"></i> Ajouter une nouvelle commodité
                    </h5>
                    <a href="{{ route('amenities.list') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Retour à la liste
                    </a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger animate__animated animate__shakeX">
                            <div class="d-flex align-items-center">
                                <i class="bx bx-error-circle bx-lg me-2"></i>
                                <div>
                                    <h6 class="alert-heading mb-1">Erreurs de validation</h6>
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('amenities.store') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- Section Informations de base -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-info-circle me-2"></i> Détails de la commodité
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-rename" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" id="name" name="name" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="icon" class="form-label">Icône</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-image" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" id="icon" name="icon"
                                            placeholder="ex. bx-wifi">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <small>Classe Boxicons</small>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Actions du formulaire -->
                        <div class="mt-4 d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-secondary me-3">
                                <i class="bx bx-reset me-1"></i> Réinitialiser
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('page-script')
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

        .form-control,
        .form-select,
        .input-group-text {
            border-radius: 8px !important;
            border-color: var(--gold-light);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 0.25rem rgba(225, 161, 64, 0.25);
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

        .btn-outline-secondary {
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            transform: translateY(-2px);
        }

        /* Section styling */
        .section-divider {
            color: var(--puce);
            border-bottom: 1px solid var(--gold-light);
            padding-bottom: 8px;
            margin: 1.5rem 0 1rem;
            font-weight: 600;
        }
    </style>
@endsection
