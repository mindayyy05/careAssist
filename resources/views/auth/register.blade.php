<x-guest-layout>
    <!-- Background Image -->
    <div class="background-container">

        <!-- Centered Form -->
        <div class="form-container">

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="registration-form">
                @csrf

                <x-slot name="logo">
                    <!-- You can add your logo here if needed -->
                </x-slot>

                <!-- Fields in Rows -->
                <div class="form-row">
                    <div class="form-field">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="input-field" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                    </div>

                    <div class="form-field">
                        <x-label for="username" value="{{ __('Username') }}" />
                        <x-input id="username" class="input-field" type="text" name="username" :value="old('username')"
                            required autocomplete="username" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="input-field" type="email" name="email" :value="old('email')"
                            required autocomplete="email" />
                    </div>

                    <div class="form-field">
                        <x-label for="phone" value="{{ __('Phone') }}" />
                        <x-input id="phone" class="input-field" type="text" name="phone" :value="old('phone')"
                            required autocomplete="phone" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <x-label for="nic" value="{{ __('NIC') }}" />
                        <x-input id="nic" class="input-field" type="text" name="nic" :value="old('nic')"
                            required autocomplete="nic" />
                    </div>

                    <div class="form-field">
                        <x-label for="age" value="{{ __('Age') }}" />
                        <x-input id="age" class="input-field" type="number" name="age" :value="old('age')"
                            required autocomplete="age" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <x-label for="city" value="{{ __('City') }}" />
                        <select id="city" name="city" class="input-field" required>
                            <option value="">Select City</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Galle">Galle</option>
                            <!-- Add all 25 districts here as options -->
                        </select>
                    </div>

                    <div class="form-field">
                        <x-label for="street" value="{{ __('Street Name') }}" />
                        <x-input id="street" class="input-field" type="text" name="street" :value="old('street')"
                            required autocomplete="street" />
                    </div>

                    <div class="form-field">
                        <x-label for="house_number" value="{{ __('House Number') }}" />
                        <x-input id="house_number" class="input-field" type="text" name="house_number"
                            :value="old('house_number')" required autocomplete="house_number" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-field">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="input-field" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <div class="form-field">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="input-field" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="terms-container">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="terms-text">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="register ms-4" data-test="register-button">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .background-container {
            background-image: url('{{ asset('images/loginbg.jpeg') }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            padding: 2rem;
            border-radius: 10px;
            width: 100%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.8);
        }

        .registration-form {
            background: transparent;
            border: none;
            padding: 0;
        }

        .input-field {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 0.75rem;
            font-size: 1rem;
            color: #333;
            width: 100%;
        }

        .form-row {
            display: flex;
            gap: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .form-field {
            flex: 1;
        }

        .form-field select,
        .form-field input[type="text"],
        .form-field input[type="number"],
        .form-field input[type="email"],
        .form-field input[type="password"] {
            width: 100%;
        }

        .terms-container {
            display: flex;
            align-items: center;
        }

        .terms-text {
            margin-left: 0.5rem;
        }

        .register {
            background-color: #4A90E2;
            /* Button color */
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .register:hover {
            background-color: #357ABD;
            /* Darker color on hover */
        }
    </style>
</x-guest-layout>
