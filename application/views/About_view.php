<?php
	error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Viaja a Vacunarte</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Delivery App for newbies">
    <meta name="keywords" content="delivery, app, home meal">
    
    <!-- Favicons-->
    <link rel="icon" type="image/png" sizes="256x256" href="/favicon.ico">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="<? echo base_url(); ?>assets/images/favicon.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    
  </head>
  <body>
    <?php $this->load->view('navbar_view'); ?>
    <!-- display main content -->
    <div class="container">      
      <div class="row image-bg app-header" style="margin-right:1em;height:14em;background: url(<? echo base_url(); ?>assets/images/foodie.jpg);">
        <div class="col-md-12">
            <h1 class="text-white" style="position:relative;top:2em;"><i class="fas fa-drumstick-bite"></i>Food Delivery for Newbies</h1>
        </div>
      </div>
      <div class="row" style="min-height:20em;">
        <p style="margin-top:6em;">
            So this is the Web App that I came with in the 24hrs or some.<br/>
            I wanted to take in account the layers needed for a food delivery app, like:<br/>
            The hosting, right now runs in a EC2 Instance with Amazon Linux 2<br/>
            The database is hosted in a the same server running MySQL.<br/>
            The server side runs in Apache with PHP 7.2<br/>
            Used Codeigniter 3.1.10, I choose this because of the size of the endevour, I don't need Laravel with the whole thing.<br/>
            The client side runs in plain HTML5, Javascript with jQuery and Bootstrap 4<br/>
            The App is intented to be responsive.</p>
   </div>
  </div>
   <?php $this->load->view('footer_view'); ?>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/css/styles.css">
  
    <script src='<? echo base_url(); ?>assets/js/moment.js' type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  
    </script>
  </body>
</html>