<div class="max-w-md w-full mx-auto mt-12">
    <div class="bg-white dark:bg-zinc-900 shadow-xl rounded-2xl p-8 space-y-6">
        <!-- Header -->
        <x-auth-header
            :title="__('Reset Password')"
            :description="__('Please enter your new password below.')"
        />

        <!-- Session Status -->
        <x-auth-session-status
            class="text-center text-sm text-green-600 dark:text-green-400"
            :status="session('status')"
        />

        <!-- Form -->
        <form wire:submit="resetPassword" class="space-y-5" aria-label="Formulir reset password">
            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
                aria-label="Email"
            />
            @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror

            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="new-password"
                placeholder="••••••••"
                viewable
                aria-label="Password"
            />
            @error('password')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror

            <!-- Confirm Password -->
            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm Password')"
                type="password"
                required
                autocomplete="new-password"
                placeholder="••••••••"
                viewable
                aria-label="Confirm Password"
            />
            @error('password_confirmation')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror

            <!-- Submit -->
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Reset Password') }}
            </flux:button>
        </form>
    </div>
</div>