<!-- resources/views/include/sidebar.blade.php -->

<div class="col-md-2 bg-light vh-100 p-3">
    <nav class="nav flex-column">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <img src="{{ asset('img/home_icon.png') }}" alt="Home Icon" style="width: 20px; height: 20px;" class="me-2">
            Home
        </a>
        <a href="{{ route('messages') }}" class="nav-link d-flex align-items-center">
            <img src="{{ asset('img/chat_icon.png') }}" alt="Messages Icon" style="width: 20px; height: 20px;" class="me-2">
            Messages
        </a>
        <a href="{{ route('calendar') }}" class="nav-link d-flex align-items-center">
            <img src="{{ asset('img/calender_icon.png') }}" alt="Calendar Icon" style="width: 20px; height: 20px;" class="me-2">
            Calendar
        </a>
        <a href="{{ route('saved.events') }}" class="nav-link d-flex align-items-center">
            <img src="{{ asset('img/saved_icon.png') }}" alt="Saved Events Icon" style="width: 20px; height: 20px;" class="me-2">
            Saved Events
        </a>
        <a href="{{ route('profile') }}" class="nav-link d-flex align-items-center">
            <img src="{{ asset('img/profile_icon.png') }}" alt="Profile Icon" style="width: 20px; height: 20px;" class="me-2">
            Profile
        </a>

        <a href="{{ route('logout') }}" class="nav-link d-flex align-items-center">
              <img src="{{ asset('img/logout_icon.png') }}" alt="Logout Icon" style="width: 20px; height: 20px;" class="me-2">
              Logout
       </a>

    </nav>
</div>
