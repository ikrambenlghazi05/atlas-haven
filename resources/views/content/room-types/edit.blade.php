@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier un Type de Chambre')

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
                        <i class="bx bx-edit me-2" style="color: #e1a140;"></i> Modifier un Type de Chambre
                    </h5>
                    <a href="{{ route('room-types.list') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Retour à la Liste
                    </a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger animate__animated animate__shakeX">
                            <div class="d-flex align-items-center">
                                <i class="bx bx-error-circle bx-lg me-2"></i>
                                <div>
                                    <h6 class="alert-heading mb-1">Erreurs de Validation</h6>
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('room-types.update', $roomType) }}" class="needs-validation"
                        novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Section Informations de Base -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-info-circle me-2"></i> Informations de Base
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-category" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ old('name', $roomType->name) }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $roomType->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Actions du Formulaire -->
                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('room-types.list') }}" class="btn btn-outline-secondary me-3">
                                <i class="bx bx-x me-1"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i> Mettre à Jour
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

        .section-divider {
            color: var(--puce);
            border-bottom: 1px solid var(--gold-light);
            padding-bottom: 8px;
            margin: 1.5rem 0 1rem;
            font-weight: 600;
        }
    </style>
@endsection
