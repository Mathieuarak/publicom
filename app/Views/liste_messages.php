<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<h1 class="titre">Liste des message de {nom de la communne}</h1>
<p><a class="bouton" href='<?= url_to('message_ajout', 1) ?>'> Ajout message </a></p>
<p><a class="bouton" href='<?= url_to('visu_message', 1) ?>'> visualisation message </a></p>
<table>
    <tr>
        <th> Message </th>
        <th> Visibilité </th>
    </tr>
    <tr>
        <td> Message 1 </td>
        <td>
            <form method="post" action="#">
                <input type="radio" id="on" name="on_off" value="on" />
                <label for="on">On</label>

                <input type="radio" id="off" name="on_off" value="off" checked />
                <label for="off">Off</label>
            </form>
        </td>
        <td> <a class="bouton" href='<?= url_to('message_modif', 1) ?>'> Modifier </a> </td>
        <td> <a class="bouton" href='<?= url_to('visu_message', 1) ?>'> Visualisation </a> </td>
        <td> <a class="bouton" href='#'> Supprimer </a> </td>
    </tr>
    <tr>
        <td> Message 2 </td>
        <td>
            <form method="post" action="#">
                <input type="radio" id="on" name="on_off" value="on" />
                <label for="on">On</label>

                <input type="radio" id="off" name="on_off" value="off" checked />
                <label for="off">Off</label>
            </form>
        </td>
        <td> <a class="bouton" href='<?= url_to('message_modif', 1) ?>'> Modifier </a> </td>
        <td> <a class="bouton" href='<?= url_to('visu_message', 1) ?>'> Visualisation </a> </td>
        <td> <a class="bouton" href='#'> Supprimer </a> </td>
    </tr>
    <tr>
        <td> Message 3 </td>
        <td>
            <form method="post" action="#">
                <input type="radio" id="on" name="on_off" value="on" checked />
                <label for="on">On</label>

                <input type="radio" id="off" name="on_off" value="off" />
                <label for="off">Off</label>
            </form>
        </td>
        <td> <a class="bouton" href='<?= url_to('message_modif', 1) ?>'> Modifier </a> </td>
        <td> <a class="bouton" href='<?= url_to('visu_message', 1) ?>'> Visualisation </a> </td>
        <td> <a class="bouton" href='#'> Supprimer </a> </td>
    </tr>
</table>

<?= $this->endSection() ?>