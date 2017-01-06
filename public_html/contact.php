<?php
include_once("include/connect.php");

include "include/class.phpmailer.php";

if(isset($_POST['submit'])) 
{
	
	$name=addslashes($_POST['name']);
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$query=$_POST['query'];
	
	$timestamp = time();
	$nowDate = date('Y-m-d');
	$nowTime = date('H:i:s');
	
	$notes_arr = array('Query' => $query);
	$query=addslashes($query);
	
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
						'$phone', '$phone', '', UUID(), '".SERVER_NUMBER."', '".SITE_GUID."', '', '0', 	
						'', '".addslashes(json_encode($notes_arr))."', '', '0', '0', '0', '', '$subject'
					)";
	$db->query($query_enq);
	
	
	$msg = "<table border=0><tr><td colspan=\"2\">We have just received the following enquiry from Beyond Brilliant Book :</td></tr>";
	$msg .= "<tr><td></td></tr>";
	$msg .= "<tr><td>Name:</td><td>".$name."</td></tr>";
	$msg .= "<tr><td>Email Address:</td><td>".$email."</td></tr>";
	$msg .= "<tr><td>Contact Number:</td><td>".$phone."</td></tr>";
	$msg .= "<tr><td>Subject:</td><td>".$subject."</td></tr>";
	$msg .= "<tr><td>Query:</td><td>".$query."</td></tr>";
	$msg .= "</table>"; 
	$mail = new PHPMailer(true); 		// the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSMTP();                    // Set mailer to use SMTP
	$mail->Host = MAIL_HOST;  // Specify main and backup server
	$mail->SMTPAuth = true;             // Enable SMTP authentication
	$mail->Username = MAIL_USERNAME;    // SMTP username
	$mail->Password = MAIL_PASSWORD;     // SMTP password

	//$mail->SMTPSecure = 'tls';
	
	//mail to user for confirmation
	$debugModeBool = false;
	try {
		
		
		$mail->AddReplyTo($email);
		$mail->AddAddress(ADMIN_MAIL);
		$mail->AddCC(CC_MAIL);
		$mail->AddBCC(BCC_MAIL);
		$mail->SetFrom($email,$name);
		$mail->Subject = $subject." Enquiry";
		
		$mail->MsgHTML($msg);
		$mail->Send();
		$mail->ClearAddresses();
		$succ_msg="Your enquiry has been submitted successfully";
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
  <?php include_once("include/analyticstracking.php"); ?>
     <div class="container">
     <?php include_once("include/top-header.php"); ?>      
      <div id="breadcrum">
      <a href="index.php">Home</a> &raquo; <span>Contact Us</span>
      </div>
         
      <div class="row" style="margin:0px;" >
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 inr-pg-cont-blk">
              <h2>Contact Us</h2>
			  
	  <div class="row">
               	<div class="col-lg-5 ">
                
                <?php if(isset($succ_msg) && $succ_msg!='') { echo '<p style="color:#006600">'.$succ_msg.'</p>'; } ?> 
<?php if(isset($err_msg) && $err_msg!='') { echo '<p style="color:#FF0000">'.$err_msg.'</p>'; } ?> 
              <p>
			  
			  <form class="cont-form" role="form"  id="frm_contact" method="post" action="contact.php">

 <div class="form-group" style="position:static!important;" >
    <label for="" class=" control-label">Name <sup>*</sup> </label>
    <div class="">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="" class="control-label">Email <sup>*</sup></label>
    <div >
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
  </div>
  
  <div class="form-group">
    <label for="" class="control-label">Phone <sup>*</sup></label>
    <div>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number">
    </div>
  </div>
  <div class="form-group">
                <label for="" class="control-label">Subject <sup>*</sup></label>
                <div>
                <select class="form-control" id="subject" name="subject" >
                <option value="">--Select Subject--</option>
                <option value="Press">Press</option>
                <option value="Book">Book</option>
                <option value="Recipes">Recipes</option>
                <option value="Suggestions">Suggestions</option>
                <option value="General">General</option>
                
                
                </select>
                </div>
                
                   </div>
                   
           <div class="form-group">
    <label for="" class="control-label">Query <sup>*</sup></label>
    <div>
       <textarea class="form-control" rows="3" id="query" name="query" placeholder="Enter your questions, query etc."></textarea>
    </div>
    </div>        
                           
  
  <div class="form-group">
    <div>
      <button type="submit" class="btn submit-btn" id="submit" name="submit">Submit</button>
    </div>
  </div>
</form>       	</div>
                 	<div class="col-lg-6 col-lg-offset-1">
                    <p><span class="contact-hding">To contact Dipna Anand or The Brilliant Restaurant:</span></p>
                    <p>Brilliant Restaurant <Br/>72-76 Western Road<Br/>Southall<Br/>UB2 4LS  </p>
                    <p><span class="contact-hding">Telephone: </span><br/>0208 574-1928 or 0208 843-2055</p>
                     <p><span class="contact-hding">Email: </span><br/><a target="_blank" href="mailto:info@brilliantrestaurant.com">info@brilliantrestaurant.com</a></p>
                
                 <p><span class="contact-hding">Websites: </span><br/><a target="_blank" href="http://www.brilliantrestaurant.com">www.brilliantrestaurant.com</a><br/><a target="_blank" href="http://www.dipna.com">www.dipna.com</a><br/><a target="_blank" href="http://www.beyondbrilliantbook.com">www.beyondbrilliantbook.com </a><br/></p>
                 
                 <p><span class="contact-hding">For all press enquiries contact:</span></p>
                <p> London Flair PR, Publicists & Public Relations Company<br/>
UK: Regent Street, London, W1B   <br/>
TEL UK: 0203 371 7945<br/>
 Email:<a target="_blank" href="mailto: info@londonflairpr.com"> info@londonflairpr.com</a>
 </p>
 <p><a href="https://www.facebook.com/ChefDipna" target="_blank"><img src="images/facebook_32.png"></a> <a href="https://twitter.com/dipnaanand" target="_blank"><img src="images/twitter_32.png"></a></p>
                 
                 
                 
                 
            
                	</div>
              
               </div>
      </div>
        <?php include_once("include/right.php"); ?>
          
      </div>
      
     
      
      <?php include_once("include/footer.php"); ?>

    </div> <!-- /container -->

    <?php include_once("include/footer-js.php"); ?>
	 <script src="js/jquery.validate.js"></script>
   <script type="text/javascript">

$(document).ready(function(){
	$('#name').focus();
   		$("#frm_contact").validate({
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			},
			phone: "required",
			subject: "required",
			query:  "required",
		},
		messages: {
			name: "Please enter your Name",
			email: {
				required: "Please enter your Email address",
				email: "Please enter a valid Email address"
			},
			phone: "Please enter your Contact Number",
			subject: "Please select Subject",
			query: "Please enter your questions, query etc.",
		}
	});
   
   });
   </script>
  </body>
</html>
