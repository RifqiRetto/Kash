<div class="max-w-md w-full mx-auto mt-12">
    <div class="bg-white dark:bg-zinc-900 shadow-xl rounded-2xl p-8 space-y-6 text-center">
        <!-- Header -->
        <x-auth-header
            :title="__('Email Verification')"
            :description="__('Verify your email to continue')"
        />

        <!-- Info Message -->
        <flux:text>
            {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
        </flux:text>

        <!-- Success Message -->
        @if (session('status') === 'verification-link-sent')
            <flux:text class="font-medium text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </flux:text>
        @endif

        <!-- Actions -->
        <div class="space-y-4">
            <flux:button
                wire:click="sendVerification"
                variant="primary"
                class="w-full"
            >
                {{ __('Resend verification email') }}
            </flux:button>

            <flux:link
                wire:click="logout"
                class="text-sm text-zinc-600 dark:text-zinc-400 underline cursor-pointer"
            >
                {{ __('Log out') }}
            </flux:link>
        </div>
    </div>
</div>