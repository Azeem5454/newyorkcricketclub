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
         $ttmode = $row['mode'];
        }
      }
   else{
   	echo 'Extracting 2 rows';
   }
?>
<?php
$query="SELECT * FROM schedule order by match_id DESC limit 1";
 $result = mysqli_query($con, $query);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
         $team1 = $row["team_1"];
         $team2 = $row["team_2"];
         $scdate = $row["scdate"];
         $tmode = $row['mode'];
        }
      }
   else{
   	echo 'Extracting 2 rows';
   }
?>
<?php
$query="SELECT * FROM schedule order by match_id DESC";
 $result = mysqli_query($con, $query);
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
    <title>NYC Fixures/Results</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <!--Font Awesome Icon-->
    <link rel="stylesheet"  href="css/font-awesome/css/font-awesome.min.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <!-- Bootstrap core CSS -->
   	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   	<!--DataTables-->
   	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
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
				<img src="images/covers/fixure-cover.jpg" class="img-responsive" alt="gallery-cover" width="1365" height="345">
			</div>
		</div>
        <br/><br/>
        <section>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 style="text-align: center;">Upcoming Fixures</h4>
					</div>
					<div class="panel-body">
						<h5 style="background-color: grey; text-align: center; color: white;"><?php echo ucfirst($tscdate);?></h5>
						<h5 style="background-color: #e84c3d; font-size : 20px ; text-align: center; color: white;">Match1<br><?php echo ucfirst($ttmode)." "."Match";?></h5>
							<br/>
						<table class="table table-bordered">
						    <thead >
						      <th style="text-align: center;"><?php echo $tteam1;?></th>
						      <th></th>
						      <th style="text-align: center;"><?php echo $tteam2;?></th>
						    </thead>
						    <tbody>
						      <tr>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						        <td style="text-align: center;"	>Vs</td>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						      </tr>
						    </tbody>
 						 </table>
 						 <h5 style="background-color: grey; text-align: center; color: white;"><?php echo ucfirst($scdate) ;?></h5>
 						  <h5 style="background-color:#e84c3d; font-size : 20px ; text-align: center; color: white;">Match2<br/><?php echo ucfirst($tmode)." "."Match";?></h5>
							<br/>
						<table class="table table-bordered">
						    <thead >
						      <th style="text-align: center;"><?php echo $team1;?></th>
						      <th></th>
						      <th style="text-align: center;"><?php echo $team2;?></th>
						    </thead>
						    <tbody>
						      <tr>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						        <td style="text-align: center;"	>Vs</td>
						        <td style="text-align: center;"><img src="images/icon.png" style="height: 50px; width: 70px;"></td>
						      </tr>
						    </tbody>
 						 </table>
					</div>
					<br/><br/>
				</div>
			</div>
			</div>
			<div class="col-lg-2"></div>
			</div>
		</section>
		<!--Results-->
		<section>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 style="text-align: center;">Previous Results</h4>
					</div>
					<div class="panel-body">
							<br/>
					<div class="table-responsive">  
                     <table id="result_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Team 1</td>  
                                    <td>Team 2</td>  
                                    <td>Overs</td>  
                                    <td>Date</td>  
                                    <td>Results</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          	if($row["results"]==""){$res= "No result available yet";}
                          		else{
                          			$res= $row["results"];
                          		}
                               echo '  
                               <tr>  
                                    <td>'.$row["team_1"].'</td>  
                                    <td>'.$row["team_2"].'</td>  
                                    <td>'.$row["mode"].'</td>  
                                    <td>'.$row["scdate"].'</td>  
                                    <td>'.$res.'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div> 
					
					</div>
				</div>
			</div>
			</div>
			<div class="col-lg-2"></div>
			</div>
		</section>
		<!--/Results-->
		<!--Footer-->
		<?php include('includes/footer.php');?>
		<!--/Footer-->
		<!-- Bootstrap Core Javascript -->
</body>
</html>
 <script>    
 $(document).ready(function(){  
      $('#result_data').DataTable();  
 });  
 </script>  