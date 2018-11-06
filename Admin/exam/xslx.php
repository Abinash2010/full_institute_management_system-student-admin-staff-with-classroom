<?php
  session_start();
    include '../connectivity/connection.php';
require_once '../connectivity/simplexlsx.class.php';

   

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
 $sub=$_POST['sub'];
 $type=$_GET['type'];
    
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
		$sql=$db->prepare("INSERT INTO `result`(`id`, `roll`, `Subject`, `marks`) VALUES (?,?,?,?)");
		$sql->bindParam('1',$type,PDO::PARAM_STR);
		$sql->bindParam('2',$arr[$j][0],PDO::PARAM_STR);
        $sql->bindParam('3',$sub,PDO::PARAM_STR);
		$sql->bindParam('4',$arr[$j][1],PDO::PARAM_STR);
        
		$sql->execute();
		$row=$sql->rowcount();
		if($row>0)
		{
			header("location:viewmarks.php?sub=$sub&type=$type");
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