<?php
	//require another php file
	//../../ means go to folders back
	require_once("../../config.php");
	
	
	//******************************
	//******** SAVE TO DB **********
	//******************************
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		//1 server name
		//2 username
		//3 password
		//4 database
		
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_mertyarba");
		
		$stmt = $mysql->prepare("INSERT INTO homework(location, time, punishment, name)VALUES (?, ?, ?, ?)");
		
		//We are replacing question marks with values
		//s - string, date or smth that is based on characters and numbers
		//i - integer, number
		//d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("ssss", $_GET["location"], $_GET["time"], $_GET["punishment"], $_GET["name"]);
		
		//echo error
		echo $mysql->error;
		
		//save
		if ($stmt->execute()){
			echo "saved successfully";
		}else{
			echo $stmt->error;
		}
	
	//*****************
	//TO validation
	//*****************
	if (isset($_GET["location"])){//if there is "?location=" in the message
		if (empty($_GET["location"])){//if it is empty
		echo "Define location! <br>";//yes it is empty
		}else{
			echo "Location: ".$_GET["location"]."<br>";//no it is not empty
		}
	}
	
	//check if there is variable in the URL
	if (isset ($_GET["time"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		// if it is empty
		if (empty ($_GET["time"])){
			//it is empty
			echo "What time are you meeting? <br>";
		}else{
			//It is not empty
			echo "Time: ".$_GET["time"]."<br>";
		}
	}else{
		
	}
	
	
	
	if (isset($_GET["punishment"])){//if there is "?punishment=" in the message
		if (empty($_GET["punishment"])){//if it is empty
		echo "What's the punishment? <br>";//yes it is empty
		}else{
			echo "Punishment: ".$_GET["punishment"]."<br>";//no it is not empty
		}
	}
	
	if (isset($_GET["name"])){//if there is "?name=" in the message
		if (empty($_GET["name"])){//if it is empty
		echo "What's your name? <br>";//yes it is empty
		}else{
			echo "Name: ".$_GET["name"]."<br>";//no it is not empty
		}
	}
	
	
	//Getting the message from the address
	//if there is $name= .. then $_GET ["name"]
	//$my_message = $_GET ["message"];
	//$to = $_GET ["to"];
	//$urgency = $_GET ["urgency"];
	//echo "My message is " .$my_message. " and it is to " .$to;
	
	


?>

</br>	<a href="table.php">table<a/>

<h2> Don't Be Late </h2>

<form method="get">
	<label for="location">Location* <br><label><br>
	<input type="text" name="location"><br>
	
	<label for="time">Time* <label><br>
	<input type="text" name="time"><br>
	
	<label for="punishment">Punishment* <label><br>
	<input type="text" name="punishment"><br>
	
	<label for="name">Name* <label><br>
	<input type="text" name="name"><br>
	
	<input type="submit" value="Let The Game Begin!">
	
	<br>
	
	</br>
	
		<img src="http://images.sodahead.com/polls/0/0/2/8/6/2/0/0/9/105487930_jigsaw___i_want_to_play_a_game_by_texasrampage_d31e2oc.jpeg">
	
	
	<br>Set a meeting point with your friends and whoever is late, gets the punishment they deserve!<br>


<form>