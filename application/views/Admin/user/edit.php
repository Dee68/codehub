<h1 class="page-header text-center">The User Edit Page</h1>
<div class="row">
  <div class="col-md-12">
    <?=validation_errors('<p style="color:red">',' </p>')?>
    <?=form_open('admin/user/edit/'.$item->id)?>
  <div class="form-group">
    <?=form_label('User Name','username')?>
    <?php $data = [
      'name'=>'username',
      'class'=>'form-control',
      'value'=>$item->username
    ];
    echo form_input($data);?>
  </div>
  <div class="form-group">
    <?=form_label('User Email','useremail')?>
    <?php $data = [
      'name'=>'useremail',
      'class'=>'form-control',
      'value'=>$item->useremail
    ];
    echo form_input($data);?>
  </div>
  <div class="form-group">
  <?=form_dropdown('role',$options,$item->role_id,'class="form-control"')?>
  </div>
  <div class="form-group">
    <?=form_label('Password','password')?>
    <?php $data = [
      'name'=>'password',
      'type'=>'password',
      'class'=>'form-control',
      'value'=>$item->password
    ];
    echo form_input($data);?>
  </div>
  <?=form_submit('submit','Update User','class="btn btn-primary"')?>
    <?=form_close()?>
  </div>
</div>
