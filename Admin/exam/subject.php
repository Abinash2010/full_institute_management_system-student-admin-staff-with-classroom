
      <?php
    
include '../connectivity/connection.php';
$db=getDB();

$class=$_POST['class'];

$stmt1=$db->query("SELECT * FROM `subject` where `Class_code`='$class'");
   
    $stmt1->execute();
    $data1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
    $row1=$stmt1->rowCount();
$row=array();
   
     foreach($data1 as $row1)
     {
        $row[]=$row1;
     }
    

echo  json_encode($row);



?>