<?php
<!-- create an ad using data from form...-->
require '../logincheck.inc.php';
require '../connect.inc.php';

class ad{

	public function createAd($coursenumber){
		$title = $_POST['title'];
		$type = $_POST['type'];
		$price = $_POST['price'];
		$desription = $_POST['desription'];
		$contact = $_POST['contact'];
		//$ad_id = $_POST['id'];

		$sqlquery = "INSERT INTO ad VALUES (NULL, '$coursenumber','$title','$type','$price','$description', '$contact', NOW() )";
		
		mysql_query($sqlquery) or die("ERROR WITH DATABASE"); 
		echo "<form action=\"home.php\" method=\"POST\">"
		echo "<input type=\"submit\" name=\"Back\" value=\"Back\">"
		echo "</form>"
		
	}

//	public function deleteAd(){
//		$ad_id = $_GET['id'];
//		$query = "DELETE FROM ad WHERE id = '$ad_id'"
//		mysql_query(query) || die("Error - Delete unsuccesful ");		
//	}
	
}

?>

