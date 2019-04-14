<?php
 $username = filter_input(INPUT_POST, 'username');
 $itemcode = filter_input(INPUT_POST, 'itemcode');
 $issuetitle = filter_input(INPUT_POST, 'issuetitle');
 $issuedetail = filter_input(INPUT_POST, 'issuedetail');
 $date = filter_input(INPUT_POST, 'date');
 if (!empty($username)){
if (!empty($itemcode)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO feedback (name,itemcode,issuetitle,issuedetail,date)
values ('$username','$itemcode','$issuetitle','$issuedetail','$date')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}
?>
