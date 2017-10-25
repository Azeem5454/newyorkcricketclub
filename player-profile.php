<?php
require('admin/admin includes/connect.php');
require('admin/admin includes/core.php');
?>
<?php 
$getting_player_name=$_GET['player_name'];
 ?>
 <?php
    $players="SELECT * from players WHERE player_name='$getting_player_name'";
    $result = mysqli_query($con, $players);
    $num_rows = mysqli_num_rows($result);
     while( $row = mysqli_fetch_array($result)) {
      $name=$row['player_name'];
      $name_lower=strtolower($name);
      $playing_role=$row['playing_role'];
      $batting_style=$row['batting_style'];
      $bowling_style=$row['bowling_style'];
      $image=$row['image'];
     }
?>
<?php 
  $que="SELECT * from team1_batting where player_name='$name_lower'";
   $result = mysqli_query($con, $que);
    $num_rows_matches = mysqli_num_rows($result);
    $total_matches=$num_rows_matches;
     //while( $row = mysqli_fetch_array($result)) {
      // $mark=$row['SUM(runs)'];
    // }
     //echo $mark;
 ?>
 <?php 
  $que_runs="SELECT SUM(runs),MAX(runs) from team1_batting  where player_name='$name_lower'";
   $result = mysqli_query($con, $que_runs);
    $num_rows = mysqli_num_rows($result);

    while( $row = mysqli_fetch_array($result)) {
      $batting_runs=$row['SUM(runs)'];
      $highest=$row['MAX(runs)'];
    }
    if($total_matches==0){
      $average="NA";
    }else{
       $average=$batting_runs/$total_matches;
    } 
    //echo $mark;
 ?>
 <?php 
  $que_50="SELECT runs from team1_batting  where player_name='$name_lower'";
   $result = mysqli_query($con, $que_50);
    $num_rows = mysqli_num_rows($result);
    $fifties=0;
    $hundreds=0;
     while( $row = mysqli_fetch_array($result)) {
      if($row['runs']>=50)
        $fifties=$fifties+1;
       if($row['runs']>=100)
        $hundreds=$hundreds+1;
      
      }
  ?>
<!--Bowling Queries-->
<?php 
  $que="SELECT * from team1_bowling where bowler_name='$name_lower'";
   $result = mysqli_query($con, $que);
    $num_rows_matches = mysqli_num_rows($result);
    $total_matches_bowl=$num_rows_matches;
 ?>
 <?php 
  $que_overs="SELECT SUM(overs),SUM(wickets),SUM(runs),SUM(econ),MAX(wickets) from team1_bowling  where bowler_name='$name_lower'";
   $result = mysqli_query($con, $que_overs);
    $num_rows = mysqli_num_rows($result);

    while( $row = mysqli_fetch_array($result)) {
      $overs=$row['SUM(overs)'];
      $wickets=$row['SUM(wickets)'];
      $bowling_runs=$row['SUM(runs)'];
      $econ=$row['SUM(econ)'];
      $best_wickets=$row['MAX(wickets)'];
    }
    if($total_matches_bowl==0){
      $econ_avg="NA";
    }else{
     
       $econ_avg=$econ/$total_matches_bowl;
      }
    
   
 ?>
 <?php 
  $que_best="SELECT * from team1_bowling where bowler_name='$name_lower' AND wickets='$best_wickets'";
   $result = mysqli_query($con, $que_best);
    $num_rows_best = mysqli_num_rows($result);
    if($num_rows_best==0){
        $best_haul='NA';
    }else{
      while( $row = mysqli_fetch_array($result)) {
      $runs_conceed=$row['runs'];
     }
     $best_haul=$best_wickets."/".$runs_conceed;
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
    <title>NYC Player Profile</title>
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
  <br/><br/>
<div class="container">
  <div class="row">
      <div class="panel panel-default">
			<div class="panel-body">
          <div class="row">
					   <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
               <img src="admin/Userdata/profilepic/<?php echo $image;  ?>" height="250px" width="250px" alt="<?php echo $name; ?>" class="center-block img-circle">		
            </div><!--/col-->
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                  <h2><?php echo $name; ?></h2>
                  <p><strong>Playing role: </strong><?php echo $playing_role; ?></p>
                  <p><strong>Batting style: </strong> <?php echo $batting_style; ?> </p>
                  <p><strong>Bowling style  </strong> <?php echo $bowling_style; ?> </p>
                  <p><strong>Major Teams  </strong> NYCC </p>
                </div><!--/col-->                     
          </div><!--/row-->
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-5">
                <br/><br/>
                <ul  class="nav nav-pills">
                <li class="active">
                <a  href="#1a" data-toggle="tab">Batting Stats</a>
                </li>
                <li><a href="#2a" data-toggle="tab">Bowling Stats</a>
                </li>
                </ul>
              </div>
            </div>
            <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
					<div class="tab-content clearfix">
          <div class="tab-pane active" id="1a">
          <h3 class="page-header">Batting Statsictics</h3>
          <table class="table table-hover">
                    <thead style="background-color: #e84c3d; color: white">
                      <tr>
                        <th style="text-align: center;">Mtchs</th>
                        <th style="text-align: center;">Runs</th>
                        <th style="text-align: center;">Hghst</th>
                        <th style="text-align: center;">Avg</th>
                        <th style="text-align: center;">50+</th>
                        <th style="text-align: center;">100+</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr style="text-align:center;">
                      <td><?php echo $total_matches; ?></td>
                       <td><?php 
                          if($batting_runs==""){
                            echo 'NA';
                          }else{
                       echo $batting_runs;} ?>
                         
                       </td>
                       <td>
                         <?php 
                         if($highest==""){
                            echo 'NA';
                          }else{
                       echo $highest;} ?>
                       </td>
                       <td><?php echo $average; ?></td>
                       <td><?php echo $fifties; ?></td>
                       <td><?php echo $hundreds; ?></td>
                    </tr> 
                    </tbody>
            </table>
          </div>
         <div class="tab-pane" id="2a">
              <h3 class="page-header">Bowling Statsictics</h3>
          <table class="table table-hover">
                    <thead style="background-color: #e84c3d; color: white">
                      <tr>
                        <th style="text-align: center;">Mtchs</th>
                        <th style="text-align: center;">Ovs</th>
                        <th style="text-align: center;">Wkts</th>
                        <th style="text-align: center;">Runs</th>
                        <th style="text-align: center;">Econ</th>
                        <th style="text-align: center;">Best</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr style="text-align:center;">
                       <td><?php echo $total_matches_bowl;
                        ?></td>
                       <td><?php 
                          if($overs==""){
                            echo 'NA';
                          }else{
                       echo $overs;} ?></td>
                       <td><?php 
                          if($wickets==""){
                            echo 'NA';
                          }else{
                       echo $wickets;} ?></td>
                       <td><?php 
                          if($bowling_runs==""){
                            echo 'NA';
                          }else{
                       echo $bowling_runs;} ?></td>
                       <td><?php echo $econ_avg; ?></td>
                       <td><?php 
                          if($best_haul==""){
                            echo 'NA';
                          }else{
                       echo $best_haul;} ?></td>
                    </tr> 
                    </tbody>
            </table>
          </div>
          </div>
					</div>
         </div><!--/panel-body-->
        </div><!--/panel-->
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