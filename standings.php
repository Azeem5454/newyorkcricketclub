<?php
require('admin/admin includes/connect.php');
require('admin/admin includes/core.php');
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
    <title>NYC Gallery</title>
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
				<img src="images/covers/standings-cover.jpg" class="img-responsive" alt="gallery-cover" width="1365" height="345">
			</div>
		</div>
		<div class="container">
        <br/><br/>
        <div class="col-lg-2"></div>
         <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
             <table class="table table-hover">
                    <thead style="background-color: #e84c3d; color: white">
                      <tr>
                        <th>Teams</th>
                        <th>Matches</th>
                        <th>Won</th>
                        <th>Lost</th>
                        <th>N/R</th>
                        <th>Points</th>
                        <th>Win %</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $sel="SELECT * FROM standings";
                      $run=mysqli_query($con,$sel);
                      while($row=mysqli_fetch_array($run)){
                        $id=$row['id'];
                        echo ' <tr>
                        <td style="color:blue; font-weight:bold;">'.ucfirst($row['teams']).'</td>
                        <td>'.$row['matches'].'</td>
                        <td>'.$row['won'].'</td>
                        <td>'.$row['lost'].'</td>
                        <td>'.$row['nr'].'</td>
                        <td>'.$row['points'].'</td>
                        <td>'.$row['win_percentage'].' %'.'</td>
                      </tr>';
                      }
                      ?>
                    </tbody>
            </table>
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