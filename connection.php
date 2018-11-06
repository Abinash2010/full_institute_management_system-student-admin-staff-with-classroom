<?php

function getDB()
{
		try{
				$db=new PDO('mysql:host=localhost;dbname=cse;charset=utf8','root','');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db;
		}
		catch(Exception $e)
		{
			die("connection-failed".$e->getmessage());
		}
}
?>