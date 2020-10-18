<footer id="footer">

	@yield('copyright', View::make('shared-components/copyright'))
	@yield('acknowledgements', View::make('shared-components/acknowledgements'))

	<div id = "visitorNumber"">
		<strong><?php echo $visitorNumber;?></strong> <?php echo __('people have visited my website!')?>
	</div>
		<div id ="cookie_consent" class = "popup-reminder">
			<span><?php echo __("This website uses cookies to ensure you get the best experience on our website."); ?></span> 
			<?php echo __('<a href="https://en.wikipedia.org/wiki/HTTP_cookie"  aria-label="Wikipedia" rel="nofollow noopener" target="_blank">') ?><?php echo __("More info"); ?></a>. <button id = "seen_cookie" class="seen_cookie"><?php echo __("That's Fine"); ?></button>
		</div>
    </footer>
</div>
@if($languageCode == "en")
	<link rel="stylesheet" href="https://pansans.chenpan.org/stylesheet.css" media="none" onload="if(media!='all')media='all'"><noscript><link rel="stylesheet" href="https://pansans.chenpan.org/stylesheet.css"></noscript>
	<link rel="preload" as="font" href="https://pansans.chenpan.org/pansans-webfont.woff2" type="font/woff2" crossorigin="anonymous">
@endif
<link rel="stylesheet" href="/css/style.css" defer>
<link rel="stylesheet" media="screen and (min-width: 900px)" href="/css/responsive.css" defer>
<script type="text/javascript" src="/js/functions.js" async></script>
<script type="text/javascript" src="/js/main.js" async></script>
<script type="text/javascript" src="/js/modal.js" async></script>
<link rel="stylesheet" href="/icomoon/style.css" defer>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101895586-2"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-101895586-2');
</script>