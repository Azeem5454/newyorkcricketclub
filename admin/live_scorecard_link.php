<?php
require('admin includes/connect.php');
require('admin includes/core.php');
if(!loggedin())
{
header('Location: index.php');
}
?>
<?php
$match ='';
if(isset($_POST['add_link']))
{
 $link=$_POST['link'];
 $link_query = "Insert into live_scorecard VALUES('','$link')";
 $query_run=mysqli_query($con,$link_query);
 if(!$query_run){
 	$match = '<div class="alert alert-danger">There is a problem in adding your link, Please try later.</div>';
 }else{
 	$match ='<div class="alert alert-success">Your link Added Sucessfully.</div>';

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
    <title>Live Scorecard link</title>
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
			<?php echo $match; ?>
				Add Live Scorecard Link
			</h2>
			<form class="form-horizontal" action="#" method="POST">
			<div class="form-group">
				<label class="control-label">Enter Link:</label>
				<input type="text" name="link" id="link" class="form-control" placeholder="Paste link here" required>
                <p><strong>Note:</strong> Please include full link, For example : http://www.facebook.com( http://) are required</p>
			</div>
			<div class="form-group">
					<label class="control-label"></label>
					<input type="submit" value="Add Link" name="add_link" class="btn btn-danger btn-block" id="add_link">
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
</body>
</html>