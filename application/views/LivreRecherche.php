<!-- navigation -->
<div class="navigation">
    <a href="<?php echo base_url('livre/index'); ?>">Retour</a>
    <a href="<?php echo base_url('livre/add');?>">Ajouter</a>
</div>

<div class="row justify-content-md-center">
<div class="col-md-4">
<input type="text" id="SearchBusinessInput" onkeyup="SearchLivre()"
          placeholder="Rechercher " title="Rechercher" class="form-control form-control-lg  '' ">
</div>

</div>
<br>

<div class="row  justify-content-md-center">
<table id="BusinessTable" class="table col-md-8 shadow-lg align-center">
<thead>
    <tr>
    <th scope="col">#</th>
        <th scope="col">titre</th>
        <th scope="col">couverture</th>
        <th scope="col">id auteur</th>
        <th scope="col">id editeur</th>
        <th scope="col">id quizz</th>
        <th scope="col">image</th>
        <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($livres as $l): ?>
        <tr>
            <td scope="row"><?php echo $l['id']; ?></td>
            <td><?php echo $l['titre']; ?></td>
            <td><?php echo $l['couverture']; ?></td>
            <td><?php echo $l['idAuteur']; ?></td>
            <td><?php echo $l['idEditeur']; ?></td>
            <td><?php echo $l['idQuizz']; ?></td>
            <td><img src="<?php echo base_url('img/'.$l['couverture']) ?>" alt="<?php echo $l['titre']; ?>" height="50" width="50"> </td>
            <td>
                <a href="<?php echo site_url('livre/edit/'.$l['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('livre/removeDansRecherche/'.$l['id']); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table></div>



