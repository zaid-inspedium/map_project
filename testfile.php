<?php

$conn = mysqli_connect('localhost','root','','db_plots');

for($i=0; $i>=120; $i++){
	
	$insert = mysqli_query($conn,"insert into unit_nos (no)values('$i')");	
}


?>