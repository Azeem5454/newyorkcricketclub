<?php
require('admin/admin includes/connect.php');
require('admin/admin includes/core.php');
?>
<?php 
  $match_id=$_GET['match_id'];
  $match_id_query="SELECT * from schedule where match_id ='$match_id'";
$result = mysqli_query($con, $match_id_query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
       $id = $row["match_id"];
       $team1=$row["team_1"];
       $team2=$row["team_2"];
       $scdate=$row["scdate"];
       $results=$row["results"];
       $mode=$row["mode"];
        }
      }
   else{
    echo '2 rows';
   }
?>
<?php
 $sumary_qu="SELECT * from total_scorecard where match_id='$match_id'";
 $summary_result = mysqli_query($con, $sumary_qu);
 $num_rows = mysqli_num_rows($summary_result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($summary_result)) {
      $scorecard_id=$row["total_scorecard_id"];
      $team1_total= $row["team_1_total"];
       $team2_total= $row["team_2_total"];
       $match_summary=$row["match_summary"];
        }
      }
   else{
     $team1_total= "N/A";
     $team2_total= "N/A";
     $match_summary="Not available yet";
   }
  ?>
  <?php 
  $team1_batting_query="SELECT * FROM team1_batting where match_id='$match_id' and total_scorecard_id='$scorecard_id'";
  $team1_batting_result=mysqli_query($con,$team1_batting_query);
   ?>
   <?php 
  $team2_batting_query="SELECT * FROM team2_batting where match_id='$match_id' and total_scorecard_id='$scorecard_id'";
  $team2_batting_result=mysqli_query($con,$team2_batting_query);
   ?>
   <?php 
  $team1_bowling_query="SELECT * FROM team1_bowling where match_id='$match_id' and total_scorecard_id='$scorecard_id'";
  $team1_bowling_result=mysqli_query($con,$team1_bowling_query);
   ?>
   <?php 
  $team2_bowling_query="SELECT * FROM team2_bowling where match_id='$match_id' and total_scorecard_id='$scorecard_id'";
  $team2_bowling_result=mysqli_query($con,$team2_bowling_query);
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
    <title>Scorecard</title>
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
		<div class="container">
		<!--Score Section-->
		<div class="row">
		<h2 class="page-header" style="text-align: center;">
			<strong style="text-decoration: underline;"><?php echo ucfirst($team1) ; ?></strong> &nbsp;&nbsp;&nbsp;VS&nbsp;&nbsp;&nbsp; <strong style="text-decoration: underline;"><?php echo ucfirst($team2) ; ?></strong>
		</h2>
		<h2 style="text-align: center; color: grey;">
			<strong><?php echo $team1_total;?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><?php echo $team2_total;?></strong>
		</h2>
		<h4 style="text-align: center; color:#e84c3d;"><?php echo ucfirst($results); ?></h4>
		<h4 style="text-align: center;"><?php echo ucfirst($scdate); ?></h4>
    <h4 style="text-align: center; color:#e84c3d;"><?php echo ucfirst($mode)."  Match"; ?></h4>
		</div>
		<!--/Score Section-->
		<!--Summary Section-->
		<div class="row">
		<h2 class="page-header">
			Match Summary
		</h2>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?php echo $match_summary; ?>
    </div>
		</div>
		<br/><br/>
		<!--/Summary Section-->	
		<div class="row" style="text-align: center;">
				<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<h4 style="text-align: center;">Scorecard</h4>
					</div>
					<div class="panel-body">
					<ul  class="nav nav-pills">
						<li class="active">
			        	<a  href="#1a" data-toggle="tab"><?php echo ucfirst($team1)." Batting"; ?></a>
						</li>
						<li><a href="#2a" data-toggle="tab"><?php echo ucfirst($team1)." Bowling" ; ?></a>
						</li>
						<li><a href="#3a" data-toggle="tab"><?php echo ucfirst($team2)." Batting"; ?></a>
						</li>
						<li><a href="#4a" data-toggle="tab"><?php echo ucfirst($team2)." Bowling" ; ?></a>
						</li>
					</ul>
					<div class="tab-content clearfix">
					<div class="tab-pane active" id="1a">
					<h3 class="page-header"><?php echo ucfirst($team1)." Batting"; ?></h3>
					<table class="table table-hover">
                    <thead style="background-color: #e84c3d; color: white">
                      <tr>
                        <th style="text-align: center;">Players</th>
                        <th colspan="2"></th>
                        <th style="text-align: center;">R</th>
                        <th style="text-align: center;">B</th>
                        <th style="text-align: center;">4s</th>
                        <th style="text-align: center;">6s</th>
                        <th style="text-align: center;">SR Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while($rows=mysqli_fetch_array($team1_batting_result)){
                      echo ' <tr style="text-align:center;">
                       <td><strong>'.ucfirst($rows["player_name"]).'</strong></td>
                       <td colspan="2" style="color:#e84c3d;"><strong>'.$rows["get_out"].'</strong></td>
                       <td>'.$rows["runs"].'</td>
                       <td>'.$rows["balls"].'</td>
                       <td>'.$rows["fours"].'</td>
                       <td>'.$rows["sixes"].'</td>
                       <td>'.$rows["sr"].'</td>
                      </tr>';
                      }
                      
                       ?>
                      
                     
                    </tbody>
            </table>
					</div>
					<div class="tab-pane" id="2a">
						<h3 class="page-header"><?php echo ucfirst($team1)." Bowling" ; ?></h3>
					<table class="table table-hover">
                    <thead style="background-color: #e84c3d; color: white">
                      <tr>
                        <th style="text-align: center;">Bowling</th>
                        <th style="text-align: center;">O</th>
                        <th style="text-align: center;">M</th>
                        <th style="text-align: center;">R</th>
                        <th style="text-align: center;">W</th>
                        <th style="text-align: center;">Econ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                    while($rows=mysqli_fetch_array($team1_bowling_result)){
                      echo ' <tr style="text-align:center;">
                       <td><strong>'.ucfirst($rows["bowler_name"]).'</strong></td>
                       <td>'.$rows["overs"].'</td>
                       <td>'.$rows["maiden"].'</td>
                       <td>'.$rows["runs"].'</td>
                       <td>'.$rows["wickets"].'</td>
                       <td>'.$rows["econ"].'</td>
                      </tr>';
                      }
                      
                       ?>
                       
                    </tbody>
            </table>
					</div>
						<div class="tab-pane" id="3a">
					<h3 class="page-header"><?php echo ucfirst($team2)." Batting" ; ?></h3>
					<table class="table table-hover">
                    <thead style="background-color: #e84c3d; color: white">
                      <tr>
                        <th style="text-align: center;">Players</th>
                        <th colspan="2"></th>
                        <th style="text-align: center;">R</th>
                        <th style="text-align: center;">B</th>
                        <th style="text-align: center;">4s</th>
                        <th style="text-align: center;">6s</th>
                        <th style="text-align: center;">SR Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                    while($rows=mysqli_fetch_array($team2_batting_result)){
                      echo ' <tr style="text-align:center;">
                       <td><strong>'.ucfirst($rows["player_name"]).'</strong></td>
                       <td colspan="2" style="color:#e84c3d;"><strong>'.$rows["get_out"].'</strong></td>
                       <td>'.$rows["runs"].'</td>
                       <td>'.$rows["balls"].'</td>
                       <td>'.$rows["fours"].'</td>
                       <td>'.$rows["sixes"].'</td>
                       <td>'.$rows["sr"].'</td>
                      </tr>';
                      }
                      
                       ?>
                    </tbody>
            </table>
					</div>
					<div class="tab-pane" id="4a">
						<h3 class="page-header"><?php echo ucfirst($team2)." Bowling" ; ?></h3>
					<table class="table table-hover">
                    <thead style="background-color: #e84c3d; color: white">
                      <tr>
                        <th style="text-align: center;">Bowling</th>
                        <th style="text-align: center;">O</th>
                        <th style="text-align: center;">M</th>
                        <th style="text-align: center;">R</th>
                        <th style="text-align: center;">W</th>
                        <th style="text-align: center;">Econ</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                    while($rows=mysqli_fetch_array($team2_bowling_result)){
                      echo ' <tr style="text-align:center;">
                       <td><strong>'.ucfirst($rows["bowler_name"]).'</strong></td>
                       <td>'.$rows["overs"].'</td>
                       <td>'.$rows["maiden"].'</td>
                       <td>'.$rows["runs"].'</td>
                       <td>'.$rows["wickets"].'</td>
                       <td>'.$rows["econ"].'</td>
                      </tr>';
                      }
                      
                       ?>
                       
                    </tbody>
            </table>
					</div>
					</div>
					
					
            <!--Bowling Scorecard-->
					</div>
				</div>
			</div>
		</div>
		</div>

		

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