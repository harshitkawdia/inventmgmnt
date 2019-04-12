<!DOCTYPE html>
<html>
<head>
 <title>Form site</title>
</head>
<body>
<form method="post" action="connect.php">
  Name : <input type="text"  ondragover="         "name="username"><br><br>
  Item Code :  <input type="number" name="itemcode"><br> <br>
  Issue Title : <input type="text"  name= "issuetitle"  size="100"><br><br>
  Issue Detais : <input type="text" name=  "issuedetail" size="50"><br><br>
  Issue Priority : <input list="priority">
                            <datalist id="priority">
                            <option value=" High">
                             <option value=" Medium">
                              <option value="Low">
                            </datalist> <br> <br>

  Date : <input type="date" name="date"> <br> <br>
<input type="submit" value="Submit">
</form>
</body>
</html>
