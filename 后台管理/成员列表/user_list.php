
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
								Array("username"=>"22222222","nickname"=>"test"  ),
								Array("username"=>"33333333","nickname"=>"test1" ),
								Array("username"=>"55555555","nickname"=>"test2"  ),
								Array("username"=>"66666666","nickname"=>"test3" ),
								Array("username"=>"77777777","nickname"=>"test4" ),
								Array("username"=>"88888888","nickname"=>"test7" )
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