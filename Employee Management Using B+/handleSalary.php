<?php 
include('class.php');
function lists($data)
{
	if($data == NULL){
		$salary = new Salary();
	    $salary->list();
	}else{
		$salary = new Salary();
	    $line =  $salary->serach($data);
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
							       		 
							       		<label>Emp ID</label>
							       		<input type="text" name="empid"  value="<?php echo "$line[0]" ?>" class="w3-input">
							       		<label>Salary</label>
							       		<input type="text" name="salary" required value="<?php echo "$line[4]" ?>" class="w3-input">
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
	$salary = new Salary();
	$isAdded = $salary->add($empID,$salary);
	if($isAdded){
		header("Location:salary.php");
	}else{
		echo '<script>alert("Salary Already Present");</script>';
	}
}
function modify($empID,$sal)
{
	echo "<script>alert($salary)</script>";
	$salary = new Salary();
	$isModify = $salary->modify($empID,$sal);
	if($isModify){
		header("Location:salary.php");
	}else{
		echo '<script>alert("Something went wrong");</script>';
	}
}
function delete($empID){
	$salary = new Salary();
	$isDeleted = $salary->delete($empID);
	if($isDeleted){
				header("Location:salary.php");
	}else{
		echo '<script>alert("Something went wrong !!!");</script>';
	}
}
?>