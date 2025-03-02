<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CineWorld | Registration</title>

  <!-- Google Font: Montserrat -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Admin/dist/css/adminlte.min.css')}}">
  <style>
    /* General Styles */
    body {
      font-family: 'Montserrat', sans-serif;
      color: #333;
      background-color: #f9f9f9;
      background-image: url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(0, 0, 0, 0.9) 0%, rgba(20, 20, 20, 0.6) 100%);
      z-index: -1;
    }
    
    .register-box {
      width: 450px;
      max-width: 100%;
      margin: 0 auto;
      z-index: 10;
    }
    
    .card {
      border-radius: 16px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      border: none;
      overflow: hidden;
    }
    
    .card-primary.card-outline {
      border-top: none;
    }
    
    .card-header {
      background: linear-gradient(135deg, #1c1c1c 0%, #2d2d2d 100%);
      padding: 25px 20px;
      border-bottom: none;
    }
    
    .card-header a.h1 {
      font-weight: 800;
      letter-spacing: 1px;
      color: white;
      text-decoration: none;
    }
    
    .card-header a.h1 b {
      color: #ff2c55;
    }
    
    .card-body {
      padding: 40px 30px;
      background-color: white;
    }
    
    .login-box-msg {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 25px;
      color: #333;
      text-align: center;
    }
    
    .input-group {
      margin-bottom: 25px;
    }
    
    .input-group-text {
      background-color: #f8f9fa;
      border-color: #ced4da;
      color: #ff2c55;
    }
    
    .form-control {
      height: 50px;
      font-size: 1rem;
      border-radius: 0.25rem;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #ff2c55 0%, #ff0844 100%);
      border: none;
      padding: 12px 20px;
      font-weight: 600;
      letter-spacing: 1px;
      border-radius: 50px;
      box-shadow: 0 10px 25px rgba(255, 8, 68, 0.3);
      transition: all 0.4s;
    }
    
    .btn-primary:hover {
      background: linear-gradient(135deg, #ff0844 0%, #ff2c55 100%);
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(255, 8, 68, 0.4);
    }
    
    .alert-danger {
      border-radius: 10px;
      background-color: rgba(255, 8, 68, 0.1);
      border-color: rgba(255, 8, 68, 0.2);
      color: #ff0844;
    }
    
    a {
      color: #ff2c55;
      transition: all 0.3s;
    }
    
    a:hover {
      color: #ff0844;
      text-decoration: none;
    }
    
    .text-center {
      text-align: center;
    }
    
    /* Animation */
    .card {
      animation: fadeIn 0.8s ease-out;
    }
    
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Cine</b>World</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Create your account to start your cinematic journey</p>

      <form action="{{ route('register') }}" method="post">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
      @endif
        @csrf
        <div class="input-group">
          <input type="text" class="form-control" name="name" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div>
          <button type="submit" class="btn btn-primary btn-block my-4">Register</button>
        </div>
      </form>

      <p class="mb-0 text-center">
        <a href="/login">I already have a membership</a>
      </p>
      <p class="mb-0 text-center mt-3">
        <a href="{{ url('/') }}" class="text-muted">
          <i class="fas fa-arrow-left mr-1"></i> Back to home
        </a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('Admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>