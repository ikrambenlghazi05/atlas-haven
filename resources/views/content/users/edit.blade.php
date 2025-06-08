@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier un Utilisateur')

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
                        <i class="bx bx-edit me-2" style="color: #e1a140;"></i> Modifier l'Utilisateur
                    </h5>
                    <a href="{{ route('users.list') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Retour à la liste
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Section Informations Personnelles -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-user-circle me-2"></i> Informations Personnelles
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">Prénom <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-user" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" id="first_name" name="first_name"
                                            value="{{ old('first_name', $user->first_name) }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Nom <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-user" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" name="last_name" id="last_name"
                                            value="{{ old('last_name', $user->last_name) }}" required>
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
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-at" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">Téléphone <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-phone" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ old('phone_number', $user->phone_number) }}" required>
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
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-cog" style="color: #532200;"></i>
                                        </span>
                                        <select class="form-select" id="role" name="role" required>
                                            <option value="USER" {{ $user->role === 'USER' ? 'selected' : '' }}>Utilisateur
                                            </option>
                                            <option value="ADMIN" {{ $user->role === 'ADMIN' ? 'selected' : '' }}>Administrateur
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Photo de Profil</label>
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative me-3">
                                            <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('assets/img/avatars/default-avatar.png') }}"
                                                alt="Avatar" class="rounded-circle" width="80" height="80"
                                                style="object-fit: cover; border: 2px solid #e1a140;"
                                                id="profilePicturePreview">
                                            @if ($user->profile_picture)
                                                <button type="button"
                                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 p-0"
                                                    style="width: 24px; height: 24px; border-radius: 50%;"
                                                    onclick="document.getElementById('removeProfilePicture').value = '1'; document.getElementById('profilePicturePreview').src = '{{ asset('assets/img/avatars/default-avatar.png') }}'; this.remove();">
                                                    <i class="bx bx-x"></i>
                                                </button>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="image-upload-area"
                                                onclick="document.getElementById('profile_picture').click()">
                                                <i class="bx bx-cloud-upload"></i>
                                                <h5>Changer la photo</h5>
                                                <small class="text-muted">JPEG, PNG, JPG (Max 2MB)</small>
                                                <input type="file" class="d-none" id="profile_picture"
                                                    name="profile_picture">
                                                <input type="hidden" id="removeProfilePicture"
                                                    name="remove_profile_picture" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions du Formulaire -->
                        <div class="mt-4 d-flex justify-content-end">
                            <a href="{{ route('users.list') }}" class="btn btn-outline-secondary me-3">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                    // Profile picture preview
                    document.getElementById('profile_picture').addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (file && file.type.match('image.*')) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById('profilePicturePreview').src = e.target.result;
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

        .section-divider {
            color: var(--puce);
            border-bottom: 1px solid var(--gold-light);
            padding-bottom: 8px;
            margin: 1.5rem 0 1rem;
            font-weight: 600;
        }

        .image-upload-area {
            border: 2px dashed var(--gold-light);
            border-radius: 12px;
            padding: 1rem;
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
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .image-upload-area h5 {
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
            color: var(--puce);
        }
    </style>
@endsection
