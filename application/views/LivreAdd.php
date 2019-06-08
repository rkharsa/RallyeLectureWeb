

<div class="card shadow-lg container col-md-4">

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('Livre/Add'); ?>
<div>Titre      : <input type="text" name="titre" value="<?php echo $this->input->post('titre'); ?>" class="form-control" /></div>
<div>Couverture :<input type="file" name="couverture"  value="<?php echo $this->input->post('couverture'); ?>"  class="form-control"/> </div>
<div>Auteur     : <?php $comboBoxAuteur->Render(); ?></div>
<div>Editeur    : <?php $comboBoxEditeur->Render(); ?></div>
<div>Quizz      : <?php $comboBoxQuizz->Render(); ?></div>

<button type="submit">Sauvegarder</button>
<?php echo form_close(); ?>
</div>