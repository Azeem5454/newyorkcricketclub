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
    if(isset($_POST['add-standings'])){
      $team_name=$_POST['team_name'];
      $matches=$_POST['total_matches'];
      $won_matches=$_POST['won_matches'];
      $lost_matches=$_POST['lost_matches'];
      $nr_matches=$_POST['nr_matches'];
      $points=$_POST['points'];
      $win_percentage=$_POST['win_percentage'];
      $update_query= "UPDATE standings set teams='$team_name', matches='$matches', won='$won_matches', lost='$lost_matches', nr='$nr_matches', points='$points', win_percentage='$win_percentage' WHERE id='$_GET[stand_id]'";
    $result = mysqli_query($con, $update_query);
    if($result){
      $match ='<div class="alert alert-success">Standings Added Successfully</div>';
    }else{
    $match ='<div class="alert alert-danger">Unable to update. Please try later</div>';
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
    <title>Admin Area/Update-Schedule</title>
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
  <div class="col-lg-1"></div>
  <div class="col-lg-8">
    <br/><br/>
      <?php echo $match; ?>
      <form method="POST">
        <div class="form-group">
        <label class="label-control">Enter Team Name</label>
        <input type="text" name="team_name" class="form-control" placeholder="Enter Team Name" required>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
            <label class="label-control">Total Matches</label>
            <input type="text" name="total_matches" class="form-control" placeholder="Total Matches" required>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
            <label class="label-control">Matches Won</label>
            <input type="text" name="won_matches" class="form-control" placeholder="Won Matches" required>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
            <label class="label-control">Matches Lost</label>
            <input type="text" name="lost_matches" class="form-control" placeholder="Lost Matches" required>
              </div>
          </div>
          </div>
          <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
            <label class="label-control">N/R</label>
            <input type="text" name="nr_matches" class="form-control" placeholder="N/R" required>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
            <label class="label-control">Points</label>
            <input type="text" name="points" class="form-control" placeholder="Points" required>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
            <label class="label-control">Win%</label>
            <input type="text" name="win_percentage" class="form-control" placeholder="Win %" required>
              </div>
          </div>
        </div>
      <input type="submit" value="Add standings" name="add-standings" class="btn btn-success btn-block" id="add-result1">
      </form>
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
</body>
</html>