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
 
$get=$_GET['id'];

$gpname=$_POST['grp'];
 $sem=$_POST['sem'];
$id=$get.rand(1,9999);
 $imgFile = $_FILES['img']['name'];
                    $tmp_dir = $_FILES['img']['tmp_name'];
                    $imgSize = $_FILES['img']['size'];
                    $userpic="";
 if(!empty($imgFile)){
                $upload_dir = '../upload_assets/img_group/'; // upload directory
               
   
                    move_uploaded_file($tmp_dir,$upload_dir.$imgFile);
                  
               
                 }
                 $db=getDB();
                 $stmt=$db->prepare("INSERT into `group` values(:id,:mid,:nme,:cls,:img)");
                  $stmt->bindParam(':id',$id, PDO::PARAM_STR);
                   $stmt->bindParam(':mid',$get, PDO::PARAM_STR);
                    $stmt->bindParam(':nme',$gpname, PDO::PARAM_STR);
                     $stmt->bindParam(':cls',$sem, PDO::PARAM_STR);
                      $stmt->bindParam(':img',$imgFile, PDO::PARAM_STR);
                      $stmt->execute();
                      $row=$stmt->rowcount();
                      if($row>0)
                      {
                          header("location:mygroup.php?gp_id=$id");
                      }
}
?>