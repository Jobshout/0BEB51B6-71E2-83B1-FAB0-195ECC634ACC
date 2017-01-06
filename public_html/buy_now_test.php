<?php
include_once("include/connect.php");

//$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
//$paypal_id='tanima.gupta@rediffmail.com'; // Business email ID

include "include/class.phpmailer.php";

if(isset($_POST['submit'])) 
{
	$name=addslashes($_POST['name']);
	$phone=$_POST['phone'];
	$email=$_POST['email'];

	$quantity=$_POST['qty'];
	$del_charges=str_replace('Â','',$_POST['del_charges']);
	$addr=addslashes($_POST['addr']);
	
	$subject="Pre-order";
	
	$timestamp = time();
	$nowDate = date('Y-m-d');
	$nowTime = date('H:i:s');
	
	$notes_arr = array('Quantity' => $quantity, 'Delivery Chagres' => $del_charges, 'Address' => $addr);
	
	$query_enq="INSERT INTO `web_enquiries` (
						`SiteID`, `Created`,`Modified`,`Code`,`Title`,`Firstname`,`Middlename`,`Lastname`,
						`Telephone`,`Fax`,`Email`,`CustomerID`,`zDeleted`,`zStatus`,`zPassword`,
						`zCookie`,`DateRegistered`,`TimeRegistered`,`Name`,`Telephone_daytime`,
						`Mobile`,`JobTitle`,`GUID`,`Server_Number`,`Site_GUID`,`Customer_GUID`,`WYSIWYG_Editor_type`,
						`Notice_period`,`Notes`,`External_ID`,`StatusAlerts`,`Sync_Modified`,`Email_Preferences`,
						`Rank`, `enquiry_type`
					)
					VALUES (
						'".SITE_ID."', '$timestamp', '$timestamp', '$email', '', '', '', '',
						'$phone', '', '$email', '0', '0', 'ACTIVE', '', 
						'', '$nowDate', '$nowTime', '$name', 
						'$phone', '$phone', '', UUID(), '', '".SITE_GUID."', '', '0', 	
						'', '".json_encode($notes_arr)."', '', '0', '0', '0', '', '$subject'
					)";
	$db->query($query_enq);

	$msg = "<table border=0><tr><td colspan=\"2\">We have just received the following order request from Beyond Brilliant Book :</td></tr>";
	$msg .= "<tr><td></td></tr>";
	$msg .= "<tr><td>Name:</td><td>".$name."</td></tr>";
	$msg .= "<tr><td>Email Address:</td><td>".$email."</td></tr>";
	$msg .= "<tr><td>Contact Number:</td><td>".$phone."</td></tr>";
	$msg .= "<tr><td>Address:</td><td>".$addr."</td></tr>";
	$msg .= "<tr><td>Quantity:</td><td>".$quantity."</td></tr>";
	$msg .= "<tr><td>Delivery Charges:</td><td>".$del_charges."</td></tr>";
	$msg .= "</table>"; 
	$mail = new PHPMailer(true); 		// the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSMTP();                    // Set mailer to use SMTP
	$mail->Host = 'smtp.sendgrid.net';  // Specify main and backup server
	$mail->SMTPAuth = true;             // Enable SMTP authentication
	$mail->Username = 'tenthmatrix';    // SMTP username
	$mail->Password = 'AugMem8201';     // SMTP password
	//$mail->SMTPSecure = 'tls';
	
	//mail to user for confirmation
	$debugModeBool = false;
	try {
		
		
		$mail->AddReplyTo($email);
		$mail->AddAddress("tanima.gupta@jobshout.co.in");
		//$mail->AddAddress(ADMIN_MAIL);
		//$mail->AddCC(CC_MAIL);
		$mail->SetFrom($email,$name);
		$mail->Subject = "Order for Book";
		
		$mail->MsgHTML($msg);
		$mail->Send();
		$mail->ClearAddresses();
		$succ_msg="Your order has been placed successfully";
	}
	catch (phpmailerException $e) {
		$err_msg=$e->errorMessage(); 
	}
	catch (Exception $e) {
		$err_msg=$e->getMessage(); 
	
	}//Sending email to admin ENDS Here.
}


?>
<?php include_once("include/header.php"); ?>
	 <style>
 #frm_contact label.error {
	/* remove the next line when you have trouble in IE6 with labels in list */
	color: red;
	font-style: italic;
	font-weight:normal;
	display:block;
	width:auto!important;
}
sup{
color: red;
}
 </style>  
  </head>
  <body class="inr-pg-bg">  
     <div class="container">
     <?php include_once("include/top-header.php"); ?>      
      <div id="breadcrum">
      <a href="index.php">Home</a> &raquo; <span>Pre-order Book</span>
      </div>
         
     <div class="row" style="margin:0px;" >
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 inr-pg-cont-blk" >
              <h2>Pre-order Book</h2>
			  
	  <div class="row">
	 
               	
                 <?php if(isset($succ_msg) && $succ_msg!='') { echo '<p style="color:#006600;margin-left:15px;">'.$succ_msg.'</p>'; } ?> 
