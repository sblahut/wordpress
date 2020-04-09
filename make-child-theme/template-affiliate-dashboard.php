<?php
/*
Template Name: Affiliate Dashboard
*/
 ?>
 <!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/affiliate.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"/>
</script>
<title>
<?php wp_title(); ?>
</title>
<?php wp_head();  ?>
<body class="affiliate-page">
<div id="dashboard-container">
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
	<div id="affiliate-dashboard-content">
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
<script>
	//Accordian
	$('.accordion').each(function () {
	    var $accordian = $(this);
	    $accordian.find('.accordion-head').on('click', function () {
	        $accordian.find('.accordion-body').slideUp();
            $accordian.find('span').css("backgroundPosition",'0px 11px');
	        if (!$(this).next().is(':visible')) {
	            $(this).next().slideDown();
                $(this).find('span').css({"background-position" : '0px 0px'});
            }
	    });
	});
	document.getElementById("copyButton").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyTarget"), "msg");
});

document.getElementById("copyButton2").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyTarget2"), "msg");
});

document.getElementById("pasteTarget").addEventListener("mousedown", function() {
    this.value = "";
});


function copyToClipboardMsg(elem, msgElem) {
	  var succeed = copyToClipboard(elem);
    var msg;
    if (!succeed) {
        msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
    } else {
        msg = "Text copied to the clipboard."
    }
    if (typeof msgElem === "string") {
        msgElem = document.getElementById(msgElem);
    }
    msgElem.innerHTML = msg;
    setTimeout(function() {
        msgElem.innerHTML = "";
    }, 2000);
}

function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
</script>
<script>
$(function(){
        $('.showEvergreen').click(function(){
              $('.live-webinar').hide();
			  $('.cross-promotion').hide();
			  $('.nutraceutical').hide();
              $('.evergreen').show();
        });
        $('.showLiveWebinar').click(function(){
              $('.evergreen').hide();
			  $('.cross-promotion').hide();
			  $('.nutraceutical').hide();
              $('.live-webinar').show();
        });
		$('.showCrossPromotion').click(function(){
              $('.evergreen').hide();
			  $('.live-webinar').hide();
			  $('.nutraceutical').hide();
              $('.cross-promotion').show();
        });
		$('.showNutraceutical').click(function(){
              $('.evergreen').hide();
			  $('.cross-promotion').hide();
			  $('.live-webinar').hide();
              $('.nutraceutical').show();
        });
});
</script>
<?php wp_footer();?>