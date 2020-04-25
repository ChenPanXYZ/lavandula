<footer id="footer">
	<div id = "copyright">
		Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
	</div>

	<div id = "acknowledgements">
		
		<div id = 'idc'><a href = 'https://www.hetzner.com' target='_blank' aria-label='Hetzner' rel='noopener'><img id = 'idc-logo' src='/assets/uploads/hetzner.png' alt = 'Hetzner Logo'/>&nbsp;<?php echo _("Web Hosting by Hetzner"); ?></a></div>
		&vert;
		<div id = 'cloudflare'><a href = 'https://www.cloudflare.com' target='_blank' aria-label='Cloudflare' rel='noopener'><img id = 'cloudflare-logo' src='/assets/uploads/cloudflare.png' alt = 'Cloudflare Logo'/>&nbsp;<?php echo _("CDN by Cloudflare"); ?></a></div>
	</div>

	<div id = "visitorNumber"">
		<strong><?php echo $visitorNumber;?></strong> <?php echo _('people have visited my website!')?>
	</div>
		<div id ="cookie_consent" class = "popup-reminder">
			<span><?php echo _("This website uses cookies to ensure you get the best experience on our website."); ?></span> 
			<?php echo _('<a href="https://en.wikipedia.org/wiki/HTTP_cookie"  aria-label="Wikipedia" rel="nofollow noopener" target="_blank">') ?><?php echo _("More info"); ?></a>. <button class="seen_cookie"><?php echo _("That's Fine"); ?></button>
		</div>
    </footer>
</div>


<link rel="stylesheet" href="/assets/css/style.css" defer>
<link rel="stylesheet" href="/assets/css/responsive.css" defer>
<script type="text/javascript" src="/assets/js/functions.js" async></script>
<script type="text/javascript" src="/assets/js/home.js" async></script>
<script type="text/javascript" src="/assets/js/modal.js" async></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" defer></script>
<link rel="stylesheet" href="/assets/icomoon/style.css" defer>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101895586-2"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-101895586-2');
</script>
<script>
	setTimeout(function(){
		var head = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = "https://www.recaptcha.net/recaptcha/api.js?onload=onloadCallback&render=explicit";
		head.appendChild(script);
	}, 2000);
</script>
<?php loadFonts(); ?>