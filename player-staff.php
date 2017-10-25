<?php
require('admin/admin includes/connect.php');
require('admin/admin includes/core.php');
?>
<?php
    $players="SELECT * from players order by id";
    $result = mysqli_query($con, $players);
    $num_rows = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/fav.jpg">
    <title>NYC players & Sponsers</title>
    <!--Font Awesome Icon-->
    <link rel="stylesheet"  href="css/font-awesome/css/font-awesome.min.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <!-- Bootstrap core CSS -->
   	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head> 
<body>
		<!--Header-->
	<?php require('includes/header.php');?>
	<!--/Header-->
		<br/>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<img src="images/covers/players-cover1.jpg" class="img-responsive" alt="players-cover" width="1365" height="345">
			</div>
		</div>
        <br/><br/>
        <!--Players Section-->
        <section>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 style="text-align: center;">NYC Players</h4>
                    </div>
                    <div class="panel-body">
                     <div class="row">
                    <?php 
                      while( $row = mysqli_fetch_array($result)) {
                        echo '
                        
                         <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <img src="admin/Userdata/profilepic/'.$row['image'].'" class="img-rounded" alt="player1" style="width: 250px; height: 250px;">
                                <a href="player-profile.php?player_name='.$row['player_name'].'">
                                <h4 style="text-align: center;">'.ucfirst($row['player_name']).'</h4>
                                </a>
                                 <h5 style="text-align: center;">'.ucfirst($row['playing_role']).'</h5>
                       
                        </div>
                        ';
                      }
                     ?> 
                      </div> 
                    </div><!--/Panel Body-->
                </div>
                </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </section>
        <!--Players Section-->
        <!--Staff Section-->
        <section>
            <div class="row">
                <h1 class="page-header" style="text-align: center;">Sponsers</h1>
                <div class="col-lg-1"></div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <img src="images/sponsers/allstate logo.png" alt="sponser1" class="image-thumbnail" height="250px" width="350px">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <img src="images/sponsers/sponser2.png" alt="sponser1" class="image-thumbnail" style="width: 350px; height: 250px;">
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <img src="images/sponsers/sponser3.png" alt="sponser1" class="img-rounded"  style="width: 350px; height: 250px;">
                </div>
            </div>
        </section>
        <!--/Staff Section-->
		<!--Footer-->
		<?php include('includes/footer.php');?>
		<!--/Footer-->
		<!-- Bootstrap Core Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>