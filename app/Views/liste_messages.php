<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Publicom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="css/tableaux.css">
</head>
<body>
    <table>
        <tr>
            <th> Message </th>
            <th> Visibilité </th>
        </tr>
        <tr>
            <td> Message 1 </td>
            <td> 
                <form method="post" action="#" >           
                    <input type="radio" id="on" name="on_off" value="on" />
                    <label for="on">On</label>
                
                    <input type="radio" id="off" name="on_off" value="off" checked/>
                    <label for="off">Off</label>
                </form> 
            </td>
            <td> <a class="bouton" href='#'> Modifier </a> </td>
            <td> <a class="bouton" href='#'> Supprimer </a> </td>
        </tr>
           <tr>
            <td> Message 2 </td>
            <td>                 
                <form method="post" action="#" >           
                    <input type="radio" id="on" name="on_off" value="on" />
                    <label for="on">On</label>
                
                    <input type="radio" id="off" name="on_off" value="off" checked/>
                    <label for="off">Off</label>
                </form> 
            </td>
            <td> <a class="bouton" href='#'> Modifier </a> </td>
            <td> <a class="bouton" href='#'> Supprimer </a> </td>
        </tr>
           <tr>
            <td> Message 3 </td>
                        <td>                 
                <form method="post" action="#" >           
                    <input type="radio" id="on" name="on_off" value="on" checked/>
                    <label for="on">On</label>
                
                    <input type="radio" id="off" name="on_off" value="off"/>
                    <label for="off">Off</label>
                </form> 
            </td>
            <td> <a class="bouton" href='#'> Modifier </a> </td>
            <td> <a class="bouton" href='#'> Supprimer </a> </td>
        </tr>
    </table>


    <p><a class="bouton" href='#'> Ajout message </a></p> 
    <p><a class="bouton" href='#'> visualisation message </a></p>
</body>
</html>