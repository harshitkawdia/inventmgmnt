<?php
   	$error = "";

   	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$eid =
    $ename =
		$issue =
    $issuedet =
		$date =
      	if(isset($_POST['submit'])){
	      	$sql = "INSERT INTO feedback (eid, ename, issue, issuedet, date)
	   		VALUES ('$eid', '$ename', '$issue', '$issuedet', '$date' )";
	   		if ($db->query($sql) === TRUE) {
				$message = "New record created successfully";
				header("comment.php");
			} else {
				$message = "Error: " . $sql . "<br>" . $db->error;
			}
	    }
   	}
?>
