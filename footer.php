
<style type="text/css">
	.checked {
  color: orange;
}
</style>

<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-haslayout tg-footerinfobox">
				<div class="tg-bgboxone"></div>
				<div class="tg-bgboxtwo"></div>
				<div class="tg-footerinfo">
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
								<div class="tg-footercol">
									<div class="tg-posttitle">
										<h3>NEWSLETTER</h3>
									</div>
									<div class="tg-description">
										<p>You can report website bugs and also can suggest the features for our website so we can make our site better.</p>
									</div>
									<form class="tg-form-newsletter" method="post" action="code.php">
										<fieldset>
											<div class="form-group">
												<input type="email" class="form-control" name="email" placeholder="Email" required="true">
											</div>
											<button class="tg-btn" type="submit" name="subscribe">subscribe</button>
										</fieldset>
									</form>
									<div class="tg-posttitle">
										<h3>opening hours</h3>
									</div>
									<div class="tg-tags">
										<p style="color:white;">Monday to Friday 1pm – 1am
										 <br>Saturaday 5pm – 10am<br>Sunday :: Closed</p>
											
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="tg-footercol">
									<div class="tg-posttitle">
										<h3>Top grounds</h3>

									</div>
									<div class="tg-toprated">
										<ul>
											<?php
											$grounds=mysqli_query($con, "SELECT * FROM ground LIMIT 4");
											while($g=mysqli_fetch_array($grounds))
											{
											?>
											<li>
												<figure>
													<a href="#">
													<img src="<?= $g['image'];?>" alt="image description" height="70px" width="70px">
													</a>
												</figure>
												<div class="tg-productcontent">
													<h4><a href="#"><?= $g['name'];?></a></h4>
													<span class="fas fa-star checked"></span>
													<span class="fas fa-star checked"></span>
													<span class="fas fa-star checked"></span>
													<span class="fas fa-star checked"></span>
													<span class="fas fa-star checked"></span>
													<span class="tg-price">Booking Cost: Rs.<?= $g['booking_cost'];?></span>
												</div>
											</li>
											<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="tg-footercol">
									<div class="tg-haslayout">
										<h2 style="color:white;">pak Cricket Club</h2>
									</div>
									<div class="tg-description">
										<p>Club cricket is a mainly amateur, but still formal, form of the sport of cricket, usually involving teams playing in competitions at weekends or in the evening.</p>
									</div>
									<ul class="tg-contactinfo">
										<li>
											<i class="fa fa-home"></i>
											<address>Pak Colony Sindh Industrial Trading Estate, Karachi, Karachi City, Sindh</address>
										</li>
										<li>
											<i class="fa fa-envelope-o"></i>
											<a href="">info@domain.com</a>
										</li>
										<li>
											<i class="fa fa-phone"></i>
											<span>+44 123 456 788 - 9</span>
										</li>
									</ul>
									<div class="tg-haslayout">
										<a class="tg-btn" href="contactus.php">read more</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-footerbar">
				<div class="container">
					<span class="tg-copyright">Copyright &copy; 2020-<?php echo date("Y");?><a href=""> PakCricketClub</a> All rights reserved.</span>
					<nav class="tg-footernav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="uphoto.php">Photos</a></li>
							<li><a href="uvideos.php">Videos</a></li>
							<li><a href="uground.php">Ground</a></li>
							<li><a href="unews.php">News</a></li>
							<li><a href="uevent.pho">Events</a></li>
							<li><a href="contactus.php">Contact us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->