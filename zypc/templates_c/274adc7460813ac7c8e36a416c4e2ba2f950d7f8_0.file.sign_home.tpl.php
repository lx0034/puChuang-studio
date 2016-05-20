<?php /* Smarty version 3.1.27, created on 2016-05-19 17:28:44
         compiled from "/usr/share/nginx/zypc/templates/sign_home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:722576602573d874c27bdb4_15604042%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '274adc7460813ac7c8e36a416c4e2ba2f950d7f8' => 
    array (
      0 => '/usr/share/nginx/zypc/templates/sign_home.tpl',
      1 => 1463650121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '722576602573d874c27bdb4_15604042',
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_573d874c2b5158_21222388',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_573d874c2b5158_21222388')) {
function content_573d874c2b5158_21222388 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '722576602573d874c27bdb4_15604042';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>智邮普创工作室-内部管理平台</title>
<link href="static/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo '<script'; ?>
 src="static/js/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
<!-- Custom Theme files -->
<link href="static/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="zypc,smartxupt" />
<?php echo '<script'; ?>
 type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } <?php echo '</script'; ?>
>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<?php echo '<script'; ?>
 type="text/javascript" src="static/js/move-top.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="static/js/easing.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	<?php echo '</script'; ?>
>
<!-- //end-smoth-scrolling -->
</head>
<body>
<!--banner start here-->
<div class="banner-two">
 	<div class="header">
		<div class="container">
			<div class="header-main">
				<div class="logo">
					<h2><a href="sign_home.php">内部签到平台</a></h2>
				</div>
				<div class="top-nav">
					<span class="menu"> 
						<img src="static/images/icon.png" alt=""/>
					</span>
					<nav class="cl-effect-1">
						<ul class="res"> 
	                        <li><a href="/">主页</a></li>
							<li><a href="sign_online.php">状态查询</a></li>
							<li><a href="html/user_summarize_line.html?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">在线时长</a></li> 
							<li><a class="active" href="sign_home.php">Agent安装</a></li>
							<li><a href="/">退出</a></li>
				  		</ul>
					</nav>
					<!-- script-for-menu -->
					<?php echo '<script'; ?>
>
						$( "span.menu" ).click(function() {
							$( "ul.res" ).slideToggle( 300, function() {
								// Animation complete.
							});
						});
					<?php echo '</script'; ?>
>
		       		<!-- /script-for-menu -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
 	</div>
 </div>
<!--banner end here-->

<!--content-->
<div class="container">
   <div class="contact">
	 <div class="contact-md">
			 <h3>Agent安装说明</h3>
		 </div>
				<div class="col-md-6 contact-top">
					<h4>相关下载</h4>
                    <div><p>Windows: <a href="static/agent.exe">agent.exe</a></p></div>
		    <div><p>测试Agent: <a href="static/agent_test.exe">agent_test.exe</a></p></div>
                    <div><p>Linux: <a href="static/agent.py">agent.py</a></p></div>
                    <div><p>如果存在系统版本不兼容，请自行使用PyInstaller编译.py=> .exe
					     <br>相关教程请参考：http://blog.csdn.net/daniel_ustc/article/details/15501385</p>
					</div>
				</div>
				<div class="col-md-6 contact-top">
					<h4>安装使用教程</h4>
					
					<div>					
						<p>下载对应系统的Agent：</p>
						<p>Windows下在开机启动项中，添加对应的agent位置即可:<br>HKEY_LOCAL_MACHINE\Software\Microsoft\Windows\CurrentVersion\Run</p>					
						<p>Linux下将agnet.py文件的位置，添加到/etc/rc.local文件中即可。</p>
					</div>
                    <div>
                        <p>Agent注册：</p>
                        <p>到主页的“管理后台”登录，账号：admin/zypc@2016 <br>在SGIN模块的User中注册添加个人信息，参考我填的样例</p>
                        <p>注意MAC地址的填写格式！！！</p>
                    </div>
				</div>
			<div class="clearfix"> </div>
	</div>
</div>
<!--contact end here-->
<!--footer start here-->
<div class="footer">
	<div class="container">

		<div class="copyright">
			   <p>© 2016 智邮普创工作室 All rights reserved | Design by  <a href="http://www.s0nnet.com/" target="_blank">  s0nnet</a></p>
		</div>

	</div>
</div>
<!--footer end here-->
</body>
</html>

<?php }
}
?>