<?php 
include('bplus.php');
$btree = btree::open('my.tree');
$empid = array();
$indexFile = fopen("employee.txt","r");
  		if ($indexFile) {
			$count =0;
			while (($line = fgets($indexFile)) !== false) {
				$line = preg_replace('/([\r\n\t])/','', $line);
				$empID = $line;
array_push($empid,$empID);
	}
}

sort($empid);

for($i = 0;$i<count($empid);$i++)
{
$data = $btree->get($empid[$i]);

echo $empid[$i].' '.$data.'<br>';
}

/*
$values = array();
$leaves = $btree->leaves();

foreach ($leaves as $p) {
    list(,$p) = $btree->node($p);
    $values += $p;
}
*/
//sort($empid);
//print_r($empid);


?>