<?php
require('admin includes/connect.php');
require('admin includes/core.php');
?>
<?php 
$match='';
if(isset($_POST['submit'])){
if(isset($_POST['username']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="select username,password from admin where username='$username' and password='$password'";
    $result = mysqli_query($con, $query);
            $num_rows = mysqli_num_rows($result);
        if($num_rows==1){
            while( $row = mysqli_fetch_array($result)) {
         $_SESSION["username"] = $row["username"];
         $_SESSION["password"]=$row["password"];
         $match = '<div class="alert alert-success">Your have logged in successfully</div>';
        }
        header("location:home.php");
      }
        
      else{
         $match = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your email or password is incorrect</div>';
      }
}
}
if(loggedin())
{
header('Location: home.php');
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
    <title>Admin Area</title>
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
	<!--/Header-->
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4 col-md-6 col-sm-12 col-x-12">
			<div class="page-header">
			<h2 style="text-align: center;">Admin Login</h2>
			<div><?php echo $match; ?></div>
			</div>
			<form roll="form" class="panel-group form-horizontal" action="#" method="post">
						<div class="panel panel-default">
							<div class="panel-heading">Login Here</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="username" class="control-label col-sm-4">User Name</label>
									<div class="col-sm-7">
									<input type="text" id="username" name="username" class="form-control" placeholder="Insert Username">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="control-label col-sm-4">Password</label>
									<div class="col-sm-7">
									<input type="password" id="password" name="password" class="form-control" placeholder="Insert Password">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
									<input type="Submit" id="" name="submit" value="Login" class="btn btn-success btn-block" >
									</div>
								</div>
							</div>
						
						</div>
					</form>
					<div class="btn btn-primary" ><a href="../index.php" style="color: white;">Go to website main page</a></div>
		</div>
	</div>
	
		<!-- Bootstrap Core Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>
</body>
</html>