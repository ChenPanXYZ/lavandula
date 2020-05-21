<footer id="footer">
	<div id = "copyright">
		Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
	</div>

	<div id = "acknowledgements">
		
		<div id = 'idc'><a href = 'https://www.hetzner.com' target='_blank' aria-label='Hetzner' rel='noopener'><img id = 'idc-logo' src='/uploads/hetzner.png' alt = 'Hetzner Logo'/>&nbsp;<?php echo __("Web Hosting by Hetzner"); ?></a></div>
		&vert;
		<div id = 'cloudflare'><a href = 'https://www.cloudflare.com' target='_blank' aria-label='Cloudflare' rel='noopener'><img id = 'cloudflare-logo' src='/uploads/cloudflare.png' alt = 'Cloudflare Logo'/>&nbsp;<?php echo __("CDN by Cloudflare"); ?></a></div>
	</div>

	<div id = "visitorNumber"">
		<strong><?php echo $visitorNumber;?></strong> <?php echo __('people have visited my website!')?>
	</div>
		<div id ="cookie_consent" class = "popup-reminder">
			<span><?php echo __("This website uses cookies to ensure you get the best experience on our website."); ?></span> 
			<?php echo __('<a href="https://en.wikipedia.org/wiki/HTTP_cookie"  aria-label="Wikipedia" rel="nofollow noopener" target="_blank">') ?><?php echo __("More info"); ?></a>. <button class="seen_cookie"><?php echo __("That's Fine"); ?></button>
		</div>
    </footer>
</div>


<link rel="stylesheet" href="/css/style.css" defer>
<link rel="stylesheet" media="screen and (min-width: 785px)" href="/css/responsive.css" defer>
<script type="text/javascript" src="/js/functions.js" async></script>
<script type="text/javascript" src="/js/main.js" async></script>
<script type="text/javascript" src="/js/modal.js" async></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" defer></script>
<link rel="stylesheet" href="/icomoon/style.css" defer>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101895586-2"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-101895586-2');
</script>
<?php loadFonts(); ?>