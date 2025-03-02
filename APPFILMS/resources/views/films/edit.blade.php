@extends('layouts.master')

@section('title')
Edit Film | CineWorld
@endsection

@section('custom_content')
<div class="film-edit-section">
    <div class="container">
        <div class="film-edit-header">
            <h1 class="section-title">Edit Film</h1>
            <p class="section-description">Update the details of your film</p>
        </div>

        <div class="film-edit-container">
            <form action="/film/{{$film->id}}" method="POST" enctype="multipart/form-data" class="film-edit-form">
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
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control custom-input" id="title" name="title" value="{{ old('title', $film->title) }}" placeholder="Enter the film title">
                </div>
                
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <textarea name="summary" id="summary" class="form-control custom-textarea" rows="5">{{ old('summary', $film->summary) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="year">Release Year</label>
                    <input type="number" class="form-control custom-input" id="year" name="year" value="{{ old('year', $film->release_year) }}" min="1500" max="2099" step="1" placeholder="Enter the release year">
                </div>
                
                <div class="form-group">
                    <label for="genre_id">Genre</label>
                    <select name="genre_id" id="genre_id" class="form-control custom-select">
                        <option value="">-- Select Genre --</option>
                        @forelse($genres as $item)
                            @if($item->id == old('genre_id', $film->genre_id))
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @empty
                            <option value="">No genres available</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label>Poster</label>
                    <div class="current-poster">
                        <img src="{{asset('uploads/' . $film->poster)}}" alt="Current poster">
                        <span class="poster-label">Current poster</span>
                    </div>
                    <div class="custom-file-input-container">
                        <input type="file" class="custom-file-input" id="poster" name="poster">
                        <label for="poster" class="custom-file-label">Choose new poster...</label>
                    </div>
                </div>
                
                <div class="form-actions">
                    <a href="/film" class="btn-cancel">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="btn-update">
                        <i class="fas fa-save"></i> Update Film
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Dark Red Theme - Film Edit Styling */
    .film-edit-section {
        padding: 60px 0;
        background-color: #1a1212;
        min-height: calc(100vh - 200px);
        color: #e0e0e0;
    }
    
    .film-edit-header {
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
    
    .film-edit-container {
        background-color: #2a2020;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        padding: 40px;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .film-edit-form {
        color: #e0e0e0;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        font-size: 1.1rem;
        color: #ffffff;
    }
    
    .custom-input,
    .custom-textarea,
    .custom-select {
        width: 100%;
        padding: 12px 15px;
        background-color: #3a2525;
        border: 1px solid #4a3030;
        border-radius: 8px;
        color: #ffffff;
        font-size: 1rem;
        transition: all 0.3s;
    }
    
    .custom-input:focus,
    .custom-textarea:focus,
    .custom-select:focus {
        background-color: #3a2828;
        border-color: #aa0000;
        box-shadow: 0 0 0 3px rgba(170, 0, 0, 0.2);
        outline: none;
    }
    
    .custom-input::placeholder,
    .custom-textarea::placeholder {
        color: #a0a0a0;
    }
    
    .custom-textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    .custom-select {
        appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="6"><path d="M0 0l6 6 6-6z" fill="%23ffffff"/></svg>');
        background-repeat: no-repeat;
        background-position: right 15px center;
        padding-right: 35px;
    }
    
    .custom-select option {
        background-color: #3a2525;
        color: #ffffff;
    }
    
    .current-poster {
        margin-bottom: 15px;
        display: inline-block;
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        border: 2px solid #4a3030;
    }
    
    .current-poster img {
        display: block;
        max-width: 150px;
        height: auto;
    }
    
    .poster-label {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.7);
        color: #ffffff;
        padding: 5px;
        font-size: 0.8rem;
        text-align: center;
    }
    
    .custom-file-input-container {
        position: relative;
    }
    
    .custom-file-input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 2;
    }
    
    .custom-file-label {
        display: block;
        background-color: #3a2525;
        border: 1px solid #4a3030;
        border-radius: 8px;
        padding: 12px 15px;
        color: #a0a0a0;
        font-weight: normal;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .custom-file-input:focus + .custom-file-label {
        border-color: #aa0000;
        box-shadow: 0 0 0 3px rgba(170, 0, 0, 0.2);
    }
    
    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }
    
    .btn-update, .btn-cancel {
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
        margin-top: 1rem;
    }
    
    .btn-update {
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: #f5f5f5;
        box-shadow: 0 8px 20px rgba(170, 0, 0, 0.3);
    }
    
    .btn-update:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(170, 0, 0, 0.4);
        color: #ffffff;
    }
    
    .btn-cancel {
        background-color: #3a2525;
        color: #c0c0c0;
        border: 1px solid #4a3030;
    }
    
    .btn-cancel:hover {
        background-color: #4a3030;
        color: #ffffff;
        text-decoration: none;
    }
    
    .btn-update i, .btn-cancel i {
        margin-right: 8px;
    }
    
    .alert {
        border-radius: 8px;
        margin-bottom: 30px;
        padding: 15px 20px;
    }
    
    .alert-danger {
        background-color: #3d2020;
        border-color: #5d2020;
        color: #ff7777;
    }
    
    .error-list {
        margin: 0;
        padding-left: 20px;
    }
    
    .error-list li {
        margin-bottom: 5px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .film-edit-container {
            padding: 30px 20px;
        }
        
        .section-title {
            font-size: 2.2rem;
        }
        
        .form-actions {
            flex-direction: column-reverse;
            gap: 15px;
        }
        
        .btn-update, .btn-cancel {
          
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection