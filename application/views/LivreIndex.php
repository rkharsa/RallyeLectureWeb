<!-- navigation -->
<div class="navigation">
    <a href="<?php echo base_url(); ?>">Home</a>
    <a href="<?php echo base_url('livre/add');?>">Ajouter</a> 
    <a href="<?php echo base_url('livre/indexRecherche');?>">Rechercher</a>

</div>
<div class="row justify-content-md-center">

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
                <a href="<?php echo site_url('livre/remove/'.$l['id'].'/'.$start); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table></div>

<div class="row justify-content-md-center">
<nav aria-label="...">
  <ul class="pagination pagination-lg">
    <li class="page-item active" aria-current="page">
    <?php  for($i=1;$i<=$count;$i++) : 
        if($start==$i){$classActive="active";}else{$classActive=null;}?>
    <li class="page-item <?=$classActive?>"><a class="page-link" href=<?= base_url("livre/index/".$i) ?>><?=$i?></a></li>
<?php  endfor?>
  </ul>
</nav>
</div>


