<div class="row justify-content-center">
<div class="card col-md-3 text-center">
    <br>
  <form method="POST" action="<?=base_url("Admin/updateAccessUnGroupe/".$unGroupe."/".$id)?>">
    <label>Controller</label><br>
     <input type="text" name="controller" value="<?=$accesPage->controller?>" placeholder="Controller" required  class="form-control col-md-5 mx-auto">
     <br>
     <label>Method</label><br>
<input type="text" name="method" value="<?=$accesPage->method?>" placeholder="Method" required class="form-control col-md-5 mx-auto"> 
  <br>
  <label>Titre Menu</label><br>
<input type="text" name="titreMenu" placeholder="Titre Menu" value="<?=$accesPage->titreMenu?>"  required class="form-control col-md-5 mx-auto">
<br>
<div class="form-inline justify-content-center ">
<input type="submit" name="submit" value="Mettre à jour" class="btn btn-success">
<a href="<?=base_url('Admin/getAccesUnGroupe/'.$unGroupe)?>"><button type="button" class="btn btn-warning">Retour</button></a>  
</div>
<br>
</form>

</div>
</div>


