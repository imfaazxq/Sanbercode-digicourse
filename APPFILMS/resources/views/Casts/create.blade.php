@extends ('layouts.master')

@section('title')
Add Category
@endsection

@section('content')
<form action="/Cast" method="POST">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
  <div class="mb-3">
    <label > Cast Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name')}}">
  </div>
  <div class="mb-3">
    <label > Age</label>
    <input type="text" class="form-control" name="age" value="{{old('age')}}">
  </div>
  <div class="mb-3">
    <label >Bio</label>
    <textarea name="description" class="form-control" cols="30" rows="10" value="{{old('description')}}"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection