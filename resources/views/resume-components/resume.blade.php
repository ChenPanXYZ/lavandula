<!DOCTYPE html>
<html lang={{$languageCode}}>
<script>const mydomain = "{{$domain}}";</script>
<head>
	<meta charset="utf-8" />
	<meta name="author" content="<?php echo __("Pan Chen"); ?>" />
	<meta http-equiv="Cache-control" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php echo __("Resume - Pan Chen"); ?></title>
	<meta name="description" content="<?php echo __("Here is the online resume of Pan Chen, who is currently a Computer Science Specialist student at the University of Toronto."); ?>" />
	<meta name="keywords" content="<?php echo __("Pan Chen, 陈攀, Chen Pan, UofT, University of Toronto, AI, NLP, Artificial Intelligence, Natural Language Processing, Computer Science, Statistics Science"); ?>" />
	<link rel="stylesheet" href="/css/resume.css">
	<link rel="stylesheet" href="/icomoon/style.css" defer>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#268785">
	<link rel="alternate" href="{{$languageUrls[0]}}" hreflang="x-default" />
	<link rel="alternate" href="{{$languageUrls[2]}}" hreflang="zh-tw" />
	<link rel="alternate" href="{{$languageUrls[1]}}" hreflang="zh" />
	<meta name="msapplication-TileColor" content="#268785">
	<meta name="theme-color" content="#268785">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" defer></script>
	<script type="text/javascript" src="/js/functions.js" async></script>
</head>
<body>

<a id="myBtn" aria-label="Language Switcher" rel="noopener"><i class="iconfont icon-language"></i></a>

<!-- The Modal -->
<div id="myModal" class="modal" style = "display: none;">

	<!-- Modal content -->
	<div class="languages modal-content" id = "modal-content">
		<span class="close">&times;</span>
		<a class = "language-switcher" href = "{{$languageUrls[0]}}" onclick="setLanguage('en', mydomain)" aria-label="English Version" rel="noopener">English</a>
		<a class = "language-switcher" href = "{{$languageUrls[1]}}" onclick="setLanguage('zh-CN', mydomain)" aria-label="Simplified Chinese Version" rel="noopener">简体中文</a>
		<a class = "language-switcher" href = "{{$languageUrls[2]}}" onclick="setLanguage('zh-TW', mydomain)" aria-label="Traditional Chinese Version" rel="noopener">繁體中文</a>
	</div>

</div>


<div class = "content">
<header class="resume-header">
	<h1 class = "title"><a href = "/"><?php echo __("Pan Chen"); ?></a></h1>
	<div class = "contact-info">
		<ul>
			<div class = "phone_number"><li><span class="iconfont icon-phone"></span> <a href = "tel:6476861520">647-686-1520</a></li></div>
			<li><span class="iconfont icon-email"></span> <a href = "mailto:pan.chen@mail.utoronto.ca">pan.chen@mail.utoronto.ca</a></li>
			<li><span class="iconfont icon-book"></span> <a href = "/">{{$domain}}</a></li>
			<li><span class="iconfont icon-linkedin"></span> <a href = "/linkedin">{{$domain}}/linkedin</a></li>
			<li><span class="iconfont icon-github"></span> <a href = "/github">{{$domain}}/github</a></li>
		</ul>
	</div>
</header>


<section>

<?php
foreach ($resume as $resume_section_id => $resume_section) {
	?>
	<div class = "<?php echo $resume_section['title']; ?>">
		<h2><?php echo __($resume_section['title']); ?></h2>
		<div class = "main-content">
			<dl>
			<?php
				$resume_items= $resume_section['items'];
				foreach ($resume_items as $resume_item_id => $resume_item) {
					?>
					<dt><?php echo __($resume_item['item_title']); ?></dt>
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
										<li><?php echo __($resume_item_content[$i][1]); ?></li>
										<?php
										}
									}
									else {
										?>
										<li>
											<?php echo __($resume_item_content[$i][1]); ?>
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

@yield('like-dislike', View::make('shared-components/like-dislike', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber]))
</div>
<footer id="footer">
<div id = "copyright">
		Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
	</div>

	@yield('acknowledgements', View::make('shared-components/acknowledgements'))

	<div id = "visitorNumber">
		<strong><?php echo $visitorNumber;?></strong> <?php echo __('people have visited my website!')?>
	</div>
</footer>
<script type="text/javascript" src="/js/modal.js" async></script>
</body>
</html>
