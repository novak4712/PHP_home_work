<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form For You</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>REGISTRATION FORM</h1>
<form action="scripts/forms.php" method="post" class="reg-form">
    <div class="form-row">
        <label for="id">ID: </label>
        <input type="text" name="id" class="form-input" id="id">
    </div>
    <div class="form-row">
        <label for="email">Email: </label>
        <input type="email" name="email" class="form-input" id="email">
    </div>
    <div class="form-row">
        <label for="login">Login: </label>
        <input type="text" name="login" class="form-input" id="login">
    </div>
    <div class="form-row">
        <label for="password">Password: </label>
        <input type="password" name="password" class="form-input" id="password">
    </div>
    <div class="container_button">
        <div class="form-row-1">
            <input type="submit" value="Insert" name="insert" class="button">
        </div>
        <div class="form-row-1">
            <input type="submit" value="Update" name="update" class="button">
        </div>
        <div class="form-row-1">
            <input type="submit" value="Delete" name="delete" class="button">
        </div>
        <div class="form-row-1">
            <input type="submit" value="Search" name="search" class="button">
        </div>
    </div>
</form>
</body>
</html>
