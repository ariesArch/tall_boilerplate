<x-base-layout>
    @auth
    @if (Request::is('static-sign-up'))
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
            @include('layouts.navbars.guest.nav')
        </div>
    </div>
    {{ $slot }}
    @include('layouts.footers.guest.footer')
    @elseif (Request::is('static-sign-in'))
    <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 flex-0">
                @include('layouts.navbars.guest.nav')
            </div>
        </div>
    </div>
    {{ $slot }}
    @include('layouts.footers.guest.footer')
    @else
    @if (Request::is('rtl'))
    @include('layouts.navbars.auth.sidebar')
    <main class="ease-soft-in-out xl:mr-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('layouts.navbars.auth.nav')
        <div class="w-full px-6 py-2 mx-auto">
            {{ $slot }}
            @include('layouts.footers.auth.footer')
        </div>
    </main>

    @elseif (Request::is('virtual-reality'))
    @include('layouts.navbars.auth.nav')
    @include('layouts.navbars.auth.sidebar')
    {{ $slot }}
    @include('layouts.footers.auth.footer')
    @else
    @include('layouts.navbars.auth.sidebar')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('layouts.navbars.auth.nav')
        <div class="w-full px-6 py-2 mx-auto">
            {{ $slot }}
            @include('layouts.footers.auth.footer')
        </div>
    </main>
    @endif
    @endif
    @endauth
</x-base-layout>