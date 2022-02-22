<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login tutorial</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="ulogin">Unikalny Login:</label><br>
        <input type="text" id="login" name="login" required><br>
        <label for="haslo">Hasło:</label><br>
        <input type="password" id="haslo" name="haslo" required><br>
        <button type="submit" id="wyslij" >Zaloguj</button>
</form>
</body>
</html>