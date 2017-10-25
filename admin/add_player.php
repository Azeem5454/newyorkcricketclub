<?php
require('admin includes/connect.php');
require('admin includes/core.php');
if(!loggedin())
{
header('Location: index.php');
}
?>
<?php 
    $match ="";
    if(isset($_POST['submit'])){
        if (isset($_FILES['pic'])){
            $player_name=$_POST['player_name'];
            $role=$_POST['role'];
            $battig_style=$_POST['batting'];
            $bowling_style=$_POST['bowling'];
  if((@$_FILES["pic"]["type"]=="image/jpeg") || (@$_FILES["pic"]["type"]=="image/png") || (@$_FILES["pic"]["type"]=="image/gif"))
  {
    $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $rand_dir_name=substr(str_shuffle($chars),0,15);
    mkdir("Userdata/profilepic/$rand_dir_name");
    if(file_exists("Userdata/profilepic/$rand_dir_name/".@$_FILES["pic"]["name"])){
      echo @$_FILES["pic"]["name"]." Already exists";
    }
    else{
      move_uploaded_file(@$_FILES["pic"]["tmp_name"], "Userdata/profilepic/$rand_dir_name/".$_FILES["pic"]["name"]);
      //echo "Uploaded and saved in: ".@$_FILES["profilepic"]["name"];
      $pic_name=$_FILES["pic"]["name"];
      $pic_query="INSERT into players values ('','$player_name','$role','$battig_style','$bowling_style','$rand_dir_name/$pic_name')";
      $result = mysqli_query($con, $pic_query) or die(mysql_error());
      //header("location:profile.php");
     $match= '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Player Added Sucessfully.</div>';
    }
  }
  else{
   $match = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Invalid File.</div>';
  }
}

    }
 ?>
<?php

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
    <title>Add Player</title>
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
                Add Player
            </h2>
            <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                        <label for="pic">Upload an image</label>
                        <input type="file" name="pic" id="pic"class="btn btn-primary"/>
                    </div>
                     <div class="form-group">
                        <label for="description">Player Name</label>
                        <input type="text" name="player_name" id="player_name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="title">Playing Role</label>
                        <input type="text" name="role" id="role" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Batting Style</label>
                        <input type="text" name="batting" id="batting" class="form-control"/>
                    </div>
                     <div class="form-group">
                        <label for="description">Bowling Style</label>
                        <input type="text" name="bowling" id="bowling" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Player" name="submit" id="submit" class="btn btn-danger btn-block"/>
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