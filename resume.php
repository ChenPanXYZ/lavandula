<?php 
include('assets/php/init.php');
?>
<script>const mydomain = "<?php echo $domain; ?>";</script>
<head>
<title><?php echo _("Resume - Pan Chen"); ?></title>
	<meta charset="utf-8" />
	<meta name="author" content="Pan Chen" />
	<meta name="description" content="<?php echo _("Pan Chen's resume."); ?>" />
	<meta name="keywords" content="陈攀, Pan Chen, Chen Pan" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="/assets/css/resume.css">
	<link rel="stylesheet" href="/assets/icomoon/style.css" defer>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#268785">
	<link rel="alternate" href="<?php echo $languageUrls[0]; ?>" hreflang="x-default" />
	<link rel="alternate" href="<?php echo $languageUrls[2]; ?>" hreflang="zh-tw" />
	<link rel="alternate" href="<?php echo $languageUrls[1]; ?>" hreflang="zh" />
	<meta name="msapplication-TileColor" content="#268785">
	<meta name="theme-color" content="#268785">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" defer></script>
	<script type="text/javascript" src="/assets/js/functions.js" async></script>
</head>
<body>

<a id="myBtn" aria-label="Language Switcher" rel="noopener"><i class="iconfont icon-language"></i></a>

<!-- The Modal -->
<div id="myModal" class="modal" style = "display: none;">

	<!-- Modal content -->
	<div class="languages modal-content" id = "modal-content">
		<span class="close">&times;</span>
		<a class = "language-switcher" href = "<?php echo $languageUrls[0]; ?>" onclick="setLanguage('en', mydomain)" aria-label="English Version" rel="noopener">English</a>
		<a class = "language-switcher" href = "<?php echo $languageUrls[1]; ?>" onclick="setLanguage('zh-CN', mydomain)" aria-label="Simplified Chinese Version" rel="noopener">简体中文</a>
		<a class = "language-switcher" href = "<?php echo $languageUrls[2]; ?>" onclick="setLanguage('zh-TW', mydomain)" aria-label="Traditional Chinese Version" rel="noopener">繁體中文</a>
	</div>

</div>


<div class = "content">
<header class="resume-header">
	<h1 class = "title"><a href = "/"><?php echo _("Pan Chen"); ?></a></h1>
	<div class = "contact-info">
		<ul>
			<div class = "phone_number"><li><span class="iconfont icon-phone"></span> <a href = "tel:6476861520">647-686-1520</a></li></div>
			<li><span class="iconfont icon-email"></span> <a href = "mailto:pan.chen@mail.utoronto.ca">pan.chen@mail.utoronto.ca</a></li>
			<li><span class="iconfont icon-book"></span> <a href = "/"><?php echo $domain; ?></a></li>
			<li><span class="iconfont icon-linkedin"></span> <a href = "/linkedin"><?php echo $domain; ?>/linkedin</a></li>
			<li><span class="iconfont icon-github"></span> <a href = "/github"><?php echo $domain; ?>/github</a></li>
		</ul>
	</div>
</header>


<section>

<?php
$resume = get_resume_info();
foreach ($resume as $resume_section_id => $resume_section) {
	?>
	<div class = "<?php echo $resume_section['title']; ?>">
		<h2><?php echo _($resume_section['title']); ?></h2>
		<div class = "main-content">
			<dl>
			<?php
				$resume_items= $resume_section['items'];
				foreach ($resume_items as $resume_item_id => $resume_item) {
					?>
					<dt><?php echo _($resume_item['item_title']); ?></dt>
					<?php
					$resume_item_content = $resume_item['item_content'];
					$resume_item_content_num = count($resume_item_content);
					//echo $resume_item['item_content'][0][2];
					if ($resume_item_content_num > 0) {
						?>
						<dd>
							<ul>
							<?php
								for ($i = 0; $i < $resume_item_content_num; $i++) {
									?>
									<?php if ($resume_item_content[$i][0] == 96 || $resume_item_content[$i][0] == 95) {
										if($_SERVER['HTTP_HOST'] == "www.panchen.xyz" || $_SERVER['HTTP_HOST'] == "www.pchen.org") {?>
										<li><?php echo _($resume_item_content[$i][1]); ?></li>
										<?php
										}
									}
									else {
										?>
										<li>
											<?php echo _($resume_item_content[$i][1]); ?>
										</li>
										<?php
									}
								}
							?>
							</ul>
						</dd>
						<?php
					}
				}
			?>
			</dl>
		</div>
	</div>
	<?php
}

?>

</section>

<?php include('assets/php/templates/like-dislike.php');?>
</div>
<footer id="footer">
<div id = "copyright">
		Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
	</div>

	<div id = "acknowledgements">
		
		<div id = 'idc'><a href = 'https://www.hetzner.com' target='_blank' aria-label='Hetzner' rel='noopener'><img id = 'idc-logo' src='/assets/uploads/hetzner.png' alt = 'Hetzner Logo'/>&nbsp;<?php echo _("Web Hosting by Hetzner"); ?></a></div>
		&vert;
		<div id = 'cloudflare'><a href = 'https://www.cloudflare.com' target='_blank' aria-label='Cloudflare' rel='noopener'><img id = 'cloudflare-logo' src='/assets/uploads/cloudflare.png' alt = 'Cloudflare Logo'/>&nbsp;<?php echo _("CDN by Cloudflare"); ?></a></div>
	</div>

	<div id = "visitorNumber">
		<strong><?php echo $visitorNumber;?></strong> <?php echo _('people have visited my website!')?>
	</div>
</footer>
<script type="text/javascript" src="/assets/js/modal.js" async></script>
<script src="//instant.page/3.0.0" type="module" defer integrity="sha384-OeDn4XE77tdHo8pGtE1apMPmAipjoxUQ++eeJa6EtJCfHlvijigWiJpD7VDPWXV1"></script>
</body>
</html>
