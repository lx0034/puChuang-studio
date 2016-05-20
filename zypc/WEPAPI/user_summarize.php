<?php
	
	require_once "../config/db.config.php";
	require_once "../includes/db.class.php";
	require_once "../includes/db_function.class.php";
	

	// if(!$_GET){
	// 	echo "<meta http-equiv=\"Refresh\" content=\"0;url=../admin_login.php\">";
	// 	exit();
	// }
	$username = $_GET['username'];

	$db       = new db_sql_functions();

    $oneweekTimeCircleArray = $db->get_oneweek_time_circle($username); 

	$oneweekTimeLineArray  =  $db->get_oneweek_time_line();

	$mergeArray = Array();
	
	array_push($mergeArray, $oneweekTimeCircleArray,$oneweekTimeLineArray);

	$tempArray['data'] = $mergeArray;
	$mergeJSON = json_encode($tempArray,JSON_UNESCAPED_UNICODE);

	echo($mergeJSON);

	/*
		{"data":
			[
				[
					{"nickname":"测试者","time":0},
					{"nickname":"郭遗欢","time":10.64},
					{"nickname":"师凡凡","time":0},
					{"nickname":"强薇","time":5.38},
					{"nickname":"齐玥","time":5.68},
					{"nickname":"孙睿璇","time":0},
					{"nickname":"李雄","time":0.35},
					{"nickname":"张士纪","time":0},
					{"nickname":"侯娇娇","time":0},
					{"nickname":"陈政","time":0},
					{"nickname":"王静","time":0}
				],
				[
					[
						{"nickname":"强薇","date":"05-15","sum_long":5.38}
					],
					[],
					[
						{"nickname":"李雄","date":"05-15","sum_long":0.35}
					],
					[
					],
					[
						{"nickname":"郭遗欢","date":"05-15","sum_long":8.43},
						{"nickname":"郭遗欢","date":"05-16","sum_long":2.22}
					],
					[
					],
					[
					],
					[],
					[
						{"nickname":"齐玥","date":"05-15","sum_long":5.68}
					]
				]
			]
		}

		*/


	


?>