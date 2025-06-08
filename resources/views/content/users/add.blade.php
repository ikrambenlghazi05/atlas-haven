@extends('layouts/contentNavbarLayout')

@section('title', 'Ajouter un Utilisateur')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')
<div class="row animate__animated animate__fadeIn">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center bg-white">
                <h5 class="card-title mb-0" style="color: #532200;">
                    <i class="bx bx-user-plus me-2" style="color: #e1a140;"></i> Ajouter un Utilisateur
                </h5>
                <a href="{{ route('users.list') }}" class="btn btn-outline-secondary">
                    <i class="bx bx-arrow-back me-1"></i> Retour à la liste
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    <!-- Section Informations Personnelles -->
                    <div class="mb-4">
                        <h6 class="section-divider">
                            <i class="bx bx-user-circle me-2"></i> Informations Personnelles
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                        <i class="bx bx-user" style="color: #532200;"></i>
                                    </span>
                                    <input class="form-control" type="text" id="first_name" name="first_name" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Nom <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                        <i class="bx bx-user" style="color: #532200;"></i>
                                    </span>
                                    <input class="form-control" type="text" name="last_name" id="last_name" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Coordonnées -->
                    <div class="mb-4">
                        <h6 class="section-divider">
                            <i class="bx bx-envelope me-2"></i> Coordonnées
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                        <i class="bx bx-at" style="color: #532200;"></i>
                                    </span>
                                    <input class="form-control" type="email" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                        <i class="bx bx-phone" style="color: #532200;"></i>
                                    </span>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Informations du Compte -->
                    <div class="mb-4">
                        <h6 class="section-divider">
                            <i class="bx bx-lock-alt me-2"></i> Informations du Compte
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="role" class="form-label">Rôle <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                        <i class="bx bx-cog" style="color: #532200;"></i>
                                    </span>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="USER">Utilisateur</option>
                                        <option value="ADMIN">Administrateur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="profile_picture" class="form-label">Photo de Profil</label>
                                <div class="image-upload-area" onclick="document.getElementById('profile_picture').click()">
                                    <i class="bx bx-cloud-upload"></i>
                                    <h5>Cliquez pour télécharger une photo</h5>
                                    <small class="text-muted">JPEG, PNG, JPG (Max 2MB)</small>
                                    <input type="file" class="d-none" id="profile_picture" name="profile_picture">
                                </div>
                                <div id="profilePicturePreview" class="mt-3 text-center"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                        <i class="bx bx-key" style="color: #532200;"></i>
                                    </span>
                                    <input class="form-control" type="password" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                        <i class="bx bx-key" style="color: #532200;"></i>
                                    </span>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions du Formulaire -->
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile picture preview
        document.getElementById('profile_picture').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('profilePicturePreview');
            previewContainer.innerHTML = '';

            const file = event.target.files[0];
            if (file && file.type.match('image.*')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('div');
                    preview.className = 'd-flex flex-column align-items-center';
                    preview.innerHTML = `
                        <img src="${e.target.result}"
                             class="rounded-circle mb-2"
                             width="100"
                             height="100"
                             style="object-fit: cover; border: 2px solid #e1a140;">
                        <small class="text-muted">Preview</small>
                    `;
                    previewContainer.appendChild(preview);
                };
                reader.readAsDataURL(file);
            }
        };
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

    .form-control, .form-select, .input-group-text {
        border-radius: 8px !important;
        border-color: var(--gold-light);
    }

    .form-control:focus, .form-select:focus {
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

    /* Image upload styling */
    .image-upload-area {
        border: 2px dashed var(--gold-light);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        background-color: rgba(239, 207, 160, 0.05);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-upload-area:hover {
        background-color: rgba(239, 207, 160, 0.1);
        border-color: var(--gold-primary);
    }

    .image-upload-area i {
        color: var(--gold-primary);
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .image-upload-area h5 {
        font-size: 1rem;
        margin-bottom: 0.25rem;
        color: var(--puce);
    }
</style>
@endsection
