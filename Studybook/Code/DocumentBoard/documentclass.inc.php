<?php

class document {

public function createDoc($course){
$filename = $_FILES['userfile']['name'];
$tmpname  = $_FILES['userfile']['tmp_name'];
$filesize = $_FILES['userfile']['size'];
$filetype = $_FILES['userfile']['type'];
$filedes = $_POST['description'];
$filetitle = $_POST['title'];
@$fileext = strtolower(end(explode('.',$filename)));


if ($fileext != 'pdf'){
echo "<h2>Invalid File Type</h2>";
}
else{
$fp      = fopen($tmpname, 'r');
$content = fread($fp, filesize($tmpname));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $filename = addslashes($filename);
}


$query = "INSERT INTO documents (coursenumber, title, filename, file, description, size ) VALUES ('$course','$filetitle', '$filename', '$content', '$filedes', '$filesize' )";

mysql_query($query) or die('Error, query failed'); 


header('Location:status.php');
} 

}

public function deleteDoc(){


$docid = $_GET['id'];
$sql = "DELETE FROM documents WHERE id='$docid'";
mysql_Query($sql) || die("Cannot Delete");
header("Location:documentboard.php");

}


}



?>