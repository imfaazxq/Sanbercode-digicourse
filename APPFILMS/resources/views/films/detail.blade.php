@extends('layouts.master')

@section('title')
 Film Details | CineWorld
@endsection

@section('custom_content')
<div class="film-details-section">
    <div class="container">
        <div class="back-navigation">
            <a href="/film" class="btn-back">
                <i class="fas fa-arrow-left"></i> Back to Gallery
            </a>
        </div>
        
        <div class="film-showcase">
            <div class="film-poster-showcase">
                <img src="{{asset('uploads/' . $film->poster)}}" alt="{{$film->title}}">
                <span class="film-genre">{{$film->genre->name}}</span>
            </div>
            
            <div class="film-info">
                <h1 class="film-title">{{$film->title}}</h1>
                <div class="film-summary">
                    <p>{{$film->summary}}</p>
                </div>
            </div>
        </div>
        
        <div class="film-reviews">
            <div class="reviews-header">
                <h2 class="reviews-title">Film Reviews</h2>
            </div>
            
            @forelse ( $film->ListReviews as $item)
            <div class="review-card">
                <div class="review-header">
                    <span class="reviewer-name">{{$item->user->name}}</span>
                    <span class="review-rating">Rating: {{$item->point}}/10</span>
                </div>
                <div class="review-body">
                    <p class="review-content">{{$item->content}}</p>
                </div>
            </div>
            @empty
            <div class="empty-reviews">
                <div class="empty-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3>No Reviews Yet</h3>
                <p>Be the first to share your thoughts on this film</p>
            </div>
            @endforelse
            
            @auth
            <div class="review-form-container">
                <h3 class="form-title">Write a Review</h3>
                
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                
                <form action="/reviews/{{$film->id}}" method="POST" class="review-form">
                    @csrf
                    <div class="form-group">
                        <label for="point">Rating (1-10):</label>
                        <input type="number" name="point" id="point" class="form-control" min="1" max="10" value="{{ old('point') }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Your Review:</label>
                        <textarea class="form-control" name="content" id="content" rows="5" placeholder="Share your thoughts about this film">{{ old('content') }}</textarea>
                    </div>
                    <button type="submit" class="btn-submit-review">
                        <i class="fas fa-paper-plane"></i> Submit Review
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Dark Red Theme - Film Details Page Styling */
    .film-details-section {
        padding: 60px 0;
        background-color: #1a1212;
        min-height: calc(100vh - 200px);
        color: #e0e0e0;
    }
    
    .back-navigation {
        margin-bottom: 30px;
    }
    
    .btn-back {
        display: inline-block;
        background: linear-gradient(135deg, #3a2525 0%, #2a1818 100%);
        color: #f5f5f5;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 50px;
        letter-spacing: 1px;
        text-decoration: none;
        transition: all 0.4s;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }
    
    .btn-back:hover {
        background: linear-gradient(135deg, #4a3030 0%, #3a2525 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
        text-decoration: none;
        color: #ffffff;
    }
    
    .btn-back i {
        margin-right: 8px;
    }
    
    /* Film Showcase Styling */
    .film-showcase {
        display: flex;
        flex-direction: column;
        margin-bottom: 50px;
        background: #2a2020;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .film-poster-showcase {
        position: relative;
        text-align: center;
        padding: 30px;
        background: #231919;
    }
    
    .film-poster-showcase img {
        max-width: 300px;
        max-height: 450px;
        border-radius: 10px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    }
    
    .film-genre {
        position: absolute;
        top: 45px;
        right: calc(50% - 170px);
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    
    .film-info {
        padding: 30px;
    }
    
    .film-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: #ffffff;
        letter-spacing: 1px;
        text-align: center;
    }
    
    .film-summary {
        color: #c0c0c0;
        line-height: 1.8;
        font-size: 1.1rem;
        text-align: justify;
    }
    
    /* Reviews Section Styling */
    .film-reviews {
        margin-top: 40px;
    }
    
    .reviews-header {
        margin-bottom: 30px;
        text-align: center;
    }
    
    .reviews-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    
    .reviews-title:after {
        content: '';
        position: absolute;
        width: 60%;
        height: 3px;
        background: linear-gradient(90deg, transparent, #aa0000, transparent);
        bottom: -10px;
        left: 20%;
    }
    
    .review-card {
        background: #2a2020;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        margin-bottom: 25px;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .review-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(170, 0, 0, 0.2);
    }
    
    .review-header {
        background: linear-gradient(135deg, #3a2525 0%, #2a1818 100%);
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .reviewer-name {
        font-weight: 600;
        font-size: 1.1rem;
        color: #ffffff;
    }
    
    .review-rating {
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: white;
        padding: 5px 15px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .review-body {
        padding: 20px;
    }
    
    .review-content {
        color: #e0e0e0;
        line-height: 1.6;
        margin: 0;
    }
    
    /* Empty Reviews State */
    .empty-reviews {
        text-align: center;
        padding: 50px 20px;
        background-color: #2a2020;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .empty-icon {
        font-size: 3.5rem;
        color: #8a4a4a;
        margin-bottom: 20px;
    }
    
    .empty-reviews h3 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: rgb(255, 255, 255);
    }
    
    .empty-reviews p {
        font-size: 1.1rem;
        color: #c0c0c0;
        margin-bottom: 10px;
    }
    
    /* Review Form Styling */
    .review-form-container {
        background: #2a2020;
        border-radius: 16px;
        padding: 30px;
        margin-top: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .form-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 25px;
        color: #ffffff;
        text-align: center;
    }
    
    .review-form .form-group {
        margin-bottom: 20px;
    }
    
    .review-form label {
        font-weight: 600;
        color: #e0e0e0;
        margin-bottom: 10px;
        display: block;
    }
    
    .review-form .form-control {
        background-color: #3a2525;
        border: 1px solid #4a3535;
        color: #ffffff;
        border-radius: 8px;
        padding: 12px 15px;
    }
    
    .review-form .form-control:focus {
        background-color: #3a2525;
        border-color: #aa0000;
        box-shadow: 0 0 0 0.2rem rgba(170, 0, 0, 0.25);
        color: #ffffff;
    }
    
    .review-form textarea.form-control {
        min-height: 120px;
    }
    
    .btn-submit-review {
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: #f5f5f5;
        padding: 12px 30px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        letter-spacing: 1px;
        text-decoration: none;
        transition: all 0.4s;
        box-shadow: 0 8px 20px rgba(170, 0, 0, 0.3);
        border: none;
        width: 100%;
        margin-top: 10px;
        cursor: pointer;
    }
    
    .btn-submit-review:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(170, 0, 0, 0.4);
    }
    
    .btn-submit-review i {
        margin-right: 8px;
    }
    
    /* Alert Styling */
    .alert {
        border-radius: 12px;
        margin-bottom: 25px;
    }
    
    .alert-danger {
        background-color: #3d2020;
        border-color: #5d2a2a;
        color: #ff7777;
    }
    
    .error-list {
        padding-left: 20px;
        margin-bottom: 0;
    }
    
    /* Responsive Adjustments */
    @media (min-width: 768px) {
        .film-showcase {
            flex-direction: row;
            align-items: stretch;
        }
        
        .film-poster-showcase {
            flex: 0 0 350px;
            padding: 40px 30px;
        }
        
        .film-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .film-title {
            text-align: left;
        }
        
        .film-genre {
            right: auto;
            left: 45px;
            top: 55px;
        }
    }
    
    @media (max-width: 767px) {
        .film-title {
            font-size: 2rem;
        }
        
        .reviews-title {
            font-size: 1.8rem;
        }
        
        .review-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .review-rating {
            margin-top: 10px;
        }
    }
</style>
@endsection