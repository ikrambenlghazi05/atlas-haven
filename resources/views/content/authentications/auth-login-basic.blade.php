@extends('layouts/blankLayout')

@section('title', 'Connexion - Hôtel de Luxe')

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Connexion -->
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
                        <h4 class="mb-1 text-center" style="color: #8a7655;">Bienvenue</h4>
                        <p class="mb-6 text-center" style="color: #a9927d;">Connectez-vous à votre compte pour commencer
                            votre expérience</p>

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li style="color: #dc3545;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-6" action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="email" class="form-label" style="color: #8a7655;">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Entrez votre email" autofocus
                                    style="border-color: #d5c5a9; background-color: #faf7f2;" required>
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password" style="color: #8a7655;">Mot de passe</label>
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
                            </div>
                            <div class="mb-8">
                                <div class="d-flex justify-content-between mt-8">
                                    <div class="form-check mb-0 ms-2">
                                        <input class="form-check-input" type="checkbox" id="remember-me" name="remember"
                                            style="border-color: #c0aa83;">
                                        <label class="form-check-label" for="remember-me" style="color: #a9927d;">
                                            Se souvenir de moi
                                        </label>
                                    </div>
                                    <a href="{{ route('auth-reset-password') }}" style="color: #8a7655;">
                                        <span>Mot de passe oublié?</span>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn d-grid w-100" type="submit"
                                    style="background-color: #c0aa83; color: #fff; border: none;">
                                    Se connecter
                                </button>
                            </div>
                        </form>

                        <p class="text-center" style="color: #a9927d;">
                            <span>Nouveau sur notre plateforme?</span>
                            <a href="{{ route('register') }}" style="color: #8a7655;">
                                <span>Créer un compte</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /Connexion -->
        </div>
    </div>
@endsection
