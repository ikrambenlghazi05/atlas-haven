@extends('layouts/contentNavbarLayout')

@section('title', 'Ajouter une Chambre')

@section('vendor-style')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')
    <div class="row animate__animated animate__fadeIn">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0" style="color: #532200;">
                        <i class="bx bx-bed me-2" style="color: #e1a140;"></i> Ajouter une Nouvelle Chambre
                    </h5>
                    <a href="{{ route('rooms.list') }}" class="btn btn-outline-secondary">
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

                    <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <!-- Section Informations de Base -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-info-circle me-2"></i> Informations de Base
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="hotel_id" class="form-label">Hôtel <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-hotel" style="color: #532200;"></i>
                                        </span>
                                        <select class="form-select" id="hotel_id" name="hotel_id" required>
                                            <option value="">Sélectionner un Hôtel</option>
                                            @foreach($hotels as $hotel)
                                                <option value="{{ $hotel->id }}" {{ old('hotel_id') == $hotel->id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="room_type_id" class="form-label">Type de Chambre <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-category" style="color: #532200;"></i>
                                        </span>
                                        <select class="form-select" id="room_type_id" name="room_type_id" required>
                                            <option value="">Sélectionner un Type</option>
                                            @foreach($roomTypes as $type)
                                                <option value="{{ $type->id }}" {{ old('room_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="room_number" class="form-label">Numéro de Chambre <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-hash" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="text" id="room_number" name="room_number" value="{{ old('room_number') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="price_per_night" class="form-label">Prix par Nuit (MAD) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-money" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="number" step="0.01" min="0" id="price_per_night" name="price_per_night" value="{{ old('price_per_night') }}" required>
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">MAD</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="capacity" class="form-label">Capacité <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-user" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="number" min="1" id="capacity" name="capacity" value="{{ old('capacity') }}" required>
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">Personnes</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="size" class="form-label">Superficie (m²) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">
                                            <i class="bx bx-ruler" style="color: #532200;"></i>
                                        </span>
                                        <input class="form-control" type="number" min="1" id="size" name="size" value="{{ old('size') }}" required>
                                        <span class="input-group-text" style="background-color: #efcfa0; border-color: #efcfa0;">m²</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Disponibilité</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="availability" checked>
                                        <input type="hidden" id="availability_hidden" name="availability" value="1">
                                        <label class="form-check-label text-success" for="availability">Disponible</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section Équipements -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-check-circle me-2"></i> Équipements
                            </h6>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Sélectionnez les équipements de cette chambre</span>
                                <a href="#" id="select-all-amenities" data-select="all" class="btn btn-sm" style="background-color: rgba(225, 161, 64, 0.1); color: #532200;">
                                    <i class="bx bx-check-circle me-1"></i> Tout Sélectionner
                                </a>
                            </div>
                            <div class="amenity-container">
                                @foreach($amenities as $amenity)
                                    <input type="checkbox" class="amenity-checkbox" id="amenity-{{ $amenity->id }}" name="amenities[]" value="{{ $amenity->id }}" {{ is_array(old('amenities')) && in_array($amenity->id, old('amenities')) ? 'checked' : '' }}>
                                    <label for="amenity-{{ $amenity->id }}" class="amenity-label">
                                        <i class="bx bx-{{ $amenity->icon }} me-2"></i> {{ $amenity->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Section Description -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-edit me-2"></i> Description
                            </h6>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <!-- Section Images -->
                        <div class="mb-4">
                            <h6 class="section-divider">
                                <i class="bx bx-image me-2"></i> Images de la Chambre
                            </h6>
                            <div class="image-upload-area" onclick="document.getElementById('images').click()">
                                <i class="bx bx-cloud-upload"></i>
                                <h5>Cliquez pour télécharger des images</h5>
                                <p class="text-muted mb-0">ou glissez-déposez</p>
                                <small class="text-muted">JPEG, PNG, JPG, GIF (Max 5MB chacun)</small>
                                <input class="form-control d-none" type="file" id="images" name="images[]" multiple required>
                            </div>
                            <div id="image-preview" class="row mt-3"></div>
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
        // Toggle switch functionality
        const availabilitySwitch = document.getElementById('availability');
        const availabilityHidden = document.getElementById('availability_hidden');

        availabilitySwitch.addEventListener('change', function() {
            availabilityHidden.value = this.checked ? 1 : 0;
            if(this.checked) {
                this.parentElement.querySelector('.form-check-label').textContent = 'Available';
                this.parentElement.querySelector('.form-check-label').classList.add('text-success');
                this.parentElement.querySelector('.form-check-label').classList.remove('text-danger');
            } else {
                this.parentElement.querySelector('.form-check-label').textContent = 'Unavailable';
                this.parentElement.querySelector('.form-check-label').classList.add('text-danger');
                this.parentElement.querySelector('.form-check-label').classList.remove('text-success');
            }
        });

        // Select all/none functionality for amenities
        document.getElementById('select-all-amenities').addEventListener('click', function(e) {
            e.preventDefault();
            const checkboxes = document.querySelectorAll('input[name="amenities[]"]');
            const selectAll = this.dataset.select === 'all';

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll;
                const label = checkbox.nextElementSibling;
                if(selectAll) {
                    label.style.backgroundColor = '#e1a140';
                    label.style.color = 'white';
                    label.style.borderColor = '#e1a140';
                } else {
                    label.style.backgroundColor = '';
                    label.style.color = '';
                    label.style.borderColor = '#efcfa0';
                }
            });

            this.dataset.select = selectAll ? 'none' : 'all';
            this.innerHTML = selectAll ?
                '<i class="bx bx-minus-circle me-1"></i> Deselect All' :
                '<i class="bx bx-check-circle me-1"></i> Select All';
        });

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
                    preview.className = 'col-md-3 mb-3';
                    preview.innerHTML = `
                        <div class="card h-100">
                            <img src="${e.target.result}" class="card-img-top" style="height: 120px; object-fit: cover">
                            <div class="card-body p-2 text-center">
                                <span class="badge bg-primary">New</span>
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
    }

    .card-header {
        background-color: white;
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

    /* Amenities styling */
    .amenity-checkbox {
        position: absolute;
        opacity: 0;
    }

    .amenity-label {
        display: flex;
        align-items: center;
        padding: 0.75rem 1.25rem;
        border: 1px solid var(--gold-light);
        border-radius: 8px;
        margin-bottom: 0.5rem;
        cursor: pointer;
        transition: all 0.2s;
        color: var(--puce);
    }

    .amenity-label:hover {
        background-color: rgba(239, 207, 160, 0.1);
    }

    .amenity-checkbox:checked + .amenity-label {
        background-color: var(--gold-primary);
        color: white;
        border-color: var(--gold-primary);
    }

    .amenity-container {
        max-height: 300px;
        overflow-y: auto;
        padding: 0.5rem;
        border: 1px solid var(--gold-light);
        border-radius: 8px;
        background-color: white;
    }

    /* Switch styling */
    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
        background-color: #ddd;
        border-color: #ddd;
    }

    .form-switch .form-check-input:checked {
        background-color: var(--gold-primary);
        border-color: var(--gold-primary);
    }

    /* Image upload styling */
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
