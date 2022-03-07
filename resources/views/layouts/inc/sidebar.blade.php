<aside
  class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
  id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" target="_blank">
      <span class="font-size-lg text-white text-center" style="font-family: 'Moon Dance', cursive; font-size:25px">Origami</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  {{-- collapse navbar-collapse --}}
  <div class="  w-auto  max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('/') ? 'active bg-gradient-primary' : '' }}"
         href="{{ url('/') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">home</i>
          </div>
          <span class="nav-link-text ms-1">Home Page</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('dashboard') ? 'active bg-gradient-primary' : '' }}"
         href="{{ url('dashboard') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('users') ? 'active bg-gradient-primary' : '' }}"
         href="{{ url('users') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-icons">person</span>
          </div>
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('orders') ? 'active bg-gradient-primary' : '' }}"
         href="{{ url('orders') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shipping-fast"></i>
          </div>
          <span class="nav-link-text ms-1">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('categories') ? 'active bg-gradient-primary' : '' }}"
          href="{{ url('categories') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-icons">category</span>
          </div>
          <span class="nav-link-text ms-1">Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('add-category') ? 'active bg-gradient-primary' : '' }}"
          href="{{ url('add-category') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-icons">add_to_photos </span>
          </div>
          <span class="nav-link-text ms-1">Add Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('products') ? 'active bg-gradient-primary' : '' }}"
          href="{{ url('products') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-icons">apps</span>
          </div>
          <span class="nav-link-text ms-1">Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ Request::is('add-product') ? 'active bg-gradient-primary' : '' }}"
          href="{{ url('add-product') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-icons">add_business </span>
          </div>
          <span class="nav-link-text ms-1">Add Products</span>
        </a>
      </li>
      <li class="nav-item mt-3 ">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="../pages/profile.html">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">login</i>
          </div>
          <span class="nav-link-text ms-1">{{ __('Logout') }}</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>

</aside>