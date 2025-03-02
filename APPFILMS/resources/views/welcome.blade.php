@extends('layouts.master')


@section('custom_content')
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="site-title">Welcome to CineWorld</h1>
        <p class="site-description">Where cinematic dreams come to life</p>
        <a href="{{ url('/film') }}" class="btn-explore">Discover Movies</a>
    </div>
</div>

<div class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-film"></i>
                    </div>
                    <h3>Extensive Library</h3>
                    <p>Explore thousands of titles across every genre, from timeless classics to the latest blockbusters</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Ratings & Reviews</h3>
                    <p>Discover what others think and share your own opinions about your favorite films</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <h3>Coming Soon</h3>
                    <p>Stay updated with upcoming releases and be the first to know about new arrivals</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="join-section">
    <div class="container">
        <div class="join-card">
            <h2>Join CineWorld Today</h2>
            <p>Create your account and start your cinematic journey with us. It's free and takes just a moment to get started.</p>
            <div class="join-buttons">
                <a href="{{ url('/register') }}" class="btn-register">Sign Up</a>
                <a href="{{ url('/film') }}" class="btn-browse">Browse Movies</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* General Styles */
    body {
        font-family: 'Montserrat', sans-serif;
        color: #333;
        background-color: #f9f9f9;
    }
    
    /* Hero Section */
    .hero-section {
    position: relative;
    height: 100vh; /* Changed from 600px to 100vh for full viewport height */
    width: 100%;
    background-image: url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    color: white;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0; /* Changed from 80px to 0 */
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.9) 0%, rgba(20, 20, 20, 0.6) 100%);
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 0 20px;
    }
    
    .site-title {
        font-size: 4.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        letter-spacing: 1px;
        animation: fadeInDown 1.2s ease-out;
    }
    
    .site-description {
        font-size: 1.8rem;
        margin-bottom: 40px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        font-weight: 300;
        letter-spacing: 1px;
        animation: fadeInUp 1.2s ease-out;
    }
    
    .btn-explore {
        display: inline-block;
        background: linear-gradient(135deg, #ff2c55 0%, #ff0844 100%);
        color: white;
        padding: 16px 40px;
        font-size: 1.2rem;
        font-weight: 600;
        border-radius: 50px;
        letter-spacing: 1px;
        text-decoration: none;
        transition: all 0.4s;
        box-shadow: 0 10px 25px rgba(255, 8, 68, 0.5);
        animation: fadeIn 1.5s ease-out;
    }
    
    .btn-explore:hover {
        background: linear-gradient(135deg, #ff0844 0%, #ff2c55 100%);
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(255, 8, 68, 0.6);
        text-decoration: none;
        color: white;
    }
    
    /* Features Section */
    .features-section {
        padding: 40px 0 80px;
    }
    
    .feature-card {
        background-color: white;
        border-radius: 16px;
        padding: 40px 30px;
        height: 100%;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        transition: all 0.4s;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .feature-icon {
        font-size: 3rem;
        color: #ff0844;
        margin-bottom: 25px;
        background: rgba(255, 8, 68, 0.1);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s;
    }
    
    .feature-card:hover .feature-icon {
        background: rgba(255, 8, 68, 0.2);
        transform: scale(1.1);
    }
    
    .feature-card h3 {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: #333;
    }
    
    .feature-card p {
        color: #666;
        font-size: 1.05rem;
        line-height: 1.6;
    }
    
    /* Join Section */
    .join-section {
        padding: 40px 0 100px;
    }
    
    .join-card {
        background: linear-gradient(135deg, #1c1c1c 0%, #2d2d2d 100%);
        border-radius: 16px;
        padding: 60px;
        text-align: center;
        color: white;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
    }
    
    .join-card h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .join-card p {
        font-size: 1.2rem;
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        color: #e0e0e0;
    }
    
    .join-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .btn-register {
        display: inline-block;
        background: linear-gradient(135deg, #ff2c55 0%, #ff0844 100%);
        color: white;
        padding: 14px 35px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.4s;
        box-shadow: 0 10px 25px rgba(255, 8, 68, 0.4);
    }
    
    .btn-register:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(255, 8, 68, 0.5);
        text-decoration: none;
        color: white;
    }
    
    .btn-browse {
        display: inline-block;
        background: transparent;
        color: white;
        padding: 13px 35px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.4s;
        border: 2px solid rgba(255, 255, 255, 0.6);
    }
    
    .btn-browse:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-color: white;
        transform: translateY(-5px);
        text-decoration: none;
        color: white;
    }
    
    /* Animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .site-title {
            font-size: 3rem;
        }
        
        .site-description {
            font-size: 1.4rem;
        }
        
        .join-card {
            padding: 40px 20px;
        }
    }
</style>
@endsection