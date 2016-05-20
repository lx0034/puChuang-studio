<!DOCTYPE HTML>
<html>
<head>
<title>智邮普创工作室-内部管理平台</title>
<link href="static/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="static/js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="static/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="zypc,smartxupt" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="static/js/move-top.js"></script>
<script type="text/javascript" src="static/js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
</head>
<body>
<!--banner start here-->
<div class="banner-two">
  <div class="header">
	<div class="container">
		 <div class="header-main">
				<div class="logo">
					<h2><a href="assess_home.php">绩效考核平台</a></h2>
				</div>
				<div class="top-nav">
					<span class="menu"> <img src="static/images/icon.png" alt=""/></span>
				 <nav class="cl-effect-1">
					<ul class="res"> 
                        <li><a href="/">主页</a></li>
						<li><a class="active" href="assess_home.php">写计划</a></li> 
						<li><a href="#">历史计划</a></li>
						<li><a href="/">退出</a></li>
				   </ul>
				 </nav>
					<!-- script-for-menu -->
						 <script>
						   $( "span.menu" ).click(function() {
							 $( "ul.res" ).slideToggle( 300, function() {
							 // Animation complete.
							  });
							 });
						</script>
		        <!-- /script-for-menu -->
				</div>
			 <div class="clearfix"> </div>
		 </div>
	  </div>
	 </div>
 </div>
<!--banner end here-->
<!--content-->
<div class="container">
   <div class="contact">
	 <div class="contact-md">
			 <h3>制定本周计划</h3>
             <p>时间: {{$smarty.now|date_format:'%m-%d %H:%M'}}</p>
		 </div>
				<div class="col-md-6 contact-top">
					<h4>详细计划安排</h4>
                    <form action="{{$smarty.server.REQUEST_URI}}" method="POST">
                        <div>
							<span>上周小结：</span>
							<input type="text" name="last_sum" placeholder="">					
						</div>
						<div>
							<span>本周计划概述：</span>		
							<input type="text" name="this_play" placeholder="">
						</div>
						<div>
							<span>本周具体安排：</span>		
							<textarea name="detial_play" placeholder="注意分点详细描述..." required=""></textarea>		
						</div>
						<input type="submit" value="Submit">	
				  </form>
				</div>
				<div class="col-md-6 contact-top">
					<h4>上周计划概述</h4>
					
					<div>					
						<p>上周计划：</p>
						<p>{{$detial_play}}</p>
					</div>
					<div>					
						<p>组长评价：</p>
						<p>{{$admin_rate}}</p>
					</div>
					<div>					
						<p>标准评级： {{$admin_rank}}</p>
					</div>
					<div>					
						<p>学习总时长（考勤）： {{$timelong}}小时</p>
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
