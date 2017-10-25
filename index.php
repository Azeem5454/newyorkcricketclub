<?php
require('admin/admin includes/connect.php');
require('admin/admin includes/core.php');
?>
<?php
$query="SELECT * FROM schedule order by match_id DESC limit 1,1";
 $result = mysqli_query($con, $query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
         $tteam1 = $row["team_1"];
         $tteam2 = $row["team_2"];
         $tscdate = $row["scdate"];
         $tmode = $row["mode"];
        }
      }
   else{
   	echo 'Extracting 2 rows';
   }
?>
<?php
$query="SELECT * FROM schedule order by match_id DESC limit 2,1";
 $result = mysqli_query($con, $query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
 		$third_id=$row["match_id"];
        $thirdteam1 = $row["team_1"];
         $thirdteam2 = $row["team_2"];
         $thirdscdate = $row["scdate"];
          $thirdresult = $row["results"];
          $thirdmode = $row["mode"];
        }
      }
   else{
   	echo 'Extracting 2 rows';
   }
?>
<?php
$query="SELECT * FROM live_scorecard order by id DESC limit 1";
 $result = mysqli_query($con, $query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
 		$link=$row["link"];
        }
      }
   else{
   	echo 'Extracting 2 rows';
   }
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
    <title>NYC Cricket Club</title>
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
		<!-- Slider -->
		<section >
			<div class="container-fluid">
				  <br>
				  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				    <!-- Indicators -->
				    <ol class="carousel-indicators">
				      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				      <li data-target="#myCarousel" data-slide-to="1"></li>
				      <li data-target="#myCarousel" data-slide-to="2"></li>
				    </ol>

				    <!-- Wrapper for slides -->
				    <div class="carousel-inner" role="listbox">
				      <div class="item active">
				        <img src="images/slide pic 1.jpg" alt="Stadium" width="460" height="345">
				      </div>

				      <div class="item">
				        <img src="images/slide pic 3.jpg" alt="Stadium2" width="460" height="345">
				      </div>
				    
				      <div class="item">
				        <img src="images/slide pic 4.jpg" alt="Kit" width="460" height="345">
				      </div>
				    </div>

				    <!-- Left and right controls -->
				    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				      <span class="sr-only">Next</span>
				    </a>
  				</div>
			</div><!--/Container-->
		</section><!--/Slider-->
		<br/>
		<br/>
		<!-- News and Fixures-->
		<section>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 style="text-align: center;">Upcoming Fixures</h4>
					</div>
					<div class="panel-body">
						<h5 style="background-color: #e84c3d; text-align: center; color: white;"><?php 
						      if($tscdate==""){echo "NA";}
						      	else{
						      		 echo ucfirst($tscdate);
						      	}
						?>	
						</h5>
							<br/>
						<table class="table table-bordered">
						    <thead >
						      <th style="text-align: center;">
						     <?php 
						      if($tteam1==""){echo "NA";}
						      	else{
						      		 echo $tteam1;
						      	}
						?>	
						      </th>
						      <th style="text-align: center;"> Vs</th>
						      <th style="text-align: center;">
						     <?php 
						      if($tteam2==""){echo "NA";}
						      	else{
						      		 echo $tteam2;
						      	}
						?>	
						      	
						      </th>
						    </thead>
						    <tbody>
						      <tr>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						        <td style="text-align: center;"	></td>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						      </tr>
						    </tbody>
 						 </table>
 						 <h5 style="background-color:#e84c3d; text-align: center; color: white; font-size: 20px;"><?php echo ucfirst($tmode)." ".'Match'; ?></h5>
					</div>
					<br/><br/>
					<div class="panel-footer">
						<a href="fixure-result.php" class="btn btn-success btn-block">View Full Schedule</a>
					</div>
				</div>
			</div>
			</div>
			<!--News SECTION-->
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 style="text-align: center;">Results</h4>
					</div>
					<div class="panel-body">
						<h5 style="background-color:#e84c3d; text-align: center; color: white;">		<?php 
						      if($thirdscdate==""){echo "NA";}
						      	else{
						      		 echo ucfirst($thirdscdate);
						      	}
						     ?>
						</h5>
						<table class="table table-bordered">
						    <thead >
						      <th style="text-align: center;">
						      <?php 
						      if($thirdteam1==""){echo "NA";}
						      	else{
						      		 echo $thirdteam1;
						      	}
						     ?>
						      </th>
						      <th style="text-align: center;"> Vs</th>
						      <th style="text-align: center;">
						     <?php 
						      if($thirdteam2==""){echo "NA";}
						      	else{
						      		 echo $thirdteam2;
						      	}
						     ?>
						      	
						      </th>
						    </thead>
						    <tbody>
						      <tr>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						        <td style="text-align: center;"	></td>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						      </tr>
						        <td colspan="3">
						        <h5 class="pull-right">

						       <?php 
						        $check= $thirdresult;
						        if($check==""){
						        	echo 'Result is yet to updated';
						        }else{
						        	echo $check;
						        }
						        ?>
						        </h5>
						         <h5>
						       <?php 
						      if($thirdmode==""){echo "NA";}
						      	else{
						      		 echo ucfirst($thirdmode)." "."Match";
						      	}
						     ?>
						       
						        </h5>
						        </td>
						        <br/><br/>
						      </tr>
						    </tbody>
 						 </table>
					</div>
					<div class="panel-footer">
						<a href="scorecard.php?match_id=<?php echo $third_id; ?>" class="btn btn-success btn-block">View Scorecard</a>
					</div>
				</div>
			</div>
			</div>
			<div class="col-lg-2"></div>
			</div>
		</section>
		<!--Live Score Section-->
			<section>
			<div calss="container">
			<div class="row">
				<div class="page-header"><h2 style="text-align: center;">Live Scorecard</h2></div>
				<div class="col-lg-5"></div>
				<div class="col-lg-4">
					<a href="<?php echo $link; ?>" target="_blank" class="btn btn-warning btn-md">Click Here for Live Scorecard</a><br/><br/>
				</div>
			</div>
			</div>
		</section>
		<br/><br/><br/>
		<!-- News Section -->
		<section>
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
				<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 style="text-align: center;">Latest News</h4>
					</div>
				<div class="panel-body">
						<?php
						$news="SELECT * from news order by id DESC limit 0,3";
						$result = mysqli_query($con, $news);
						 $num_rows = mysqli_num_rows($result);
						 while( $row = mysqli_fetch_array($result)) {
						    echo '
						<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-8 col-xs-12"><img src="admin/Userdata/newspic/'.$row['image'].'" class="img-responsive"> </div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						    <div class="page-header">
								<h3>'.$row['title'].'</h3>
							</div>
							<p>'.substr($row['description'], 0,100).'</p>
							<a href="news.php?news_id='.$row['id'].'" class="btn btn-danger pull-right">Read More</a>
						</div>
						</div>';
							   
						        }
						?>
							
					
					
				</div>
				</div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</section><!--/News Section-->
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