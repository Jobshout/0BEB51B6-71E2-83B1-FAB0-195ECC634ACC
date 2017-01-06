<?php include_once("include/header.php"); 
$item_transaction   = $_REQUEST['tx']; // Paypal transaction ID
$item_price         = $_REQUEST['amt']; // Paypal received amount
$item_currency      = $_REQUEST['cc'];


$price = '19.95';
$currency='GBP';
?>
  </head>
  <body class="inr-pg-bg">  
  <?php include_once("include/analyticstracking.php"); ?>
     <div class="container">
     <?php include_once("include/top-header.php"); ?>   
     <div id="breadcrum">
      <a href="index.php">Home</a> &raquo; <span>Order Success</span>
      </div>
      
     <div class="row" style="margin:0px;" >
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 inr-pg-cont-blk" >
		  <?php
             if($item_price==$price && $item_currency==$currency)
			{
		?>
              <h2 style="color:#006600">Your order has been placed successfully !!!</h2>
			  
			<?php
			}
			else{
			?>
			<h2 style="color:#FF0000">There is some problem placing your order !!!</h2>
			<?php } ?>
                     
          </div>
       <?php include_once("include/right.php"); ?>
      </div>

      <?php include_once("include/footer.php"); ?>

    </div> <!-- /container -->

    <?php include_once("include/footer-js.php"); ?>
  </body>
</html>
