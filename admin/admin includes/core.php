<?php
session_start();
function loggedin(){
	if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
		return false;
	}
	else
	{
		return true;
	}
}
?>