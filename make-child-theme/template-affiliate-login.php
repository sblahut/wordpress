<?php
/*
Template Name: Affiliate Login
*/
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="shortcut icon" href="//training.aiiore.com/favicon.ico" type="image/x-icon" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('WP Head') ) : ?>
<?php endif; ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=442423899132923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>
div#logo img {
	display: none;
}
 div#logo {
	background: url(//www.aiiore.com/wp-content/themes/make/images/logo.png) top center no-repeat;
	background-size: contain;
}
div#logo a{display:block;width:299px;height:70px;margin: 0 auto;}
 div#logo img {
	display: initial;
}
#memberlogin{
	background:url(//www.aiiore.com/wp-content/themes/make/images/memberslogin-light.jpg)  center no-repeat;
	background-size:cover;
	padding: 5% 10px 40px;
}
.login {
	background:url(//www.aiiore.com/wp-content/themes/make/images/memberslogin-light.jpg)  center no-repeat;
	background-size:cover;
}
#login > h1 > a {
	background: url(//www.aiiore.com/wp-content/themes/make/images/logo.png) top center no-repeat;
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
    width: 100%;
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
	background-color: #ffffff;
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
#footer a{
	color:#fff;
	text-decoration :none;
}
#footer ul li{
	  display:inline-block;
	  margin:0;
	  padding:0;
	  vertical-align:top;
	  font:300 16px Lato;
	  text-transform: uppercase;
}
#footer ul li:first-child a{
	border-left:none;
}
#footer ul li a{
	border-left:1px solid #fff;
	padding: 0 10px;
	}
#footer ul{
	text-align:Center;
	margin:0 0 40px;
}
#footer p{
	line-height: 1.75em;
	color: #ffffff;
}
#footer{
	text-align:center;
	padding:40px 10px 90px;
	font:300 16px Lato;
	color:#fff;
	background:#0f3b89;
}
p {margin-bottom: 0!important;}
</style>
</head>
<body <?php body_class(); ?>>
<div id="memberlogin">
<div id="logo">
					<a href="//training.aiiore.com/" rel="home"></a>
</div>

<div class="wrap">

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			 <?php if (!is_user_logged_in()):?>
			<p id="nav">
	<a href="//www.aiiore.com/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a>
</p>	<p id="backtoblog"><a href="//www.aiiore.com/" title="Are you lost?">← Back to AIIORE</a></p>
<?php endif;?>
	<?php endwhile; ?>
    <?php endif; ?>
</div>
</div>
	<div id="footer">
		<p><a href="//www.aiiore.com/privacy-policy/">Privacy Policy</a> &nbsp; | &nbsp; <a href="//www.aiiore.com/disclaimer/">Disclaimer</a> &nbsp;  | &nbsp;  <a href="//www.aiiore.com/terms-conditions/">Terms of Service</a><br/>
© 2017 American Institute of Integrative Oncology, All Rights Reserved.</p>
	</div>
<?php wp_footer(); ?>
</body>
</html>