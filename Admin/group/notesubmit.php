
  <?php
    session_start();
include '../connectivity/connection.php';
$temp=$_SESSION['uid'];
if(!isset($temp))
{
	header('location:../log_in.php');
}
else
{  
    
    
$get= $_GET['gp_id'];
    $cls=$_GET['cls'];
    $title=$_POST['topic'];
    $file=$_FILES['files']['name'];
    $tmp_dir = $_FILES['files']['tmp_name'];

    $nid=$cls.rand(00000,100000);
    $date1=date('Y-m-d');
    $id;
    if(isset($file)){
    $upload_dir = '../upload_assets/note_files/'; // upload directory
               
   
                    move_uploaded_file($tmp_dir,$upload_dir.$file);
    }

    $db=getDB();
    $stmt=$db->prepare("INSERT INTO `notes`(`id`, `Group_id`, `Notes_id`, `Class`, `File`, `Title`, `date`) 
    VALUES (:id,:gid,:nid,:cls,:fls,:title,:dte)");
        $stmt->bindParam(':id',$id, PDO::PARAM_STR);
         $stmt->bindParam(':gid',$get, PDO::PARAM_STR);
        $stmt->bindParam(':nid',$nid, PDO::PARAM_STR);
        $stmt->bindParam(':cls',$cls, PDO::PARAM_STR);
        $stmt->bindParam(':dte',$date1, PDO::PARAM_STR);
         $stmt->bindParam(':fls',$file, PDO::PARAM_STR);
        $stmt->bindParam(':title',$title, PDO::PARAM_STR);
    $stmt->execute();
   
    $row=$stmt->rowCount();
   

 if($row>0)
     
 {
     
     header("location:notes.php?gp_id=$get");
 }

}
?>