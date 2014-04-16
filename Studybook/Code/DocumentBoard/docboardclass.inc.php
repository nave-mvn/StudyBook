<?php
class docboardclass{

public function getDocList($cid){
//
}

public function getDoc(){
 $id = $_GET['id'];
 $sql = "SELECT id, file, filename, size FROM documents WHERE id=$id";
	
  $result = @mysql_query($sql);
  $file = @mysql_result($result, 0, "file");
  $name = @mysql_result($result, 0, "filename");
  $size = @mysql_result($result, 0, "size");
  $type = 'pdf';
	
  header("Content-type: $type");
  header("Content-length: $size");
  header("Content-Disposition: attachment; filename=$name");
  header("Content-transfer-encoding: binary");
  echo $file;
}

} 

?>