<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<?php include"head.php";
include("config.php");
?>

<body style="background-color: lightblue;">
	<!-- Header -->

	<!-- banner-slider -->
	<div class="w3l_banner_info" id="home">
		<div class="slider">
			<div class="callbacks_container">
				<!-- Navigation -->
				<?php include"top_nav.php"; ?>
				<!-- //Navigation -->
				<ul class="rslides" id="slider3">
					<li>
						<div class="slider-img b1">
						</div>
						<div class="slider_banner_info">
							<div class="w3ls-info">
								<h4>
									<span>B</span>lood
									<span>B</span>ank</h4>
								<p style="color:green ">You Can Save Many Life.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="slider-img b2">
						</div>
						<div class="slider_banner_info">
							<div class="w3ls-info">
								<h4>
									<span>Save</span>
									<span>Life </span></h4>
								<p style="color:green ">We are passionate about your ....</p>
							</div>
						</div>
					</li>
					<li>
						<div class="slider-img b3">
						</div>
						<div class="slider_banner_info">
							<div class="w3ls-info">
								<h4>
									<span>Donate</span>
									<span>Blood </span></h4>
								<p style="color:green ">We can improve your ....</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<!-- //banner-slider -->
	<!-- //Header -->
	<!-- Banner bottom -->

	<!-- //Banner bottom -->
	<!--about-->
	<div class="about-w3layouts" id="about">
		<div class="container">
			<div class="tittle-agileinfo">
				<h5 class="title-w3">About Us</h5>
				<div class="about-top">
					<h3 class="subheading-agileits-w3layouts">Welcome to our Blood Bank </h3>
					<p class="para-agileits-w3layouts">A blood bank is a center where blood gathered as a result of blood donation is stored and preserved for later use in blood transfusion. The term "blood bank" typically refers to a division of a hospital where the storage of blood product occurs and where proper testing is performed (to reduce the risk of transfusion related adverse events). However, it sometimes refers to a collection center, and indeed some hospitals also perform collection. </p>
				</div>
			</div>



		</div>
	</div>
	<!--//about-->
	<!-- Features -->
	<div class="features" id="features">
		<p  style="text-align: center;">
		<div class="col-md-6 banner-right-w3-agileits" >
			<iframe src="https://player.vimeo.com/video/138433283"></iframe>
	
		</div>
		</p>

		<div class="clearfix"> </div>
	</div>
	<!-- //Features -->
	<!-- bootstrap-pop-up -->
	
	<!-- //bootstrap-pop-up -->
	<!-- gallery -->
	<div class="gallery-w3layouts" id="portfolio">
		<div class="container-fluid">
			<h5 class="title-w3">Camps</h5>
			
				<?php 
				 $sql="SELECT * FROM camps";
					$result=$con->query($sql); 
					if($result->num_rows>0)
				while($row=$result->fetch_assoc())
		{
				 ?>
				 <div class="col-md-3 gallery-columns">
				<div class="gal_grid_outer">
					<a title="<?php echo $row["details"];?>"
					    href="camp_image/<?php echo $row["image"];?>">
						<div class="gal_grid_outer1">
							<img src="<?php echo $row["image"];?>" alt=" " class="img-responsive"  style="width:260px;height:180px;" />
							<div class="gallery_grid_pos">
								<h3>
									<?php echo $row["name"];?></h3>
							</div>
						</div>

					</a>
				</div>

         </div>
			<?php } ?>
				
			
			
			
		
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //gallery -->
	<!--team -->
	<div class="team" id="team">
		<div class="container">
			<h5 class="title-w3">Meet our Donor</h5>
			<div class="team-w3ls">
				<?php 
				 $sql="SELECT * FROM blood_donor LIMIT 4";
					$result=$con->query($sql); 
					if($result->num_rows>0)
				while($row=$result->fetch_assoc())
		{
				 ?>
				<div class="col-md-3 team-grid w3_agileits">
					<img class="img-w3l t1-wthree img-responsive" src="<?php echo $row["DONOR_PIC"];?>" alt="">
					<h6><?php echo $row["NAME"];?></h6>
					<p><?php echo $row["ADDRESS"];?>.</p>
					<div class="w3l-social">
						<ul>
							<li>
								<a href="#" class="fa fa-facebook"></a>
							</li>
							<li>
								<a href="#" class="fa fa-twitter"></a>
							</li>
							<li>
								<a href="#" class="fa fa-google-plus"></a>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				  <?php } ?>
				
				
				
				
			</div>
		</div>
	</div>
	<!-- //team-->
	<!-- testimonials -->
	<div class="test">
		<div class="container">
			<h5 class="title-w3">Receiver Feedback</h5>
			<div class=" test-gr">
				<div class=" test-gri1">
					<div id="owl-demo2" class="owl-carousel">
						<div class="agile">
							<div class="col-md-6 test-grid">
								<div class="test-grid1-agileinfo">
									<img src="images/li.jpg" alt="" class="img-r">
									<p>It provides the unique identification number at the time of blood donation camp which helps him for the future correspondence. MIS gives the unique user id and password for those donors who are applying online. ... As it is a web based application, its index page encourages the donor to donate the blood..</p>
									<h4>Maria</h4>
									<span>Dhaka</span>
								</div>
							</div>
							<div class="col-md-6 test-grid">
								<div class="test-grid1-agileinfo">
									<img src="images/n.jpg" alt="" class="img-r">
									<p>Now, one doesn’t have to run for the availability of blood units because it’s available online on just one click of on the Internet on website of the Punjab Blood Bank Management System.</p>
									<h4>Sopna</h4>
									<span>Mymensingh</span>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="agile">
							<div class="col-md-6 test-grid">
								<div class="test-grid1-agileinfo">
									<img src="images/za.jpg" alt="" class="img-r">
									<p>The aim of the BBMS is to provide transparency in this field, make the process of obtaining blood from a blood bank hassle-free and corruption free and make the system of blood bank management effective so its so much helpful for everyone.</p>
									<h4>Khusi</h4>
									<span>Cumilla</span>
								</div>
							</div>
							<div class="col-md-6 test-grid">
								<div class="test-grid1-agileinfo">
									<img src="images/mu.jpg" alt="" class="img-r">
									<p>All the information about all the eight blood groups, four each positive and negative, would be available for all and this would make easy in times of crises. One could look the availability of blood to nearby bloodbank online at times of crises when there is any shortage of blood..</p>
									<h4>Akhi</h4>
									<span>Sylhet</span>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="agile">
							<div class="col-md-6 test-grid">
								<div class="test-grid1-agileinfo">
									<img src="images/mi.jpg" alt="" class="img-r">
									<p>The donors’ list would also be available online that could help public to look for availability. Moreover the system also has added features such as patient name and contacts, blood booking and even need foe certain blood group is posted on the website to find available donors for a blood emergency.</p>
									<h4>shemu</h4>
									<span>Khulna</span>
								</div>
							</div>
							<div class="col-md-6 test-grid">
								<div class="test-grid1-agileinfo">
									<img src="images/m.jpg" alt="" class="img-r">
									<p>The software system is an online blood bank management system that helps in managing various blood bank operations effectively. The project consists of a central repository containing various blood deposits available along with associated details. These details include blood type, storage area and date of storage. These details help in maintaining and monitoring the blood deposits..</p>
									<h4>Salma</h4>
									<span>Pabna</span>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- testimonials -->
	<!-- contact -->
	<div class="agileits-contact" id="contact">
		<div class="w3_agileits-contact-left">

		</div>
		<div class="contact-right-w3l">
		   <h5 class="title-w3" style="text-align: center; color: white;">contact Us </h5>
			

		
			<?php
					if(isset($_POST["submit"]))
					{
					 $sql="INSERT INTO messages (NAME, CONTACT, EMAIL, MESSAGE, STATUS,LOGS) VALUES ('{$_POST["Name"]}', '{$_POST["Phone"]}', '{$_POST["Email"]}', '{$_POST["Message"]}', 1,NOW());";
						if($con->query($sql))
				{
					echo '
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> Your message has been Successfully sent.
					</div>
					
					
					';
				}
					}
				?>

			

			<form action="index.php" method="post">
				<div class="input-w3ls w3ls-left">
					<input type="text" class="name" name="Name" placeholder="Full Name" required="">
				</div>
				<div class="input-w3ls w3ls-rght">
					<input type="text" class="name" name="Phone" placeholder="Phone Number" required="">
				</div>
				<div class="input-w3ls w3ls-left">
					<input type="email" class="name" name="Email" placeholder="Email" required="">
				</div>
				
				<div class="input-w3ls">
					<textarea placeholder="Your Message" required="" name="Message"></textarea>
				</div>
				<div class="input-w3ls">
					<input type="submit" value="Send Message" name="submit">
				</div>

			</form>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //contact -->
	<!-- footer -->
<?php include"footer.php"; ?>

	<!-- //footer -->
	<!-- copyright -->

	<!-- //copyright -->
	<!-- <a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a> -->
	<!-- js -->
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<!-- //js -->
	<!-- requried-jsfiles-for owl -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo2").owlCarousel({
				items: 1,
				lazyLoad: false,
				autoPlay: true,
				navigation: false,
				navigationText: false,
				pagination: true,
			});
		});
	</script>
	<!-- //requried-jsfiles-for owl -->

	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!--search-bar-->
	<script src="js/main.js"></script>
	<!--//search-bar-->
	<!-- Calendar -->
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<!-- //Calendar -->
	<!-- Gallery-script -->
	<script src="js/simpleLightbox.js"></script>
	<script>
		$('.gallery-columns a').simpleLightbox();
	</script>
	<!-- //Gallery-script -->

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
</body>

</html>
