<?php
	//table.php
	//getting our config.php
	require_once("../../config.php");
	
	//create connection
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_mertyarba");
		
	$stmt = $mysql->prepare("INSERT INTO homework(location, time, punishment, name)VALUES (?, ?, ?, ?)");
	
	
	
	//SQL sentence
	$stmt = $mysql->prepare("SELECT location, time, punishment, name, created FROM homework ORDER BY created LIMIT 5");
	
	//if error in sentence
	echo $mysql->error;
	
	$stmt->bind_result($location, $time, $punishment, $name, $created);
	
	//save
	$stmt->execute();
	
	$table_html = "";
	$table_html .= "<table>";
	
	//add something to string
	$table_html .= "<tr>";
		$table_html .= "<tr>";
		$table_html .= "<th>ID</th>";
		$table_html .= "<th>Location</th>";
		$table_html .= "<th>Created</th>";
	$table_html .= "</tr>";
	
	
	//Get Result
	while($stmt->fetch()){
		
		//DO SOMETHING FOR EACH ROW
		//echo $id."".$message."<br>";
		$table_html .= "<tr>"; //start new row
			$table_html .= "<td>".$location."</td>"; //add columns
			$table_html .= "<td>".$time."</td>";
			$table_html .= "<td>".$punishment."</td>";
			$table_html .= "<td>".$name."</td>";
			$table_html .= "<td>".$created."</td>";
		$table_html .= "<tr>"; //end row
		
		//echo $id."".$message."<br>";
	
	}
	
		$table_html .= "</table>";
	echo $table_html;
?>

<a href="APP.php">APP<a/>