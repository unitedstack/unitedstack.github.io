<?php
/*
 Template Name: Comapny page
*/
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="short icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/png" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="http://www.unitedstack.com/wp-content/themes/ustacktwo/Company/css/company.css" />
<link rel="prerender"    href="http://www.unitedstack.com/news/">
<link rel="prerender"    href="http://www.unitedstack.com/blog/">
<link rel="prerender"    href="http://www.unitedstack.com/company/">
<link rel="prerender"    href="http://www.unitedstack.com/subscribe/">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/ustack.js" type="text/javascript"></script>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ie8.css" type="style/css" media="all"/>
<![endif]-->

<!--[if IE 8]>

<style>
.menu-main-menu-container #menu-main-menu { text-align: right;}
.menu-main-menu-container #menu-main-menu li { display: inline-block; margin-left: 15px; margin-bottom: 10px;}


#content{ width: 65%; float: left;}
#secondary { float: right; width: 27%;}
.widget-area{margin:24px 0 0;margin:1.714285714rem 0 0;}

.widget-area { margin-bottom:48px;margin-bottom:3.428571429rem;word-wrap:break-word;}
.widget-area h3{margin-bottom:24px;margin-bottom:1.714285714rem;}
.widget-area p,.widget-area li,.widget-area .textwidget{font-size:13px;font-size:0.928571429rem;line-height:1.846153846;}
.widget-area p{margin-bottom:24px;margin-bottom:1.714285714rem;}
.widget-area .textwidget ul{list-style:disc outside;margin:0 0 24px;margin:0 0 1.714285714rem;}
.widget-area .textwidget li{margin-left:36px;margin-left:2.571428571rem;}
.widget-area a{color:#757575;}
.widget-area a:hover{/*color:#21759b;*/
color:#12BBD5;}
.widget-area .widget-title { margin-top: 10px;}
.widget-area #s{
    width:62.66666666666%;
}
.widget-area #searchform { padding-bottom: 30px;}
.article-body { width: 650px;}


.ustack-header{
position: fixed;
width: 100%;
z-index: 999;
background: #fff url(http://www.unitedstack.com/wp-content/themes/ustacktwo/images/backgroundPatternElegantica.png) repeat 0 0;
border-bottom:5px solid #12BBD5;
}

#lang_sel_footer .lang_sel_sel{ padding:0; margin:0;}
#lang_sel_footer ul li a, #lang_sel_footer ul li a:visited {
text-decoration: none;
  padding: 2px;
}
.container #masthead .site-header .main-navigation { border: 1px solid red;} 

</style>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- <div class="hr-h"></div> -->
<div class="ustack-header">
	<div class="container">
		<header id="masthead" class="site-header" role="banner">
			<hgroup>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img class="logo-img" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo"><?php bloginfo( 'name' ); ?></a></h1>
				<!-- <h2 class="site-description"><?//php bloginfo( 'description' ); ?></h2> -->
		
			</hgroup>
			
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h3 class="menu-toggle"><?php _e( 'Menu', 'ustack' ); ?></h3>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'ustack' ); ?>"><?php _e( 'Skip to content', 'ustack' ); ?></a>

				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				
			</nav><!-- #site-navigation -->

			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
			<?php endif; ?>

		</header><!-- #masthead -->
<ul class="top-menu border content-width">
	<li class="left-list"><i class="icon-openstack"></i><a href="#about-openstack">Abput OpenStack</a></li>
	<li class="left-list"><i class="icon-opentech"></i><a href="#openstack-tech">OpenStack Tech</a></li>
	<li class="right-list"><i class="icon-opengroup"></i><a href="#user-group">User Groups</a></li>
	<li class="right-list"><i class="icon-openuser"></i><a href="#user-stories">User Stories</a></li>
</ul>
	</div>
