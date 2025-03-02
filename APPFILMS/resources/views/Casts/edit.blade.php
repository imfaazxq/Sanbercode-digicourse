@extends ('layouts.master')

@section('title')
Edit Category
@endsection

@section('content')
<form action="/Cast/{{$casts->id}}" method="POST">
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
    @method('PUT')
  <div class="mb-3">
    <label > Cast Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name', $casts->name)}}">
  </div>
  <div class="mb-3">
    <label > Age</label>
    <input type="text" class="form-control" name="age" value="{{old('age',$casts->age)}}">
  </div>
  <div class="mb-3">
    <label >Bio</label>
    <textarea name="description" class="form-control" cols="30" rows="10" >{{old('description',$casts->bio)}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection