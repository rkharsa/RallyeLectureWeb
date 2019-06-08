<div class="row justify-content-md-center ">
<table class="table col-md-2 shadow-lg align-center ">

    <tr>
        <th scope="col">Utilisateurs</th>
    </tr>

<?php  foreach ($groupeAcces as $groupe): ?>
        <tr>
            <td scope="row"><a href="<?= base_url("Admin/getAccesUnGroupe/".$groupe['type'])?>"><?php echo $groupe['type']; ?></a></td>
         </tr>
    <?php endforeach; ?>
</table>

</div>
<div class="row justify-content-md-center ">
<a href="<?=base_url('')?>"><button type="button" class ="btn btn-warning">Retour</button></a>
</div>
