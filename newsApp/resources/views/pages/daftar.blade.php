<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Buat Account Baru!</h1> <br>
    <h3>Sign Up Form</h3> <br>

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
</body>
</html>
