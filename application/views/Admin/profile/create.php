<h1><?=strtoupper($username).'\'s'?> profile</h1>
<?=form_open_multipart('admin/profile/create/'.$single->id)?>
<?=validation_errors('<p style="color:red">','</p>')?>
<?php if($this->session->flashdata('info')){
echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('info').'</div>';
}?>
<?php if($this->session->flashdata('error')){
echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('error').'</div>';
}?>
<?php if(isset($item)):?>
<div>
  <?=anchor('admin/profile/update/'.$item->id,'<i class="glyphicon glyphicon-edit btn btn-primary pull-right"></i>')?>
</div>
<?php endif;?>
  <table class="table table-bordered table-striped">
    <tbody>
      <tr>
        <?php
        if (empty($item->image)) {
          $source = 'uploads/images/user.jpg';
        }else {
        $source = 'uploads/images/'.$item->image;
        }?>
        <td rowspan="4" class="box"><?php $imgprop =[ 'src'   => $source,
        'alt'   => 'your picture goes here',
        'class' => 'post_images',
        'width' => '200',
        'height'=> '200',
        'title' => 'Profile picture',
        'rel'   => 'lightbox'];echo  img($imgprop);?></td>
        <td><div class="form-group">
          <?php
         if (isset($item->first_name)) {
           $value = $item->first_name;
         }else {
           $value = '';
         }
          $data = ['name'=>'first',
          'class'=>'form-control',
          'placeholder'=>'First Name',
          'value'=> $value];
          echo form_input($data);?>
        </div></td>
      </tr>
      <tr>
        <td><div class="form-group">
            <?php
            if (isset($item->last_name)) {
              $value = $item->last_name;
            }else {
              $value = '';
            }
            $data = ['name'=>'last',
            'class'=>'form-control',
            'placeholder'=>'Last Name',
            'value'=>$value];
            echo form_input($data);?>
          </div></td>
      </tr>
      <tr>
        <td><div class="form-group">
            <?php
            if (isset($item->birthdate)) {
              $value = $item->birthdate;
            }else {
              $value = '';
            }
            $data = ['name'=>'birthdate',
            'class'=>'form-control',
            'id'=>'datepicker',
            'placeholder'=>'Birthdate',
              'type'=>'text',
              'value'=>$value
            ];
           echo form_input($data);?>
         <!--
          <input type="text" name="birthdate" id="datepicker"  value=""class="form-control" placeholder="Birthdate"/>
        -->
          </div></td>
      </tr>
      <tr>
        <td><div class="form-group">
            <?php
            if (isset($item->email)) {
              $value = $item->email;
            }else {
              $value = '';
            }
            $data = ['name'=>'email',
            'class'=>'form-control',
            'placeholder'=>'Email',
            'value'=>$value];
            echo form_input($data);?>
          </div></td>
      </tr>

      <tr>
        <td colspan="2"><div class="form-group">
            <?php
            $data = ['name'=>'image',
            'class'=>'form-control',
            'placeholder'=>'image',
            'value'=>'',
          'type'=>'file'];
            echo form_upload($data);?>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="text-center">
          <?=form_submit('submit','Create profile',['class'=>'btn btn-primary'])?>
          <?=anchor('admin','<i class="btn btn-danger">Cancel</i>')?>
        </td>
      </tr>
    </tbody>
  </table>
<?=form_close()?>
