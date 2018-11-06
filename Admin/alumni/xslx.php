<?php
session_start();
require_once '../connectivity/simplexlsx.class.php';
require '../connectivity/connection.php';
  
   

  $temp=$_SESSION['uid'];
 if(!isset($temp))
      {
              header('location:../../log_in.php');
       }
  else
    {
$db=getDB();
try{
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
		$sql=$db->prepare("INSERT into `alumini` values(?,?,?,?,?,?,?)");
		$sql->bindParam('1',$arr[$j][0],PDO::PARAM_STR);
		$sql->bindParam('2',$arr[$j][1],PDO::PARAM_STR);
        $sql->bindParam('3',$arr[$j][2],PDO::PARAM_STR);
		$sql->bindParam('4',$arr[$j][3],PDO::PARAM_STR);
        $sql->bindParam('5',$arr[$j][4],PDO::PARAM_STR);
		$sql->bindParam('6',$arr[$j][5],PDO::PARAM_STR);
        $sql->bindParam('7',$arr[$j][6],PDO::PARAM_STR);
		$sql->execute();
		$row=$sql->rowcount();
		if($row>0)
		{
			header("location:alumini.php");
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