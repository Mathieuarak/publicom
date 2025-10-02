<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Publicom</title>
    <link rel="stylesheet" href="css\form.css">
    

    <!-- STYLES -->

    <style {csp-style-nonce}>
        .bouton{
            padding: 1px 6px;
            border: 1px outset buttonborder;
            border-radius: 3px;
            color: buttontext;
            background-color: buttonface;
            text-decoration: none;
        }

    </style>
</head>


<body>
    <form method="post" action="<?=url_to("auth_user")?>">
    
        <label for="nom" >Login </label>
        <input type="text" id="login" name="user_login" />
            
            
        <label for="motDePasse" >Password </label>
        <input type="text" id="password" name="user_password" />

        <input type="submit" value="Login">
    </form> 
</body>  