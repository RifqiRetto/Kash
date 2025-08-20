<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Pastikan ini juga ada jika belum -->
        @stack('scripts')
    </head>
    <body class="min-h-screen bg-[#3b3b3b]">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    
                    <!-- Menu Manajemen Siswa -->
                    <flux:navlist.item icon="users" :href="route('students.index')" :current="request()->routeIs('students.index')" wire:navigate>
                        {{ __('Manajemen Siswa') }}
                    </flux:navlist.item>
                    
                    <!-- Menu Transaksi Keuangan -->
                    <flux:navlist.item icon="currency-dollar" :href="route('transactions.index')" :current="request()->routeIs('transactions.index')" wire:navigate>
                        {{ __('Transaksi Keuangan') }}
                    </flux:navlist.item>
                    
                    <!-- Menu Laporan Keuangan -->
                    <flux:navlist.item icon="document-chart-bar" :href="route('reports.index')" :current="request()->routeIs('reports.index')" wire:navigate>
                        {{ __('Laporan Keuangan') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />
        </flux:sidebar>

        <!-- Mobile Header tanpa profile -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <flux:spacer />
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
