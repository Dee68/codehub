<h1>Update <?=strtoupper($username).'\'s'?> profile</h1>
<?=form_open_multipart('admin/profile/update/'.$item->id)?>
<?=validation_errors('<p style="color:red">','</p>')?>

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
          $data = ['name'=>'first',
          'class'=>'form-control',
          'placeholder'=>'First Name',
          'value'=>$item->first_name];
          echo form_input($data);?>
        </div></td>
      </tr>
      <tr>
        <td><div class="form-group">
            <?php
            $data = ['name'=>'last',
            'class'=>'form-control',
            'placeholder'=>'Last Name',
            'value'=>$item->last_name];
            echo form_input($data);?>
          </div></td>
      </tr>
      <tr>
        <td><div class="form-group">
            <?php
            $data = ['name'=>'birthdate',
            'class'=>'form-control',
            'id'=>'datepicker',
            'placeholder'=>'Birthdate',
              'type'=>'text',
              'value'=>$item->birthdate
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
            $data = ['name'=>'email',
            'class'=>'form-control',
            'placeholder'=>'Email',
            'value'=>$item->email];
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
          <?=form_submit('submit','Update profile',['class'=>'btn btn-primary'])?>
          <?=anchor('admin','<i class="btn btn-danger">Cancel</i>')?>
        </td>
      </tr>
    </tbody>
  </table>
<?=form_close()?>
