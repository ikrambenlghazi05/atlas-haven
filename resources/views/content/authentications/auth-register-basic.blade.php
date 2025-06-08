@extends('layouts/blankLayout')

@section('title', 'Inscription - Hôtel de Luxe')

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Registration Card -->
                <div class="card px-sm-6 px-0" style="background-color: #f5f0e6; border: 1px solid #e0d5c0;">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="Atlas Haven" height="40"
                                    class="me-2">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1 text-center" style="color: #8a7655;">Bienvenue dans l'élégance</h4>
                        <p class="mb-6 text-center" style="color: #a9927d;">Créez votre compte pour une expérience luxueuse
                        </p>

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li style="color: #dc3545;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-6" action="{{ route('register.post') }}" method="POST">
                            @csrf

                            <div class="row mb-6">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label for="firstname" class="form-label" style="color: #8a7655;">Prénom*</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        value="{{ old('firstname') }}" placeholder="Entrez votre prénom" autofocus
                                        style="border-color: #d5c5a9; background-color: #faf7f2;" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label" style="color: #8a7655;">Nom*</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        value="{{ old('lastname') }}" placeholder="Entrez votre nom"
                                        style="border-color: #d5c5a9; background-color: #faf7f2;" required>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="email" class="form-label" style="color: #8a7655;">Email*</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Entrez votre adresse email"
                                    style="border-color: #d5c5a9; background-color: #faf7f2;" required>
                            </div>

                            <div class="mb-6">
                                <label for="phone" class="form-label" style="color: #8a7655;">Numéro de
                                    téléphone*</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}" placeholder="Entrez votre numéro de téléphone"
                                    style="border-color: #d5c5a9; background-color: #faf7f2;" required>
                            </div>

                            <div class="mb-6">
                                <label for="address" class="form-label" style="color: #8a7655;">Adresse</label>
                                <textarea class="form-control" id="address" name="address" rows="2"
                                    style="border-color: #d5c5a9; background-color: #faf7f2;">{{ old('address') }}</textarea>
                            </div>

                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password" style="color: #8a7655;">Mot de passe*</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                        style="border-color: #d5c5a9; background-color: #faf7f2;" required />
                                    <span class="input-group-text cursor-pointer"
                                        style="border-color: #d5c5a9; background-color: #faf7f2;">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                                <small class="text-muted">Minimum 8 caractères</small>
                            </div>

                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password_confirmation" style="color: #8a7655;">Confirmer le
                                    mot de passe*</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                        style="border-color: #d5c5a9; background-color: #faf7f2;" required />
                                    <span class="input-group-text cursor-pointer"
                                        style="border-color: #d5c5a9; background-color: #faf7f2;">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="my-8">
                                <div class="form-check mb-0 ms-2">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms"
                                        style="border-color: #c0aa83;" {{ old('terms') ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="terms-conditions" style="color: #a9927d;">
                                        J'accepte la
                                        <a href="/" style="color: #8a7655;">politique de confidentialité</a>
                                        et les
                                        <a href="/" style="color: #8a7655;">conditions d'utilisation</a>*
                                    </label>
                                </div>
                            </div>

                            <button class="btn d-grid w-100" type="submit"
                                style="background-color: #c0aa83; color: #fff; border: none;">
                                S'inscrire
                            </button>
                        </form>

                        <p class="text-center" style="color: #a9927d;">
                            <span>Vous avez déjà un compte?</span>
                            <a href="{{ route('login') }}" style="color: #8a7655;">
                                <span>Connectez-vous</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Registration Card -->
            </div>
        </div>
    </div>
@endsection
