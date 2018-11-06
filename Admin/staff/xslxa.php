<?php
require_once '../connectivity/simplexlsx.class.php';
require '../connectivity/connection.php';
session_start();
 $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../log_in.php');
       }
  else
    {
$db=getDB();
try{
$cls=$_POST['sem'];
$sub=$_POST['sub'];
    
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
		$sql=$db->prepare("INSERT into `attendence`(`Teacher_id`, `Subject_id`, `dates`, `day`, `Roll_No`, `status`, `Class_code`) values(?,?,?,?,?,?,?)");
		$sql->bindParam('1',$temp,PDO::PARAM_STR);
		$sql->bindParam('2',$_POST['sub'],PDO::PARAM_STR);
        $sql->bindParam('3',date("y-m-d"),PDO::PARAM_STR);
		$sql->bindParam('4',$_POST['day'],PDO::PARAM_STR);
        $sql->bindParam('5',$arr[$j][0],PDO::PARAM_STR);
		$sql->bindParam('6',$arr[$j][1],PDO::PARAM_STR);
        $sql->bindParam('7',$_POST['sem'],PDO::PARAM_STR);
		$sql->execute();
		$row=$sql->rowcount();
		if($row>0)
		{
			header("location:viewattendence.php?attend=".$_POST['sub']);
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