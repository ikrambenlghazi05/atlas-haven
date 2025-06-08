@extends('account/layouts/contentNavbarLayout')

@section('title', 'Profil Utilisateur')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="row animate__animated animate__fadeIn">
        <!-- Profil Utilisateur -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0" style="color: #532200;">
                        <i class="bx bx-user me-2" style="color: #e1a140;"></i> Détails du Profil
                    </h5>
                </div>

                <!-- Photo de Profil -->
                <div class="card-body text-center">
                    <div class="d-flex justify-content-center mb-4">
                        <div class="position-relative">
                            <img src="{{ $user->profile_picture ? $user->profile_picture : asset('assets/img/avatars/default-avatar.png') }}"
                                alt="Photo de profil" class="d-block rounded-circle shadow" height="150" width="150"
                                id="profilePicturePreview" style="border: 3px solid #efcfa0;">
                            <button class="btn btn-sm position-absolute bottom-0 end-0 rounded-circle"
                                style="background-color: #e1a140; color: white; width: 40px; height: 40px;"
                                onclick="document.getElementById('profilePictureInput').click()">
                                <i class="bx bx-edit"></i>
                            </button>
                            <input type="file" id="profilePictureInput" name="profile_picture" class="d-none"
                                accept="image/*">
                        </div>
                    </div>
                </div>

                <!-- Formulaire de Profil -->
                <div class="card-body pt-0 mt-3">
                    <form id="profileForm" method="POST" action="{{ route('account.profile.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label" style="color: #532200;">Prénom</label>
                                <input class="form-control" type="text" id="firstName" name="first_name"
                                    value="{{ old('first_name', $user->first_name) }}" autofocus
                                    style="border-color: #efcfa0;">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label" style="color: #532200;">Nom</label>
                                <input class="form-control" type="text" name="last_name" id="lastName"
                                    value="{{ old('last_name', $user->last_name) }}" style="border-color: #efcfa0;">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label" style="color: #532200;">Email</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" disabled
                                    style="background-color: #f9f9f9; border-color: #efcfa0;">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label" style="color: #532200;">Téléphone</label>
                                <input type="text" class="form-control" id="phone" name="phone_number"
                                    value="{{ old('phone_number', $user->phone_number) }}" style="border-color: #efcfa0;">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="address" class="form-label" style="color: #532200;">Adresse</label>
                                <textarea class="form-control" id="address" name="address" rows="3" style="border-color: #efcfa0;">{{ old('address', $user->address) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bx bx-save me-1"></i> Enregistrer
                            </button>
                            <button type="reset" class="btn"
                                style="background-color: rgba(239, 207, 160, 0.1); color: #532200;">
                                <i class="bx bx-reset me-1"></i> Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Changer le Mot de Passe -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: #532200;">
                        <i class="bx bx-lock me-2" style="color: #e1a140;"></i> Changer le Mot de Passe
                    </h5>
                </div>
                <div class="card-body">
                    <form id="passwordForm" method="POST" action="{{ route('account.profile.password') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="currentPassword" class="form-label" style="color: #532200;">Mot de Passe
                                    Actuel</label>
                                <input class="form-control" type="password" id="currentPassword" name="current_password"
                                    style="border-color: #efcfa0;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="newPassword" class="form-label" style="color: #532200;">Nouveau Mot de
                                    Passe</label>
                                <input class="form-control" type="password" id="newPassword" name="password"
                                    style="border-color: #efcfa0;">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="confirmPassword" class="form-label" style="color: #532200;">Confirmer le
                                    Nouveau Mot de Passe</label>
                                <input class="form-control" type="password" id="confirmPassword"
                                    name="password_confirmation" style="border-color: #efcfa0;">
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-text" style="color: #914110;">
                                    <i class="bx bx-info-circle me-1"></i> Minimum 8 caractères, majuscule et symbole
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-key me-1"></i> Changer le Mot de Passe
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
            document.getElementById('profilePictureInput').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profilePicturePreview').src = e.target.result;

                        const formData = new FormData();
                        formData.append('profile_picture', file);
                        formData.append('_token', '{{ csrf_token() }}');

                        fetch('{{ route('account.profile.picture') }}', {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    document.getElementById('profilePicturePreview').src = data
                                        .image_url;
                                    toastr.success('Profile picture updated successfully!');
                                } else {
                                    toastr.error(data.message ||
                                        'Failed to update profile picture');
                                    document.getElementById('profilePicturePreview').src =
                                        '{{ $user->profile_picture ? $user->profile_picture : asset('assets/img/avatars/default-avatar.png') }}';
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                toastr.error('An error occurred while uploading the image');
                                document.getElementById('profilePicturePreview').src =
                                    '{{ $user->profile_picture ? $user->profile_picture : asset('assets/img/avatars/default-avatar.png') }}';
                            });
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

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

        .form-control,
        .form-select {
            border-radius: 8px !important;
            border-color: #efcfa0;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #e1a140;
            box-shadow: 0 0 0 0.25rem rgba(225, 161, 64, 0.25);
        }

        .btn-primary {
            background-color: #e1a140;
            border-color: #e1a140;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #914110;
            border-color: #914110;
            transform: translateY(-2px);
        }
    </style>
@endsection
