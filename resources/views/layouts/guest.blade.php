<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="garden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>

    <nav class="flex items-center justify-between p-8">
        <div class="flex items-center gap-5">
            <x-nav-link wire:navigate href="{{ route('home.index') }}" :active="request()->routeIs('home.index')">
                Home
            </x-nav-link>

            <x-nav-link wire:navigate href="{{ route('book.index') }}" :active="request()->routeIs('book.index')">
                Books
            </x-nav-link>

            @auth
                <x-nav-link wire:navigate href="{{ route('collection.index') }}" :active="request()->routeIs('collection.index')">
                    My Collection
                </x-nav-link>
            @endauth

            <x-nav-link wire:navigate href="{{ route('about.index') }}" :active="request()->routeIs('about.index')">
                About
            </x-nav-link>

            <x-nav-link wire:navigate href="{{ route('contact.index') }}" :active="request()->routeIs('contact.index')">
                Contact Us
            </x-nav-link>

        </div>
        <div class="flex gap-3 items-center">
            @guest
                <x-nav-link wire:navigate href="{{ route('login') }}" :active="request()->routeIs('login')">
                    Login
                </x-nav-link>
                <x-nav-link wire:navigate href="{{ route('register') }}" :active="request()->routeIs('register')">
                    Register
                </x-nav-link>
            @endguest
            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @if (Auth::user()->isAdmin())
                        <x-nav-link wire:navigate href="{{ route('dash.admin') }}" :active="request()->routeIs('dash.admin')">
                            Admin Panel
                        </x-nav-link>
                    @endif
                    <!-- Settings Dropdown -->
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link wire:navigate href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>
    @stack('modals')

    @livewireScripts
    @include('sweetalert::alert')
</body>

</html>
