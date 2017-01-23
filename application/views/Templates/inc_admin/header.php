<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
   <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/admin/style.css" rel="stylesheet">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
   <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
      selector:"#txar"
    });
    tinymce.init({
      selector:"#tarea"
    });
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
