<?php
	
	require('init.php');

	$username   = $_GET['username'];
	$admin_rate = $_GET['admin_rate'];
	$admin_rank = $_GET['admin_rank'];
	if($username== null  || $admin_rate == null  || $admin_rank == null ){
		echo "<script type='text/javascript'>alert('评价不能为空');</script>";
		echo "<script type='text/javascript'>history.back(-1);</script>";
		exit();
	}

	$db = new db_sql_functions();

    $timelong   =  $db->get_timelong_oneweek($username);
	
	$db->update_user_asseing($username,$admin_rate,$admin_rank,$timelong);




?>
