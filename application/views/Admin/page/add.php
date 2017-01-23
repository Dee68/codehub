<h1 class="page-header text-center">Add a New Page</h1>
<div class="row">
  <div class="col-md-2">

  </div>
  <div class="col-md-8">
    <?=form_open('')?>
    <div class="form-group">
    <?=validation_errors('<p style="color:red">','</p>')?>
    <?=form_label('Page Title','title')?>
    <?php $data = ['name'=>'title',
    'class'=>'form-control','value'=>set_value('title')];?>
    <?=form_input($data)?>
    </div>
    <div class="form-group">
      <?=form_dropdown('category',$options,0,'class="form-control"')?>
    </div>
    <div class="form-group">
     <?php $data = ['name'=>'body',
     'class'=>'form-control',
     'id'=>'txar',
     'value'=>set_value('body')];?>
     <?=form_textarea($data)?>
    </div>
    <!-- published -->
    <div class="form-group">
      <?=form_label('Published','is_published')?>
      <?=form_radio('is_published',1,TRUE)?>Yes
      <?=form_radio('is_published',0,FALSE)?>No
    </div>
    <!-- feartured -->
    <div class="form-group">
      <?=form_label('Feartured','is_feartured')?>
      <?=form_radio('is_feartured',1,FALSE)?>Yes
      <?=form_radio('is_feartured',0,TRUE)?>No
    </div>
    <!-- Menu -->
    <div class="form-group">
      <?=form_label('Add To Menu ','in_menu')?>
      <?=form_radio('in_menu',1,TRUE)?>Yes
      <?=form_radio('in_menu',0,FALSE)?>No
    </div>
    <!-- Grade/Order -->
    <div class="form-group">
     <?=form_label('Order','grade')?>
     <input type="number" class="form-control" name="grade" id="grade">
    </div>
   <?=form_submit('submit','Add Page','class="btn btn-primary"')?>
    <?=form_close()?>
  </div>
  <div class="col-md-2">

  </div>
</div>
