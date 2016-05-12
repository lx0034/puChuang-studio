<?php
	// require('init.php');
	// $db = new db_sql_functions();
	// $username = $_POST['username'];
	// $historyArray = $db->get_user_history_plans($username);
	// $hostoryJSON = json_encode($historyArray,JSON_UNESCAPED_UNICODE);
	// ehco $hostoryJSON;


	$Task = Array("1"=>"task1","2"=>"task2","3"=>"task3");

	$historyTestArray =Array(

						Array("username"=>"11111111","nickname"=>"test" , "pubdate"=>"2016-5-1","last_sum"=>'Task' , "admin_rate"=>"很好"          ,   "admin_rank"=>"A"   ,   "timelong"=>38 ,"admin_flag"=>"0"),
						Array("username"=>"11111111","nickname"=>"test",  "pubdate"=>"2016-5-10","last_sum"=>'Task' , "admin_rate"=>"没有认真完成"  ,   "admin_rank"=>"B"  ,   "timelong"=>20 ,"admin_flag"=>"0"),
						Array("username"=>"11111111","nickname"=>"test" , "pubdate"=>"2016-5-16","last_sum"=>'Task' , "admin_rate"=>"认真完成"  ,   "admin_rank"=>"A"  ,   "timelong"=>20,"admin_flag"=>"1" ),
						Array("username"=>"11111111","nickname"=>"test" , "pubdate"=>"2016-6-1","last_sum"=>'Task' , "admin_rate"=>"很好"          ,   "admin_rank"=>"B"   ,   "timelong"=>3 ,"admin_flag"=>"0"),
						Array("username"=>"11111111","nickname"=>"test",  "pubdate"=>"2016-6-7","last_sum"=>'Task'  , "admin_rate"=>"认真完成"  ,   "admin_rank"=>"D"  ,   "timelong"=>4 ,"admin_flag"=>"1"),
						Array("username"=>"11111111","nickname"=>"test" , "pubdate"=>"2016-6-12","last_sum"=>'Task' , "admin_rate"=>"很好"          ,   "admin_rank"=>"E"   ,   "timelong"=>21 ,"admin_flag"=>"1"),
						Array("username"=>"11111111","nickname"=>"test",  "pubdate"=>"2016-6-20","last_sum"=>'Task' , "admin_rate"=>"没有认真完成"  ,   "admin_rank"=>"C"  ,   "timelong"=>20 ,"admin_flag"=>"0")

				);
	 

    $finallyArray['data'] = $historyTestArray;
    	      
	$historyTestJSON = json_encode($finallyArray);

	echo $historyTestJSON;

	/*
		[
			{
			"username":"11111111",
			"nickname":"test",
			"pubdate":"2016-5-1",
			"last_sum":"学习Ajax",
			"admin_rate":"很好",
			"admin_rank":"A",
			"timelong":38
			},

			{
			"username":"11111111",
			"nickname":"test",
			"pubdate":"2016-5-10",
			"last_sum":"学习PHP",
			"admin_rate":"没有认真完成",
			"admin_rank":"B",
			"timelong":20
			},

			{"username":"11111111",
			"nickname":"test",
			"pubdate":"2016-5-16",
			"last_sum":"学习C++",
			"admin_rate":"认真完成",
			"admin_rank":"A",
			"timelong":20
			},

			{"username":"11111111","nickname":"test","pubdate":"2016-6-1","last_sum":"学习Java","admin_rate":"很好","admin_rank":"B","timelong":3},
			{"username":"11111111","nickname":"test","pubdate":"2016-6-7","last_sum":"学习JS","admin_rate":"认真完成","admin_rank":"D","timelong":4},
			{"username":"11111111","nickname":"test","pubdate":"2016-6-12","last_sum":"学习Jquery","admin_rate":"很好","admin_rank":"E","timelong":21},
			{"username":"11111111","nickname":"test","pubdate":"2016-6-20","last_sum":"学习HTML","admin_rate":"没有认真完成","admin_rank":"C","timelong":20
			}
		]


	*/


?>