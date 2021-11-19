<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Delivery for newbies</title>
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
      <div class="row image-bg" style="margin-right:1em;height:14em;background: url(<? echo base_url(); ?>assets/images/<? echo $restaurant->thumbnail; ?>);">
        <div class="col-md-12">
            <h1 class="text-white" style="position:relative;top:2em;"><? echo $restaurant->name; ?></h1>
        </div>
      </div>

      <div class="row align-items-center" style="width:100%;"> <!-- seccion de usuarios -->
        <?php $this->load->view('user_section_view'); ?>
            
      </div> <!-- row -->

      <?php if(isset($menu)): ?>
      <div class="row">
        <div class="col-sm-6">
          <h3>Menu</h3>  
            <?php foreach($menu as $item): ?>
            <div class="row">
                <div class="col-sm-12"> 
                    <div class="card">
                        <div class="card-header" style="display:flex;">
                        <h5 class="card-title"><?php echo $item->name; ?></h5>
                        <p class="text-muted" style="margin-left:6em;"><em><? echo $item->course; ?></em></p>
                        </div>
                        <div class="card-body row"> 
                            <div class="col-8">
                                <p class="card-text" id="meal_<?php echo $item->menu_id; ?>"><?php echo $item->name; ?></p>
                                <p class="text-muted"><em><?php echo $item->description; ?></em></p>
                            </div>
                            <div class="col-4">
                                <p class="card-text">$<?php echo $item->price; ?></p>
                                <input type="hidden" id="price_<?php echo $item->menu_id; ?>" value="<? echo $item->price;?>">
                                <input type="number" class="form-control" id="menu_<?php echo $item->menu_id; ?>" value="0" min="0" max="10">
                                <button type="button" class="btn btn-primary" onclick="addToCart(<?php echo $item->menu_id; ?>);">Add</button>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-6">
            <h3>Order Cart</h3>
            <div class="row">
                <div class="col-12" id="cart">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="card-title">Total</h5>
                </div>
                <div class="col-sm-6">
                    <h5 class="card-title" id="ptotal">$0.00</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="card-title">Delivery Fee</h5>
                </div>
                <div class="col-sm-6">
                    <h5 class="card-title" id="pdelivery">$15.00</h5>
                </div>
            </div>
            <div class="row">
                <?php if(isset($user)): ?>
                    <button type="button" class="btn btn-success" onclick="checkout();">Checkout</button>
                <?php endif; ?>
            </div>
        </div>
        </div>
      <?php endif; ?>
   </div>
    </div>

    <!-- modal to show cart -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Checkout Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12" id="cart_modal">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="card-title">Total</h5>
                </div>
                <div class="col-sm-6">
                    <h5 class="card-title" id="mptotal">$0.00</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Hi, <?php echo ($user ? $user->name : ' stranger'); ?> we have your order, expect it in around 15-25min. Have a nice meal.</p>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer_view'); ?>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>assets/css/styles.css">

    <script src="<? echo base_url(); ?>assets/js/main.js"></script>
    <script src='<? echo base_url(); ?>assets/js/moment.js' type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            // when the form is submitted call a function async to submit the form
            $("#btnRegisterUser").on('click', function() {
                var data = {
                    name: $("#name").val(),
                    phone: $("#phone").val(),
                    address: $("#address").val()
                };
                console.log(data);
                $.ajax({
                    type: "POST",
                    ContentType: "application/json",
                    url: "<?php echo base_url(); ?>users/new_user",
                    data: data,
                    success: function(response) {
                        if(response) {
                            alert("User registered successfully");
                            // redirect to url
                            window.location.href = window.location.href + "&uid=" + response.user_id;
                        } else {
                            alert("Error registering user");
                        }
                    }
                });
            });

            <?php if($this->input->get('mid')): ?>
                $("#menu_" + <?php echo $this->input->get('mid'); ?>).val('1');
                addToCart(<?php echo $this->input->get('mid'); ?>);
            <?php endif; ?>
            
        });
    </script>
  </body>
</html>