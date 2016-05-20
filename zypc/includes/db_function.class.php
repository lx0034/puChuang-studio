<?php

class db_sql_functions
{
    private $dbconn;

    function __construct()
    {
        $this->dbconn = new \db();
        return $this;
    }

    /*
    * 检查username合法性
    * 参数：username
    * 返回值：username / false
    */
    public function check_username($username)
    {
        if(is_numeric($username)){
            $sql = "SELECT username FROM users WHERE username=?";
            $stmt = $this->dbconn->get_mysqli()->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param('s',$username);
            $stmt->execute();
            $stmt->bind_result($user);
            
            $result = $stmt->fetch();
            if($result){
                return $user;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    /*
    * 检查user合法性
    * 参数：username,password
    * 返回值：username / false
    */
    public function check_user($username,$password)
    {
        if(is_numeric($username)){
            $sql = "SELECT username FROM users WHERE username=? AND password=?";
            $stmt = $this->dbconn->get_mysqli()->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param('ss',$username,$password);
            $stmt->execute();
            $stmt->bind_result($usernm);

            $result = $stmt->fetch();
            if($result){
                return $usernm;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    /*
    * 添加周小结
    * 参数：username,last_sum,this_play,detial_play
    * 返回值：true / false
    */
    public function add_asseing($username,$last_sum,$this_play,$detial_play)
    {
        $pubdate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO asseing(username,pubdate,last_sum,this_play,detial_play) VALUES(?,?,?,?,?)";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('sssss',$username,$pubdate,$last_sum,$this_play,$detial_play);
        $result = $stmt->execute();
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    /*
    * 获取上周小结
    * 参数：username
    * 返回值：array(result) / false
    */
    public function get_last_play($username)
    {
        $sql = "SELECT detial_play,admin_rate,admin_rank,timelong FROM asseing WHERE username=? ORDER BY uid DESC LIMIT 1";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->bind_result($detial_play,$admin_rate,$admin_rank,$timelong);

        $result = $stmt->fetch();
        if($result){
            $result = array(
                'detial_play'=>$detial_play,
                'admin_rate'=>$admin_rate,
                'admin_rank'=>$admin_rank,
                'timelong'=>$timelong);

            return $result;
        }else{
            return false;
        }
    }
    
    /*
    * 添加组长评价
    * 参数：uid,rate,rank,timelong
    * 返回值：true / false
    */
    public function add_admin_asse($uid,$rate,$rank,$timelong)
    {

        $sql = "UPDATE asseing SET admin_rate=?,admin_rank=?,timelong=?,admin_flag=1 WHERE uid=? ";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('sssi',$rate,$rank,$timelong,$uid);
        $result = $stmt->execute();

        if($result){
            return true;
        }else{
            return false;
        }
    }

    /*
    * 检查agentid合法性
    * 参数：agentid
    * 返回值：agent_id / false
    */
    public function check_agentid($agentid)
    {
        if(preg_match('/\w{12}/',$agentid)){
            $sql = "SELECT username FROM users WHERE mac_addr1=? OR mac_addr2=?";
            $stmt = $this->dbconn->get_mysqli()->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param('ss',$agentid,$agentid);
            $stmt->execute();
            $stmt->bind_result($username);
                
            $result = $stmt->fetch();
            if($result){
                return $username;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*
    * 检查近期用户在线数
    * 参数：alive
    * 返回值：array(username) / false
    */
    public function check_online_users($timelive)
    {
        $ntime = time();
        $ltime = $ntime - $timelive;

        $sql = "SELECT username FROM signing WHERE etime>=?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('i',$ltime);
        $stmt->execute();
        $stmt->bind_result($usernm);

        $result = array();
        while($row = $stmt->fetch()){
            if ($row){
                array_push($result,$usernm);
            }
        }

        return $result;
    }

    /*
    * 检查心跳存活状态
    * 参数：username,alive
    * 返回值：array(uid,stime) / false
    */
    public function check_heartbeat($username,$alive)
    {
        $sql = "SELECT uid,stime FROM signing WHERE username=? AND etime>=?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('si',$username,$alive);
        $stmt->execute();
        $stmt->bind_result($uid,$stime);

        $result = $stmt->fetch();
        if ($result){
            $result = array('uid'=>$uid,'stime'=>$stime);
            return $result;
        }else{
            return false;
        }
    }

    /*
    * 更新签到记录
    * 参数：uid
    * 返回值: true / false
    */
    public function update_heartbeat($uid,$stime)
    {
        $ntime = time();
        $long = $ntime - $stime;

        $sql = "UPDATE signing SET  etime=? ,longs=? WHERE uid=?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $rs = $stmt->prepare($sql);
        $stmt->bind_param('iii',$ntime,$long,$uid);
        $result = $stmt->execute();

        if ($result)
            return true;
        else
            return false;
    }

    /*
    * 添加签到记录
    * 参数： username
    * 返回值：true / false
    */
    public function add_heartheat($username)
    {
        $ntime = time();
        $ndate = date('m-d');
        $long = 0;

        $sql = "INSERT INTO signing (username,stime,etime,dates,longs) VALUES (?,?,?,?,?)";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $rs = $stmt->prepare($sql);
        $stmt->bind_param('siisi',$username,$ntime,$ntime,$ndate,$long);
        $result = $stmt->execute();

        if ($result)
            return true;
        else
            return false;
    }
		
    public function get_user_history_plans($username)
    {
        $sql = "SELECT username,last_sum,pubdate,this_play,detial_play,admin_rate,admin_rank,timelong,admin_flag FROM asseing WHERE username=? ORDER BY pubdate DESC";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->bind_result($username,$last_sum,$this_pubdate,$this_play,$detial_play,$admin_rate,$admin_rank,$timelong,$admin_flag);
	
	$result=array();
        while($row = $stmt->fetch()){
            if ($row){
                array_push($result,array(
			'username'=>$username,
			'last_sum'=>$last_sum,
            'pubdate'=>$this_pubdate,
			'this_play'=>$this_play,
			'detial_play'=>$detial_play,
			'admin_rate'=>$admin_rate,
			'admin_rank'=>$admin_rank,
			'timelong'=>$timelong,
			'admin_flag'=>$admin_flag));
            }
        }

        return $result;
     }
	
    public function get_already_judge()
    {
        $sql = "SELECT asseing.username,users.nickname,users.email,users.phone FROM asseing,users WHERE asseing.username=users.username AND admin_flag<>0";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($username,$nickname,$email,$phone);
	
	$result=array();
        while($row = $stmt->fetch()){
            if ($row){
                array_push($result,array(
			'username'=>$username,
			'nickname'=>$nickname,
			'email'=>$email,
			'phone'=>$phone));
            }
        }

        return $result;	
    }

	
    public function get_not_judge()
    {
        $sql = "SELECT asseing.username,users.nickname,users.email,users.phone FROM asseing,users WHERE asseing.username=users.username AND asseing.admin_flag=0";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($username,$nickname,$email,$phone);
	
	$result=array();
        while($row = $stmt->fetch()){
            if ($row){
                array_push($result,array(
			'username'=>$username,
			'nickname'=>$nickname,
			'email'=>$email,
			'phone'=>$phone));
            }
        }

        return $result;
	}
	
    
    public function get_timelong_oneweek($username)
    {
           
    $now=time();
    $l=strtotime("last Sunday");
        $sql = "SELECT signing.stime,signing.etime,signing.dates,signing.longs,users.nickname FROM signing,users WHERE signing.username=users.username AND signing.username=? AND signing.stime>$l";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->bind_result($stime,$etime,$dates,$longs,$nickname);
    
        $result=array();
        while($row = $stmt->fetch()){
            if ($row){
                array_push($result,array(
                        'stime'=>$stime,
                        'etime'=>$etime,
                        'dates'=>$dates,
                        'long'=>$longs));
            }
        }
        $sum=0;
        foreach($result as $value)
        {
        

            foreach($value as $key=>$value)
            {
                if($key=='long')
                    $sum+=$value;
            }
        }
    
         $sum=$sum/3600;
         $sum=round($sum,2);

        return $sum;
    }
    
    public function get_timelong_oneweek_circle($username)
    {
        $now=time();
        $l=strtotime("last Sunday");
        $sql = "SELECT signing.stime,signing.etime,signing.dates,signing.longs,users.nickname FROM signing,users WHERE signing.username=users.username AND signing.username=? AND signing.stime>$l";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->bind_result($stime,$etime,$dates,$longs,$nickname);
    
        $result=array();
        while($row = $stmt->fetch()){
            if ($row){
                array_push($result,array(
            'stime'=>$stime,
            'etime'=>$etime,
            'dates'=>$dates,
            'long'=>$longs));
            }
        }
        $sum=0;
        foreach($result as $value)
        {
            foreach($value as $key=>$value)
            {
                if($key=='long')
                    $sum+=$value;
            }
        }
        
        $sum=$sum/3600;
        $sum=round($sum,2);
        $arr=array(
            'nickname'=>$nickname,
            'time'=>$sum);

        return $arr;

    
    }
    
    public function get_oneweek_time_circle()
    {
        $sql = "SELECT username,nickname FROM users ";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($usernm,$nickname);
        $re=array();
        $result=array();
        while($row = $stmt->fetch()){
            if ($row){
                array_push($result,array('username'=>$usernm,
                    'nickname'=>$nickname));
            }
         }

        foreach($result as $value)
        {   
            $long=$this->get_timelong_oneweek_circle($value['username']);
            if($long['nickname']==NULL)   $long['nickname']=$value['nickname'];
            array_push($re,$long);
        }
        return $re;
    }
        
    public function get_timelong_oneweek_line($username)
    {
        $now=time();
        $l=strtotime("last Sunday");
        $sql = "SELECT sum(signing.longs) AS sum_long,signing.dates,users.nickname FROM signing,users WHERE signing.stime>$l AND signing.username=users.username AND signing.username=? GROUP BY signing.dates";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->bind_result($sum_long,$dates,$nickname);
        
        $result=array();
        while($row = $stmt->fetch()){
                if ($row){
                    $sum_long=$sum_long/3600;       
                    $sum_long=round($sum_long,2);
                     array_push($result,array(
                                'nickname'=>$nickname,
                                'date'=>$dates,
                                'sum_long'=>$sum_long));
                }
        }
        return $result;
    }
    public function get_oneweek_time_line()
    {
        $sql = "SELECT DISTINCT username FROM signing ";

        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($usernm);

        $re=array();
        $result=array();
            while($row = $stmt->fetch()){
                if ($row){
                    array_push($result,$usernm);
                }
        }

        foreach($result as $value)
        {   
            $long=$this->get_timelong_oneweek_line($value);
            array_push($re,$long);
        }
        
        return $re;
    }


    public function get_all_user(){
        $sql = "SELECT username,nickname,phone,email FROM users";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($rs_username,$rs_nickname,$rs_phone,$rs_email);
        $userArray = array();
        while($row = $stmt->fetch()){
            if($row){
                array_push($userArray,array(
                    'username'=>$rs_username,
                    'nickname'=>$rs_nickname,
                    'phone'=>$rs_phone,
                    'email'=>$rs_email));
            }

        }
        return $userArray;

    } 
	public function get_uid($username)
    {
        $sql="SELECT uid FROM asseing WHERE username=? ORDER BY uid DESC LIMIT 1";

        $stmt=$this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->bind_result($uid);
        $stmt->fetch();
        if($stmt->fetch()){
            return $uid;
        }else{
            return fasle;
        }
        

    }


   public function insert_tooken($value,$time){

        $sql = "INSERT INTO validate(tooken,time) VALUES(?,?)";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('si',$value,$time);
        $result = $stmt->execute();
        echo $this->dbconn->get_mysqli()->error.'<br>';
        echo 'rs'.$result;
        if($result){
            return true;
        }else{
            return false;
        }
   }

    public function delete_tookenid($tookenid){
        $sql = "DELETE FROM validate WHERE tooken = ? ";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$tookenid);
        $result = $stmt->execute();
        
        if($result){
            return true;
        }else{
            return false;
        }
   }

   public function select_tooken($tookenid){
        $sql = "SELECT tooken,time FROM validate WHERE tooken = ?";
        $stmt = $this->dbconn->get_mysqli()->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param('s',$tookenid);
        $stmt->execute();
        $stmt->bind_result($rs_tooken,$rs_time);
        $result = $stmt->fetch();
        if($result){
          $arr = array(
                'tooken'=>$rs_tooken,
                'time'=>$rs_time);
            return $arr;
        }else{
            return false;
        }
   }


}
