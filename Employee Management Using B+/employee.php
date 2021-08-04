<?php
include('handleEmployee.php');
if($_GET)
{
	$q = $_GET["q"];
}else{
	$q = NULL;
}

if(array_key_exists('add', $_POST)) {
    $empID = $_POST['empid'];
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$desg = $_POST['desg'];
	add($empID,$name,$dept,$desg);
}else if(array_key_exists('delete', $_POST)) {
     $empID = $_POST['delete'];
     		 

     delete($empID)  ;
}else if(array_key_exists('edit', $_POST)) {
     $empID = $_POST['empid'];
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$desg = $_POST['desg'];
	modify($empID,$name,$dept,$desg);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee</title>
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
					<a href="employee.php" class="w3-button w3-blue  w3-round-xlarge">📙 Employee List</a>
					<a onclick="document.getElementById('add').style.display='block'" style="margin-top: 10px;" class="w3-button w3-blue  w3-round-xlarge">➕ Add Employee</a>
				</div>
			</div>
			<div class="w3-col l9">
				<div class="w3-card-2 w3-round-xlarge">
					<ul class="w3-ul">
						<li class="w3-bar">
							<div class="w3-row">
								<form action="" method="get">
									<div class="w3-col l10">
										<input type="text" class="w3-input" style="width:100%" placeholder="Search Employee" name="q">
									</div>
									<div class="w3-col l2">
										<button type="submit" class="w3-button w3-blue w3-round-xlarge">Search</button>  
									</div>
							    </form>
							</div>
						</li>
						<?php
							lists($q);
						?>
  					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="add" class="w3-modal">
    	<div class="w3-modal-content  w3-card-2 w3-round-xlarge">
		    <span onclick="document.getElementById('add').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		        <div class="w3-container w3-padding">
		        	<form action="" method="post">
		        		<label>Employee Name</label>
		        		<input type="text" name="name" required class="w3-input">
		        		<label>Employee ID</label>
		        		<input type="text" name="empid" class="w3-input">
		        		<label>Employee department</label>
		        		<input type="text" name="dept" class="w3-input">
		        		<label>Employee designation</label>
		        		<input type="text" name="desg" class="w3-input">
		        		<button class="w3-button w3-blue w3-round-xlarge" name="add"  type="submit">Add</button>
		        	</form>
		        	 
		      	</div>
       
    </div>
  </div>
</body>
</html>