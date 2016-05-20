<?php
	
	require_once "../config/db.config.php";
	require_once "../includes/db.class.php";
	require_once "../includes/db_function.class.php";


	if(!$_GET){
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=../admin_login.php\">";
		exit();
	}

	$username   = $_GET['usernum'];
	$admin_rate = $_GET['rate'];
	$admin_rank = $_GET['rank'];
	

	if($admin_rank<= 60 && $admin_rank>= 0 ){
		$admin_rank = 'D';
	}
	if($admin_rank<= 70 && $admin_rank>= 61 ){
		$admin_rank = 'C';
	}
	if($admin_rank<= 80 && $admin_rank>= 71 ){
		$admin_rank = 'D';
	}
	if($admin_rank<= 100 && $admin_rank>= 8 ){
		$admin_rank = 'D';
	}
	
	if($username== null  || $admin_rate == null  || $admin_rank == null ){
		echo "<script type='text/javascript'>alert('评价不能为空');</script>";
		echo "<script type='text/javascript'>history.back(-1);</script>";
		exit();
	}

	$db = new db_sql_functions();
    $timelong  =  $db->get_timelong_oneweek($username);
    $uid = $db->get_uid($username);
	
	$rs = $db->add_admin_asse($uid,$admin_rate,$admin_rank,$timelong);
	
	

?>
