<section>
    <header>
        <h2>{{ __('Update Password') }}</h2>
        <p class="mt-1 text-secondary">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-2 pos-relative">
            <label for="current_password">{{ __('Current Password') }}</label>
            <input class="form-control dark @error('current_password', 'updatePassword') is-invalid @enderror"
                type="password" name="current_password" id="current_password" autocomplete="current-password">

            @error('current_password', 'updatePassword')
                <div class="invalid-feedback d-block fade-message">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-2 pos-relative">
            <label for="password">{{ __('New Password') }}</label>
            <input class="form-control dark @error('password', 'updatePassword') is-invalid @enderror" type="password"
                name="password" id="password" autocomplete="new-password">

            @error('password', 'updatePassword')
                <div class="invalid-feedback d-block fade-message">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-2 pos-relative">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input class="form-control dark @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">

            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback d-block fade-message">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Save Button + Success Message -->
        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-outline-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p id="status-message" class="fs-5 text-success mb-0"
                    style="opacity: 1; transition: opacity 0.5s ease;">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-hide validation error messages
        document.querySelectorAll('.fade-message').forEach(el => {
            setTimeout(() => {
                el.style.opacity = '0';
                el.style.transition = 'opacity 0.5s ease';
                setTimeout(() => {
                    el.style.display = 'none';
                }, 500);
            }, 3000); // hide after 3 seconds
        });

        // Auto-hide success message
        const successMsg = document.getElementById('status-message');
        if (successMsg) {
            setTimeout(() => {
                successMsg.style.opacity = '0';
                setTimeout(() => {
                    successMsg.style.display = 'none';
                }, 500);
            }, 3000); // hide after 3 seconds
        }
    });
</script>
