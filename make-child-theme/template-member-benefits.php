<?php
/*
Template Name: Member Benefits
*/
 ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/member-benefits.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"/>
</script>
<?php get_header();?>
</div>
    <div id="member-banner">
        <img src="<?php bloginfo('stylesheet_directory');?>/images/member-banner.jpg"/>
        <h1>Member Benefits</h1>
    </div>
	<div id="member-benefits">
    	<div class="container">
            <?php if(have_posts()) : ?>
        	 <?php while(have_posts()) : the_post(); ?>
        			<?php the_content();?>
        		<?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer();?>
<script>
//Accordian
    $('.accordion').each(function () {
        var $accordian = $(this);
        $accordian.find('.accordion-head').on('click', function () {
            $(this).removeClass('active');
            $accordian.find('.accordion-body').slideUp();
            $accordian.find('span').text('+');
            if (!$(this).next().is(':visible')) {
                 $(this).addClass('active');
                $(this).next().slideDown();
                $(this).find('span').text('-');
            }
        });
    });
 </script>
<style>
.benefits .text h4{
    font-size: 22px!Important;
    text-align:left;
    font-weight:300;
    margin: 20px 0 30px;
    line-height: 1.2em;
    color: #ffffff;
}
.benefits .text{width:74%!important}

.benefits .image{width:20%;margin:0 0 0 15px}

div#register-btn .left {
    display:inline-block;
    vertical-align:top;
    width: 20%;
	margin-left: 15px;
}

div#register-btn .right {
	display:inline-block;
    vertical-align:top;
    width: 74%;
	margin-left: 20px;
}

div#register-btn {
    text-align: left;
}
div#selection-bar {
    display: none;
}

div#member-banner {
    margin-top: -50px;
}
</style>