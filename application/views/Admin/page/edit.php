<h1 class="page-header text-center">Update Page</h1>
<div class="row">
  <div class="col-md-2">

  </div>
  <div class="col-md-8">
    <?=form_open('admin/page/edit/'.$item->id)?>
    <div class="form-group">
    <?=validation_errors('<p style="color:red">','</p>')?>
    <?=form_label('Page Title','title')?>
    <?php $data = ['name'=>'title',
    'class'=>'form-control','value'=>$item->title];?>
    <?=form_input($data)?>
    </div>
    <div class="form-group">
      <?=form_dropdown('category',$options,$item->category_id,'class="form-control"')?>
    </div>
    <div class="form-group">
     <?php $data = ['name'=>'body',
     'class'=>'form-control',
     'id'=>'txar',
     'value'=>$item->body];?>
     <?=form_textarea($data)?>
    </div>

    <!-- published -->
    <?php if($item->is_published == 1){
      $yes = TRUE;
      $no = FALSE;
    }else {
      $yes = FALSE;
      $no = TRUE;
    } ?>
    <div class="form-group">
      <?=form_label('Published','is_published')?>
      <?=form_radio('is_published',1,$yes)?>Yes
      <?=form_radio('is_published',0,$no)?>No
    </div>
    <!-- feartured -->
    <?php if($item->is_featured == 1){
      $yes = FALSE;
      $no = TRUE;
    }else {
      $yes = TRUE;
      $no = FALSE;
    } ?>
    <div class="form-group">
      <?=form_label('Featured','is_featured')?>
      <?=form_radio('is_featured',1,$yes)?>Yes
      <?=form_radio('is_featured',0,$no)?>No
    </div>
    <!-- Menu -->
    <?php if($item->in_menu == 1){
      $yes = TRUE;
      $no = FALSE;
    }else {
      $yes = FALSE;
      $no = TRUE;
    } ?>
    <div class="form-group">
      <?=form_label('Add To Menu ','in_menu')?>
      <?=form_radio('in_menu',1,$yes)?>Yes
      <?=form_radio('in_menu',0,$no)?>No
    </div>
    <!-- Grade/Order -->
    <div class="form-group">
     <?=form_label('Order','grade')?>
     <input type="number" class="form-control" name="grade" id="grade" value="<?=$item->grade?>">
    </div>
   <?=form_submit('submit','Update Page','class="btn btn-primary"')?>
    <?=form_close()?>
  </div>
  <div class="col-md-2">

  </div>
</div>
