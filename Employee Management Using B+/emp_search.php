<?php 
include('class.php');
if($_POST)
{
	
	$id = $_POST["id"];
	 
	$employee = new Employee();
	$employee->serach($id);
	
}
?>