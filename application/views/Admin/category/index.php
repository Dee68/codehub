<h1 class="page-header">List of Categories</h1>
<div class="row">
  <div class="col-md-12">
    <?php if($categories):?>
      <?php if($this->session->flashdata('success')){
     echo '<div class="alert alert-success text-center">'.$this->session->flashdata('success').'</div>';
      }?>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">Number</th>
          <th class="text-center">Category Name</th>
          <th class="text-center">Created Date</th>
          <th></th>
        </tr>

        <tbody>
          <?php $i=1;
          while ($i <= $count) :?>
          <?php foreach ($categories as $category):
            $date = strtotime($category->creat_date);
            $formatted_date = date('F j, Y , g: i a',$date);
             ?>
          <tr>
            <td class="text-center"><?=$i?></td>
            <td class="text-center"><?=$category->name?></td>
            <td class="text-center"><?=$formatted_date?></td>
            <td class="text-center"><?=anchor('admin/category/edit/'.$category->id,'<i class="glyphicon glyphicon-edit btn btn-primary"></i>')?>

                <a href="<?=base_url()?>admin/category/delete/<?=$category->id?>" onclick="return confirm('Are you sure ?')"><span class="glyphicon glyphicon-trash btn btn-danger"></span></a>
            </td>

          </tr>
          <?php $i++;?>
        <?php endforeach;?>
        <?php endwhile;?>
        </tbody>
      </thead>
    </table>
  <?php else:?>
    <div class="alert alert-info text-center">
      <?php echo "No cattegory to display"; ?>
    </div>
  <?php endif;?>
  </div>

</div>
