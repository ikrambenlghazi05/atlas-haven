@extends('home.layout')

@section('title', 'Atlas Haven - Séjours de Luxe au Maroc')

@section('content')

    <!-- Hero Section with Booking Form -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Découvrez un Luxe Inégalé</h1>
                    <!--<p class="lead mb-5">Explorez notre collection exclusive de riads et hôtels au Maroc. Réservez votre
                        séjour parfait avec des offres privilégiées et des services premium.</p>-->
                    <a href="#rooms" class="btn btn-primary btn-lg px-4 me-2">Découvrir nos Chambres</a>
                    <a href="#hotels" class="btn btn-outline-light btn-lg px-4">Nos Établissements</a>
                </div>
                <div class="col-lg-6">
                    <div class="booking-card p-4 mt-5 mt-lg-0">
                        <h4 class="mb-4">Réserver votre séjour</h4>
                        <form id="bookingForm" action="{{ route('rooms.availability') }}" method="GET">
                            <div class="mb-3">
                                <label for="checkIn" class="form-label">Date d'arrivée</label>
                                <input type="date" class="form-control" id="checkIn" name="check_in" required>
                            </div>
                            <div class="mb-3">
                                <label for="checkOut" class="form-label">Date de départ</label>
                                <input type="date" class="form-control" id="checkOut" name="check_out" required>
                            </div>
                            <div class="mb-3">
                                <label for="roomType" class="form-label">Type de chambre</label>
                                <select class="form-select" id="roomType" name="room_type_id" required>
                                    @foreach ($roomTypes as $x)
                                        <option value="{{ $x->id }}">{{ $x->name }} - {{ $x->description }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Vérifier la disponibilité</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    @include('home.about')

    <!-- Services Section -->
    @include('home.services')

    @include('home.hotels')

    <!-- Rooms Section -->
    @include('home.rooms')

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the elements exist before adding event listeners
            const checkInEl = document.getElementById('checkIn');
            const checkOutEl = document.getElementById('checkOut');

            if (checkInEl) {
                // Set minimum date for check-in to today
                const today = new Date().toISOString().split('T')[0];
                checkInEl.min = today;

                // Update check-out min date when check-in changes
                checkInEl.addEventListener('change', function() {
                    if (checkOutEl) {
                        checkOutEl.min = this.value;
                        if (checkOutEl.value < this.value) {
                            checkOutEl.value = '';
                        }
                    }
                });
            }
        });
    </script>
@endsection



