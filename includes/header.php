<!--Header-->
		<header class="site-header" role="banner">
			<!--Navbar-->
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php"><img src="images/Logo1.png" alt="Bootstrap to WordPress"></a>
						</div><!--Navbar-Header-->
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.php">Home</a></li>
								<li><a href="about-us.php">About Us</a></li>
								<li><a href="player-staff.php">Players & Sponsers</a></li>
								<li><a href="fixure-result.php">Fixures & Results</a></li>
								<li><a href="standings.php">Standings</a></li>
								<li><a href="gallery.php">Gallery</a></li>
								<?php 
									if(isset($_SESSION["username"]) && isset($_SESSION["password"])) {
										echo '<li><a href="admin/home.php" class="btn btn-warning btn-sm" style="color:white;">Go to admin panel</a></li>';
									}
								 ?>
							</ul><!--nav-->	
						</div><!--Navbar-collaspe-->
					</div><!--Container-->	
				</nav>	<!--End of Navbar-->
		</header>
<!--/Header-->