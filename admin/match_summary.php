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
    if(isset($_POST['submit_summary'])){
        $team1_score=$_POST['team1_total'];
        $team2_score=$_POST['team2_total'];
        $summary=$_POST['description'];
    $summary_query="INSERT into total_scorecard values ('','$match_id','$team1_score','$team2_score','$summary')";
    $result=mysqli_query($con,$summary_query);
    if($result){
         $match= '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Summary Added Sucessfully.</div>';
    }else{
         $match= '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>There is an issue.Please try later.</div>';
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
    <title>Add Summary</title>
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
                Add Match Summary
            </h2>
            <form class="form-horizontal" action="#" method="POST">
                    <div class="form-group">
                        <label for="title">Your Team Total</label>
                        <input type="text" name="team1_total" id="team1_total" placeholder="e.g 150/5" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="title">Oponent Team Total</label>
                        <input type="text" name="team2_total" id="team2_total" placeholder="e.g 150/5" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="description">Match Summary</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Summary" name="submit_summary" id="submit_summary" class="btn btn-danger btn-block"/>
                    </div>
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
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>