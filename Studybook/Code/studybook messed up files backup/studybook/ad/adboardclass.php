<?php
<!-- gets ad from database... print Ad page-->
require '../logincheck.inc.php';
require '../connect.inc.php';

	
$adid = $_GET['id'];
$query = "SELECT id, title, type, price, description, contact FROM ad WHERE id=$id";
$result = mysql_query(query);
?>

<tr>
<strong>ID#</strong>
<strong>Title</strong>
<strong>Type</strong>
<strong>Price</strong>
<strong>Description</strong>
<strong>Contact</strong>
</tr>

<?php
while($arr = mysql_fetch_array($result)){
<tr>
<? echo $arr['id']; ?>
<? echo $arr['title']; ?>
<? echo $arr['type']; ?>
<? echo $arr['price']; ?>
<? echo $arr['description']; ?>
<? echo $arr['contact']; ?>
</tr>

}

<form action="courses.php" method="POST">
<input type="submit" name="Back" value="Back">
</form>

<form action="logout.php" method="POST">
<input type="submit" name="logout" value="Logout">
</form>
