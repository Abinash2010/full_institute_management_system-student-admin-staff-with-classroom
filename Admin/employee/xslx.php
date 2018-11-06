<?php
require_once '../connectivity/simplexlsx.class.php';
require '../connectivity/connection.php';
 session_start();
   
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../log_in.php');
       }
  else
    {
$db=getDB();
try{
  echo  $role=$_GET['add'];
$arr=array();
$f=$_FILES['file']['tmp_name'];
if ( $xlsx = SimpleXLSX::parse($f)) {
	echo '<table cellpadding="10">
	<tr><td valign="top">';
	// output worsheet 1
	list( $num_cols, $num_rows ) = $xlsx->dimension();
	echo '<h1>Sheet 1</h1>';
	echo '<table>';
    $excel=$xlsx->rows();
    
for ( $j = 1; $j < $num_rows; $j ++ ) {
		for ( $i = 0; $i < $num_cols; $i ++ ) {
			echo '<td>' . ( ( ! empty( $excel[$j][ $i ] ) ) ? $excel[$j][ $i ] : '&nbsp;' ) . '</td>';
			$arr[$j][$i]=$excel[$j][ $i ];
			
        }
		                  
    $staff_id='CSE'.rand(0000,10000);
    $img=" ";
    $password=rand(000000,1000000);
    $time=date("y-m-d h:m:s");
                    $stmt =$db->prepare("INSERT INTO `staff` VALUES(:id,:fname,:mname,:lname,:post,:email,:num,:addres,:jdate, :upic,:rol)");
                    $stmt->bindParam(':id',$staff_id, PDO::PARAM_STR);
                    $stmt->bindParam(':rol',$role, PDO::PARAM_STR);
                    $stmt->bindParam(':fname',$arr[$j][0], PDO::PARAM_STR);
                    $stmt->bindParam(':mname',$arr[$j][1], PDO::PARAM_STR);
                    $stmt->bindParam(':lname',$arr[$j][2], PDO::PARAM_STR);
                     $stmt->bindParam(':email',$arr[$j][3], PDO::PARAM_STR);
                    $stmt->bindParam(':num',$arr[$j][4], PDO::PARAM_STR);
                    $stmt->bindParam(':post',$arr[$j][5], PDO::PARAM_STR);
                     $stmt->bindParam(':addres',$arr[$j][6], PDO::PARAM_STR);
                    $stmt->bindParam(':jdate',$arr[$j][7], PDO::PARAM_STR);
                    $stmt->bindParam(':upic',$img, PDO::PARAM_STR);
                    $stmt->execute();
                    $rows = $stmt->rowCount();
              

                         $sql =$db->prepare("INSERT INTO `staff_login` VALUE(?,?,?,?)");

                $sql->bindValue(1, $staff_id);
                $sql->bindValue(2, $arr[$j][3]);
                $sql->bindValue(3, $password);
                $sql->bindValue(4, $time);                      

                $sql->execute();
                $row=$sql->rowCount();

    if($row>0)
    {
      
      header("location:listemployee.php?id=$role");
   
    }
		echo '</tr>';
	}
	echo '</table>';
	
} else {
	echo SimpleXLSX::parse_error();
}
}
catch(Exception $e)
{
    echo $e->getmessage();
}
  
}
?>