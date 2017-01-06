<?php include_once("include/header.php"); ?>
  </head>
  <body>
  <?php include_once("include/analyticstracking.php"); ?>
  
     <div class="container">
     <?php include_once("include/top-header.php"); ?>
 <div class="row">
      		<div class="col-lg-5 col-md-5 col-sm-5">
        		<img src="images/book-img.png" class="img-responsive book-img-st"  >
       		 </div>
           <div class="col-lg-7 col-md-7 col-sm-7">
           	<div class="slogan-margin">
             		<img src="images/slogan.png" class="img-responsive" >
                </div>    
                
              <!--  <span><strong>Price:</strong> &pound; 25.00</span><span class="avial-blk"><strong>Available in :</strong> Hardback</span> <span class="buy_button"><a href="#">Buy from Amazon</a></span>-->
                <div class="row">
                	<div class="col-xs-4 col-sm-4 col-md-3"><span><strong>Price:</strong> &pound; 19.95</span></div>
                  <div class="col-xs-8 col-sm-8 col-md-4"><span class="avial-blk"><strong>Available in :</strong> Hardback</span></div>
                  <!--<div class="col-xs-12 col-sm-12 col-md-5"><div class="buy_button"><a href="buy-now.html">Pre-order Now</a></div></div>-->
                  <?php if($buyFunctionCodeStr=="pre-order"){ ?>
                  <div class="col-xs-12 col-sm-12 col-md-5"><strong >Book Launches:</strong> April 28<sup>th</sup> 2014</div>
				  <?php } elseif($buyFunctionCodeStr=="buy-now"){ ?>
                  <div class="col-xs-12 col-sm-12 col-md-5">
				<div class="buy_button" ><a href="http://www.amazon.co.uk/gp/product/1907998160" target="_blank">Buy from Amazon</a></div>
                </div>
				<?php } ?>
                </div>
                </div>
          		<div >
				<?php if($buyFunctionCodeStr=="pre-order"){ ?>
				<div class="buy_button" style="margin-top:15px; margin-right:50px;"><a href="order-now.php">Pre-order Now</a></div>
				<?php } ?>
				</div>
        </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
          <div class="highlight-blk text-justify">
          <h2>About the Book</h2>
          <p> This book contains over 40 fabulous recipes from the kitchens of  The Brilliant Restaurant. The writer of  the book has focused on healthy ingredients and low-fat cooking techniques.</p>
<p>In this book, Dipna reveals the secrets behind her success. Follow her simple advice, and you too will be producing Brilliant food in no time.<br/><a href="about-beyond-brilliant-book.php" class="pull-right">know more about book...</a> </p>

          </div>
        </div>
        <!--<div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
          <div class="highlight-blk">
          <h2>Customer Reviews</h2>
         <blockquote class="style1"><span>I love to cook and eat. I have loads of cookbooks. This is the best book I have seen.</span></blockquote>
          <div class="client-name">Johan Smith</div>
          <a href="reviews.php" class="pull-right">view  more  reviews...</a>
          </div>
        </div>-->
      </div>
      	<div class="row">
        	<div class="col-lg-12">
      			<div class="socials">
                <h2>Beyond Brilliant Restaurant</h2>
    <p> <img src="images/brilliantrestaurant.png" class="pull-left" style="margin-right:15px;">An award-winning North Indian Punjabi family run restaurant voted as one of Ramsay&rsquo;s Best for the Channel 4 series. The Restaurant represents 150 years of catering experience and expertise and our unique recipes are now in their third generation. At the heart of the business is devotion to authentic, fresh and superbly prepared food, making us truly &ldquo;The Only One Of Its Kind&rdquo;.<Br/>
      <a href="http://www.brilliantrestaurant.com/" target="_blank" class="pull-right clearfix ">Visit Brilliant Restaurant</a></p>
  </div>
  			</div>
           
            </div>
  	
      <div class="row"  >
          <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 ">
          	<div class="highlight-blk text-justify"  >
              <h2>About the Author</h2>
              <p><img src="images/dipna-anand-hm.jpg" alt="Dipna Anand"  style="float:left; margin: 0 20px 0px 0; height:300px;" class="img-responsive thumbnail"><strong>She&rsquo;s a woman on a mission </strong>&ndash; a mission to prove that Indian food can be tasty and good for you at the same time. And if anyone can succeed in this mission, it&rsquo;s Dipna Anand&hellip;</p>
         
<p> As the third generation of a family of chefs, Dipna has cooking in her blood. For almost 40 years, her family&rsquo;s restaurant, the Brilliant, has served traditional Punjabi cuisine of the highest order &ndash; praised by everyone from Prince Charles to Gordon Ramsay, who named the Brilliant one of his &lsquo;Best Restaurants&rsquo; for his Channel 4 TV show. 

<p> Now Dipna is taking the restaurant to new heights, building on those authentic recipes with ones of her own, which focus on healthy ingredients and low-fat cooking techniques. It&rsquo;s a pioneering approach that&rsquo;s set to shake up the world of Indian food.

<p> In this book, Dipna reveals the secrets behind her success. Follow her simple advice, and you too will be producing Brilliant food in no time.</p> 

<p style="text-align:center"><strong >BOOK LAUNCHES APRIL 28<sup>TH</sup> 2014</strong></p>

          
          <a href="about-the-author.php" class="pull-right">click to know more...</a>
          </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 ">
          		<div class="pulishing-blk text-justify">
          			<h2>About the publisher</h2>
                    <img src="images/RMC Books.png" style="float:left; margin-right:15px;"  >
                    <p><strong>RMC books is an award-winning publisher, specialising in cookbooks for restaurants  across the UK.</strong></p>
                   <p> Our impressive track record of publishing award winning cook books has seen our titles win Top 50 Independent Newspaper Cook Book of the Year, Award Winner at the New York book festival and recently two entrants into the prestigious Gourmand World Cook Book Awards. </p>
<p> We excel in taking a book title from initial conception through to completion, handling all elements of editorial, design and photography with our clients. We will also market and distribute</p>
<p><strong>Specialties</strong><Br/>
Bespoke Book Publishing, Cook Book Publishing, Profitable Book Ventures, Book Design, Book Photography</p><br/>
              
              <a href="about-publisher.php" class="pull-right">click to know more...</a><br/><br/>
          </div>
          
          </div>
      </div>
      
      <div>
           <a href="http://www.amazon.co.uk/gp/product/1907998160" target="_blank" class="big-btn hidden-xs">click to buy</a>
           <div class="buy_button visible-xs"><a href="http://www.amazon.co.uk/gp/product/1907998160" target="_blank">Click here to purchase your copy of the 'BEYOND BRILLIANT' recipe book</a></div>
           </div>
      
      <?php include_once("include/footer.php"); ?>

    </div> <!-- /container -->

     <?php include_once("include/footer-js.php"); ?>
  </body>
</html>
