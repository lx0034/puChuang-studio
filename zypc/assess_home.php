<?php

require_once "init.php";

if(!isset($_SESSION['username']) || $_SESSION['username']==false){
    $_SESSION['userurl'] = $_SERVER['REQUEST_URI'];
    echo "<meta http-equiv=\"Refresh\" content=\"0;url=login.php\">";
    exit();
}

$username = $_SESSION['username'];


$db = new db_sql_functions();

if($_POST){
    $last_sum = $_POST['last_sum'];
    $this_play = $_POST['this_play'];
    $detial_play = $_POST['detial_play'];

    $user = $db->check_username($username);
    if($user){
        $db->add_asseing($username,$last_sum,$this_play,$detial_play);
    }
}

$last = $db->get_last_play($username);

$smarty->assign('detial_play',$last['detial_play']);
$smarty->assign('admin_rate',$last['admin_rate']);
$smarty->assign('admin_rank',$last['admin_rank']);
$smarty->assign('timelong',$last['timelong']);

$smarty->display('assess_home.tpl');
?>
