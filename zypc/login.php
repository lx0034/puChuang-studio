<?php 

require_once "init.php";

$_SESSION['username'] = $_SESSION['admin'] = NULL;

if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(!is_numeric($username)){
        echo "<script>alert('学号或密码错误！')</script>";
        echo "<meta http-equiv=\"Refresh\" content=\"0;url=login.php\">";
        exit();
    }
    
    $db = new db_sql_functions();
    $usernm = $db->check_user($username,$password);

    if($usernm){
        $_SESSION['username']=true;
        $_SESSION['admin']=false;
        $_SESSION['username']=$usernm;
        if(isset($_SESSION['userurl'])){
            $url = $_SESSION['userurl'];
        }else{
            $url = '/';
        }
        echo "<meta http-equiv=\"Refresh\" content=\"0;url=$url\">";
    }else{
        echo "<script>alert('学号或密码错误！')</script>";
        echo "<meta http-equiv=\"Refresh\" content=\"0;url=login.php\">";
    }
}

$smarty->display('login.tpl');
?>
