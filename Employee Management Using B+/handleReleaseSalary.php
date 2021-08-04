<?php 
include('class.php');
function lists($data)
{
	if($data == NULL){
		$releaseSalary = new ReleaseSalary();
	    $releaseSalary->list();
	}else{
		$releaseSalary = new ReleaseSalary();
	    $line =  $releaseSalary->serach($data);
	    if($line){
	    echo "<li class='w3-bar'>
 						 
 						
 						";?>
 						<button onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='block'" class='w3-button w3-right'>Edit ✏️</button>
 						<div id="<?php echo "edit_$line[0]" ?>" class="w3-modal">
					    	<div class="w3-modal-content  w3-card-2 w3-round-xlarge">
							    <span onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
							    <div class="w3-container w3-padding">
							      	<form action="" method="post">
							       		 
							       		<label>Emp ID</label>
							       		<input type="text" name="empid"  value="<?php echo "$line[0]" ?>" class="w3-input">
							       		<label>ReleaseSalary</label>
							       		<input type="text" name="releaseSalary" required value="<?php echo "$line[4]" ?>" class="w3-input">
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
function add($empID,$date)
{
	$releaseSalary = new ReleaseSalary();
	$isAdded = $releaseSalary->add($empID,$date);
	if($isAdded){
		header("Location:releaseSalary.php");
	}else{
		echo '<script>alert("ReleaseSalary Already Present");</script>';
	}
}
function modify($empID,$sal)
{
	echo "<script>alert($releaseSalary)</script>";
	$releaseSalary = new ReleaseSalary();
	$isModify = $releaseSalary->modify($empID,$sal);
	if($isModify){
		header("Location:releaseSalary.php");
	}else{
		echo '<script>alert("Something went wrong");</script>';
	}
}
function delete($empID){
	$releaseSalary = new ReleaseSalary();
	$isDeleted = $releaseSalary->delete($empID);
	if($isDeleted){
				header("Location:releaseSalary.php");
	}else{
		echo '<script>alert("Something went wrong !!!");</script>';
	}
}
?>