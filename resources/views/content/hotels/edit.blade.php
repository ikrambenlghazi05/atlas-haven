@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier un hôtel')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection



@section('content')
    <div class="row animate__animated animate__fadeIn">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Modifier l'hôtel</h5>
                    <a href="{{ route('hotels.list') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Retour à la liste
                    </a>
                </div>
                <div class="card-body">
                    <form id="hotelEditForm" method="POST" action="{{ route('hotels.update', $hotel) }}"
                        enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Section Informations de base -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-building me-2"></i> Informations de base
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom de l'hôtel <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-building" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ old('name', $hotel->name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="rating" class="form-label">Classement</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-star" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="number" step="0.1" min="0"
                                            max="5" id="rating" name="rating"
                                            value="{{ old('rating', $hotel->rating) }}">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">/ 5</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $hotel->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Section Informations de localisation -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-map me-2"></i> Informations de localisation
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Adresse <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-map" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address', $hotel->address) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">Ville <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-buildings" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="{{ old('city', $hotel->city) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">Région/Province</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-landscape" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="state" name="state"
                                            value="{{ old('state', $hotel->state) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label">Pays <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-globe" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="country" name="country"
                                            value="{{ old('country', $hotel->country) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="zip_code" class="form-label">Code postal</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-mail-send" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code"
                                            value="{{ old('zip_code', $hotel->zip_code) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section Informations de contact -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-phone me-2"></i> Informations de contact
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">Téléphone <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-phone" style="color: #532200;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ old('phone_number', $hotel->phone_number) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-envelope" style="color: #532200;"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $hotel->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="website" class="form-label">Site web</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-world" style="color: #532200;"></i>
                                        </span>
                                        <input type="url" class="form-control" id="website" name="website"
                                            value="{{ old('website', $hotel->website) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section Images -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-image me-2"></i> Images de l'hôtel
                            </h6>

                            <!-- Images actuelles -->
                            <div class="mb-4">
                                <label class="form-label">Images actuelles</label>
                                <div class="row">
                                    @foreach ($hotel->images as $image)
                                        <div class="col-md-3 mb-3">
                                            <div class="card image-card h-100">
                                                @if ($image->is_featured)
                                                    <span class="featured-badge">Vedette</span>
                                                @endif
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    class="card-img-top" style="height: 150px; object-fit: cover">
                                                <div class="card-body p-2 text-center">
                                                    <div class="btn-group btn-group-sm image-actions">
                                                        <button type="button"
                                                            class="btn btn-{{ $image->is_featured ? 'success' : 'outline-secondary' }} set-featured"
                                                            data-image-id="{{ $image->id }}"
                                                            title="{{ $image->is_featured ? 'Vedette' : 'Définir comme vedette' }}">
                                                            <i
                                                                class="bx {{ $image->is_featured ? 'bxs-star' : 'bx-star' }}"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger delete-image"
                                                            data-image-id="{{ $image->id }}" title="Supprimer">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Ajouter de nouvelles images -->
                            <div class="mb-3">
                                <label class="form-label">Ajouter plus d'images</label>
                                <div class="image-upload-area" onclick="document.getElementById('images').click()">
                                    <i class="bx bx-cloud-upload"></i>
                                    <h5>Cliquez pour télécharger des images</h5>
                                    <p class="text-muted mb-0">ou glissez-déposez</p>
                                    <small class="text-muted">JPEG, PNG, JPG, GIF (Max 5MB chacun)</small>
                                    <input class="form-control d-none" type="file" id="images" name="images[]"
                                        multiple>
                                </div>
                                <div id="new-images-preview" class="row mt-3"></div>
                            </div>
                        </div>

                        <!-- Actions du formulaire -->
                        <div class="mt-4 d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-secondary me-3">
                                <i class="bx bx-reset me-1"></i> Réinitialiser
                            </button>
                            <button type="submit" id="updateButton" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i> Mettre à jour
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
            const form = document.getElementById('hotelEditForm');
            const updateButton = document.getElementById('updateButton');

            // Main form submission
            form.addEventListener('submit', function(e) {
                updateButton.disabled = true;
                updateButton.innerHTML =
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...';
            });

            // Featured image handler
            document.querySelectorAll('.set-featured').forEach(button => {
                button.addEventListener('click', function() {
                    const imageId = this.dataset.imageId;
                    const featuredInput = document.createElement('input');
                    featuredInput.type = 'hidden';
                    featuredInput.name = 'featured_image';
                    featuredInput.value = imageId;

                    // Remove any existing featured image input
                    const existing = document.querySelector('input[name="featured_image"]');
                    if (existing) existing.remove();

                    form.appendChild(featuredInput);

                    // Show loading state for the featured button
                    const starIcon = this.querySelector('i');
                    starIcon.classList.remove('bxs-star', 'bx-star');
                    starIcon.classList.add('bx-loader-alt', 'bx-spin');

                    form.submit();
                });
            });

            // Delete image handler
            document.querySelectorAll('.delete-image').forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this image?')) {
                        const imageId = this.dataset.imageId;
                        const deleteInput = document.createElement('input');
                        deleteInput.type = 'hidden';
                        deleteInput.name = 'delete_image';
                        deleteInput.value = imageId;

                        // Show loading state for the delete button
                        const trashIcon = this.querySelector('i');
                        trashIcon.classList.remove('bx-trash');
                        trashIcon.classList.add('bx-loader-alt', 'bx-spin');
                        this.disabled = true;

                        form.appendChild(deleteInput);
                        form.submit();
                    }
                });
            });

            // Image upload preview
            document.getElementById('images').addEventListener('change', function(event) {
                const previewContainer = document.getElementById('new-images-preview');
                previewContainer.innerHTML = '';

                const files = event.target.files;
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (!file.type.match('image.*')) continue;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.createElement('div');
                        preview.className = 'col-md-3 mb-3';
                        preview.innerHTML = `
                            <div class="card h-100">
                                <img src="${e.target.result}" class="card-img-top" style="height: 120px; object-fit: cover">
                                <div class="card-body p-2 text-center">
                                    <span class="badge bg-label-primary">New</span>
                                </div>
                            </div>
                        `;
                        previewContainer.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                }
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
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(239, 207, 160, 0.3);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            color: var(--puce);
            font-weight: 600;
            margin-bottom: 0;
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

        label {
            font-weight: 500;
            color: var(--puce);
        }

        .image-actions .btn {
            border-radius: 6px !important;
            padding: 0.375rem 0.75rem;
        }

        .featured-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--gold-primary);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .image-card {
            position: relative;
            transition: all 0.3s ease;
        }

        .image-card:hover {
            transform: scale(1.03);
        }

        .section-divider {
            color: var(--puce);
            border-bottom: 1px solid var(--gold-light);
            padding-bottom: 8px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .image-upload-area {
            border: 2px dashed var(--gold-light);
            border-radius: 12px;
            padding: 2rem;
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
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
@endsection
