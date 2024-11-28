<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Logo -->
    <div class="flex justify-center mb-4">
        <img src="{{ asset('img/omm_logo_removebg.png') }}" alt="Logo" class="h-40 w-auto">
    </div>

    <h3 class="text-left mb-3">Organizer Login Page</h3>

    <form method="POST" action="{{ route('organizer.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <!-- Remember Me -->
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Log In Button -->
        <div class="mt-6"> 
            <x-primary-button 
            class="block w-full text-white font-bold py-2 px-4 rounded flex justify-center items-center"
            style="background-color: #750000; hover:bg-red-800">
            {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Register-->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                {{ __('Join with us?') }} 
                <a href="{{ route('organizer.register') }}" class="text-blue-500 hover:underline">
                    {{ __('Create an account, it’s free') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
