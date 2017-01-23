<h1 class="page-header text-center">Add a New Role</h1>
<div class="row">
  <div class="col-md-2">

  </div>
  <div class="col-md-8">
    <?=validation_errors('<p style="color:red">','</p>')?>
  <?=form_open('admin/role/add')?>
  <div class="form-group">
    <?=form_label('Role name','name')?>
    <?php $data = ['name'=>'name',
    'class'=>'form-control',
    'value'=>set_value('name')];?>
    <?=form_input($data);?>
  </div>
  <div class="form-group">
    <?php $data =[
      'name'=>'description',
      'max_length'=>100,
      'class'=>'form-control',
      'value'=>set_value('description')
    ];?>
    <?=form_label('Description','description')?>
    <?=form_input($data);?>
  </div>
  <?=form_submit('submit','Add Role','class="btn btn-primary"')?>
  <?=form_close()?>
  </div>
  <div class="col-md-2">

  </div>
</div>
