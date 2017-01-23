<h1 class="page-header text-center">The index page</h1>
<div class="row">
  <div class="col-md-12">
    <?php if($pages):?>
      <?php if($this->session->flashdata('success')){
     echo '<div class="alert alert-success text-center">'.$this->session->flashdata('success').'</div>';
      }?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">Number</th>
          <th class="text-center">Page Title</th>
          <th class="text-center">Published</th>
          <th class="text-center">Author</th>
          <th class="text-center">Date Created</th>
          <th></th>
        </tr>
        <tbody>
          <?php $i=1;
          while($i<=$count):
          foreach ($pages as $page):
            $date = strtotime($page->creat_date);
            $formatted_date = date('F j, Y, g : i a',$date);
            $name = getpageauth($page->id);?>
            <?php if($page->is_published):
              $pageicon = 'glyphicon glyphicon-ok';?>
            <?php else:
              $pageicon ='glyphicon glyphicon-remove'; ?>
            <?php endif;?>
          <tr>
            <td class="text-center"><?=$i?></td>
            <td class="text-center"><?=$page->title?></td>
            <td class="text-center"><span class="<?=$pageicon?>"></span></td>
            <td class="text-center"><?php echo getusername($name);?></td>
            <td class="text-center"><?=$formatted_date?></td>
       <?php if($this->session->userdata('role_id') == 3):?>
            <td class="text-center"><?=anchor('admin/page/edit/'.$page->id,'<i class="glyphicon glyphicon-edit btn btn-primary"></i>')?>
              <?=anchor('admin/page/delete/'.$page->id,'<i class="glyphicon glyphicon-trash btn btn-danger"></i>')?></td>
        <?php elseif($this->session->userdata('username') == getusername($name)):?>
          <td class="text-center"><?=anchor('admin/page/edit/'.$page->id,'<i class="glyphicon glyphicon-edit btn btn-primary"></i>')?>
            <?=anchor('admin/page/delete/'.$page->id,'<i class="glyphicon glyphicon-trash btn btn-danger"></i>')?></td>
            <?php else:?>
              <td class="text-center"><?=anchor('admin/error','<i class="glyphicon glyphicon-edit btn btn-primary"></i>')?>
                <?=anchor('admin/error','<i class="glyphicon glyphicon-trash btn btn-danger"></i>')?></td>
            <?php endif;?>
          </tr>
          <?=$i++?>
        <?php endforeach;?>
      <?php endwhile;?>
        </tbody>
      </thead>
    </table>
  <?php else:?>
    <div class="alert alert-info text-center">
      <?php echo "<h4>"."No pages to display"."</h4>";?>
    </div>
  <?php endif;?>
  </div>
</div>
