<?php
include('handleSalary.php');
if($_GET)
{
	$q = $_GET["q"];
}else{
	$q = NULL;
}

if(array_key_exists('add', $_POST)) {
     $empID = $_POST['empid'];
	$salary = $_POST['salary']; 
	add($empID,$salary);
}else if(array_key_exists('delete', $_POST)) {
     $empID = $_POST['delete'];
     delete($empID)  ;
}else if(array_key_exists('edit', $_POST)) {
     $empID = $_POST['empid'];
	$salary = $_POST['salary'];
	 
	modify($empID,$salary);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Salary</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="w3-card-2 w3-white w3-padding w3-center">
		<h2>Payroll Management System</h2>
	</div>
	<div style="margin-top: 20px;"></div>
	<div class="w3-content w3-padding">
		<a href="employee.php" class="w3-card w3-red w3-round  w3-button">👥 Employee</a>
		<a href="salary.php" class="w3-card w3-blue w3-round w3-button">💲 Salary</a>
		<a href="releaseSalary.php" class="w3-card w3-green w3-round w3-button">💲 Release Salary</a>

		<div style="margin-top: 20px;"></div>
		<div class="w3-row">
			<div class="w3-col l3">
				<div class="">
					<a href="test.php" class="w3-button w3-blue  w3-round-xlarge">💲 Salary List</a>
				</div>
			</div>
			<div class="w3-col l9">
				<div class="w3-card-2 w3-round-xlarge">
					<ul class="w3-ul">
						 
						<?php
							lists($q);
						?>
  					</ul>
				</div>
			</div>
		</div>
	</div>
	 
</body>
</html>