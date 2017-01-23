<h1 class="page-header text-center">The role index page.</h1>
<div class="row">
  <div class="col-md-2">

  </div>
  <?php if($roles):?>
    <?php if($this->session->flashdata('success')){
   echo "<div class='alert alert-info text-center'>".$this->session->flashdata('success')."</div>";     
    }?>
    <?php if($this->session->flashdata('error')){
   echo "<div class='alert alert-info text-center'>".$this->session->flashdata('error')."</div>";     
    }?>
  <div class="panel panel-primary">
  <div class="panel-heading">
          <h2 class="panel-title text-center">Roles</h2>
          </div>
<div class="panel-body">
  <table class="table table-bordered table-striped text-center">
    <thead>
      <tr>
        <th class="text-center">Role Id</th>
        <th class="text-center">Role Name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($roles as $role):?>
      <tr>
        <td class="text-center"><?=$role->id?></td>
        <td class="text-center"><?=$role->role_name?></td>
        <td class="text-center"><?=anchor('admin/role/edit/'.$role->id,'<i class="glyphicon glyphicon-edit btn btn-primary"></i>')?>
          <?=anchor('admin/role/delete/'.$role->id,'<i class="glyphicon glyphicon-trash btn btn-danger"></i>')?></td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
</div>
</div>
<?php else:?>
  <?php echo"<div class='alert alert-info text-center'>"."No roles to display"."</div>";?>
<?php endif;?>
  <div class="col-md-2">

  </div>
</div>
