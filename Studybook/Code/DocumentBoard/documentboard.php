<!-- This will show the documents currently submitted for the course as well as show an option to submit new document -->
<!-- Clicking on a document causes a download -->


<?php
require 'logincheck.inc.php';
require 'connect.inc.php';

if(isset($_POST['submit'])) {
header('Location:submit.php');
}

$courseid = $_SESSION['course_id'];

$query = "SELECT id, title, description FROM documents WHERE coursenumber = '$courseid'";

if($result = mysql_query($query)){ 
if(mysql_num_rows($result) == 0)
{
echo "<h1>No Documents have been uploaded for this course yet</h1>";
} 
else
{
while($arr = mysql_fetch_array($result))
{
?>
<a href="download.php?id=<?php echo $arr[0];?>"><?php echo "Title: "; echo $arr[1]; ?> </a> <br>
<a href="download.php?id=<?php echo $arr[0];?>"><?php echo "Description: "; echo $arr[2]; ?> </a> <br><br> 
<a href="deletedoc.php?id=<?php echo $arr[0];?>">Delete</a> 


<?php
echo "<br> <br> <br>";
}
}
}
else{
echo("<h1>No Documents have been uploaded for this course yet</h1>");
}
?>

<form action="documentboard.php" method="POST">
<input type="submit" name="submit" value="Submit Document" >
</form>


<form action="courses.php" method="POST">
<input type="submit" name="Back" value="Back">
</form>

<form action="logout.php" method="POST">
<input type="submit" name="logout" value="Logout">
</form>