<?php
use App\Language;
use App\Counter;
$visitorNumber = Counter::getData('visitor');
$language = new Language();
$language->init($visitorNumber);
$domain = $language->getDomain(); 
$languageUrls = $language->getLanguageUrls();
?>

<script>
	const api_token = '{{ Auth::user()->api_token }}';
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo _("Admin Panel - Pan Chen"); ?></title>
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" href="{{$languageUrls[1]}}" hreflang="zh-cn" />
	<link rel="alternate" href="{{$languageUrls[2]}}" hreflang="zh-tw" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <?php loadCssAndScript(); ?>
</head>

<body>
	<header>
		<div class = "title">
			<strong><h1><?php echo _("Admin Panel"); ?></h1></strong>
		</div>
	    <div class="welcome">
	        <h2><?php echo _("Welcome! Pan Chen."); ?></h2>
	    </div>
    </header>


	<div class = "mainContent comments">
		<?php showComments(); ?>
	</div>
    
	
	<footer id = "footer">
		<div id = "copyright">
			Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
		</div>
		<div id = "acknowledgements">
			<div id = 'vultr'>
				<a href = 'https://www.vultr.com/?ref=7470831' target='_blank' aria-label='Vultr' rel='noopener'><img id = 'vultr-logo' src='uploads/vultr.png' alt = 'Vultr Logo'/>&nbsp;<?php echo _("Web Hosting by Vultr"); ?></a>
			</div>
			&vert;
			<div id = 'cloudflare'>
				<a href = 'https://www.cloudflare.com' target='_blank' aria-label='Cloudflare' rel='noopener'><img id = 'cloudflare-logo' src='uploads/cloudflare.png' alt = 'Cloudflare Logo'/>&nbsp;<?php echo _("CDN by Cloudflare"); ?></a>
			</div>
		</div>
	</footer>


</body>
</html>