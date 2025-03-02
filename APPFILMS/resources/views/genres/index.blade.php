@extends('layouts.master')

@section('title')
 Movie Genres | CineWorld
@endsection

@section('custom_content')
<div class="genre-section">
    <div class="container">
        <div class="genre-header">
            <h1 class="section-title">Movie Genres</h1>
            <p class="section-description">Manage your collection of film categories</p>
            <a href="/genre/create" class="btn-add">
                <i class="fas fa-plus"></i> Add New Genre
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

        <div class="genre-table-container">
            @if($genres->count() > 0)
            <div class="table-responsive">
                <table class="genre-table">
                    <thead>
                        <tr>
                            <th scope="col" width="10%">No.</th>
                            <th scope="col" width="40%">Genre Name</th>
                            <th scope="col" width="50%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$genre->name}}</td>
                            <td class="action-buttons">
                                <form action="/genre/{{$genre->id}}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this genre?')">
                                    @csrf
                                    @method('delete')
                                    <a href="/genre/{{$genre->id}}" class="btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="/genre/{{$genre->id}}/edit" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="submit" class="btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>No Genres Found</h3>
                <p>Start by adding your first movie genre</p>
                <a href="/genre/create" class="btn-add-empty">
                    <i class="fas fa-plus"></i> Add Genre
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Dark Red Theme - Genre Section Styling */
    .genre-section {
        padding: 60px 0;
        background-color: #1a1212;
        min-height: calc(100vh - 200px);
        color: #e0e0e0;
    }
    
    .genre-header {
        margin-bottom: 40px;
        text-align: center;
    }
    
    .section-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 15px;
        color:rgb(255, 255, 255);
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
    
    .genre-table-container {
        background-color: #2a2020;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        padding: 30px;
        overflow: hidden;
    }
    
    .genre-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .genre-table thead th {
        background-color: #3a2525;
        color:rgb(255, 255, 255);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        padding: 15px 20px;
        border-bottom: 2px solid #4a3030;
    }
    
    .genre-table tbody td {
        padding: 20px;
        vertical-align: middle;
        border-bottom: 1px solid #3a2525;
        font-size: 1rem;
        color: #e0e0e0;
    }
    
    .genre-table tr:last-child td {
        border-bottom: none;
    }
    
    .genre-table tr:hover {
        background-color: #3a2525;
    }
    
    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .btn-view, .btn-edit, .btn-delete {
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }
    
    .btn-view {
        background-color: #2a3641;
        color: #7fc1ff;
    }
    
    .btn-view:hover {
        background-color: #34424f;
        text-decoration: none;
        color: #a0d0ff;
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
    }
    
    .btn-delete:hover {
        background-color: #4d2a2a;
        color: #ff7777;
    }
    
    .btn-view i, .btn-edit i, .btn-delete i {
        margin-right: 5px;
    }
    
    .delete-form {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
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
        color:rgb(255, 255, 255);
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
    @media (max-width: 768px) {
        .section-title {
            font-size: 2.2rem;
        }
        
        .genre-table thead {
            display: none;
        }
        
        .genre-table, .genre-table tbody, .genre-table tr, .genre-table td {
            display: block;
            width: 100%;
        }
        
        .genre-table tr {
            margin-bottom: 20px;
            border-bottom: 2px solid #3a2525;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .genre-table td {
            text-align: right;
            padding: 15px;
            position: relative;
            padding-left: 50%;
        }
        
        .genre-table td:before {
            content: attr(data-label);
            position: absolute;
            left: 15px;
            width: 45%;
            font-weight: 700;
            text-align: left;
            font-size: 0.85rem;
            text-transform: uppercase;
        }
        
        .action-buttons {
            justify-content: flex-end;
        }
    }
</style>
@endsection