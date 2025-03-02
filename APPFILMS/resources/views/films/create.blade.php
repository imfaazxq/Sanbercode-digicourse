@extends('layouts.master')

@section('title')
Add New Film
@endsection

@section('custom_content')
<div class="add-film-container">
    <h1 class="form-title">Add New Film</h1>
    <p class="form-description">Share a new cinematic masterpiece with the CineWorld community</p>
    
    <form action="/film" method="POST" enctype="multipart/form-data" class="film-form">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control custom-input" name="title" value="{{ old('title') }}" placeholder="Enter the film title">
        </div>
        
        <div class="form-group">
            <label>Summary</label>
            <textarea name="summary" class="form-control custom-input" cols="20" rows="6" placeholder="Write a brief summary of the film">{{ old('summary') }}</textarea>
        </div>
        
        <div class="form-group">
            <label>Release Year</label>
            <input type="number" class="form-control custom-input" name="year" value="{{ old('year') }}" 
                min="1500" max="2099" step="1" placeholder="Enter the release year">
        </div>
        
        <div class="form-group">
            <label>Genre</label>
            <select name="genre_id" class="form-control custom-input">
                <option value="">-- Select Genre --</option>
                @forelse($genres as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                <option value="">No genres available</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label>Poster</label>
            <div class="custom-file-upload">
                <input type="file" class="form-control" name="poster" id="poster-upload">
                <label for="poster-upload" class="file-label">
                    <i class="fas fa-cloud-upload-alt"></i> Choose Poster Image
                </label>
                <span class="selected-file">No file selected</span>
            </div>
        </div>
        
        <div class="form-buttons">
            <button type="submit" class="btn-submit">Add Film</button>
            <a href="{{ url('/film') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    /* Add Film Page Styles - Dark Red Theme */
    body {
        font-family: 'Montserrat', sans-serif;
        color: #e0e0e0;
        background-color: #1a1212;
    }
    
    .add-film-container {
        max-width: 800px;
        margin: 40px auto 80px;
        padding: 50px;
        background-color: #2a2020;
        border-radius: 16px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }
    
    .form-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: rgb(255, 255, 255);
        text-align: center;
    }
    
    .form-description {
        text-align: center;
        color: #c0c0c0;
        font-size: 1.1rem;
        margin-bottom: 40px;
    }
    
    .film-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .form-group {
        margin-bottom: 10px;
    }
    
    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: rgb(255, 255, 255);
    }
    
    .custom-input {
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid #4a3030;
        font-size: 1rem;
        transition: all 0.3s;
        background-color: #3a2525;
        color: #e0e0e0;
    }
    
    .custom-input:focus {
        outline: none;
        border-color: #aa0000;
        box-shadow: 0 0 0 3px rgba(170, 0, 0, 0.2);
    }
    
    /* Custom file upload styling */
    .custom-file-upload {
        position: relative;
        overflow: hidden;
        margin-top: 5px;
    }
    
    .custom-file-upload input[type="file"] {
        position: absolute;
        left: -9999px;
    }
    
    .file-label {
        display: inline-block;
        padding: 12px 20px;
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: white;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
        font-weight: 600;
    }
    
    .file-label:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
    }
    
    .selected-file {
        margin-left: 15px;
        font-style: italic;
        color: #c0c0c0;
    }
    
    /* Alert styling */
    .alert-danger {
        background-color: #3d2020;
        border-left: 4px solid #aa0000;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 30px;
        color: #ff7777;
    }
    
    .alert-danger ul {
        padding-left: 20px;
    }
    
    /* Buttons styling */
    .form-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: #f5f5f5;
        padding: 14px 35px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        transition: all 0.4s;
        box-shadow: 0 10px 25px rgba(170, 0, 0, 0.3);
    }
    
    .btn-submit:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(170, 0, 0, 0.4);
    }
    
    .btn-cancel {
        background-color: #3a3a3a;
        color: #c0c0c0;
        padding: 13px 35px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s;
        border: 2px solid #4a3030;
    }
    
    .btn-cancel:hover {
        background-color: #444;
        color: #fff;
        text-decoration: none;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .add-film-container {
            padding: 30px 20px;
            margin: 20px 15px 60px;
        }
        
        .form-title {
            font-size: 2rem;
        }
        
        .form-buttons {
            flex-direction: column;
            gap: 15px;
        }
        
        .btn-submit, .btn-cancel {
            width: 100%;
            text-align: center;
        }
    }

    /* JavaScript for file upload display */
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('poster-upload');
        const fileLabel = document.querySelector('.selected-file');
        
        fileInput.addEventListener('change', function() {
            if(this.files && this.files.length > 0) {
                fileLabel.textContent = this.files[0].name;
            } else {
                fileLabel.textContent = 'No file selected';
            }
        });
    });
</style>
@endsection