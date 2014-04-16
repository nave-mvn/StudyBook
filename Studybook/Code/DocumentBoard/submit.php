<!-- will show a form to fill up to submit the document-->
<h1>Submit only Pdf file</h1>
<?php
require 'logincheck.inc.php';
require 'connect.inc.php';
require 'documentclass.inc.php';

$c = $_SESSION['course_id'];
//echo $course;

if (isset($_POST['title']) && isset($_POST['description']) && !empty($_POST['title']) && !empty($_POST['description']) ){
if($_FILES['userfile']['size'] > 0)
{
$document = new document;
$document-> createDoc($c);
}
else{
echo "File not uploaded";
}
}
else{
echo "<h2>Please Enter all fields</h2>";
}
?>



<form method="post" action = "submit.php" enctype="multipart/form-data">
<table>
  <tr>
    <td>Title: &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="title"></td>
  </tr>
  <tr>
    <td>Description: <input type="text" name="description"></td>
  </tr>
  <tr>
    <td><input name="userfile" type="file" id="userfile"></td>
  </tr>
  <tr>
	<td><input type="submit" value ="Submit"></td>
  </tr>
</table>
</form>

<form action="documentboard.php" method="POST">
<input type="submit" name="Back" value="Back">
</form>

<form action="logout.php" method="POST">
<input type="submit" name="logout" value="Logout">
</form>