<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <!-- Left Side: Two Logos and Navigation Links -->
    <div class="d-flex align-items-center">
      <!-- First Logo -->
      <a href="{{ url('/') }}" class="navbar-brand d-inline-flex align-items-center">
        <img src="{{url('img/utm logo.png')}}" alt="UTM logo" style="height: 40px;">
      </a>

      <!-- Second Logo -->
      <a href="{{ url('/') }}" class="navbar-brand d-inline-flex align-items-center ms-2">
        <img src="{{ asset('img/omm_logo.png') }}" alt="Oh My Merits Logo" style="height: 50px;">
      </a>

      <!--Search Button -->
      <form action="{{ route('search') }}" method="GET" class="ms-3 d-flex">
        <input type="text" name="query" class="form-control" placeholder="Search..." style="width: 200px;">
        <button type="submit" class="btn btn-primary ms-2">Search</button>
      </form>
      
    </div>
       
  </div>
</nav>