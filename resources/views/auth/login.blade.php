<x-guest-layout>
    <div class="background-container">
        <div class="form-container">
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="status-message mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <div class="form-group">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="input-field" type="email" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                </div>

                <div class="form-group mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="input-field" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="form-group mt-4 remember-me">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="form-actions flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="login-button ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .background-container {
            background-image: url('{{ asset('images/registerbg.jpeg') }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            padding: 2rem;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            /* Decreased max-width for less width */
        }

        .status-message {
            font-medium: 1rem;
            color: #4CAF50;
            /* Green color for success messages */
        }

        .login-form {
            background: transparent;
            border: none;
            padding: 0;
        }

        .input-field {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 1rem;
            font-size: 1rem;
            color: #333;
            width: 90%;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .remember-me {
            margin-top: 1rem;
        }

        .forgot-password {
            text-decoration: underline;
            color: #4A90E2;
            /* Color for the "Forgot your password?" link */
            font-size: 0.875rem;
        }

        .forgot-password:hover {
            color: #1D72B8;
            /* Darker color on hover */
        }

        .login-button {
            background-color: #4A90E2;
            /* Button color */
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #357ABD;
            /* Darker color on hover */
        }
    </style>
</x-guest-layout>
