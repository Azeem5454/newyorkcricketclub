<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/fav.jpg">
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
	<div class="row">
	<!--SideBar-->
		<br/><br/><br/>
	<?php include 'admin includes/sidebar.php';?>
	<!--/SideBar-->
	<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-7">
			<h2 class="page-header">
				Add Schedule
			</h2>
			<form class="form-horizontal" action="#" method="#">
			<div class="form-group">
				<label class="control-label">Your team name:</label>
				<input type="text" name="team1" id="team1" class="form-control" placeholder="Your Team name here(NYC C.C)" required>
			</div>
			<div class="form-group">
				<label class="control-label">Oponent team name:</label>
				<input type="text" name="team2" id="team2" class="form-control" placeholder="Oponent Team name here(e.g Sydney)" required>
			</div>
				<div class="form-group">
					<label class="control-label">Select Match Date:</label>
					<select  class="form-control" style="max-width:30%;" name="day" id="day" required>
            <option value="">Day</option>
                            <option  value="1">1</option>
                            <option  value="2">2</option>
                            <option  value="3">3</option>
                            <option  value="4">4</option>
                            <option  value="5">5</option>
                            <option  value="6">6</option>
                            <option  value="7">7</option>
                            <option  value="8">8</option>
                            <option  value="9">9</option>
                            <option  value="10">10</option>
                            <option  value="11">11</option>
                            <option  value="12">12</option>
                            <option  value="13">13</option>
                            <option  value="14">14</option>
                            <option  value="15">15</option>
                            <option  value="16">16</option>
                            <option  value="17">17</option>
                            <option  value="18">18</option>
                            <option  value="19">19</option>
                            <option  value="20">20</option>
                            <option  value="21">21</option>
                            <option  value="22">22</option>
                            <option  value="23">23</option>
                            <option  value="24">24</option>
                            <option  value="25">25</option>
                            <option  value="26">26</option>
                            <option  value="27">27</option>
                            <option  value="28">28</option>
                            <option  value="29">29</option>
                            <option  value="30">30</option>
                            <option  value="31">31</option>
                    </select>
                    <br/>
					<select  class="form-control"  style="max-width:30%;" name="month" id="month" required>
            <option value="">Month</option>
                            <option  value="january">January</option>
                            <option  value="february">February</option>
                            <option  value="march">March</option>
                            <option  value="april">April</option>
                            <option  value="may">May</option>
                            <option  value="june">June</option>
                            <option  value="july">July</option>
                            <option  value="august">August</option>
                            <option  value="september">September</option>
                            <option  value="october">October</option>
                            <option  value="november">November</option>
                            <option  value="december">December</option>
                    </select>
                    <br/>
					<select class="form-control" style="max-width:30%;" name="year" id="year" require>
            <option value="">Year</option>
                            <option  value="2017">2017</option>
                            <option  value="2018">2018</option>
                            <option  value="2019">2019</option>
                            <option  value="2020">2020</option>
                 
                    </select>
			     	</div>  
			     <div class="form-group">
					<label class="control-label"></label>
							<input type="submit" value="Add Schedule" name="add_schedule" class="btn btn-danger btn-block" id="add_schedule">
				</div>
        	</form>
            </div>
	</div>

		<!--Footer-->
		<!--/Footer-->
		<!-- Bootstrap Core Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>fff