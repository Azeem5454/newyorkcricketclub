<?php
require('admin includes/connect.php');
require('admin includes/core.php');

if(!loggedin())
{
header('Location: index.php');
}
?>
<?php
$query="SELECT * FROM schedule order by match_id DESC limit 1,1";
 $result = mysqli_query($con, $query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
 		 $id=$row["match_id"];
         $tteam1 = $row["team_1"];
         $tteam2 = $row["team_2"];
         $tscdate = $row["scdate"];
         $ttresult=$row["results"];
         $ttmode = $row['mode'];
        }
      }
   else{
   	echo 'Extracting 2 rows';
   }
   $match="";
   if(isset($_POST['add-result1'])){
		$result_up1=$_POST['res1'].' won by '. $_POST['run1'].' '. $_POST['last-sel1'];
		$update1_query="UPDATE schedule set results='$result_up1' where match_id='$id'";
		$result = mysqli_query($con, $update1_query);
		if($result){
			$match ='<div class="alert alert-success">Result Added Successfully</div>';;
		}else{
		$match ='<div class="alert alert-danger">Unable to add results. Please try later</div>';
		}
	}
?>
<?php
$query="SELECT * FROM schedule order by match_id DESC limit 1";
 $result = mysqli_query($con, $query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
 		 $second_match_id=$row["match_id"];
         $team1 = $row["team_1"];
         $team2 = $row["team_2"];
         $scdate = $row["scdate"];
         $tresult=$row["results"];
         $tmode = $row['mode'];
        }
      }
   else{
   	echo 'Extracting 2 rows';
   }
	if(isset($_POST['add-result2'])){
		$result_up2=$_POST['res2'].' won by '. $_POST['run2'].' '. $_POST['last-sel2'];
		$update2_query="UPDATE schedule set results='$result_up2' order by match_id DESC limit 1";
		$result = mysqli_query($con, $update2_query);
		if($result){
			$match ='<div class="alert alert-success">Result Added Successfully</div>';
		}else{
			$match ='<div class="alert alert-danger">Unable to add results. Please try later</div>';		}
	}
 ?>
 <?php
$query="SELECT total_scorecard_id FROM total_scorecard where match_id='$id'";
 $result = mysqli_query($con, $query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
 		 $first_scorecard_id=$row["total_scorecard_id"];
        }
      }
   ?>
   <?php
