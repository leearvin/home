<html>
	<head>
		<title>Aliens Abducted Me -report an Abduction</title>
	</head>
	<body>
		<h2>Aliens Abducted Me -report an Abduction</h2>
<?php
	if(isset($_POST)){
		print_r($_POST);
		//echo $_POST['firstname'];
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$name = $firstName." ".$lastName;
		$email = $_POST['email'];
		$whenItHappened = $_POST['whenithappened'];
		$howLong = $_POST['howlong'];
		$howMany = $_POST['howmany'];
		$aliensDescription = $_POST['aliensdescription'];
		$whatTheyDid = $_POST['whattheydid'];
		$fangSpotted = $_POST['fangspotted'];
		$other = $_POST['other'];
		$toMail = 'lhjdark@hotmail.com';
		/**
		$msg = $name.
		" was abducted ".$whenItHappened."\n".
		" and were gone for ".$howLong."\n".
		" Number of aliens: ".$howMany."\n".		
		" Alien description: ".$aliensDescription."\n".
		" What they did: ".$whatTheyDid."\n".
		" Fang spotted: ".$fangSpotted."\n".
		" Other comments: ".$other."\n";
		**/
		$subject = "Aliens Abducted Me .Abduction Report";
		$msg =  "$name was abducted $whenItHappened\n".
				" and were gone for $howLong\n".
				" Number of aliens: $howMany \n".
				" Alien description: $aliensDescription\n".
				" What they did: $whatTheyDid\n".
				" Fang spotted: $fangSpotted\n".
				" Other comments: $other\n";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
		$headers .= 'From: ".$email."' . "\r\n";
		$headers .= 'Cc: lhjdark@163.com' . "\r\n";
		 
		
		
		mail($toMail, $subject, $msg , $headers);
		echo "thanks for submitting the form.<br />";
		echo "You were abducted ".$whenItHappened."<br />";
		echo "and were gone for ".$howLong."<br />";
		echo "Number of aliens: ".$howMany."<br />";
		echo "Describe them: ".$aliensDescription."<br />";
		echo "The aliens did this: ".$whatTheyDid.'<br />';
		echo "Was Fang there? ".$fangSpotted."<br />";
		echo "Other comments: ".$other.'<br />';
		echo "Your email address is ".$email."<br />";
		echo $msg;		
	}




?>

	
	</body>


</html>

