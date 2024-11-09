<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <!-- Left Side: Two Logos -->
    <div class="d-flex align-items-center">
      <!-- First Logo -->
      <a href="{{ url('/') }}" class="navbar-brand d-inline-flex align-items-center">
        <img src="{{ url('img/utm logo.png') }}" alt="UTM logo" style="height: 40px;">
      </a>

      <!-- Second Logo -->
      <a href="{{ url('/') }}" class="navbar-brand d-inline-flex align-items-center ms-2">
        <img src="{{ asset('img/omm_logo.png') }}" alt="Oh My Merits Logo" style="height: 50px;">
      </a>
    </div>
    
    <!-- Center: Search Bar with a Dedicated Class -->
    <div class="search-bar-container mx-auto">
      <form action="{{ route('search') }}" method="GET" class="d-flex">
        <input type="text" name="query" class="form-control search-input" placeholder="Search...">
        <button type="submit" class="btn custom-search-btn" style="background-color: #750000 !important; color: white !important; border: none;" >
          <img src="{{ asset('img/search_icon.png') }}" alt="Search Icon" style="width: 16px; height: 16px;">
        </button>
      </form>
    </div>
    
  </div>
</nav>
