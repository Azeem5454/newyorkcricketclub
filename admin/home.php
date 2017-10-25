<?php
require('admin includes/connect.php');
require('admin includes/core.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/fav.jpg">
    <title>Admin Area</title>
    <!--Font Awesome Icon-->
    <link rel="stylesheet"  href="../css/font-awesome/css/font-awesome.min.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <!-- Bootstrap core CSS -->
   	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head> 
<body>
	<!--Header-->
	<?php require 'admin includes/header.php';?>
	<!--/Header-->
	<div class="row">
	<!--SideBar-->
	<?php include 'admin includes/sidebar.php';?>
	<!--/SideBar-->
	<!--Profile Area-->
		<br/><br/>
			<div class="col-lg-1"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="panel panel-primary">
				<div class="panel-heading">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="page-header">
					<h3> <?php echo 'Welcome'.' '.$_SESSION['username']?></h3>
					</div>
					</div>
					<div class="col-lg-6"></div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<img src="../images/umar front.jpg" class="img-thumbnail" style="width: 130px; height: 170px;"/>
					</div>
				</div>
				<div class="row">
						<div class="panel-body">
						<table class="table table-condensed">
						<div class="col-lg-12 col-md-12 col-sm-4 col-xs-4">
						<tbody>
						<tr>
							<th>Role :</th>
							<td>Admin</td>
						</tr>
						<tr>
							<th>Email :</th>
							<td>umar.alizai@gmail.com</td>
						</tr>
						<tr>
							<th>Contact :</th>
							<td>#</td>
						</tr>
						<tr>
							<th>Country :</th>
							<td>NYC</td>
						</tr>
						
					</tbody>
						</table>
					</div>
					</div>
				</div>
				</div>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="clearfix"></div>
			  <!-----------Ending User area------->
		</div>
		
		<!--Footer-->
		<!--/Footer-->
		<!-- Bootstrap Core Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>