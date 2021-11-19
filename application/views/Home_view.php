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
      <div class="row align-items-center">
        <div class="col-12">
          <h2 class="h1-home-header">Restaurants available <? if($this->input->get('k')){ echo ' matching keyword ' . $this->input->get('k'); } ?></h2>
          <div class="row">
          <?php if(isset($restaurants)): ?>
            <?php foreach($restaurants as $restaurant): ?>
              <div class="card col-sm-4 mb-3" style="height:14em;">
                <div class="card-body image-bg" style="background:url(<? echo base_url(); ?>assets/images/<?php echo $restaurant->thumbnail; ?>);">
                  <h5 class="card-title text-white"><?php echo $restaurant->name; ?></h5>
                  <p class="card-text"><?php echo $restaurant->description; ?></p>
                  <a href="<? echo base_url();?>cart/new_order?rid=<?php echo $restaurant->restaurant_id; ?>" class="btn btn-primary">order here</a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div> <!-- end restaurantes -->
      </div>
      <?php if(isset($random_meals)): ?>
      <div class="row">
        <div class="col-12">
        <h2 class="h1-home-header">Unsure what to order? See this options from our partners</h2>
        </div>
        <!-- display random menu items -->   
            <?php foreach($random_meals as $item): ?>
            <div class="col-sm-4"> 
              <div class="card mb-3" style="height:14em;">
                <div class="card-body image-bg" style="background:url(assets/images/<?php echo $item->item_thumbnail; ?>);">
                  <div class="bg-dark text-white mt-5">
                    <h5 class="card-title"><?php echo $item->name; ?></h5>
                    <p class="card-text text-small"><?php echo $item->restaurant_name; ?></p>
                  </div>
                  <a href="<? echo base_url();?>cart/new_order?rid=<?php echo $item->restaurant_id; ?>&mid=<?php echo $item->menu_id; ?>" class="btn btn-primary">Order this</a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

        </div> <!-- end menu -->
      
      <?php endif; ?>

      <?php if(isset($keywords)): ?>
      <div class="row">
        <div class="col-12">
        <h2 class="h1-home-header">What kind of food can you order? Here is some ideas</h2>
        </div>
        <div class="col-12">
        <!-- display random menu items -->   
            <?php 
            $roullete = 0;
            foreach($keywords as $item):
              if($item == '')
                continue;

              switch($roullete){
                case 0:
                    $type = 'primary';
                    break;
                case 1:
                    $type = 'success';
                    break;
                case 2:
                    $type = 'info';
                    break;
                case 3:
                    $type = 'warning';
                    break;
                case 4:
                    $type = 'danger';
                    $roullete = -1;
                    break;
                }
                $roullete++;
                ?>
            
              <a href="<? echo base_url() . '?k=' . $item; ?>" type="button" class="btn btn-<? echo $type; ?>"><? echo $item;?></a>
            
            <?php endforeach; ?>
          </div>
        </div> <!-- end menu -->
      
      <?php endif; ?>
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