<h1 class="page-header">Add New Category</h1>
<?=form_open('admin/category/add')?>
<div class="form-group">
  <?=validation_errors('<p style="color:red">','</p>')?>
  <?=form_label('Category Name','name')?>
  <?php
  $data = ['name'=>'name',
  'value'=>set_value('name'),
  'class'=>'form-control'];
  echo form_input($data);?>
</div>
<?=form_submit('submit','Add Category',['class'=>'btn btn-primary'])?>

<?=form_close()?>
