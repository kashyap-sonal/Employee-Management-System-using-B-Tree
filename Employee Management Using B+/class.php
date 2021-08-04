<?php
 include('bplus.php');
 
 class Employee{
	 
	public function add($empID, $empName, $dept,$desg){
        $btree = btree::open('my.tree'); 
        $dataIndexFile=fopen("employee.txt","a") or die("Unable to open file!");
 		$indexData ="$empID".PHP_EOL;
		fwrite($dataIndexFile, $indexData);
		return $btree->set("$empID", "$empId|$empName|$dept|$desg|null");
  	}
	public function serach($empID){
		$btree = btree::open('my.tree'); 
		$value = $btree->get($empID);
 		if ($value) {
				$line = preg_replace('/([\r\n\t])/','', $value);
				$line = explode ("|", $line); 
					return $line;
		} else {
			 echo "No result";
		} 
	}
	public function modify($empID,$name,$dept,$desg){
		$btree = btree::open('my.tree'); 
		return $btree->set($empID, "$empId|$name|$dept|$desg|null");
	}
	public function delete($empID){
		$btree = btree::open('my.tree'); 
				$Salarybtree = btree::open('releaseSalary.tree'); 

		$indexFile = fopen("employee.txt","r");
		$mFile = '';
 		if ($indexFile) {
			$count =0;
			while (($line = fgets($indexFile)) !== false) {
				$store = $line;
				$line = preg_replace('/([\r\n\t])/','', $line);
 				if($line  != $empID){
					$mFile = $mFile."".$store;
 				}
 			}
			$datafile1=fopen("employee.txt","w") or die("Unable to open file!");
 			fwrite($datafile1, $mFile);
 			fclose($datafile1);	
 			$Salarybtree->set($empID,NULL);
  			return $btree->set($empID, NULL);
		} else {
			 return false;
		} 
	}
	public function list(){
		$btree = btree::open('my.tree'); 
		$indexFile = fopen("employee.txt","r");
  		if ($indexFile) {
			$count =0;
			while (($line = fgets($indexFile)) !== false) {
				$line = preg_replace('/([\r\n\t])/','', $line);
				$empID = $line;
				$value = $btree->get("".$line);
                $line = explode ("|", $value);
                $line[0] = $empID;
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
}

class Salary{
	 
	public function add($empID, $salary){
        $btree = btree::open('my.tree'); 
        $value = $btree->get($empID);
        $line = preg_replace('/([\r\n\t])/','', $value);
		$line = explode ("|", $line); 
		return $btree->set("$empID", "$empId|$line[1]|$line[2]|$line[3]|$salary|$line[5]");
  	}
	public function serach($empID){
		$btree = btree::open('my.tree'); 
		$value = $btree->get($empID);
 		if ($value) {
				$line = preg_replace('/([\r\n\t])/','', $value);
				$line = explode ("|", $line); 
					return $line;
		} else {
			 echo "No result";
		} 
	}
	public function modify($empID,$salary){
		print($salary);
		$btree = btree::open('my.tree'); 
        $value = $btree->get($empID);
        $line = preg_replace('/([\r\n\t])/','', $value);
		$line = explode ("|", $line); 
		return $btree->set("$empID", "$empID|$line[1]|$line[2]|$line[3]|$salary|$line[5]");
	}
	 
	public function list(){
		$btree = btree::open('my.tree'); 
		$indexFile = fopen("employee.txt","r");
  		if ($indexFile) {
			$count =0;
			while (($line = fgets($indexFile)) !== false) {
				$line = preg_replace('/([\r\n\t])/','', $line);
				$empID = $line;
				$value = $btree->get("".$line);
                $line = explode ("|", $value);
                $line[0] = $empID;
  				echo "<li class='w3-bar'>
 						";?>
 						<button onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='block'" class='w3-button w3-right'>Edit ✏️</button>
 						<div id="<?php echo "edit_$line[0]" ?>" class="w3-modal">
					    	<div class="w3-modal-content  w3-card-2 w3-round-xlarge">
							    <span onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
							    <div class="w3-container w3-padding">
							      	<form action="" method="post">
							       		 
							       		<label>Employee ID</label>
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
							<div style='margin-top:12px;'><span class='w3-green w3-round-large w3-padding'>$line[4]</span>&nbsp;<span class='w3-orange w3-round-large w3-padding'>$line[2]</span></div>
						</div>
			  		</li>";
 			} 
		}
	}
}



class ReleaseSalary{
	 
	public function add($empID, $date){
		echo "here";
        $btree = btree::open('releaseSalary.tree'); 
        $value = $btree->get($empID);
        if($value){
         $value = "$date|$value";
          return $btree->set("$empID", "$value");
		}
		else
		{
			return $btree->set("$empID", "$date");
		}
  	}
	public function list(){
		$btree = btree::open('my.tree'); 
		$Salarybtree = btree::open('releaseSalary.tree'); 
		$indexFile = fopen("employee.txt","r");
  		if ($indexFile) {
			$count =0;
			while (($line = fgets($indexFile)) !== false) {
				$line = preg_replace('/([\r\n\t])/','', $line);
				$empID = $line;
				$value = $btree->get("".$line);
                $line = explode ("|", $value);
                $line[0] = $empID;
  				echo "<li class='w3-bar'>
 						";?>
 						<button onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='block'" class='w3-button w3-right'>Release Salary ✏️</button>
 						<div id="<?php echo "edit_$line[0]" ?>" class="w3-modal">
					    	<div class="w3-modal-content  w3-card-2 w3-round-xlarge">
							    <span onclick="document.getElementById('<?php echo "edit_$line[0]" ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
							    <div class="w3-container w3-padding">
							      	<form action="" method="post">
							       		 
							       		<label>Employee ID</label>
							       		<input type="text" name="empid"  value="<?php echo "$line[0]" ?>" class="w3-input">
							       		 
							       		<label>Date</label>
							       		<input type="date" name="date" required  class="w3-input">
							       		<button class="w3-button w3-blue w3-round-xlarge" name="edit" value="edit"  type="submit">Release Salary</button>
							       	</form>
							   	</div>
          					</div>
 						</div>
 						<?php echo "
						<div class='w3-bar-item'>
							<span class='w3-large'>$line[1]</span><br>
							<div style='margin-top:12px;'>
							";?>
							<?php
											$value = $Salarybtree->get("".$empID);
                                            $salarys = explode ("|", $value);
											$salarys = preg_replace('/([\r\n\t])/','', $salarys);
											foreach ($salarys as $sal) {
												echo "<span class='w3-green w3-round-large w3-padding'> $sal </span>&nbsp;";
											}
									
	        	 				 
							?>
							<?php echo " 
						</div>
			  		</li>";
 			} 
		}
	}
}

 

 


?>