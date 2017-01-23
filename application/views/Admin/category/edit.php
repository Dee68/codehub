<h1 class="page-header">Update Category</h1>
<?=form_open('admin/category/edit/'.$item->id)?>
<div class="form-group">
  <?=validation_errors('<p style="color:red">','</p>')?>
  <?=form_label('Category Name','Name')?>
  <?php
  $data = ['name'=>'name',
  'class'=>'form-control',
  'value'=>$item->name];
  echo form_input($data);?>
</div>
<?=form_submit('submit','Update Category',['class'=>'btn btn-primary'])?>

<?=form_close()?>
