<script>
const mydomain = "<?php echo $domain; ?>";
</script>
<meta charset="utf-8" />
	<meta http-equiv="Cache-control" content="public">
	<meta name="author" content="<?php echo _("Pan Chen"); ?>" />
	<meta name="description" content="<?php echo _("Pan Chen is doing Specialist in Computer Science and Minor in Statistics Science at the University of Toronto. His research focus is Artificial Intelligence. This is his personal website."); ?>" />
	<meta name="keywords" content="<?php echo _("Pan Chen, 陈攀, Chen Pan, UofT, University of Toronto, AI, NLP, Artificial Intelligence, Natural Language Processing, Computer Science, Statistics Science"); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
	<link rel="preconnect" href="https://www.gstatic.com" crossorigin>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#268785">
    <link rel="alternate" href="<?php echo $languageUrls[0]; ?>" hreflang="x-default" />
    <link rel="alternate" href="<?php echo $languageUrls[2]; ?>" hreflang="zh-tw" />
    <link rel="alternate" href="<?php echo $languageUrls[1]; ?>" hreflang="zh" />
    <meta name="msapplication-TileColor" content="#268785">
    <meta name="theme-color" content="#268785">
</head>
<div id = "loading"></div>
<style>
#loading {
    visibility: visible;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center; 
    background-color: #268785;
    background-image: url("/android-chrome-192x192.png");
}

body {
	  overflow-y: hidden;
}
#page {
    visibility: hidden;
}
.show {
	opacity: 1;
	transition: opacity 1000ms;
  }
  
  .hide {
	opacity: 0;
	transition: opacity 1000ms;
  }

</style>

<body id="body">

<div id = "page">
	<header class="site-header" id="header">
    <div id = "main-header">
    <div class = "signature" id = "my_signature">
        <p><span> <img id = "topnav-logo" src='/android-chrome-192x192.png' alt='Pan Chen'> </span><?php echo _("Pan Chen"); ?></p>
    </div>
    <nav class="topnav" id="topnav">
        <a href="javascript:void(0);" aria-label="Open Menu" class="icon" onclick="header.adjust()" rel="noopener"><i class="iconfont icon-menu"></i></a>
        <?php echo _('<a href="/" class="active" aria-label="Home" onclick="header.adjust()" target="_self" rel="noopener">Home</a>'); ?>
        <?php echo _('<a href = "/blog" aria-label="Chinese Version" onclick="header.adjust()" rel="noopener">Blog</a>'); ?>
        <a href = "/#projects" aria-label="Projects" onclick="header.adjust()" rel="noopener"><?php echo _("Projects"); ?></a>
        <a href = "/#myStory" aria-label="My Story" onclick="header.adjust()" rel="noopener"><?php echo _("Story"); ?></a>
        <a href = "/#myFootprints" aria-label="My Footprints" onclick="header.adjust()" rel="noopener"><?php echo _("Footprints"); ?></a>
        <a href = "/resume" aria-label="Guestbook" onclick="header.adjust()" rel="noopener"><?php echo _("Resume"); ?></a>
        <a href = "/#guestbook" aria-label="Guestbook" onclick="header.adjust()" rel="noopener"><?php echo _("Guestbook"); ?></a>
        <a id="myBtn" aria-label="Language Switcher" rel="noopener"><i class="iconfont icon-language"></i></a>
    </nav>

    <!-- The Modal -->
    <div id="myModal" class="modal" style = "display: none;">

        <!-- Modal content -->
        <div class="languages modal-content" id = "modal-content">
            <span class="close">&times;</span>
            <a class = "language-switcher" href = "<?php echo $languageUrls[0]; ?>" onclick="setLanguage('en', mydomain)" aria-label="English Version" rel="noopener">English</a>
            <a class = "language-switcher" href = "<?php echo $languageUrls[2]; ?>" onclick="setLanguage('zh-TW', mydomain)" aria-label="Traditional Chinese Version" rel="noopener">正體中文</a>
            <a class = "language-switcher" href = "<?php echo $languageUrls[1]; ?>" onclick="setLanguage('zh-CN', mydomain)" aria-label="Simplified Chinese Version" rel="noopener">简体中文</a>
        </div>

    </div>

    <div id="name">
        <h1><?php echo _("Pan Chen"); ?></h1>
    </div>

    <div id="contact">
        <?php echo _('<a data-toggle="tooltip" title="Blog" href="/blog" aria-label="My Blog" target="_self" rel="noopener"><i class="iconfont icon-book"></i></a>'); ?>
        <?php echo _('<a data-toggle="tooltip" title="Facebook" href="/facebook" aria-label="Facebook" rel="nofollow noopener" target="_blank"><i class="iconfont icon-facebook"></i></a>'); ?>
        <?php echo _('<a data-toggle="tooltip" title="Instagram" href="/instagram" aria-label="Instagram" rel="nofollow noopener" target="_blank"><i class="iconfont icon-instagram"></i></a>'); ?>
        <?php echo _('<a data-toggle="tooltip" title="Twitter" href="/twitter" aria-label="Twitter" rel="nofollow noopener" target="_blank"><i class="iconfont icon-twitter"></i></a>'); ?>
        <?php echo _('<a data-toggle="tooltip" title="GitHub" href="/github" aria-label="Github" rel="nofollow noopener" target="_blank"><i class="iconfont icon-github"></i></a>'); ?>
        <?php echo _('<a data-toggle="tooltip" title="Linkedin" href="/linkedin" aria-label="Linkedin" rel="nofollow noopener" target="_blank"><i class="iconfont icon-linkedin"></i></a>'); ?>
        <?php echo _('<a data-toggle="tooltip" title="Resume" href="/resume" aria-label="Resume" target="_self" rel="noopener"><i class="iconfont icon-resume"></i></a>'); ?>
        <?php echo _('<a data-toggle="tooltip" title="E-mail" href="mailto:pan.chen@mail.utoronto.ca" aria-label="E-mail" rel="nofollow noopener" target="_blank"><i class="iconfont icon-email"></i></a>'); ?>
    </div>
    </div>
</header>