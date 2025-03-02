@extends('layouts.master')

@section('title')
 Film Gallery | CineWorld
@endsection

@section('custom_content')
<div class="film-section">
    <div class="container">
        <div class="film-header">
            <h1 class="section-title">Film Gallery</h1>
            <p class="section-description">Explore our collection of cinematic treasures</p>
            <a href="/film/create" class="btn-add">
                <i class="fas fa-plus"></i> Add New Film
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif




        <div class="film-gallery">
            @if(count($film) > 0)
            <div class="row">
                @foreach($film as $item)
                <div class="col-md-4 col-sm-6 film-item">
                    <div class="film-card">
                        <div class="film-poster">
                            <img src="{{asset('uploads/' . $item->poster)}}" alt="{{$item->title}}">
                            <span class="film-genre">{{$item->genre->name}}</span>
                        </div>
                        <div class="film-details">
                            <h3 class="film-title">{{$item->title}}</h3>
                            <p class="film-summary">{{Str::limit($item->summary, 100)}}</p>
                            <a href="film/{{$item->id}}" class="btn-view-details">
                                <i class="fas fa-info-circle"></i> View Details
                            </a>
                            
                            @auth
                            <div class="film-actions">
                                <a href="film/{{$item->id}}/edit" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="/film/{{$item->id}}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this film?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>No Films Found</h3>
                <p>Start by adding your first film to the collection</p>
                <a href="/film/create" class="btn-add-empty">
                    <i class="fas fa-plus"></i> Add Film
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Dark Red Theme - Film Gallery Styling */
    .film-section {
        padding: 60px 0;
        background-color: #1a1212;
        min-height: calc(100vh - 200px);
        color: #e0e0e0;
    }
    
    .film-header {
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
    
    .btn-add {
        display: inline-block;
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
        margin-bottom: 20px;
    }
    
    .btn-add:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(170, 0, 0, 0.4);
        text-decoration: none;
        color: #ffffff;
    }
    
    /* Film Card Styling */
    .film-gallery {
        margin-top: 20px;
    }
    
    .film-item {
        margin-bottom: 30px;
    }
    
    .film-card {
        background: #2a2020;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        height: 100%;
        transition: transform 0.4s, box-shadow 0.4s;
        position: relative;
        display: flex;
        flex-direction: column;
    }
    
    .film-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(170, 0, 0, 0.3);
    }
    
    .film-poster {
        position: relative;
        overflow: hidden;
        padding-top: 150%; /* 2:3 aspect ratio for movie posters */
    }
    
    .film-poster img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain; /* Changed from cover to contain */
        background-color: #1a1212; /* Added background color to make poster visible */
        transition: transform 0.5s;
        filter: brightness(0.85);
    }
    
    .film-card:hover .film-poster img {
        transform: scale(1.05);
        filter: brightness(1);
    }
    
    .film-genre {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: white;
        padding: 5px 12px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    
    .film-details {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    
    .film-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #ffffff;
    }
    
    .film-summary {
        color: #c0c0c0;
        margin-bottom: 20px;
        flex-grow: 1;
        line-height: 1.5;
        font-size: 0.95rem;
    }
    
    .btn-view-details {
        background: linear-gradient(135deg, #3a2525 0%, #2a1818 100%);
        color: #f5f5f5;
        padding: 10px 20px;
        text-align: center;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        display: block;
        margin-bottom: 15px;
        border: 1px solid #4a3030;
    }
    
    .btn-view-details:hover {
        background: linear-gradient(135deg, #4a3030 0%, #3a2525 100%);
        color: #ffffff;
        text-decoration: none;
    }
    
    .film-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    
    .btn-edit, .btn-delete {
        flex: 1;
        padding: 8px 10px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        width: 100%; 
    }
    
    .btn-edit {
        background-color: #3a3520;
        color: #ffad0f;
    }
    
    .btn-edit:hover {
        background-color: #4a432a;
        text-decoration: none;
        color: #ffcf5a;
    }
    
    .btn-delete {
        background-color: #3d2020;
        color: #ff5555;
        cursor: pointer;
        width: 100%;
    }
    
    .btn-delete:hover {
        background-color: #4d2a2a;
        color: #ff7777;
    }
    
    .btn-edit i, .btn-delete i, .btn-view-details i {
        margin-right: 5px;
    }
    
    .delete-form {
        flex: 1;
        width: 100%; 
        display: flex;
    }
    
    .alert {
        border-radius: 16px;
        margin-bottom: 30px;
    }
    
    .alert-success {
        background-color: #2a3b2a;
        border-color: #3a4b3a;
        color: #7aff7a;
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 50px 20px;
        background-color: #2a2020;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .empty-icon {
        font-size: 4rem;
        color: #8a4a4a;
        margin-bottom: 20px;
    }
    
    .empty-state h3 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: rgb(255, 255, 255);
    }
    
    .empty-state p {
        font-size: 1.1rem;
        color: #c0c0c0;
        margin-bottom: 30px;
    }
    
    .btn-add-empty {
        display: inline-block;
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
    }
    
    .btn-add-empty:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(170, 0, 0, 0.4);
        text-decoration: none;
        color: #ffffff;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .film-card {
            max-width: 400px;
            margin: 0 auto;
        }
    }
    
    @media (max-width: 768px) {
        .section-title {
            font-size: 2.2rem;
        }
    }
    
    @media (max-width: 576px) {
        .film-actions {
            flex-direction: column;
        }
    }
</style>
@endsection