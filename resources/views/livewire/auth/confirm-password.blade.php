<div class="max-w-md w-full mx-auto mt-12">
    <div class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
        <!-- Header -->
        <x-auth-header
            :title="__('Konfirmasi Kata Sandi')"
            :description="__('Ini area aman dari aplikasi. Silakan konfirmasi kata sandi Anda untuk melanjutkan.')"
        />

        <!-- Status Session -->
        <x-auth-session-status class="text-sm text-center text-green-600" :status="session('status')" />

        <!-- Form -->
        <form wire:submit="confirmPassword" class="space-y-5">
            <!-- Password Input -->
            <flux:input
                wire:model.lazy="password"
                :label="__('Kata Sandi')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Masukkan kata sandi Anda')"
                viewable
            />
            @error('password')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror

            <!-- Submit Button -->
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Konfirmasi') }}
            </flux:button>
        </form>
    </div>
</div>