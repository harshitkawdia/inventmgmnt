<?php
$issuepriority = filter_input(INPUT_POST,'issuepriority');
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
$sql = "INSERT INTO feedback (issuepriority, name,itemcode,issuetitle,issuedetail,date)
values ('$issuepriority','$username','$itemcode','$issuetitle','$issuedetail','$date')";
if ($conn->query($sql)){
echo "<h1> Issue Raised Successfully. Kindly Press back to redirect to your previous page ";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Item code should not be empty";
die();
}
}
else{
echo "Name should not be empty";
die();
}
?>
