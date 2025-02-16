
@extends('layouts.master')

@section('title')
Halaman Utama
@endsection

@section('content')
<h3>Cara Bergabung ke SanberBook</h3> <br>
    <ol>
        <li>Mengunjungi Website ini</li>
        <li>Mendaftar di <a href="{{ url('/register') }}">Form Sign Up</a></li>
@endsection