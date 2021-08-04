<?php 
include('class.php');
function list($data)
{
	if($data == null)
	{
		
	}
}
if($_POST)
{
	
	$empid = $_POST["empid"];
	$name = $_POST["name"];
	$dept=$_POST["dept"];
	$desg=$_POST["desg"];
	$employee = new Employee();
	$employee->delete($empid);
	//$employee->modify($empid, $name, $dept,$desg);
	//$employee->serach($empid);
	//$employee->add($empid, $name, $dept,$desg);
	echo "Details Added";
}
?>