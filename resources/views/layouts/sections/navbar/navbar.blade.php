@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';
    $user = Auth::user();
@endphp

<!-- Barre de navigation -->
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme shadow-sm"
        id="layout-navbar" style="background-color: white; border-bottom: 1px solid #efcfa0;">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme shadow-sm" id="layout-navbar"
        style="background-color: white; border-bottom: 1px solid #efcfa0;">
        <div class="{{ $containerNav }}">
@endif

<!-- Logo -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url('/') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">@include('_partials.macros', ['width' => 25, 'withbg' => '#e1a140'])</span>
            <span class="app-brand-text demo menu-text fw-bold"
                style="color: #532200;">{{ config('variables.templateName') }}</span>
        </a>
    </div>
@endif

<!-- Bouton menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="bx bx-menu bx-md" style="color: #532200;"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Recherche -->
    <div class="navbar-nav align-items-center me-4">
        <div class="nav-item d-flex align-items-center"
            style="background-color: rgba(239, 207, 160, 0.1); border-radius: 8px;">
            <i class="bx bx-search bx-md ms-2" style="color: #e1a140;"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Rechercher..."
                aria-label="Rechercher..." style="background-color: transparent;">
        </div>
    </div>
    <!-- /Recherche -->
    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Administrateur -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('assets/img/avatars/default-avatar.png') }}"
                        alt class="w-px-40 h-auto rounded-circle" style="border: 2px solid #efcfa0;">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" style="border: 1px solid #efcfa0; border-radius: 8px;">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('assets/img/avatars/default-avatar.png') }}"
                                        alt class="w-px-40 h-auto rounded-circle" style="border: 2px solid #efcfa0;">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0" style="color: #532200;">{{ $user->first_name }}
                                    {{ $user->last_name }}</h6>
                                <small class="text-muted">{{ 'Administrateur' }}</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider my-1" style="border-color: #efcfa0;"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bx bx-user me-3" style="color: #e1a140;"></i>
                        <span class="align-middle" style="color: #532200;">Mon Profil</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/admin/account/settings">
                        <i class="bx bx-cog me-3" style="color: #e1a140;"></i>
                        <span class="align-middle" style="color: #532200;">Paramètres</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider my-1" style="border-color: #efcfa0;"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off me-3" style="color:rgb(237, 195, 134);"></i>
                        <span class="align-middle" style="color: #532200;">Déconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
        <!--/ Administrateur -->
    </ul>
</div>

@if (!isset($navbarDetached))
    </div>
@endif
</nav>
<!-- / Barre de navigation -->
