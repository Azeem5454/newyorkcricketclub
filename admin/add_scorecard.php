<?php
require('admin includes/connect.php');
require('admin includes/core.php');
if(!loggedin())
{
header('Location: index.php');
}
?>
<?php 
      $match="";
  $match_id=$_GET['match_id'];
   $scorecard_id=$_GET['scorecard_id'];
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
    if(isset($_POST['add_team1_batting'])){
        $player_name=strtolower($_POST['team1_player_name']);
        $runs_scored=$_POST['team1_player_runs'];
        $balls_faced=$_POST['team1_player_balls'];
        $fours=$_POST['team1_player_fours'];
        $sixes=$_POST['team1_player_sixes'];
        $strike_rate=$_POST['team1_player_sr'];
        $gets_out=$_POST['team1_player_out'];
       $query="INSERT into team1_batting values('','$match_id','$scorecard_id','$player_name','$runs_scored','$balls_faced','$fours','$sixes','$strike_rate','$gets_out')";
       $result=mysqli_query($con,$query);
       if($result){
        $match = '<div class="alert alert-success">Added.</div>';
       }else{
         $match = '<div class="alert alert-danger">Error.</div>';
       }
    }
 ?>
 <?php 
    if(isset($_POST['add_team2_batting'])){
        $player_name=$_POST['team2_player_name'];
        $runs_scored=$_POST['team2_player_runs'];
        $balls_faced=$_POST['team2_player_balls'];
        $fours=$_POST['team2_player_fours'];
        $sixes=$_POST['team2_player_sixes'];
        $strike_rate=$_POST['team2_player_sr'];
        $gets_out=$_POST['team2_player_out'];
       $query_team2_batting="INSERT into team2_batting values('','$match_id','$scorecard_id','$player_name','$runs_scored','$balls_faced','$fours','$sixes','$strike_rate','$gets_out')";
       $result=mysqli_query($con,$query_team2_batting);
       if($result){
        $match = '<div class="alert alert-success">Added.</div>';
       }else{
         $match = '<div class="alert alert-danger">Error.</div>';
       }
    }
 ?>
 <?php 
    if(isset($_POST['add_team1_bowling'])){
        $bowler_name=strtolower($_POST['team1_bowler_name']);
        $overs=$_POST['team1_bowler_overs'];
        $maiden=$_POST['team1_bowler_maiden'];
        $runs=$_POST['team1_bowler_runs'];
        $wickets=$_POST['team1_bowler_wickets'];
        $econ=$_POST['team1_bowler_econ'];
       $query_bowl="INSERT into team1_bowling values('','$match_id','$scorecard_id','$bowler_name','$overs','$maiden','$runs','$wickets','$econ')";
       $result_bowl=mysqli_query($con,$query_bowl);
       if($result_bowl){
        $match = '<div class="alert alert-success">Added.</div>';
       }else{
         $match = '<div class="alert alert-danger">Error.</div>';
       }
    }
 ?>
  <?php 
    if(isset($_POST['add_team2_bowling'])){
        $bowler_name=$_POST['team2_bowler_name'];
        $overs=$_POST['team2_bowler_overs'];
        $maiden=$_POST['team2_bowler_maiden'];
        $runs=$_POST['team2_bowler_runs'];
        $wickets=$_POST['team2_bowler_wickets'];
        $econ=$_POST['team2_bowler_econ'];
       $query_bowl2="INSERT into team2_bowling values('','$match_id','$scorecard_id','$bowler_name','$overs','$maiden','$runs','$wickets','$econ')";
       $result_bowl2=mysqli_query($con,$query_bowl2);
       if($result_bowl2){
        $match = '<div class="alert alert-success">Added.</div>';
       }else{
         $match = '<div class="alert alert-danger">Error.</div>';
       }
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
    <link rel="icon" href="../images/fav.jpg">
    <title>Add Scorecard</title>
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
    <!--SideBar-->
    <!--/SideBar-->
    <div class="row">
    <?php include('admin includes/sidebar.php') ?>
    <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-7">
            <h2 class="page-header">
            <?php  echo $match; ?>
                Add Scorecard
            </h2>
            <p>This match is played between <strong><?php echo ucfirst($team1); ?></strong> and <strong><?php echo ucfirst($team2); ?></strong> on <strong><?php echo ucfirst($scdate); ?></strong>. It was a <strong><?php echo ucfirst($mode)." Match"; ?></strong> and <strong><?php echo ucfirst($results); ?></strong></p>
            <br/>
            <ul  class="nav nav-pills">
                        <li class="active">
                        <a  href="#1a" data-toggle="tab">Add <?php echo ucfirst($team1)." Batting"; ?></a>
                        </li>
                        <li><a href="#2a" data-toggle="tab">Add <?php echo ucfirst($team1)." Bowling" ; ?></a>
                        </li>
                        <li><a href="#3a" data-toggle="tab">Add <?php echo ucfirst($team2)." Batting"; ?></a>
                        </li>
                        <li><a href="#4a" data-toggle="tab">Add <?php echo ucfirst($team2)." Bowling" ; ?></a>
                        </li>
            </ul>
                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="1a">
                    <h3 class="page-header"><?php echo ucfirst($team1)." Batting"; ?></h3>
                    <form class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Player Name:</label>
                                    <input type="text" name="team1_player_name" id="team1_player_name" class="form-control" placeholder="Player name" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">R</label>
                                    <input type="text" name="team1_player_runs" id="team1_player_runs" class="form-control" placeholder="Runs" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">B</label>
                                    <input type="text" name="team1_player_balls" id="team1_player_balls" class="form-control" placeholder="Balls" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">4'S</label>
                                    <input type="text" name="team1_player_fours" id="team1_player_fours" class="form-control" placeholder="4's" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">6'S</label>
                                    <input type="text" name="team1_player_sixes" id="team1_player_sixes" class="form-control" placeholder="6's" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">SR</label>
                                    <input type="text" name="team1_player_sr" id="team1_player_sr" class="form-control" placeholder="Strike Rate" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">How he gets out</label>
                                    <input type="text" name="team1_player_out" id="team1_player_out" class="form-control" placeholder="cAli bHamza" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-group">
                                   <input type="submit" value="Add" name="add_team1_batting" class="btn btn-danger pull-right" id="add_team1_batting">
                                </div>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane" id="2a">
                        <h3 class="page-header"><?php echo ucfirst($team1)." Bowling" ; ?></h3>
                         <form class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Bowler Name:</label>
                                    <input type="text" name="team1_bowler_name" id="team1_bowler_name" class="form-control" placeholder="Bowler name" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">O</label>
                                    <input type="text" name="team1_bowler_overs" id="team1_player_overs" class="form-control" placeholder="Overs" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">M</label>
                                    <input type="text" name="team1_bowler_maiden" id="team1_player_maiden" class="form-control" placeholder="Maiden" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">R</label>
                                    <input type="text" name="team1_bowler_runs" id="team1_player_runs" class="form-control" placeholder="Runs" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">W</label>
                                    <input type="text" name="team1_bowler_wickets" id="team1_player_wickets" class="form-control" placeholder="wickets" required>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Econ</label>
                                    <input type="text" name="team1_bowler_econ" id="team1_player_econ" class="form-control" placeholder="Econ" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-group">
                                   <input type="submit" value="Add" name="add_team1_bowling" class="btn btn-danger pull-right" id="add_team1_bowling">
                                </div>
                        </div>
                    </form>
                    </div>
                        <div class="tab-pane" id="3a">
                    <h3 class="page-header"><?php echo ucfirst($team2)." Batting" ; ?></h3>
                     <form class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Player Name:</label>
                                    <input type="text" name="team2_player_name" id="team2_player_name" class="form-control" placeholder="Player name" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">R</label>
                                    <input type="text" name="team2_player_runs" id="team2_player_runs" class="form-control" placeholder="Runs" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">B</label>
                                    <input type="text" name="team2_player_balls" id="team2_player_balls" class="form-control" placeholder="Balls" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">4'S</label>
                                    <input type="text" name="team2_player_fours" id="team2_player_fours" class="form-control" placeholder="4's" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">6'S</label>
                                    <input type="text" name="team2_player_sixes" id="team2_player_sixes" class="form-control" placeholder="6's" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">SR</label>
                                    <input type="text" name="team2_player_sr" id="team2_player_sr" class="form-control" placeholder="Strike Rate" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">How he gets out</label>
                                    <input type="text" name="team2_player_out" id="team2_player_out" class="form-control" placeholder="cAli bHamza" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-group">
                                   <input type="submit" value="Add" name="add_team2_batting" class="btn btn-danger pull-right" id="add_team2_batting">
                                </div>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane" id="4a">
                        <h3 class="page-header"><?php echo ucfirst($team2)." Bowling" ; ?></h3>
                     <form class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Bowler Name:</label>
                                    <input type="text" name="team2_bowler_name" id="team2_bowler_name" class="form-control" placeholder="Bowler name" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">O</label>
                                    <input type="text" name="team2_bowler_overs" id="team2_bowler_overs" class="form-control" placeholder="Overs" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">M</label>
                                    <input type="text" name="team2_bowler_maiden" id="team1_player_maiden" class="form-control" placeholder="Maiden" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">R</label>
                                    <input type="text" name="team2_bowler_runs" id="team1_player_runs" class="form-control" placeholder="Runs" required>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">W</label>
                                    <input type="text" name="team2_bowler_wickets" id="team1_player_wickets" class="form-control" placeholder="wickets" required>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-1 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label">Econ</label>
                                    <input type="text" name="team2_bowler_econ" id="team1_player_econ" class="form-control" placeholder="Econ" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-group">
                                   <input type="submit" value="Add" name="add_team2_bowling" class="btn btn-danger pull-right" id="add_team2_bowling">
                                </div>
                        </div>
                    </form>
                    </div>
                    </div>
            </div>
          
    </div>

        <!--Footer-->
        <!--/Footer-->
        <!-- Bootstrap Core Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>