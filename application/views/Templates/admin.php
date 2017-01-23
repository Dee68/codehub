<?php
include_once"inc_admin/header.php";
//$this->template->layout('admin','admin','inc_admin/header');
      include_once"inc_admin/navigation.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <div class="col-sm-3 col-md-2 sidebar">
           <ul class="nav nav-sidebar">
             <li><?=anchor('admin/page/add','Add Pages','title="Add Page"')?></li>
             <li><?=anchor('admin/category/add','Add Categories','title="Add Category"')?></li>
             <li><?=anchor('admin/role/add','Add Roles','title="Add Role"')?></li>
           </ul>
              </div>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <!-- the content goes here -->
                <?php $this->load->view($content);?>
              </div>



        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->

   <script src = "<?=base_url()?>assets/admin/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
    <script>
    $(document).ready(function(){
    $(function() {
           $( "#datepicker" ).datetimepicker({ format: "yyyy.mm.dd",
        minDate: 0,
        showOtherMonths: true,
        firstDay: 1});
           $( "#datetpicker" ).datetimepicker("show");
        });
        });
    </script>

</body>

</html>
