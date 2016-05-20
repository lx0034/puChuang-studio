
<?php
	
	require_once "../config/db.config.php";
	require_once "../includes/db.class.php";
	require_once "../includes/db_function.class.php";



	 $db = new db_sql_functions();
	
	//拿到cookie里的tookenid
	 
	$tookenid=$_COOKIE['tookenid'];

	if(empty($tookenid)){

		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../admin_login.php\">";
		exit();
	}

	$rs_array 	 =    $db->select_tooken($tookenid);

	//如果存在tooken
	if(!empty($rs_array)){
		$tookenid  = $rs_array['tooken'];
		$db->delete_tookenid($tookenid);
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../admin_login.php\">";
		exit();

	}else{
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../admin_login.php\">";
		exit();
	}
	
?>