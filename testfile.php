<?php

$conn = mysqli_connect('localhost','root','','db_plots');

for($i=1; $i>=61; $i++){
	
	$insert = mysqli_query($conn,"insert into unit_nos (block_id,no) values(3,'$i')");	
}


?>