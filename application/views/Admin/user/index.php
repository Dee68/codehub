<h1 class="page-header text-center">The User Index page</h1>
<div class="row">
  <div class="col-md-12">
    <?php if($this->session->flashdata('error')){
      echo "<div class='alert alert-danger text-center' >".$this->session->flashdata('error')."</div>";
    }?>
    <?php if($users):?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">User Name</th>
          <th class="text-center">User Email</th>
          <th class="text-center">User Role</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user):?>
        <tr>
          <td class="text-center"><?=$user->username?></td>
          <td class="text-center"><?=$user->useremail?></td>
          <td class="text-center"><?=$user->role_name?></td>
          <td class="text-center"><?=anchor('admin/user/edit/'.$user->id,'<i class="glyphicon glyphicon-edit btn btn-primary"></i>')?>
            <?=anchor('admin/user/delete/'.$user->id,'<i class="glyphicon glyphicon-trash btn btn-danger"></i>')?></td>
        </tr>
      <?php endforeach;?>
      </tbody>
    </table>
  <?php else:?>
    <div class="alert alert-info text-center">
      <?php echo "<h4>"."No user to display"."</h4>";?>
    </div>
  <?php endif;?>
  </div>
</div>
