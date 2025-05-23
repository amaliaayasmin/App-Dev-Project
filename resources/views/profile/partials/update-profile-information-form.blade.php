<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information, email address, and other details.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Profile Image -->
        <div>
            <x-input-label for="profile_image" :value="__('Profile Image')" />
            @if ($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-20 h-20  object-cover mt-2">
            @endif
            <input id="profile_image" name="profile_image" type="file" class="mt-2 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
        </div>

        <!-- Header Image -->
        <div>
            <x-input-label for="header_image" :value="__('Header Image')" />
            @if ($user->header_image)
                <img src="{{ asset('storage/' . $user->header_image) }}" alt="Header Image" class="w-20 h-20  object-cover mt-2">
            @endif
            <input id="header_image" name="header_image" type="file" class="mt-2 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('header_image')" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
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

        <!-- University -->
        <div>
            <x-input-label for="university" :value="__('University')" />
            <x-text-input id="university" name="university" type="text" class="mt-1 block w-full" :value="old('university', $user->university)" />
            <x-input-error class="mt-2" :messages="$errors->get('university')" />
        </div>

        <!-- Faculty -->
        <div>
            <x-input-label for="faculty" :value="__('Faculty')" />
            <x-text-input id="faculty" name="faculty" type="text" class="mt-1 block w-full" :value="old('faculty', $user->faculty)" />
            <x-input-error class="mt-2" :messages="$errors->get('faculty')" />
        </div>

        <!-- Languages -->
        <div>
            <x-input-label for="languages" :value="__('Languages')" />
            <x-text-input id="languages" name="languages" type="text" class="mt-1 block w-full" :value="old('languages', $user->languages)" placeholder="e.g., English, French, Spanish" />
            <x-input-error class="mt-2" :messages="$errors->get('languages')" />
        </div>

        <!-- Location -->
        <div>
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $user->location)" placeholder="e.g., New York, USA" />
            <x-input-error class="mt-2" :messages="$errors->get('location')" />
        </div>

        <!-- Experience -->
        <div>
            <x-input-label for="experience" :value="__('Experience')" />
            <textarea id="experience" name="experience" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" rows="5">{{ old('experience', $user->experience) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('experience')" />
        </div>

        <!-- Save Button and Flash Message -->
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
