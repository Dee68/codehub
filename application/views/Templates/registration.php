<?php include 'inc_register/header.php';?>
              <?=form_open('register')?>
                <div class="body bg-gray">
                  <?=validation_errors('<p style="color:red">','</p>')?>
                  <?php if($this->session->flashdata('error')){
                    echo "<div class='alert alert-danger text-center' >".$this->session->flashdata('error')."</div>";
                  }?>
                    <div class="form-group">
                        <?php
                        $data = ['name'=>'name',
                            'class'=>'form-control',
                            'placeholder'=>'User name'];
                        echo form_input($data)?>

                    </div>
                    <div class="form-group">
                      <?php $data = [
                        'name'=>'email',
                        'type'=>'text',
                        'class'=>'form-control',
                        'placeholder'=>'Email'
                      ];?>
                          <?=form_input($data)?>
                    </div>
                    <div class="form-group">
                        <?=form_dropdown('role', $options,0,'class="form-control"')?>
                    </div>
                    <div class="form-group">
                      <?php $data = [
                        'name'=>'password',
                        'type'=>'password',
                        'class'=>'form-control',
                        'placeholder'=>'password'
                      ];?>
                        <?=form_input($data)?>
                    </div>
                    <div class="form-group">
                      <?php $data = [
                        'name'=>'password2',
                        'type'=>'password',
                        'class'=>'form-control',
                        'placeholder'=>'Retype password'
                      ];?>
                      <?=form_input($data)?>
                    </div>
                </div>
                <div class="footer">
                   <?=form_submit('submit','Sign me up','class="btn bg-olive btn-block"')?>

                 <!--
                 <button type="submit" class="btn bg-olive btn-block">Sign me up</button>
                    <a href="login.html" class="text-center">I already have a membership</a>
                 -->
                </div>
                <?=form_close()?>
                <!--
            </form>
          -->

          <?php include 'inc_register/footer.php';?>
