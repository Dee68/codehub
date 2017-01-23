<h2 class="page-header">This is the list of activities going on in the system</h2>
<div class="row">
  <?php if($this->session->flashdata('success')){
 echo '<div class="alert alert-success text-center">'.$this->session->flashdata('success').'</div>';
  }?>
  <div class="col-md-12">
    <div class="panel panel-success">
    <div class="panel-heading">
            <h2 class="panel-title text-center">Category Activities</h2>
            </div>
  <div class="panel-body">
    <ul class="list-group">
        <?php foreach($activities as $activity):
          $date = strtotime($activity->creat_date);
          $formatted_date = date('F j, Y , g : i a',$date);?>
      <li class="list-group-item"><?=$activity->message?>  <i class="pull-right"><?=$formatted_date?></i></li>
      <?php endforeach;?>
    </ul>
  </div>
  </div>
  <?php echo $this->pagination->create_links(); ?>

  </div>
  </div>
