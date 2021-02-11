<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>$title</title>
        <link rel="stylesheet" type="text/css" href="../public/assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="login_container">
            <h2>Identification</h2>
            <form action="/user/login" method="post">
                <span id="error_container">$error</span>
                <fieldset>
                    <input type="text" name="username" id="username" placeholder="utilisateur"/> <br/>
                    <input type="password" name="password" id="password" placeholder="mot de passe"/> <br/>
                    <input type="submit" id="submit" value="Connexion">
                </fieldset>
            </form>
        </div>
    </body>
</html>