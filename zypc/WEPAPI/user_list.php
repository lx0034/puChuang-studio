
<?php
	
	require_once "../config/db.config.php";
	require_once "../includes/db.class.php";
	require_once "../includes/db_function.class.php";


	 $db = new db_sql_functions();
	//检查时间是否过期，如果时间过期，删除之前的tooken重定向到登录页面；没有过期检查tooken是否一致
	$currentTime =  time();
	//拿到cookie里的tookenid
	$tookenid=$_COOKIE['tookenid'];
	//echo 'tookenid'.$tookenid.'<br>';
	//如果tookenid 为空，跳转至登录页面

	if(empty($tookenid)){
		echo '1';
		exit();
	}

	$rs_array 	 =    $db->select_tooken($tookenid);

	//如果存在tooken
	if(!empty($rs_array)){

		
		$tookenid  = $rs_array['tooken'];
		$loginTime = $rs_array['time'];

		//更当前时间做一个判断
		$remainTime = $currentTime - $loginTime;

	
		// echo $currentTime.'当前时间<br>';
		// echo $loginTime.'登时间录<br>';
		// echo $remainTime.'时间维持<br>';
		//大于20分钟
		if( $remainTime > 1200 ){
			$db->delete_tookenid($tookenid);
			echo '1';
			exit();
		}


	}else{
		echo '1';
		exit();
	}
	
	

	$usersArray = $db->get_all_user();

	$tempArray['data'] = $usersArray;

	$mergeJSON = json_encode($tempArray,JSON_UNESCAPED_UNICODE);

	echo($mergeJSON);

	/*
		{"data":
			[
				{"username":"04131097","nickname":"测试者","phone":"18822226666","email":"test@test.com"},
				{"username":"04131096","nickname":"郭遗欢","phone":"18829272629","email":"s0nnet@qq.com"},
				{"username":"02142059","nickname":"师凡凡","phone":"15091768393","email":"470241833@qq.com"},
				{"username":"04142119","nickname":"强薇","phone":"15667022368","email":"1045102738@qq.com"},
				{"username":"04131090","nickname":"齐玥","phone":"18829290952","email":"331538891@qq.com"},
				{"username":"05149063","nickname":"孙睿璇","phone":"13892059786","email":"13892059786@163.com"},
				{"username":"05138164","nickname":"李雄","phone":"18829291060","email":"lx0034@foxmial.com"},
				{"username":"06153079","nickname":"张士纪","phone":"18291996228","email":"kaph10p@outlook.com"},
				{"username":"05136135","nickname":"侯娇娇","phone":"18829290156","email":"1623143672@qq.com"},
				{"username":"05148219","nickname":"陈政","phone":"15829305659","email":"chenzheng17@yahoo.com"},
				{"username":"06142098","nickname":"王静","phone":"15829290774","email":"276547036@qq.com"}
			]
		}
	*/


?>