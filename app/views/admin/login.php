<!DOCTYPE html>
<html>
    <head>
        <title>Tititle admin login</title>
    </head>
    <body style="margin:auto; text-align:center">
        <form method="POST">
            <div style="color: red"><?= @$error?></div>
            <div><label>Username: </label></div>
            <div><input type="text" placeholder="username" name="username"></div>
            <div><label>Password: </label></div>
            <div><input type="password" placeholder="password" name="password"></div>
            <button type="submit">submit</button>
        </form>
    </body>
</html>