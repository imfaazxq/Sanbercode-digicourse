
<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Brand Logo -->
  <a href="/" class="navbar-brand ml-4">
    <i class="fas fa-film mr-2" style="color: var(--secondary-color);"></i>
    <span class="font-weight-bold">CineWorld</span>
  </a>

  <!-- Navbar Toggler -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar Content -->
  <div class="collapse navbar-collapse" id="navbarContent">
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-4 mr-3">
      <li class="nav-item mx-2">
        <a href="/" class="nav-link">
          <i class="fas fa-home mr-1"></i> Dashboard
        </a>
      </li>
      @auth
      <li class="nav-item mx-2">
        <a href="/genre" class="nav-link">
          <i class="fas fa-tags mr-1"></i> Genres
        </a>
      </li>
      @endauth
      <li class="nav-item mx-2">
        <a href="/film" class="nav-link">
          <i class="fas fa-video mr-1"></i> Films
        </a>
      </li>
    </ul>

    <!-- Search Form -->
    <div class="nav-search-form mx-auto">
  <form class="form-inline" action="{{ route('film.search') }}" method="GET">
    <div class="input-group">
      <input class="form-control form-control-sm rounded-pill" type="search" name="query" placeholder="Search films..." aria-label="Search" value="{{ request('query') }}">
      <div class="input-group-append">
        <button class="btn btn-sm btn-outline-light rounded-pill ml-2" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
</div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-4">
      @auth
      <!-- User Dropdown -->
      <li class="nav-item dropdown user-dropdown mx-2">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
          <i class="fas fa-user-circle mr-1"></i>
          <span>{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown">
          <a class="dropdown-item py-2" href="/profile">
            <i class="fas fa-user-circle mr-2"></i> Profile
          </a>
          <a class="dropdown-item py-2" href="/settings">
            <i class="fas fa-cog mr-2"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger py-2">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
          </form>
        </div>
      </li>
      @endauth
      
      @guest
      <li class="nav-item mx-1">
        <a href="/login" class="btn btn-outline-light nav-btn rounded-pill px-3 py-1">
          <i class="fas fa-sign-in-alt mr-1"></i> Login
        </a>
      </li>
      <li class="nav-item mx-1">
        <a href="/register" class="btn btn-primary nav-btn rounded-pill px-3 py-1">
          <i class="fas fa-user-plus mr-1"></i> Register
        </a>
      </li>
      @endguest
    </ul>
  </div>
</nav>

<!-- Add this CSS to your stylesheet or in a <style> tag in your layout -->
<style>
:root {
  --navbar-height: 58px;
  --primary-color:#1a1212;
  --secondary-color:#aa0000; 
  --accent-color:#660000; 
}
  
  body {
    padding-top: var(--navbar-height); /* Create space for the fixed navbar */
  }
  
  .main-header {
    height: var(--navbar-height);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1030;
    background: linear-gradient(135deg, #1a1212 0%, #2a2020 100%); 0%);
  }
  
  .navbar-brand {
    font-size: 1.4rem;
    letter-spacing: 0.5px;
    padding: 0.25rem 0;
  }
  
  .navbar-brand i {
    color: var(--secondary-color);
    font-size: 1.2rem;
  }
  
  .nav-link {
    font-size: 0.9rem;
    font-weight: 500;
    padding: 0.4rem 0.7rem !important;
    transition: all 0.2s ease;
    letter-spacing: 0.2px;
    border-radius: 4px;
    margin-top: 2px;
  }
  
  .nav-link:hover {
  background-color: rgba(170, 0, 0, 0.15); 
  transform: translateY(-1px);
  color: #ff9999;
}
  
  .nav-link i {
    font-size: 0.8rem;
    opacity: 0.9;
  }
  
  .nav-search-form {
    max-width: 260px;
    width: 100%;
    position: relative;
  }
  
  .nav-search-form .form-control {
    background-color: rgba(255, 255, 255, 0.08);
    border: none;
    color: #fff;
    padding-left: 15px;
    font-size: 0.85rem;
    height: calc(1.8em + 0.5rem + 2px);
    transition: all 0.3s ease;
  }
  
  .nav-search-form .form-control:focus {
    background-color: rgba(255, 255, 255, 0.12);
    box-shadow: 0 0 0 0.2rem rgba(170, 0, 0, 0.25); 
  }
  
  .nav-search-form .form-control::placeholder {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.85rem;
  }
  
  .nav-search-form .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.85rem;
    transition: all 0.2s ease;
  }
  
  .nav-search-form .btn:hover {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
  }
  
  .nav-btn {
    font-size: 0.85rem;
    font-weight: 500;
    margin-left: 8px;
    letter-spacing: 0.2px;
    transition: all 0.2s ease;
    padding: 0.3rem 1rem !important;
  }
  
  .nav-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  
  .btn-primary {
    background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
  border-color: #ff0844;
  box-shadow: 0 4px 10px rgba(255, 8, 68, 0.3);
  }
  
  .btn-primary:hover {
    background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
  border-color: #ff0844;
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgba(255, 8, 68, 0.4);
  }
  
  .user-dropdown .dropdown-menu {
    margin-top: 10px;
    border: none;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    min-width: 200px;
  }
  
  .user-dropdown .dropdown-item {
    font-size: 0.9rem;
    padding: 0.5rem 1.25rem;
    transition: all 0.2s ease;
  }
  
  .user-dropdown .dropdown-item:hover {
    background-color: rgba(255, 8, 68, 0.1);
  }
  
  .user-dropdown .dropdown-item i {
    opacity: 0.8;
    width: 16px;
    text-align: center;
  }
  
  @media (max-width: 992px) {
    .nav-search-form {
      margin: 12px 0;
      max-width: 100%;
    }
    
    .navbar-collapse {
      padding: 10px 0;
    }
    
    .nav-link {
      padding: 0.6rem 0.8rem !important;
      margin: 2px 0;
    }
    
    .navbar-nav {
      padding-left: 10px;
    }
    
    .user-dropdown .dropdown-menu {
      margin-top: 0;
      margin-bottom: 10px;
      box-shadow: none;
      border: 1px solid rgba(255, 255, 255, 0.1);
      background-color: rgba(255, 255, 255, 0.05);
    }
    
    .user-dropdown .dropdown-item {
      color: rgba(255, 255, 255, 0.8);
    }
    
    .nav-btn {
      margin: 5px 0;
      display: block;
      width: 100%;
      text-align: left;
    }
  }
</style>