<?php /* Smarty version 3.1.27, created on 2016-05-04 18:13:28
         compiled from "/usr/share/nginx/zypc/templates/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16568222485729cb48f0ac75_35485827%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3a4dfb88848913bf7341a10c8d48b4cdbd91594' => 
    array (
      0 => '/usr/share/nginx/zypc/templates/login.tpl',
      1 => 1462188680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16568222485729cb48f0ac75_35485827',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5729cb49004249_62254838',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5729cb49004249_62254838')) {
function content_5729cb49004249_62254838 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16568222485729cb48f0ac75_35485827';
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
					<h1><a href="http://www.smartxupt.com">智邮普创工作室</a></h1>
				</div>
				<div class="top-nav">
					<span class="menu"> <img src="static/images/icon.png" alt=""/></span>
				  <nav class="cl-effect-1">
					<ul class="res">
					   <li><a class="active" href="/">主页</a></li> 
                       <li><a href="http://blog.smartxupt.com/">群博</a></li> 
					   <li><a href="sign_home.php">签到</a></li> 
					   <li><a href="assess_home.php">绩效考核</a></li> 
                       <li><a href="https://github.com/ZypcGroup">Github</a></li> 
					   <li><a href="/">微博</a></li> 
				   </ul>
				  </nav>
					<!-- script-for-menu -->
						 <?php echo '<script'; ?>
>
						   $( "span.menu" ).click(function() {
							 $( "ul.res" ).slideToggle( 200, function() {
							 // Animation complete.
							  });
							 });
						<?php echo '</script'; ?>
>
		        <!-- /script-for-menu -->
				</div>
				 <div class="clearfix"> </div>
		 </div>
	  </div>
	 </div>
 </div>
<!--banner end here-->
<!--services start here-->
<div class="services">
	<div class="container">
		<div class="services-main">
			<div class="services-top">
				<h2></h2>
			</div>
			<div class="services-bottom">
				<div class="login-content">	
	<h2>用户登录</h2>
	
    <form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="post" id="login-form" name="login-form">
    <div class="login-info">
	<span class="user">&nbsp;</span>
	<input name="username" id="username" type="text"  value="" class="login-input"/>
	</div>
    <div class="login-info">
	<span class="pwd">&nbsp;</span>
	<input name="password" id="password" type="password"  value="" class="login-input"/>
	</div>
    <div class="login-oper">
	<input style="margin:1px 10px 0px 2px; float:left;" name="" type="checkbox" value="" checked="checked" /><span>记住密码</span>
	</div>
    <div class="login-oper">
	<input name="" type="submit" value="登 录" class="login-btn"/>
	<input name="" type="reset" value="重 置" class="login-reset"/>
	</div>
    </form>
    </div>

			</div>
		</div>
	</div>
</div>

<!--over-view end here-->
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