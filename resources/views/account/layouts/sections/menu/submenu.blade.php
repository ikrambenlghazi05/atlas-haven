@php
    use Illuminate\Support\Facades\Route;
@endphp

<ul class="menu-sub" style="background-color: rgba(239, 207, 160, 0.05);">
    @if (isset($menu))
        @foreach ($menu as $submenu)
            @php
                $activeClass = null;
                $active = 'active open';
                $currentRouteName = Route::currentRouteName();

                if ($currentRouteName === $submenu->slug) {
                    $activeClass = 'active';
                } elseif (isset($submenu->submenu)) {
                    if (gettype($submenu->slug) === 'array') {
                        foreach ($submenu->slug as $slug) {
                            if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
                                $activeClass = $active;
                            }
                        }
                    } else {
                        if (
                            str_contains($currentRouteName, $submenu->slug) and
                            strpos($currentRouteName, $submenu->slug) === 0
                        ) {
                            $activeClass = $active;
                        }
                    }
                }
            @endphp

            <li class="menu-item {{ $activeClass }}">
                <a href="{{ isset($submenu->url) ? url($submenu->url) : 'javascript:void(0)' }}"
                    class="{{ isset($submenu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}"
                    @if (isset($submenu->target) and !empty($submenu->target)) target="_blank" @endif>
                    @if (isset($submenu->icon))
                        <i class="{{ $submenu->icon }}" style="color: {{ $activeClass ? '#e1a140' : '#532200' }};"></i>
                    @endif
                    <div style="color: {{ $activeClass ? '#e1a140' : '#532200' }};">
                        {{ isset($submenu->name) ? __($submenu->name) : '' }}</div>
                    @isset($submenu->badge)
                        <div class="badge rounded-pill ms-auto"
                            style="background-color: {{ $submenu->badge[0] == 'primary' ? '#e1a140' : '' }}">
                            {{ $submenu->badge[1] }}</div>
                    @endisset
                </a>

                @if (isset($submenu->submenu))
                    @include('layouts.sections.menu.submenu', ['menu' => $submenu->submenu])
                @endif
            </li>
        @endforeach
    @endif
</ul>