$sec_query="SELECT total_scorecard_id FROM total_scorecard where match_id='$second_match_id'";
 $sec_result = mysqli_query($con, $sec_query);
 $num_rows = mysqli_num_rows($sec_result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($sec_result)) {
 		 $second_scorecard_id=$row["total_scorecard_id"];
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
    <title>Admin Area/Schedule</title>
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
	<div class="row">
	<br/><br/><br/><br/>
			<div class="col-lg-1"></div>
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-7">
			<?php echo $match; ?>
				<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 style="text-align: center;">Upcoming Fixures</h4>
					</div>
					<div class="panel-body">
						<h5 style="background-color: grey; text-align: center; color: white;"><?php echo $tscdate;?></h5>
						<h5 style="background-color: lightgreen; font-size : 20px ; text-align: center; color: white;">Match1<br/><?php echo ucfirst($ttmode)." "."Match";?></h5>
							<br/>
						<table class="table table-bordered">
						    <thead >
						      <th style="text-align: center;"><?php echo $tteam1;?></th>
						      <th></th>
						      <th style="text-align: center;"><?php echo $tteam2;?></th>
						    </thead>
						    <tbody>
						      <tr>
						        <td style="text-align: center;"><img src="../images/icon.png" style="height: 50px; width: 70px;"></td>
						        <td style="text-align: center;"	>Vs</td>
						        <td style="text-align: center;"><img src="../images/icon.png" style="height: 50px; width: 70px;"></td>
						      </tr>
						      <tr>
						      <td colspan="3">
						      		<?php 
						      		$check=$ttresult;
						      			if($check==""){
						      				 echo'<button  class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >

						       Add Result</button>';
						      			}else{
						      				echo $ttresult;
						      				 echo'<button  class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal" >
						       Already Added the results. Click to edit again</button>';
						      			}
						      		 ?>

						      	</td>

						      </tr>
						      <tr>
						      	<td colspan="3">
						      	 <?php 
						      	$sumary_qu="SELECT match_summary from total_scorecard where match_id='$id'";
						      	$summary_result= mysqli_query($con,$sumary_qu);
						      	 $num_rows = mysqli_num_rows($summary_result);
								 if($num_rows==1){
								 while( $row = mysqli_fetch_array($summary_result)) {
								 		 $match_summary=$row["match_summary"];
								        }
								         if($match_summary=""){
								    	echo '<a href="match_summary.php?match_id='.$id.' class="btn btn-primary">Add Summary</a>';
								    }else{
								    	echo '<a href="#" class="btn btn-danger">Already Added Summary</a>';
								    }
								      }else{
								      	echo '<a href="match_summary.php?match_id='.$id.'" class="btn btn-primary">Add Summary</a>';
								      }
								   
						       ?>
						      		
						      		<a href="add_scorecard.php?match_id=<?php echo $id;?>& scorecard_id=<?php echo $first_scorecard_id; ?>" class="btn btn-primary pull-right">Add Scorecard</a>
						      	</td>
						      </tr>
						    
						    </tbody>
						    <p><strong>First Step:</strong> Add Result<br/><strong>Second Step:</strong> Add Match Summary<br/><strong>Third Step:</strong> Add scorecard<br/> Please follow these step sticktly everytime.This system works this way.</p>
 						 </table>
 						 <h5 style="background-color: grey; text-align: center; color: white;"><?php echo $scdate;?></h5>
 						 <h5 style="background-color: lightgreen; font-size : 20px ; text-align: center; color: white;">Match2<br/><?php echo ucfirst($tmode)." "."Match";?></h5>
							<br/>
						<table class="table table-bordered">
						    <thead >
						      <th style="text-align: center;"><?php echo $team1;?></th>
						      <th></th>
						      <th style="text-align: center;"><?php echo $team2;?></th>
						    </thead>
						    <tbody>
						      <tr>
						        <td style="text-align: center;"><img src="../images/icon.png" style="height: 50px; width: 70px;"></td>
						        <td style="text-align: center;"	>Vs</td>
						        <td style="text-align: center;"><img src="../images/icon.png" style="height: 50px; width: 70px;"></td>
						      </tr>
						       <tr>
						      <td colspan="3">
						      	<?php 
						      		$check1=$tresult;
						      			if($check1==""){
						      				 echo'<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal1" >

						       Add Result</button>';
						      			}else{
						      				 echo $tresult;
						      				 echo '<button  class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal1" >
						       Already Added the results. Click to edit again</button>';
						      			}
						      		 ?>

						      </tr>
						      <tr>
						      	<td colspan="3">
						      		<?php 
						      	$sumary_qu="SELECT match_summary from total_scorecard where match_id='$second_match_id'";
						      	$summary_result= mysqli_query($con,$sumary_qu);
						      	 $num_rows = mysqli_num_rows($summary_result);
								 if($num_rows==1){
								 while( $row = mysqli_fetch_array($summary_result)) {
								 		 $match_summary=$row["match_summary"];
								        }
								         if($match_summary=""){
								    	echo '<a href="match_summary.php?match_id='.$second_match_id.' class="btn btn-primary">Add Summary</a>';
								    }else{
								    	echo '<a href="#" class="btn btn-danger">Already Added Summary</a>';
								    }
								      }else{
								      	echo '<a href="match_summary.php?match_id='.$second_match_id.'" class="btn btn-primary">Add Summary</a>';
								      }
								   
						       ?>
						      	
						      		<a href="add_scorecard.php?match_id=<?php echo $second_match_id;?>& scorecard_id=<?php echo $second_scorecard_id;?>" class="btn btn-primary pull-right">Add Scorecard</a>
						      	</td>
						      </tr>
						    </tbody>
 						 </table>
 						 <a href="add-schedule.php" class="btn btn-success btn-block">Add Schedule</a>
					</div>
					<br/><br/>
				</div>
			</div>
			</div>
			</div>
			<!--Model 1-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">This Match is played on <?php echo ucfirst($tscdate); ?></h4>
        </div>
        <div class="modal-body">
          <form method="POST">
        <div class="form-group">
        <label class="label-control">Your Team</label>
        <select class="form-control" name="team1" id="team1">
			<option value=""><?php echo $tteam1;?></option>
		</select>
        </div>
        <div class="form-group">
        <label class="label-control">Your Oponent Team</label>
        <select class="form-control" name="team2" id="team2">
			<option value=""><?php echo $tteam2;?></option>
		</select>
        </div>
        <div class="form-group">
        <label class="label-control">Result</label>
        <select class="form-control" name="res1" id="res1" required>
			<option value="">Select Winning Team</option>
			<option value="<?php echo $tteam1;?>"><?php echo $tteam1;?></option>
			<option value="<?php echo $tteam2;?>"><?php echo $tteam2;?></option>
			
		</select>
		<br/>
		<p>Won by</p>
		<div class="row">
		<div class="col-lg-4">
		<input type="text"  class="form-control" name="run1" id="run1" placeholder="Only a number" required>
		</div>
		<div class="col-lg-4">
		 <select class="form-control" name="last-sel1" id="last-sel1">
			<option value="runs">Runs</option>
			<option value="wickets">Wickets</option>
		</select>
		</div>
		</div>
        </div>
      <input type="submit" value="Add Result" name="add-result1" class="btn btn-success btn-block" id="add-result1">
		</form>    
        </div>
      </div>
      
    </div>
  </div>
  <!--model2-->
   <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">This Match is played on <?php echo ucfirst($scdate); ?></h4>
        </div>
        <div class="modal-body">
        <form method="POST">
        <div class="form-group">
        <label class="label-control">Your Team</label>
        <select class="form-control" name="team1" id="team1">
			<option value=""><?php echo $team1;?></option>
		</select>
        </div>
        <div class="form-group">
        <label class="label-control">Your Oponent Team</label>
        <select class="form-control" name="team2" id="team2">
			<option value=""><?php echo $team2;?></option>
		</select>
        </div>
        <div class="form-group">
        <label class="label-control">Result</label>
        <select class="form-control" name="res2" id="res2" required>
			<option value="">Select Winning Team</option>
			<option value="<?php echo $team1;?>"><?php echo $team1;?></option>
			<option value="<?php echo $team2;?>"><?php echo $team2;?></option>
			
		</select>
		<br/>
		<p>Won by</p>
		<div class="row">
		<div class="col-lg-4">
		<input type="text"  class="form-control" name="run2" id="run2" placeholder="Only a number" required>
		</div>
		<div class="col-lg-4">
		 <select class="form-control" name="last-sel2" id="last-sel2">
			<option value="runs">Runs</option>
			<option value="wickets">Wickets</option>
		</select>
		</div>
		</div>
        </div>
      	<input type="submit" value="Add Result" name="add-result2" class="btn btn-success btn-block" id="add-result2">
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

</body>
</html>