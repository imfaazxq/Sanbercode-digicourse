@extends('layouts.master')

@section('title')
{{$genres->name}} | CineWorld
@endsection

@section('custom_content')
<div class="genre-detail-section">
    <div class="container">
        <div class="genre-detail-header">
            <h1 class="section-title">{{$genres->name}}</h1>
            <p class="section-description">Explore movies in this genre</p>
        </div>

        <div class="genre-detail-content">
            <h4 class="film-list-title">Movies in this Genre</h4>

            <div class="row">
                @forelse ($genres->ListFilm as $item)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="film-card">
                        <div class="film-poster">
                            <img src="{{asset('uploads/' . $item->poster)}}" alt="{{$item->title}} Poster">
                        </div>
                        <div class="film-card-body">
                            <h3 class="film-title">{{$item->title}}</h3>
                            <p class="film-summary">{{Str::limit($item->summary, 50)}}</p>
                            <a href="/film/{{$item->id}}" class="btn-detail">
                                <i class="fas fa-info-circle"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-films-message">
                    <div class="empty-icon">
                        <i class="fas fa-film"></i>
                    </div>
                    <h4>No Movies Found</h4>
                    <p>There are currently no movies in this genre</p>
                </div>
                @endforelse
            </div>

            <div class="back-link">
                <a href="/genre" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Back to Genres
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Dark Red Theme - Genre Detail Styling */
    .genre-detail-section {
        padding: 60px 0;
        background-color: #1a1212;
        min-height: calc(100vh - 200px);
        color: #e0e0e0;
    }
    
    .genre-detail-header {
        margin-bottom: 40px;
        text-align: center;
    }
    
    .section-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 15px;
        color: rgb(255, 255, 255);
        letter-spacing: 1px;
    }
    
    .section-description {
        font-size: 1.2rem;
        color: #c0c0c0;
        margin-bottom: 30px;
    }
    
    .genre-detail-content {
        padding: 20px 0;
    }
    
    .film-list-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 30px;
        color:rgb(255, 255, 255);
        border-bottom: 2px solid #3a2525;
        padding-bottom: 10px;
    }
    
    .film-card {
        background-color: #2a2020;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        height: 100%;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .film-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
    }
    
    .film-poster {
        text-align: center;

        padding: 20px 0;
    }
    
    .film-poster img {
        max-width: 150px;
        height: auto;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        border-radius: 8px;
    }
    
    .film-card-body {
        padding: 20px;
    }
    
    .film-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 10px;

    }
    
    .film-summary {
        color: #c0c0c0;
        margin-bottom: 20px;
        line-height: 1.5;
    }
    
    .btn-detail {
        display: block;
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color:rgb(255, 255, 255);
        padding: 10px 15px;
        text-align: center;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        box-shadow: 0 4px 10px rgba(170, 0, 0, 0.3);
    }
    
    .btn-detail:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
        box-shadow: 0 6px 15px rgba(170, 0, 0, 0.4);
        text-decoration: none;
        color: #ffffff;
    }
    
    .btn-detail i {
        margin-right: 5px;
    }
    
    .empty-films-message {
        text-align: center;
        padding: 50px 20px;
        background-color: #2a2020;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        margin: 20px 0 40px;
    }
    
    .empty-icon {
        font-size: 4rem;
        color:rgb(255, 255, 255);
        margin-bottom: 20px;
    }
    
    .empty-films-message h4 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
        color:rgb(255, 255, 255);
    }
    
    .empty-films-message p {
        font-size: 1.1rem;
        color: #c0c0c0;
        margin-bottom: 0;
    }
    
    .back-link {
        margin-top: 40px;
        text-align: center;
    }
    
    .btn-back {
        display: inline-block;
        background-color: #3a3a3a;
        color: #c0c0c0;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }
    
    .btn-back:hover {
        background-color: #444;
        color: #fff;
        text-decoration: none;
    }
    
    .btn-back i {
        margin-right: 8px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .section-title {
            font-size: 2.2rem;
        }
        
        .col-md-4 {
            margin-bottom: 30px;
        }
    }
</style>
@endsection