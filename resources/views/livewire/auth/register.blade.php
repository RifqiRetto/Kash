<div class="max-w-md w-full mx-auto mt-12">
    <div class="bg-white dark:bg-zinc-900 shadow-xl rounded-2xl p-8 space-y-6">
        <!-- Header -->
        <x-auth-header
            :title="__('Masuk ke Akun Anda')"
            :description="__('Masukkan email dan kata sandi Anda untuk mengakses dashboard.')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-sm text-green-600 dark:text-green-400" :status="session('status')" />

        <!-- Form -->
        <form wire:submit="login" class="space-y-5" aria-label="Formulir masuk">
            <!-- Email Address -->
            <flux:input
                wire:model.lazy="email"
                id="email"
                :label="__('Alamat Email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
                aria-label="Alamat Email"
            />
            @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror

            <!-- Password -->
            <div class="space-y-1">
                <div class="flex items-center justify-between">
                    <label for="password" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                        {{ __('Kata Sandi') }}
                    </label>
                    @if (Route::has('password.request'))
                        <flux:link :href="route('password.request')" wire:navigate class="text-sm text-primary-600 hover:underline">
                            {{ __('Lupa sandi?') }}
                        </flux:link>
                    @endif
                </div>
                <flux:input
                    wire:model.lazy="password"
                    id="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    viewable
                    aria-label="Kata Sandi"
                />
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <flux:checkbox wire:model="remember" :label="__('Ingat saya')" />

            <!-- Submit -->
            <flux:button variant="primary" type="submit" class="w-full">
                {{ __('Masuk') }}
            </flux:button>
        </form>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
                <span>{{ __('Belum punya akun?') }}</span>
                <flux:link :href="route('register')" wire:navigate class="text-primary-600 hover:underline font-medium">
                    {{ __('Daftar') }}
                </flux:link>
            </div>
        @endif
    </div>
</div>