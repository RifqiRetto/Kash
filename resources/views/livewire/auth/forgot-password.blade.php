<div class="max-w-md w-full mx-auto mt-12">
    <div class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
        <!-- Header -->
        <x-auth-header
            :title="__('Lupa Kata Sandi')"
            :description="__('Masukkan email Anda untuk menerima tautan reset kata sandi.')"
        />

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-sm text-green-600" :status="session('status')" />

        <!-- Form -->
        <form wire:submit="sendPasswordResetLink" class="space-y-5">
            <!-- Email Address -->
            <flux:input
                wire:model.lazy="email"
                :label="__('Alamat Email')"
                type="email"
                required
                autofocus
                placeholder="email@example.com"
            />
            @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror

            <!-- Submit Button -->
            <flux:button variant="primary" type="submit" class="w-full">
                {{ __('Kirim Tautan Reset Sandi') }}
            </flux:button>
        </form>

        <!-- Return to Login -->
        <div class="text-center text-sm text-zinc-500">
            <span>{{ __('Atau, kembali ke') }}</span>
            <flux:link :href="route('login')" wire:navigate class="text-primary-600 hover:underline font-medium">
                {{ __('masuk') }}
            </flux:link>
        </div>
    </div>
</div>