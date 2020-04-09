<?php
/*
Template Name: Affiliate Front Page
*/
 ?>
 <!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/affiliate.css"/>
<title>
<?php wp_title(); ?>
</title>
<?php wp_head();  ?>
<style>
#memberlogin{
	background:url(images/memberslogin-light.jpg)  center no-repeat;
	background-size:cover;
	padding: 5% 10px 40px;
}
.login {
	background:url(images/memberslogin-light.jpg)  center no-repeat;
	background-size:cover;
}
#login > h1 > a {
	background: url(images/logo.png) top center no-repeat;
}
#memberlogin #logo{
	text-align:Center;
	float:none;
	width:auto;
	margin-bottom: 50px;
}
#memberlogin .wrap a
{color:#57585b}
#memberlogin .wrap{
	 max-width:315px;
	 margin:0 auto;
	 font: 16px Lato;
}
form#loginform {
    margin: 0px auto 20px;
    width: 266px;
    background-color: #0f3b89;
    padding: 26px 24px 46px;
}

form#loginform label {
    display: block;
    color: #fff;
    font-size: 14px;
    margin: 0 0 5px;
}

input#user_login, input#user_pass {
    font-size: 24px;
    width: 97%;
    margin: 2px 6px 16px 0;
    padding: 3px;
    border: 1px solid #ddd!important;
    box-shadow: none!important;
    max-height: 35px;
    min-height: 35px;
    text-align: left;
}

form#loginform input[type="submit"] {
    padding: 5px 12px;
    font-size: 15px;
    border: none!important;
    box-shadow: none!important;
    float: right;
    width: auto;
    background: #ff8120;
    position: relative;
    top: -20px;
}
#memberlogin #nav {
	margin-bottom: 20px;
}
#memberlogin #nav, #memberlogin #backtoblog, #login #nav, #login #backtoblog {
	text-align: center;
}
#login input#wp-submit {
	text-shadow: none!important;
}
</style>
</head>
<body <?php body_class(); ?>>
<div id="affiliate-dashboard-page">
<div id="header">
	<div class="container">
		<div class="logo"><img src="<?php bloginfo('stylesheet_directory');?>/images/affiliate-logo.jpg"/></div>
			<?php if (is_user_logged_in()):?>
			<div class="login">
			<p>Welcome, <span><?php 
			global $current_user;
       		get_currentuserinfo();?>
       		<?php echo $current_user->user_firstname ;?>
       		<?php echo $current_user->user_lastname ;?></span>
			<a href="<?php echo wp_logout_url( home_url() ); ?>">Log Out</a></p>
			</div>
			<?php else:?>
			<div class="login v2">
			<p>Already a Referral Partner?<br/>
			<a href="//www.aiiore.com/affiliate-login/">Log In</a></p>
			</div>
		<?php endif;?>
		
	<div class="clear"></div>
</div>
</div>


	<div id="affiliate-content">
	<?php if(have_posts()) : ?>
	 <?php while(have_posts()) : the_post(); ?>
			<?php the_content();?>
		<?php endwhile; ?>
    <?php endif; ?>
</div>
<div class="footer">
	<p><a href="//www.aiiore.com/privacy-policy/" target="_blank">Privacy Policy</a> | <a href="//www.aiiore.com/disclaimer" target="_blank">Disclaimer</a> | <a href="//www.aiiore.com/terms-conditions/" target="_blank">Terms of Service</a><br/>
© 2017 American Institute of Integrative Oncology, All Rights Reserved.</p>
</div>
</body>
<?php   if ( is_page(1112) ) { ?>
<input id="rand-pass" type="hidden" value="<?php echo wp_generate_password( 8, false ); ?>">
<script>
function randompassword() {
var thepass = document.getElementById('rand-pass').value;
document.getElementById("aff-firstpass").value = thepass;
document.getElementById("aff-secondpass").value = thepass;
}
window.onload = randompassword;
</script>
<?php } ?>
<?php wp_footer();?>