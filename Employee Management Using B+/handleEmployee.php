<?php 
include('class.php');
function lists($data)
{
	if($data == NULL){
		$employee = new Employee();
	    $employee->list();
	}else{
		$employee = new Employee();
	    $line =  $employee->serach($data);
	    if($line){
	    echo "<li class='w3-bar'>
 						<form action='' method='post'><button class='w3-button w3-right' value='$line[0]' name='delete'>Delete ❌</button></form>
 						
 						";?>
 						<button onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='block'" class='w3-button w3-right'>Edit ✏️</button>
 						<div id="<?php echo "edit_$line[0]" ?>" class="w3-modal">
					    	<div class="w3-modal-content  w3-card-2 w3-round-xlarge">
							    <span onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
							    <div class="w3-container w3-padding">
							      	<form action="" method="post">
							       		<label>Employee Name</label>
							       		<input type="text" name="name" required value="<?php echo "$line[1]" ?>" class="w3-input">
							       		<label>Employee ID</label>
							       		<input type="text" name="empid"  value="<?php echo "$line[0]" ?>" class="w3-input">
							       		<label>Employee department</label>
							       		<input type="text" name="dept" required value="<?php echo "$line[2]" ?>" class="w3-input">
							       		<label>Employee designation</label>
							       		<input type="text" name="desg" required value="<?php echo "$line[3]" ?>" class="w3-input">
							       		<button class="w3-button w3-blue w3-round-xlarge" name="edit" value="edit"  type="submit">Edit</button>
							       	</form>
							   	</div>
          					</div>
 						</div>
 						<?php echo "
						<div class='w3-bar-item'>
							<span class='w3-large'>$line[1]</span><br>
							<div style='margin-top:12px;'><span class='w3-green w3-round-large w3-padding'>$line[3]</span>&nbsp;<span class='w3-orange w3-round-large w3-padding'>$line[2]</span></div>
						</div>
			  		</li>";
		}
	}
}
function add($empID,$name,$dept,$desg)
{
	$employee = new Employee();
	$isAdded = $employee->add($empID,$name,$dept,$desg);
	if($isAdded){
		header("Location:employee.php");
	}else{
		echo '<script>alert("Employee Already Present");</script>';
	}
}
function modify($empID,$name,$dept,$desg)
{
	$employee = new Employee();
	$isModify = $employee->modify($empID,$name,$dept,$desg);
	if($isModify){
		header("Location:employee.php");
	}else{
		echo '<script>alert("Something went wrong");</script>';
	}
}
function delete($empID){
	$employee = new Employee();
	$isDeleted = $employee->delete($empID);
	if($isDeleted){
				header("Location:employee.php");
	}else{
		echo '<script>alert("Something went wrong !!!");</script>';
	}
}
?>