<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Publicom - Connexion</title>
    <link rel="stylesheet" href="css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Centrage global */
        html,body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f7fa;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .auth-card{
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 10px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 1px solid #eceff3;
            text-align: center;
        }

        .auth-card h1{
            margin-bottom: 18px;
            font-size: 1.25rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 8px;
        }

        label { text-align: left; display:block; font-size:0.95rem; color:#495057; }

        input[type="text"],
        input[type="password"]{
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #dfe6ec;
            font-size: 1rem;
        }

        input[type="submit"]{
            margin-top: 6px;
        }

        .flash-error {
            color: #b32525;
            margin-bottom: 8px;
            font-weight: 600;
        }

        @media (max-width: 480px){
            .auth-card { padding: 18px; margin: 12px; }
        }
    </style>
</head>


<body>
    <h1>
        <?php if (session()->getFlashData('errorMessage')!==null){
        echo'<p class="danger">'.session()->getFlashData('errorMessage').'<p>';
    }?>
    </h1>
    <form method="post" action="<?=url_to("auth_user")?>">

        <label for="nom" >Login </label>
        <input type="text" id="login" name="user_login" />
            
            
        <label for="motDePasse" >Password </label>
        <input type="password" id="password" name="user_password" />

        <input type="submit" value="Login">
    </form> 
</body>  