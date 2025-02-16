
@extends('layouts.master')

@section('title')
Halaman Pendaftaran
@endsection

@section('content')
<form action="{{ url('/home') }}" method="POST">
        @csrf
        <label for="firstname">First name:</label> <br><br>
        <input type="text" name="firstname" required> <br><br>

        <label for="lastname">Last name:</label> <br><br>
        <input type="text" name="lastname" required> <br><br>

        <label for="">Gender:</label> <br><br>
        <input type="radio" name="gender" value="male"> Male <br>
        <input type="radio" name="gender" value="female"> Female <br>
        <input type="radio" name="gender" value="other"> Other <br><br>

        <label for="">Nationality:</label> <br><br>
        <select name="negara" id=""> 
            <option value="Indonesian">Indonesian</option> 
            <option value="Korean">Korean</option>
            <option value="Prancis">Prancis</option>
        </select> <br><br>

        <label for="">Language Spoken:</label> <br><br>
        <input type="checkbox" name="language[]" value="Bahasa Indonesia"> Bahasa Indonesia <br>
        <input type="checkbox" name="language[]" value="English"> English <br>
        <input type="checkbox" name="language[]" value="Other"> Other <br><br>

        <label for="">Bio:</label> <br><br>
        <textarea name="bio" cols="30" rows="10"></textarea><br> 

        <button type="submit">Submit</button>
    </form>
@endsection