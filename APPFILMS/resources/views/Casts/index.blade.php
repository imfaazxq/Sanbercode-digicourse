@extends ('layouts.master')

@section('title')
Casts Page
@endsection

@section('content')
<a href="/Cast/create" class="btn btn-sm btn-primary mb-3">Add Cast</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($casts as $casts)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$casts->name}}</td>
      <td>

        <form action="/Cast/{{$casts->id}}" method="POST" onsubmit="return confirm('are you sure delte data?')">
            @csrf
            @method('delete')
            <a href="/Cast/{{$casts->id}}" class="btn btn-sm btn-info">Detail</a>
            <a href="/Cast/{{$casts->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
        <th scope="row"> Data cast masih kosong</th>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection