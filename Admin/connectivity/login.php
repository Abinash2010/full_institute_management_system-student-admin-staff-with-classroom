<?php
session_start();
include 'connection.php';
include_once 'module_login.php';
class admin{
	
	public function Admins()
	{
		try{
			
			$db=getDB();
			$datas[0]=$_POST['uname'];
			$datas[1]=$_POST['psw'];
			
		//	$pass=hash('sha256',$password);
			
			
        
			$loged_in=Login($datas,$db);
			
				
		}
	catch(Exception $e)
		{
				die("connection-failed".$e->getmessage());
		}
		
			

	}
    
}
$admin=new admin();
$admin->Admins();


?>