<div class="row justify-content-md-center ">
<a href="<?=base_url('Admin/index')?>"><button type="button" class="btn btn-warning">Retour</button></a>
<a href="<?= base_url("Admin/addAccesUnGroupe/".$unGroupe)?>"><button type="button" class='btn btn-success' >Ajouter acces</button></a>
</div>
<br>
<div class="row justify-content-md-center ">
   
<table class="table col-md-5 shadow-lg align-center ">

    <tr>
        <th scope="col">Controller</th>
        <th scope="col">Method</th>
        <th scope="col">Titre Menu</th>
        <th scope="col" colspan="2">Action</th>
    </tr>



<?php 
foreach ($groupeAcces as $groupe):  ?>
        <tr>
            <td scope="row"><?php echo $groupe['controller']; ?></td>
            <td scope="row"><?php echo $groupe['method']; ?></td>
            <td scope="row"><?php echo $groupe['titreMenu']; ?></td>
            <?php if($groupe['controller']!="Admin" || $groupe['method']!="Index"){?>
            <td scope="row"><a href="<?=base_url("Admin/updateAccessUnGroupe/".$unGroupe."/".$groupe['id'])?>">Modifier</a></td>
            <td scope="row"><a href="<?=base_url("Admin/deleteAccessUnGroupe/".$unGroupe."/".$groupe['id'])?>">Supprimer</a></td>
            
            <?php } ?>   
         </tr>
    <?php endforeach; ?>

</table>

</div>

<div class="row justify-content-md-center ">
<a href="<?=base_url('Admin/index')?>"><button type="button" class="btn btn-warning">Retour</button></a>
<a href="<?= base_url("Admin/addAccesUnGroupe/".$unGroupe)?>"><button type="button" class='btn btn-success' >Ajouter acces</button></a>
</div>