</div>
<style type="text/css">
body {
	background: #fff;
}
#openstack-channel-wrap {
	margin-top: 115px;
    background: #fff!important;
    /*border: 1px solid #f00;*/
    padding-top: 65px;
    color: #777;
}
#openstack-channel-wrap p {
	font-size: 13px;
	line-height: 1.5;
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: " ";
}

.clearfix:after {
  clear: both;
}
a {
	color: #444;
}
.mt65 {
	margin-top: 45px;
}
.mt20 {
	margin-top: 20px;
}
.w35 {
	width: 35%;
}
.w60 {
	width: 60%;
}
.border {
	border: 0px solid #000;
}
a {
	text-decoration: none;
}
.sub-title {
	font-size: 20px;
}
.content-width {
	width: 960px;
	margin: 0 auto;
}
.top-menu {
	/*border: 1px solid #f00;*/
	position: absolute;
	height: 150px;
	bottom: -155px;
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/openstack-logo.png) no-repeat center -60px;
}
.top-menu li {
    display: inline-block;
    height: 50px;
    line-height: 50px;
    width: 205px;
    margin-left: 1px;
    background: #f0f0f0;
    text-align: center;
}
.top-menu li:hover {
	/*background: #ccc;*/
}
.top-menu .right-list {
	float: right;
	/*margin-left: 1px;*/
}
.top-menu .left-list {
	float: left;
}
#about-openstack {
	padding-bottom: 78px;
	margin-bottom: 80px;
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/openstack-structor.png) no-repeat right bottom;
}
#openstack-tech {
	background: #f0f0f0;
	padding-top: 45px;
	padding-bottom: 70px;
}
#openstack-tech .tech-list {
	display: inline-block;
	list-style: none;
}
#openstack-tech .tech-list-left {
	width: 60%;
}
#openstack-tech .tech-list-right {
	width: 35%;
}
#openstack-tech .tech-list a {
	padding-left: 20px;
	font-size: 13px;
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/list-arrow.png) no-repeat 0 2px;
	line-height: 1.5;
}
#openstack-tech .tech-list a:hover {
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/list-arrow.png) no-repeat 0 -19px;	
}
#user-stories {
	padding-top: 60px;
	padding-bottom: 80px;
}

