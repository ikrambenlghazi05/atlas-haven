<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu"
    style="background-color: white; border-right: 1px solid #efcfa0;">

    <!-- Brand -->
    <div class="app-brand demo py-3">
        <a href="{{ url('/') }}" class="app-brand-link">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Atlas Haven" height="60" class="me-2"> </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm" style="color: #532200;"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"
        style="background: linear-gradient(180deg, rgba(239,207,160,0.3) 0%, rgba(239,207,160,0) 100%);"></div>

    <ul class="menu-inner py-1">
        @foreach ($menuData[0]->menu as $menu)
            @if (isset($menu->menuHeader))
                <li class="menu-header small text-uppercase mt-3">
                    <span class="menu-header-text" style="color: #914110;">{{ __($menu->menuHeader) }}</span>
                </li>
            @else
                @php
                    $activeClass = null;
                    $currentRouteName = Route::currentRouteName();

                    if ($currentRouteName === $menu->slug) {
                        $activeClass = 'active';
                    } elseif (isset($menu->submenu)) {
                        if (gettype($menu->slug) === 'array') {
                            foreach ($menu->slug as $slug) {
                                if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                    $activeClass = 'active open';
                                }
                            }
                        } else {
                            if (
                                str_contains($currentRouteName, $menu->slug) and
                                strpos($currentRouteName, $menu->slug) === 0
                            ) {
                                $activeClass = 'active open';
                            }
                        }
                    }
                @endphp

                <li class="menu-item {{ $activeClass }}">
                    <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}"
                        class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}"
                        @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                        @isset($menu->icon)
                            <i class="{{ $menu->icon }}" style="color: {{ $activeClass ? '#e1a140' : '#532200' }};"></i>
                        @endisset
                        <div style="color: {{ $activeClass ? '#e1a140' : '#532200' }};">
                            {{ isset($menu->name) ? __($menu->name) : '' }}</div>
                        @isset($menu->badge)
                            <div class="badge rounded-pill ms-auto"
                                style="background-color: {{ $menu->badge[0] == 'primary' ? '#e1a140' : '' }}">
                                {{ $menu->badge[1] }}</div>
                        @endisset
                    </a>

                    @isset($menu->submenu)
                        @include('layouts.sections.menu.submenu', ['menu' => $menu->submenu])
                    @endisset
                </li>
            @endif
        @endforeach
    </ul>

</aside>
<!-- / Menu -->
