<?php

	require_once "init.php";

	if($_POST){
		 $username = $_POST['aname'];
	     $password = $_POST['apassword'];
	     
	     if($username != 'zypc@2015' && $password != 'adminzypc@2015'){
	     	echo "<script>alert('管理员用户名或密码错误！')</script>";
	        echo "<meta http-equiv=\"Refresh\" content=\"0;url=admin_login.php\">";
	        exit();
	     }

	     $name = "tookenid";
	     $value = time().mt_rand();
	     setcookie($name,$value,time()+1200);
	      $db = new db_sql_functions();
	     $db->insert_tooken($value,time());
	   
	  	echo "<meta http-equiv=\"Refresh\" content=\"0;url=html/user_list.html\">";

	    
	     
	}

	$smarty->display('admin_login.tpl');
?>