.suport-program {
	width: 25%;
	float: right;
	display: inline-block;
}
.suport-program h2 {
	font-size: 15px;
	margin-left: -10px;
	margin-top: 20px;
}
.suport-program h2 a {
	display: inline-block;
	padding-left: 20px;
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/list-arrow.png) no-repeat 0 0px;

}
.suport-program h2 a:hover {
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/list-arrow.png) no-repeat 0 -21px;
}
.suport-program img {
	display: inline-block;
	margin: 20px 0 20px -10px;
}
.user-icon {
	float: left;
	display: inline-block;
}
#user-group {
	background: #f0f0f0;
	padding-top: 60px;
	padding-bottom: 180px;
}
#user-group  .suport-program h3  {
	margin-bottom: 25px;
	margin-left: -15px;
}
#user-group  .suport-program h3 a {
	color: #1BAACC;
}
.group-info {
	float: left;
}
.all-user-icon {
	display: inline-block;
	margin-bottom: 90px;
}
.icon-openstack {
	display: inline-block;
	width: 32px;
	height: 32px;
	vertical-align: middle;
	margin-right: 10px;
	/*border: 1px solid #f00;*/
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/icon-openstack.png) no-repeat center center;
}
.icon-opentech {
	display: inline-block;
	width: 40px;
	height: 32px;
	vertical-align: middle;
	margin-right: 2px;
	/*border: 1px solid #f00;*/
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/icon-opentech.png) no-repeat center center;
}
.icon-openuser{
	display: inline-block;
	width: 40px;
	height: 36px;
	vertical-align: middle;
	margin-right: 2px;
	/*border: 1px solid #f00;*/
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/icon-openuser.png) no-repeat center center;
}
.icon-opengroup {
	display: inline-block;
	width: 40px;
	height: 36px;
	vertical-align: middle;
	margin-right: 2px;
	/*border: 1px solid #f00;*/
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/icon-opengroup.png) no-repeat center center;	
}
.icon-eventing {
	display: inline-block;
	width: 40px;
	height: 36px;
	vertical-align: middle;
	margin-right: 2px;
	/*border: 1px solid #f00;*/
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/icon-eventing.png) no-repeat center center;

}
.icon-past-eventing {
	display: inline-block;
	width: 40px;
	height: 36px;
	vertical-align: middle;
	margin-right: 2px;
	/*border: 1px solid #f00;*/
	background: url(http://localhost:8888/wp/wp-content/themes/ustacktwo/images/icon-past-eventing.png) no-repeat center center;
}

</style>
<div id="openstack-channel-wrap">
<div class="content-width">
<!-- <ul class="top-menu border">
	<li><a href="#about-openstack">Abput OpenStack</a></li>
	<li><a href="#openstack-tech">OpenStack Tech</a></li>
	<li class="right-list"><a href="#user-stories">User Stories</a></li>
	<li class="right-list"><a href="#user-group">User Groups</a></li>
</ul> -->
<div id="about-openstack" class="mt65 border">
	<h2 class="sub-title"><i class="icon-openstack"></i>About OpenStack</h2>
	<div class="text-content mt65 w35">
		<h3>The open alternative to cloud lock-in Invented by Rackspace and NASA.</h3>
		<p class="mt65">OpenStack® is an open and scalable operating system for building public 
and private clouds. It provides both large and small organizations an 
alternative to closed cloud environments, reducing the risks of lock-in 
associated with proprietary platforms. OpenStack offers flexibility and 
choice through a highly engaged community of over 6,000 individuals 
and over 190 companies including Rackspace®, Dell, HP, IBM, and 
Red Hat®.</p>
	</div>
</div>
</div>

<div id="openstack-tech">
	<div class="content-width">
		<h2 class="sub-title"><i class="icon-opentech"></i>OpenStack Tech</h2>
		<ul class="tech-list tech-list-left mt65">
			<li><a href="">Programming Openstack Compute API </a></li>
			<li><a href="">Programming Openstack Compute API </a></li>
			<li><a href="">Programming Openstack Compute API </a></li>
			<li><a href="">Programming Openstack Compute API</a></li>
			<li><a href="">Programming Openstack Compute API</a></li>
			<li><a href="">Programming Openstack Compute API</a></li>
			<li><a href="">Programming Openstack Compute API</a></li>
			<li><a href="">Programming Openstack Compute API </a></li>
		</ul>

		<ul class="tech-list tech-list-right mt65">
			<li><a href="">Programming Openstack Compute API </a></li>
			<li><a href="">Programming Openstack Compute API </a></li>
			<li><a href="">Programming Openstack</a></li>
			<li><a href="">Programming Openstack </a></li>
			<li><a href="">Programming Openstack </a></li>
			<li><a href="">Programming Openstack</a></li>
			<li><a href="">Programming Openstack</a></li>
			<li><a href="">Programming Openstack</a></li>
		</ul>
	</div>
</div>

<div id="user-stories" class="content-width clearfix">
	<h2 class="sub-title"><i class="icon-openuser"></i>User Stories</h2>
	<div class="user-icon w60 mt65">
		<img class="all-user-icon" src="http://localhost:8888/wp/wp-content/themes/ustacktwo/images/all-logo.png">
		<p>The OpenStack operating system is trusted by thousands of users. </p>
		<p>Learn more at http://www.openstack.org/user-stories/</p>
	</div>
	<ul class="suport-program mt65">
		<li>
			<h2><a href="test">Stack Lab</a></h2>
			<p>
				<img src="http://localhost:8888/wp/wp-content/themes/ustacktwo/images/stacklab-logo.png" style="display: block;">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
set eiusmod tempor incidunt et labore et dolore magna 
aliquam. 
			</p>
		</li>
		<li>
			<h2><a href="test">Internet Support Program</a></h2>
			<p>
			<img src="http://localhost:8888/wp/wp-content/themes/ustacktwo/images/stacklab-logo.png" style="display: block;">
Ut enim ad minim veniam, quis nostrud exerc. Irure dolor 
in reprehend incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation 
ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</li>
	</ul>
</div>

<div id="user-group">
	<div class="content-width clearfix">
		<h2 class="sub-title"><i class="icon-opengroup"></i>User Stories</h2>
		<div class="group-info w60 mt65">
			<p>
				The OpenStack International Community team is the main contact point for anybody running a local the mailing list 
if you are hosting or want to start a user group with meetups, hackathons, and other social events talking about 
OpenStack and free/libre open source software for the cloud.
			</p>
			<p>Check the OpenStack User Groups How To if you decide that you need to start a new OpenStack User Group in 
your geographical area.</p>
		</div>
		<ul class="suport-program mt65">
		<li><h3><a href=""><i class="icon-eventing"></i>Upcoming Events</a></h3>
			<p>OpenStack Summit November2013</p>
			<p>-Hong Kong 11/5/13 9AM - 11/8/13 6PM</p>
		</li>
		<li>
			<h3 class="mt20"><i class="icon-past-eventing"></i><a href="test">Past Events</a></h3>
			<p>OpenStack Summit November2015</p>
			<p>-Beijing 11/5/13 9AM - 11/8/13 6PM</p>
		</li>
	</ul>
	</div>
</div>
</div>

<div class="ustack-footer">
	<div class="totop">
        <div class="gototop">
            <div class="arrowgototop"></div>
        </div>
    </div>
	<div class="ustack-footer-top">
		<div class="container">
			<div class="company-info footer-row">
				<div class="row-content">
					<h3>Company Info</h3>
					<div class="row-content-inner"> 
						<p>UnitedStack Inc. is an OpenStack company, providing open cloud solutions and services for enterprises, with targeting the greater China and Asia market.</p>
					</div>
				</div>
			</div>
			<div class="follow-us footer-row">
				<div class="row-content">
					<h3>Follow Us</h3>
					<div class="row-content-inner" style="margin-bottom:35px;">
				        <div class="clear" id="pay-attention-to-me">
			                <a href="https://twitter.com/unitedstack" target="_blank" class="twitter-ico" rel="nofollow"><span>Twitter</span></a>			                
			                <a href="http://weibo.com/unitedstack" target="_blank" class="sina-ico" rel="nofollow"><span>Sina</span></a>
			                <!-- <a href="https://github.com/malei0311" target="_blank" class="github-ico" rel="nofollow"><span>GitHub</span></a> -->
			                <a href="https://facebook.com/UnitedStackInc" target="_blank" class="facebook-ico" rel="nofollow"><span>Facebook</span></a>
			                <a href="https://plus.google.com/u/0/106900216745595598088/posts" target="_blank" class="google-ico" rel="nofollow"><span>google</span></a>
			            </div>
					</div>
					<img style="display: inline-block; margin-left: -5px;" src="http://www.ustack.com/wp-content/themes/ustack/images/open-stack-logo.png">
				</div>
			</div>
			<div class="footer-links footer-row">
				<div class="row-content">
					<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="latest-posts footer-row">
				<div class="row-content">
					<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="ustack-footer-bottom">
		<div class="container">
			<footer id="colophon" role="contentinfo">
				<div class="site-info">
					2013 &copy; UnitedStack Inc.All Rights Reserved.
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div>
	</div>
</div>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
  ga('create', 'UA-43357150-1', 'unitedstack.com');
  ga('send', 'pageview');
</script>
<?php wp_footer(); ?>

<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script type="text/javascript">
$(".top-menu li a").click(function(){
    var href = $(this).attr("href");
    var pos = $(href).offset().top -200;
    // window.location.href = "#" + $(this).attr("title");
    console.log($(this).attr("href"));
    $("html,body").animate({scrollTop: pos}, 600);
    return false;
});
</script>
</body>
</html>
