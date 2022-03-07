<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" style="font-family: 'Moon Dance', cursive;" href="{{ url('/') }}">
      <h2>Origami</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('category') }}"><i class="fas fa-cubes"></i> Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('wishlist') }}"><i class="fas fa-heart"></i> Wishlist
            <span class="badge bade-pill bg-success wishlist-count">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i> Cart
            <span class="badge bade-pill bg-primary cart-count">0</span>
          </a>
        </li>
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-user"></i> {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="{{ url('my-orders') }}">
                <i class="fas fa-shipping-fast"></i> My Orders
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="">
                <i class="fas fa-user"></i> My Profile
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
