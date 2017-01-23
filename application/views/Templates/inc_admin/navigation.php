
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--
                <a class="navbar-brand" href="#">CMS</a>
              -->
                <?=anchor('admin','<i class="navbar-brand">CMS</i>')?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><?= anchor('admin','Dashboard','title="CMS Admin"')?></li>
                    <li><?= anchor('admin/category','Categories','title="CMS Admin | Categories"')?></li>
                    <li><?= anchor('admin/page','Pages','title="CMS Admin | Pages"')?></li>
                    <li><?= anchor('admin/role','Roles','title="CMS Admin | Roles"')?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li><?= anchor('/','<i class="glyphicon glyphicon-home"></i>  ','target="_blank"')?></li>
                    <?php if(isset($username)):?>
                    <li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="">
								<i class="glyphicon glyphicon-user"> <?=$username?></i>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
                <!--
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
              -->
								<li><?= anchor('admin/profile/create/'.$single->id,'<i class="glyphicon glyphicon-user"> Profile</i> ','title="CMS Admin"')?></li>
								<li><?= anchor('admin/logout','<i class="glyphicon glyphicon-off"> Logout</i> ','title="CMS Admin"')?></li>
							</ul>
						</li>
            <?php if($this->session->userdata('role_id')==3):?>
              <li>
                <?=anchor('admin/user','Users')?>
              </li>
                  <?php else:?>
                  <?php endif;?>
                <?php else:?>
                <?php endif;?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
