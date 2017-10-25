<?php
require('admin/admin includes/connect.php');
require('admin/admin includes/core.php');
?>
<?php
$news="SELECT * from news where id = '$_GET[news_id]'";
$result = mysqli_query($con, $news);
 $num_rows = mysqli_num_rows($result);
 if($num_rows==1){
 while( $row = mysqli_fetch_array($result)) {
        $title = $row["title"];
         $description = $row["description"];
         $image = $row["image"];
        }
      }
   else{
    echo '2 rows';
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
				<img src="images/covers/NEWS-cover.jpg" class="img-responsive" alt="gallery-cover" width="1365" height="345">
			</div>
		</div>
		<div class="container">
		<div class="row">
        <h2 class="page-header" style="text-align: center;">
            <?php echo $title; ?>
        </h2>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <img src="admin/Userdata/newspic/<?php echo $image; ?>" style="width: 500px; height:400px;" class="img-responsive">
        </div>
          <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
          <br/><br/><br/>
        <?php echo $description; ?>
        </div>
        </div>
          <div class="row">
          <h2 class="page-header" style="text-align: center;">Other News</h2>
          <?php
            $news="SELECT * from news order by id DESC limit 0,3";
            $result = mysqli_query($con, $news);
             $num_rows = mysqli_num_rows($result);
             while( $row = mysqli_fetch_array($result)) {
                echo '
            <a href="news.php?news_id='.$row['id'].'">
            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12"><img src="admin/Userdata/newspic/'.$row['image'].'" class="img-responsive" style="height:150px; width:250px;"> 
                <h5>'.$row['title'].'</h5>
            </div>
             </a>';
                 
                    }
            ?>
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