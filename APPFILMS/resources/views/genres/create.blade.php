@extends('layouts.master')

@section('title')
Add Genre | CineWorld
@endsection

@section('custom_content')
<div class="create-genre-section">
    <div class="container">
        <div class="create-genre-header">
            <h1 class="section-title">Add New Genre</h1>
            <p class="section-description">Create a new movie genre category</p>
        </div>

        <div class="create-genre-form-container">
            <form action="/genre" method="POST">
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
                
                <div class="form-group mb-4">
                    <label for="name" class="form-label">Genre Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the genre name">
                </div>
                
                <div class="form-actions">
                    <a href="/genre" class="btn-cancel">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-plus"></i> Create Genre
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Dark Red Theme - Create Genre Styling */
    .create-genre-section {
        padding: 60px 0;
        background-color: #1a1212;
        min-height: calc(100vh - 200px);
        color: #e0e0e0;
    }
    
    .create-genre-header {
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
    
    .create-genre-form-container {
        background-color: #2a2020;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        padding: 40px;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .form-group {
        margin-bottom: 30px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        font-size: 1.1rem;
        color: rgb(255, 255, 255);
    }
    
    .form-control {
        width: 100%;
        padding: 14px 20px;
        background-color: #3a2525;
        border: 1px solid #4a3030;
        border-radius: 8px;
        font-size: 1rem;
        color: #e0e0e0;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #aa0000;
        box-shadow: 0 0 0 3px rgba(170, 0, 0, 0.2);
    }
    
    .form-control::placeholder {
        color: #aaa;
    }
    
    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }
    
    .btn-submit, .btn-cancel {
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        border: none;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #aa0000 0%, #660000 100%);
        color: #f5f5f5;
        box-shadow: 0 8px 20px rgba(170, 0, 0, 0.3);
    }
    
    .btn-submit:hover {
        background: linear-gradient(135deg, #cc0000 0%, #880000 100%);
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(170, 0, 0, 0.4);
        color: #ffffff;
    }
    
    .btn-cancel {
        background-color: #3a3a3a;
        color: #c0c0c0;
    }
    
    .btn-cancel:hover {
        background-color: #444;
        color: #fff;
        text-decoration: none;
    }
    
    .btn-submit i, .btn-cancel i {
        margin-right: 8px;
    }
    
    .alert {
        border-radius: 8px;
        margin-bottom: 30px;
        padding: 15px 20px;
    }
    
    .alert-danger {
        background-color: #3d2020;
        border-color: #4d2a2a;
        color: #ff7777;
    }
    
    .error-list {
        margin: 0;
        padding-left: 20px;
    }
    
    .error-list li {
        margin-bottom: 5px;
    }
    
    .error-list li:last-child {
        margin-bottom: 0;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .section-title {
            font-size: 2.2rem;
        }
        
        .create-genre-form-container {
            padding: 30px 20px;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 15px;
        }
        
        .btn-submit, .btn-cancel {
            width: 100%;
            justify-content: center;
        }
        
        .btn-cancel {
            order: 2;
        }
        
        .btn-submit {
            order: 1;
        }
    }
</style>
@endsection