
<?php
	// require('init.php');

	// $db = new db_sql_functions();

	// $alreadyjudgeArray = $db->get_already_judge();

	// $notjudgeArray = $db->get_not_judge();

	// $mergeArray = Array();
	
	// array_push($mergeArray, $alreadyjudgeArray, $notjudgeArray);

	// $mergeJSON = json_encode($mergeArray);

	// echo($mergeJSON);




	$alreadyjudgeArray  = Array(
								Array("username"=>"05131111","nickname"=>"姓名","email"=>"888888888@qq.com","phone"=>"18888888888" ),
								Array("username"=>"05131112","nickname"=>"test2","email"=>"888888888@qq.com","phone"=>"18888888888" ),
								Array("username"=>"05131113","nickname"=>"test3","email"=>"888888888@qq.com","phone"=>"18888888888" ),
								Array("username"=>"05131114","nickname"=>"test4","email"=>"888888888@qq.com","phone"=>"18888888888" ),
								Array("username"=>"05131115","nickname"=>"test5","email"=>"888888888@qq.com","phone"=>"18888888888" ),
								Array("username"=>"05131116","nickname"=>"test","email"=>"888888888@qq.com","phone"=>"18888888888" ),
								Array("username"=>"05131117","nickname"=>"test","email"=>"888888888@qq.com","phone"=>"18888888888" ),
								Array("username"=>"05131118","nickname"=>"test","email"=>"888888888@qq.com","phone"=>"18888888888" )
							);

	$notjudgeArray    = Array(
								Array("username"=>"11312421","nickname"=>"test8"),
								Array("username"=>"23232323","nickname"=>"test9"),
								Array("username"=>"34344344","nickname"=>"test0"),
							);


	$mergeArray = Array();
	
	array_push($mergeArray, $alreadyjudgeArray,$notjudgeArray);
	$finallyArray['data'] = $mergeArray;
	$mergeJSON = json_encode($finallyArray);

	echo $mergeJSON;

	/*

		[
			[
				{"username":"22222222","nickname":"test"},
				{"username":"33333333","nickname":"test1"}
			],

			[
				{"username":"44444444","nickname":"test2"},
				{"username":"55555555","nickname":"test3"}
			]

		]

	*/


?>