<!-- This class contains functions associated with a document -->
<?php

class document {
	
	//function to create a new document in the database
	public function createDoc($course){
		//obtain fields necessary to create a new document
		$filename = $_FILES['userfile']['name'];
		$tmpname  = $_FILES['userfile']['tmp_name'];
		$filesize = $_FILES['userfile']['size'];
		$filetype = $_FILES['userfile']['type'];
		$filedes = $_POST['description'];
		$filetitle = $_POST['title'];
		$owner = $_SESSION['net_id'];
		@$fileext = strtolower(end(explode('.',$filename)));

		//check for invalid file type
		if ($fileext != 'pdf'){
		echo "<h2>Invalid File Type</h2>";
		}
		//create content variable to hold the contents of the file
		else{
		$fp      = fopen($tmpname, 'r');
		$content = fread($fp, filesize($tmpname));
		$content = addslashes($content);
		fclose($fp);
		//check for current configuration setting of magic_quotes_gpc
		if(!get_magic_quotes_gpc())
		{
			$filename = addslashes($filename);
		}

		//run query
		$query = "INSERT INTO documents (coursenumber, title, filename, file, description, size,owner ) VALUES ('$course','$filetitle', '$filename', '$content', '$filedes', '$filesize', '$owner' )";
		mysql_query($query) or die('Error, query failed'); 


		header('Location:status.php');
		} 

		}
	
	//function to delete a document from the database
	public function deleteDoc(){


	$docid = $_GET['id'];
	$sql = "DELETE FROM documents WHERE id='$docid'";
	mysql_Query($sql) || die("Cannot Delete");
	header("Location:documentboard.php");

	}


	}



?>