@extends ('layouts.master')

@section('title')
Casts Page
@endsection

@section('content')
<h1 class="text-primary">{{$casts->name}}</h1>
<h2>{{$casts->age}}</h2>
<p>{{$casts->bio}}</p>

<a href="/Cast" class="btn btn-secondary btn-sm">Back</a>
@endsection