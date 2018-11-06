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
    $cls=$_POST['sem'];
    
    $sql1=$db->prepare("SELECT `Class_code` from `class` where Class_Name=:cls");
    $sql1->bindParam(':cls',$cls,PDO::PARAM_STR);
    $sql1->execute();
    $res=$sql1->fetch(PDO::FETCH_OBJ);
$arr=array();
$f=$_FILES['file']['tmp_name'];
if ( $xlsx = SimpleXLSX::parse($f)) {
	echo '<table cellpadding="10">
	<tr><td valign="top">';
	// output worsheet 1
	list( $num_cols, $num_rows ) = $xlsx->dimension();
	
    $excel=$xlsx->rows();
    
for ( $j = 1; $j < $num_rows; $j ++ ) {
		for ( $i = 0; $i < $num_cols; $i ++ ) {
		
			$arr[$j][$i]=$excel[$j][ $i ];
			
        }
		                  
   
    $date=date("y-m-d h:m:s");
    $password=rand(000000,1000000);
   
                   
   
               
         $query="INSERT into`student` values(:roll,:fname,:mname,
                    :lname,:cls,:dob,
                    :email,:addres,:num,:adate)";      
                    $stmt1 =$db->prepare($query);
                 
                 
                     $stmt1->bindParam(':roll',$arr[$j][0], PDO::PARAM_STR);
                    $stmt1->bindParam(':fname',$arr[$j][1], PDO::PARAM_STR);
                    $stmt1->bindParam(':mname',$arr[$j][2], PDO::PARAM_STR);
                    $stmt1->bindParam(':lname',$arr[$j][3], PDO::PARAM_STR);
                    $stmt1->bindParam(':cls',$res->Class_code, PDO::PARAM_STR);
                    $stmt1->bindParam(':dob',$arr[$j][5], PDO::PARAM_STR);
                     $stmt1->bindParam(':email',$arr[$j][6], PDO::PARAM_STR);
                    $stmt1->bindParam(':num',$arr[$j][7], PDO::PARAM_STR);
                  
                     $stmt1->bindParam(':addres',$arr[$j][8], PDO::PARAM_STR);
                    $stmt1->bindParam(':adate',$arr[$j][9], PDO::PARAM_STR);
                    
                    $stmt1->execute();
                    $row = $stmt1->rowCount();
             
                      $stmt2 =$db->prepare("INSERT INTO `student_login` VALUES(:Std,:Email, :Pass, :Last)  ");
                 
                    
                    $stmt2->bindParam(':Std',$arr[$j][0], PDO::PARAM_STR);
                    $stmt2->bindParam(':Email',$arr[$j][6], PDO::PARAM_STR);
                    $stmt2->bindParam(':Pass',$password, PDO::PARAM_STR);
                    $stmt2->bindParam(':Last',$date, PDO::PARAM_STR);
                   $stmt2->execute();
                    $rows=$stmt2->rowCount();
    if($rows>0)
    {
        header("location:student.php?sem=$cls");
    }
		
	}
	
	
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