<?php if(isset($err_msg) && $err_msg!='') { echo '<p style="color:#FF0000;margin-left:15px;">'.$err_msg.'</p>'; } ?>  
            
   <form class="cont-form" role="form"  id="frm_contact" method="post" action="">
			  
			  
			  <?php if(false) { ?>
			  <form class="cont-form" role="form"  id="frm_contact" action="<?php //echo $paypal_url; ?>" method="post" name="frmPayPal1">
			  
	<input type="hidden" name="business" value="<?php //echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Beyond Brilliant Book">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" id="amount" value="19.95">
	<input type="hidden" name="quantity" id="quantity" value="1">
    <input type="hidden" name="cpp_header_image" value="http://www.beyondbrilliantbook.com/images/beyond-brilliant-book.png">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="GBP">
    <input type="hidden" name="handling" id="handling" value="4.99">
    <input type="hidden" name="cancel_return" value="http://demo.phpgang.com/payment_with_paypal/cancel.php">
    <input type="hidden" name="return" value="http://demo.phpgang.com/payment_with_paypal/success.php">
    <?php } ?>
    
			  

         
  <div class="form-group col-lg-5" >
    <label for="" class=" control-label">Name <sup>*</sup> </label>
    <div class="">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
  </div>
  
  <div class="form-group  col-lg-5">
    <label for="" class="control-label">Email <sup>*</sup></label>
    <div >
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
  </div>
  
  <div class="form-group col-lg-5">
    <label for="" class="control-label">Phone <sup>*</sup></label>
    <div>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number">
    </div>
  </div> 
  
  <div class="form-group col-lg-5" >
    <label for="" class=" control-label">Quantity <sup>*</sup> </label>
    <div class="">
      <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" value="1">
    </div>
  </div>
  
  <div class="form-group col-lg-5">
    <label for="" class="control-label">Address <sup>*</sup></label>
    <div>
       <textarea class="form-control" rows="3" id="addr" name="addr" placeholder="Enter your Address"></textarea>
    </div>
    </div>        
  
   



  <div class="form-group col-lg-5">
                <label for="" class="control-label">Delivery address destination <sup>*</sup></label>
                <div>
                <select class="form-control" id="del_charges" name="del_charges" >
                <option value="">--Select delivery address destination--</option>
                <option value="UK (&pound;4.99)">UK (&pound;4.99)</option>
                <option value="Outside UK (&pound;7.99)">Outside UK (&pound;7.99)</option>
                </select>
                </div>
                
                   </div>     
                           
  
  <div class="form-group col-lg-10">
    <div>
      <button type="submit" class="btn submit-btn" id="submit" name="submit">Submit</button>
	  <?php if(false) { ?>
	 <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	 <?php } ?>
    </div>
  </div>
</form>       	
         	
              
               </div>
			   
			 <p class="buynowpg">Beyond Brilliant will be available from<br/> <span style="color:#ed8000;">28th April</span> <br/>to purchase from The Brilliant Restaurant in Southall or <br/> alternatively you will be able to purchase your copy of the book online</p>
<p class="note"><strong>Please note:</strong> Every person that buys a copy of the book from the Brilliant Restaurant, will receive a copy of Brilliant&rsquo;s secret Garam Masala spice blend!</p>
      </div>
        <?php include_once("include/right.php"); ?>
          
      </div>
      
     
      
      <?php include_once("include/footer.php"); ?>

    </div> <!-- /container -->

    <?php include_once("include/footer-js.php"); ?>
	 <script src="js/jquery.validate.js"></script>
   <script type="text/javascript">

$(document).ready(function(){

   		$("#frm_contact").validate({
		rules: {
		name: "required",
			email: {
				required: true,
				email: true
			},
			phone: "required",
			qty: {
				required: true,
				digits: true,
				min: 1
			},
			del_charges: "required",
			addr:  "required",
		},
		messages: {
		name: "Please enter your Name",
			email: {
				required: "Please enter your Email address",
				email: "Please enter a valid Email address"
			},
			phone: "Please enter your Contact Number",
			qty: {
				required: "Please enter Quantity",
				digits: "Please enter valid Quantity",
				min: "Please enter valid Quantity",
			},			
			del_charges: "Please select delivery address destination",
			addr: "Please enter Address",			
		}
	});
	
	
	
	/*$('#del_charges').change(function(){		
		
		var del_charges= Number($(this).val());
		if(del_charges!=''){
			
			$('#handling').val(del_charges);
		}	
	});
	
	$('#qty').blur(function(){
		
		var qty= Number($(this).val());
		if(qty!=''){
			
			$('#quantity').val(qty);
		}	
	});*/
   
   });
   </script>
  </body>
</html>
