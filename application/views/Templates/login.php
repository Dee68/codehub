<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/login/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?=base_url()?>assete/login/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/login/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?=base_url()?>assets/login/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <?=form_open('admin/user/login','class="form-signin"')?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <?=validation_errors('<div class="alert alert-danger text-center">','</div>')?>
         <?php if($this->session->flashdata('error')):?>
            <?php echo "<div class='alert alert-danger text-center'>".$this->session->flashdata('error','Invalid login')."</div>";?>
         <?php endif;?>
        <?php $data = [
          'name'=>'useremail',
          'id'=>'inputEmail',
          'class'=>'form-control',
          'placeholder' =>'UserEmail'
        ];
        echo form_input($data);?>
        <br />
        <?php $data = [
          'name'=>'password',
          'type'=>'password',
          'id'=>'inputPassword',
          'class'=>'form-control',
          'placeholder' =>'Password'
        ];
        echo form_input($data);?>
        <br />
        <!--
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
      -->
        <?=form_submit('submit','Sign in',['class'=>'btn btn-lg btn-primary btn-block'])?>
        <!--
      </form>
    -->
    <?=form_close()?>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url()?>assets/login/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
