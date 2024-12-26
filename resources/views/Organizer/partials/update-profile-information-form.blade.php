<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('organizer.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        
         <!-- Header Image -->
         <div>
            <x-input-label for="header_image" :value="__('Header Image')" />
            @if ($user->header_image)
                <img src="{{ asset('storage/' . $user->header_image) }}" alt="Header Image" class="w-20 h-20 object-cover mt-2">
            @endif
            <input id="header_image" name="header_image" type="file" class="mt-2 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('header_image')" />
        </div>


        <!-- Header Image -->
        <div>
            <x-input-label for="header_image" :value="__('Header Image')" />
            @if ($user->header_image)
                <img src="{{ asset('public' . $user->header_image) }}" alt="Header Image" class="w-20 h-20  object-cover mt-2">
            @endif
            <input id="header_image" name="header_image" type="file" class="mt-2 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('header_image')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="year_established" :value="__('Year Established')" />
            <x-text-input id="year_established" name="year_established" type="text" class="mt-1 block w-full" :value="old('year_established', $user->year_established)" placeholder="e.g., 2003" />
            <x-input-error class="mt-2" :messages="$errors->get('year_established')" />
        </div>

        <!--Description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" rows="5"> {{ old('description', $user->description) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
