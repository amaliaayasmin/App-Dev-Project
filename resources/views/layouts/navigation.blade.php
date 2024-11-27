<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a style="margin-right: 40px;"> 
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- Dynamic Dashboard Link -->
                    @if(auth()->guard('organizer')->check())
                        <x-nav-link :href="route('organizer.dashboard')" :active="request()->routeIs('organizer.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @elseif(auth()->guard('web')->check()) 
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif

                    <!-- Feed (For Students and Organizers) -->
                    @if(auth()->guard('organizer')->check() || auth()->guard('web')->check())
                        <x-nav-link :href="route('feed')" :active="request()->routeIs('feed')">
                            {{ __('Feed') }}
                        </x-nav-link>
                    @endif

                    <!-- Post (For Organizers Only) -->
                    @if(auth()->guard('organizer')->check())
                        <x-nav-link :href="route('post.index')" :active="request()->routeIs('post.*')">
                            {{ __('Post') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <!-- Safely display the user's name if authenticated -->
                            @if(auth()->guard('organizer')->check())
                                <div>{{ Auth::guard('organizer')->user()->name }}</div>
                            @elseif(auth()->guard('admin')->check())
                                <div>{{ Auth::guard('admin')->user()->name }}</div>
                            @elseif(auth()->guard('web')->check())
                                <div>{{ Auth::user()->name }}</div>
                            @else
                                <div>{{ __('Guest') }}</div>
                            @endif

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Profile Link -->
                        <x-dropdown-link :href="auth()->guard('admin')->check() 
                                            ? route('admin.dashboard') 
                                            : (auth()->guard('organizer')->check() 
                                                ? route('organizer.dashboard') 
                                                : route('profile.edit'))">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" 
                              action="{{ auth()->guard('admin')->check() 
                                            ? route('admin.logout') 
                                            : (auth()->guard('organizer')->check() 
                                                ? route('organizer.logout') 
                                                : route('logout')) }}">
                            @csrf
                            <x-dropdown-link :href="auth()->guard('admin')->check() 
                                                ? route('admin.logout') 
                                                : (auth()->guard('organizer')->check() 
                                                    ? route('organizer.logout') 
                                                    : route('logout'))"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- Feed (For Students and Organizers) -->
            @if(auth()->guard('organizer')->check() || auth()->guard('web')->check())
                <x-responsive-nav-link :href="route('feed')" :active="request()->routeIs('feed')">
                    {{ __('Feed') }}
                </x-responsive-nav-link>
            @endif

            <!-- Post (For Organizers Only) -->
            @if(auth()->guard('organizer')->check())
                <x-responsive-nav-link :href="route('post.index')" :active="request()->routeIs('post.*')">
                    {{ __('Post') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <!-- Safely display the user's name and email if authenticated -->
                @if(auth()->check())
                    <div class="font-medium text-base text-gray-800">
                        @if(auth()->guard('organizer')->check())
                            {{ Auth::guard('organizer')->user()->name }}
                        @elseif(auth()->guard('admin')->check())
                            {{ Auth::guard('admin')->user()->name }}
                        @elseif(auth()->guard('web')->check())
                            {{ Auth::user()->name }}
                        @else
                            {{ __('Guest') }}
                        @endif
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        {{ auth()->check() ? Auth::user()->email : '' }}
                    </div>
                @else
                    <div class="font-medium text-base text-gray-800">{{ __('Guest') }}</div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <!-- Profile -->
                <x-responsive-nav-link :href="auth()->guard('admin')->check() 
                                            ? route('admin.dashboard') 
                                            : (auth()->guard('organizer')->check() 
                                                ? route('organizer.dashboard') 
                                                : route('profile.edit'))">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Logout -->
                <form method="POST" 
                      action="{{ auth()->guard('admin')->check() 
                                    ? route('admin.logout') 
                                    : (auth()->guard('organizer')->check() 
                                        ? route('organizer.logout') 
                                        : route('logout')) }}">
                    @csrf
                    <x-responsive-nav-link :href="auth()->guard('admin')->check() 
                                            ? route('admin.logout') 
                                            : (auth()->guard('organizer')->check() 
                                                ? route('organizer.logout') 
                                                : route('logout'))"
                                         onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
