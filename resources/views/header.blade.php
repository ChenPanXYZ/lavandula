<script>
const mydomain = "<?php echo $domain; ?>";
</script>
<header class="site-header" id="header">
    <div id = "main-header">
    <div class = "signature" id = "my_signature">
        <p><span> <img id = "topnav-logo" src='/android-chrome-192x192.png' alt='Pan Chen'> </span><span id = "nav-signature"><?php echo __("Pan Chen"); ?></span></p>
    </div>
    <nav class="topnav" id="topnav">
        <a href="javascript:void(0);" aria-label="Open Menu" class="icon" onclick="header.adjust()" rel="noopener"><i class="iconfont icon-menu"></i></a>
        <?php echo __('<a href="/" class="active" aria-label="Home" onclick="header.adjust()" target="_self" rel="noopener">Home</a>'); ?>
        <?php echo __('<a href = "/blog" aria-label="Chinese Version" onclick="header.adjust()" rel="noopener">Blog</a>'); ?>
        <a href = "/#projects" aria-label="Projects" onclick="header.adjust()" rel="noopener"><?php echo __("Projects"); ?></a>
        <a href = "/#myStory" aria-label="My Story" onclick="header.adjust()" rel="noopener"><?php echo __("Story"); ?></a>
        <a href = "/#myFootprints" aria-label="My Footprints" onclick="header.adjust()" rel="noopener"><?php echo __("Footprints"); ?></a>
        <a href = "/resume" aria-label="Guestbook" onclick="header.adjust()" rel="noopener"><?php echo __("Resume"); ?></a>
        <a href = "/#guestbook" aria-label="Guestbook" onclick="header.adjust()" rel="noopener"><?php echo __("Guestbook"); ?></a>
        <a id="myBtn" aria-label="Language Switcher" rel="noopener"><i class="iconfont icon-language"></i></a>
    </nav>

    <!-- The Modal -->
    <div id="myModal" class="modal" style = "display: none;">

        <!-- Modal content -->
        <div class="languages modal-content" id = "modal-content">
            <span class="close">&times;</span>
            <a class = "language-switcher" href = "{{$languageUrls[0]}}" onclick="setLanguage('en', '{{$domain}}')" aria-label="English Version" rel="noopener">English</a>
            <a class = "language-switcher" href = "{{$languageUrls[1]}}" onclick="setLanguage('zh-CN', '{{$domain}}')" aria-label="Simplified Chinese Version" rel="noopener">简体中文</a>
            <a class = "language-switcher" href = "{{$languageUrls[2]}}" onclick="setLanguage('zh-TW', '{{$domain}}')" aria-label="Traditional Chinese Version" rel="noopener">繁體中文</a>
        </div>

    </div>

    <div id="name">
        <h1><?php echo __("Pan Chen"); ?></h1>
    </div>

    <div id="contact">
        <?php echo __('<a data-toggle="tooltip" title="Blog" href="/blog" aria-label="My Blog" target="_self" rel="noopener"><i class="iconfont icon-book"></i></a>'); ?>
        <?php echo __('<a data-toggle="tooltip" title="Facebook" href="/facebook" aria-label="Facebook" rel="nofollow noopener" target="_blank"><i class="iconfont icon-facebook"></i></a>'); ?>
        <?php echo __('<a data-toggle="tooltip" title="Instagram" href="/instagram" aria-label="Instagram" rel="nofollow noopener" target="_blank"><i class="iconfont icon-instagram"></i></a>'); ?>
        <?php echo __('<a data-toggle="tooltip" title="Twitter" href="/twitter" aria-label="Twitter" rel="nofollow noopener" target="_blank"><i class="iconfont icon-twitter"></i></a>'); ?>
        <?php echo __('<a data-toggle="tooltip" title="GitHub" href="/github" aria-label="Github" rel="nofollow noopener" target="_blank"><i class="iconfont icon-github"></i></a>'); ?>
        <?php echo __('<a data-toggle="tooltip" title="Linkedin" href="/linkedin" aria-label="Linkedin" rel="nofollow noopener" target="_blank"><i class="iconfont icon-linkedin"></i></a>'); ?>
        <?php echo __('<a data-toggle="tooltip" title="Resume" href="/resume" aria-label="Resume" target="_self" rel="noopener"><i class="iconfont icon-resume"></i></a>'); ?>
        <?php echo __('<a data-toggle="tooltip" title="E-mail" href="mailto:pan.chen@mail.utoronto.ca" aria-label="E-mail" rel="nofollow noopener" target="_blank"><i class="iconfont icon-email"></i></a>'); ?>
    </div>
    </div>
</header>