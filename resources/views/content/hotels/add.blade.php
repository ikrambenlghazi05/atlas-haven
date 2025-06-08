@extends('layouts/contentNavbarLayout')

@section('title', 'Ajouter un hôtel')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 animate__animated animate__fadeIn">
                <div class="card-header d-flex align-items-center justify-content-between bg-white">
                    <h5 class="card-title mb-0" style="color: #532200;">Ajouter un nouvel hôtel</h5>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-secondary me-2" onclick="window.history.back()">
                            <i class="bx bx-arrow-back me-1"></i> Retour
                        </button>
                    </div>
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

                    <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-4">
                            <!-- Informations de base -->
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="name" class="form-label fw-medium" style="color: #532200;">Nom de l'hôtel
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-building" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" id="name" name="name" required
                                            autofocus style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="rating" class="form-label fw-medium"
                                        style="color: #532200;">Classement</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-star" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="number" step="0.1" min="0"
                                            max="5" id="rating" name="rating"
                                            style="border-left: 0; border-color: #efcfa0;">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">/ 5</span>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="description" class="form-label fw-medium"
                                        style="color: #532200;">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="5" required
                                        style="border-color: #efcfa0;"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="form-label fw-medium" style="color: #532200;">Images de l'hôtel <span
                                            class="text-danger">*</span></label>
                                    <div class="border rounded p-4 text-center"
                                        style="border-color: #efcfa0 !important; background-color: rgba(239, 207, 160, 0.1);">
                                        <input type="file" class="d-none" id="images" name="images[]" multiple
                                            required>
                                        <label for="images" class="d-block cursor-pointer">
                                            <i class="bx bx-cloud-upload bx-lg mb-2" style="color: #e1a140;"></i>
                                            <h5 class="mb-1" style="color: #532200;">Cliquez pour télécharger des images</h5>
                                            <p class="text-muted mb-2">ou glissez-déposez</p>
                                            <small class="text-muted">JPEG, PNG, JPG, GIF (Max 5MB chacun)</small>
                                        </label>
                                    </div>
                                    <div id="image-preview" class="d-flex flex-wrap mt-3 gap-2"></div>
                                </div>
                            </div>

                            <!-- Informations de localisation -->
                            <div class="col-12 mt-3">
                                <h6 class="mb-4"
                                    style="color: #532200; border-bottom: 1px solid #efcfa0; padding-bottom: 8px;">
                                    <i class="bx bx-map me-2"></i> Informations de localisation
                                </h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="address" class="form-label fw-medium" style="color: #532200;">Adresse
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-map" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="address" name="address"
                                            required style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="city" class="form-label fw-medium" style="color: #532200;">Ville <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-buildings" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="city" name="city"
                                            required style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="state" class="form-label fw-medium"
                                        style="color: #532200;">Région/Province</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-landscape" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="state" name="state"
                                            style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="country" class="form-label fw-medium" style="color: #532200;">Pays
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-globe" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="country" name="country"
                                            required style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="zip_code" class="form-label fw-medium" style="color: #532200;">Code postal</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-mail-send" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code"
                                            style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>
                            </div>

                            <!-- Informations de contact -->
                            <div class="col-12 mt-3">
                                <h6 class="mb-4"
                                    style="color: #532200; border-bottom: 1px solid #efcfa0; padding-bottom: 8px;">
                                    <i class="bx bx-phone me-2"></i> Informations de contact
                                </h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="phone_number" class="form-label fw-medium" style="color: #532200;">Téléphone
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-phone" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            required style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="email" class="form-label fw-medium"
                                        style="color: #532200;">Email</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-envelope" style="color: #532200;"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email"
                                            style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="website" class="form-label fw-medium"
                                        style="color: #532200;">Site web</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-world" style="color: #532200;"></i>
                                        </span>
                                        <input type="url" class="form-control" id="website" name="website"
                                            style="border-left: 0; border-color: #efcfa0;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="reset" class="btn btn-outline-secondary px-4">
                                        <i class="bx bx-reset me-1"></i> Réinitialiser
                                    </button>
                                    <button type="submit" class="btn btn-primary px-4"
                                        style="background-color: #e1a140; border-color: #e1a140;">
                                        <i class="bx bx-save me-1"></i> Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-script')
    <script>
        // Image preview functionality
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = '';

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (!file.type.match('image.*')) continue;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.createElement('div');
                    preview.className = 'position-relative';
                    preview.style.width = '100px';
                    preview.style.height = '100px';
                    preview.innerHTML = `
                    <img src="${e.target.result}" class="img-thumbnail h-100 w-100 object-fit-cover" style="border-color: #efcfa0;">
                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 p-0" style="width: 20px; height: 20px;">
                        <i class="bx bx-x"></i>
                    </button>
                `;
                    preview.querySelector('button').addEventListener('click', function() {
                        preview.remove();
                        // You might want to add logic to remove the file from the FileList
                    });
                    previewContainer.appendChild(preview);
                };
                reader.readAsDataURL(file);
            }
        });

        // Form validation
        (function() {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
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



        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(239, 207, 160, 0.3);
            padding: 1.25rem 1.5rem;
        }

        .form-control,
        .form-select,
        .input-group-text {
            border-radius: 8px !important;
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

        label {
            font-weight: 500;
        }

        [for="images"]:hover {
            transform: scale(1.02);
            transition: all 0.3s ease;
        }

        .alert-danger {
            background-color: rgba(234, 84, 85, 0.1);
            border-color: rgba(234, 84, 85, 0.2);
            color: #ea5455;
        }

        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endsection
