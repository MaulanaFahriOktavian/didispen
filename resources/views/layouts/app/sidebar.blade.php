<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">

    <flux:sidebar
        sticky
        collapsible="mobile"
        class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

        {{-- Logo --}}
        <flux:sidebar.header>

            <x-app-logo
                :sidebar="true"
                :href="route('student.dashboard')" />

            <flux:sidebar.collapse class="lg:hidden"/>

        </flux:sidebar.header>


        {{-- MENU --}}
        <flux:sidebar.nav>

            <flux:sidebar.group heading="Menu Siswa" class="grid">

                <flux:sidebar.item
                    icon="home"
                    :href="route('student.dashboard')"
                    :current="request()->routeIs('student.dashboard')">

                    Dashboard

                </flux:sidebar.item>

                <flux:sidebar.item
                    icon="document-plus"
                    :href="route('student.dispensation.create')"
                    :current="request()->routeIs('student.dispensation.create')">

                    Ajukan Dispensasi

                </flux:sidebar.item>

            </flux:sidebar.group>

        </flux:sidebar.nav>

        <flux:spacer />

        {{-- USER DESKTOP --}}
        <x-desktop-user-menu
            class="hidden lg:block"
            :name="auth('student')->user()->name" />

    </flux:sidebar>


    {{-- MOBILE HEADER --}}
    <flux:header class="lg:hidden">

        <flux:sidebar.toggle
            class="lg:hidden"
            icon="bars-2"
            inset="left"/>

        <flux:spacer />

        <flux:dropdown position="top" align="end">

            <flux:profile
                :initials="str(auth('student')->user()->name)
                    ->explode(' ')
                    ->map(fn($n)=>substr($n,0,1))
                    ->join('')"
                icon-trailing="chevron-down"
            />

            <flux:menu>

                <flux:menu.radio.group>

                    <div class="p-0 text-sm font-normal">

                        <div class="flex items-center gap-2 px-1 py-1.5">

                            <flux:avatar
                                :name="auth('student')->user()->name"
                                :initials="str(auth('student')->user()->name)
                                    ->explode(' ')
                                    ->map(fn($n)=>substr($n,0,1))
                                    ->join('')"
                            />

                            <div class="grid flex-1">

                                <flux:heading class="truncate">

                                    {{ auth('student')->user()->name }}

                                </flux:heading>

                                <flux:text class="truncate">

                                    {{ auth('student')->user()->nis }}

                                </flux:text>

                            </div>

                        </div>

                    </div>

                </flux:menu.radio.group>

                <flux:menu.separator />

                <form
                    method="POST"
                    action="{{ route('student.logout') }}"
                    class="w-full">

                    @csrf

                    <flux:menu.item
                        as="button"
                        type="submit"
                        icon="arrow-right-start-on-rectangle"
                        class="w-full cursor-pointer">

                        Logout

                    </flux:menu.item>

                </form>

            </flux:menu>

        </flux:dropdown>

    </flux:header>


    {{-- CONTENT --}}
    <main>

        {{ $slot }}

    </main>


    {{-- TOAST --}}
    @persist('toast')

        <flux:toast.group>

            <flux:toast />

        </flux:toast.group>

    @endpersist


    @fluxScripts

</body>

</html>