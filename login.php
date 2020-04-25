<?php include('assets/php/functions.php');?>
<?php include('assets/php/admin-functions.php');?>
<?php login(); ?>
<?php
$pathinfo = '/' . pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
if (substr($_SERVER['HTTP_HOST'], 0, 4) == 'www.') {
    $domain = substr($_SERVER['HTTP_HOST'], 4);
} 

else if (substr($_SERVER['HTTP_HOST'], 0, 3) == 'cn.') {
    $domain = substr($_SERVER['HTTP_HOST'], 3);
} 
else if (substr($_SERVER['HTTP_HOST'], 0, 3) == 'tw.') {
    $domain = substr($_SERVER['HTTP_HOST'], 3);
} 

else {
    $domain = $_SERVER['HTTP_HOST'];
}
if ($pathinfo == '/index') {
	$pathinfo = '';
}
$languageUrls = array('https://www.' . $domain . $pathinfo, 'https://cn.' . $domain . $pathinfo, 'https://tw.' . $domain . $pathinfo);

if(isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider|mediapartners/i', $_SERVER['HTTP_USER_AGENT']) == true)
{
	// what to do
	// It is a bot, do not redirect.
	if ($_SERVER['HTTP_HOST'] == "tw." . $domain) {
		// 機器人正在抓取正體中文界面，顯示給他看！
		putenv('LANG=zh_tw' );   
		setlocale(LC_ALL, 'zh_tw' );
	}
	else if ($_SERVER['HTTP_HOST'] == "cn." . $domain) {
		// 机器人正在抓取简体中文界面，显示给他看！
		putenv('LANG=zh_CN' );   
		setlocale(LC_ALL, 'zh_CN' );
	}
	else {
		putenv('LANG=en' );   
		setlocale(LC_ALL, 'en' );
	}
}
else { 

  if (isset($_COOKIE['language']) == false) { //First Use
	

    $browser_lang=strtok($_SERVER['HTTP_ACCEPT_LANGUAGE'], ',');
		if ($browser_lang == "zh-TW") {
			$language = "zh-TW";
		}
		else if (substr($browser_lang, 0, 2) == "zh") {
			$language = "zh-CN";
		}
		else {
			$language = "en";
		}
		setcookie("language", $language, time() + ( 365 * 24 * 60 * 60), "/", $domain); // 86400 = 1 day
	}

	else {
		$language = htmlspecialchars($_COOKIE["language"]);
	}

	if($language == "zh-TW" && $_SERVER['HTTP_HOST']!= "tw." . $domain) {
		header("Location: https://tw." . $domain . $pathinfo);
	}

	else if($language == "zh-CN" && $_SERVER['HTTP_HOST']!= "cn." . $domain) {
		header("Location: https://cn." . $domain . $pathinfo);
	}
	else if($language != "zh-TW" && $language != "zh-CN" && $_SERVER['HTTP_HOST']!= "www." . $domain){
		header("Location: https://www." . $domain . $pathinfo);
	}

	if($language == "zh-TW") {
		putenv('LANG=zh_TW' );   
		setlocale(LC_ALL, 'zh_TW' );
	}

	else if($language == "zh-CN") {
		putenv('LANG=zh_CN' );   
		setlocale(LC_ALL, 'zh_CN' );
	}

	else {
		putenv('LANG=en' );   
		setlocale(LC_ALL, 'en' );
	}
}
?>
<!DOCTYPE html>
<html lang=<?php echo $language; ?>>
<head>
    <meta charset="UTF-8">
    <title><?php echo _("Log in - Pan Chen"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" href="<?php echo $languageUrls[1]; ?>" hreflang="zh-cn" />
	<link rel="alternate" href="<?php echo $languageUrls[2]; ?>" hreflang="zh-tw" />
	<?php loadCssAndScript(); ?>
</head>
<style>
    .flag {
        margin-bottom: 25px;
    }
    .flag img {
        width: 125px;
    }
</style>
<style>
/*Footer*/
#footer {
	margin-top: 8em;
	font-size: 10px;
	text-align: center;
	margin-bottom: 3em;
}
#footer-logo {
	width: 20px;
	height: 20px;
	border-radius: 100%;
}
#copyright, #acknowledgements {
	margin-bottom: 8px;
}
#vultr, #cloudflare {
	display: inline;
}
#vultr-logo {
	width: 12px;
	height: 12px;
	border-radius: auto;
}
#cloudflare-logo {
	width: auto;
	height: 12px;
	border-radius: auto;
}
#footer a {
	color: #192236;
}

#footer {
	font-family: Georgia, -apple-system, 'Nimbus Roman No9 L', Arial, sans-serif;
}

@media (min-width: 785px) {
	#footer {
		font-size: 20px;
	}
	#footer-logo {
		width: 20px;
		height: 20px;
		border-radius: 100%;
	}
	#vultr-logo {
		width: 16px;
		height: 16px;
		border-radius: auto;
	}
	#cloudflare-logo {
		width: auto;
		height: 16px;
		border-radius: auto;
	}
}
</style>
<body>
    <div class="mainContent">
        <h2><?php echo _('Login');?></h2>
        <p><?php echo _('Welcome Back! Pan Chen.');?></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label><?php echo _('Username');?></label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label><?php echo _('Password');?></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input id = "loginButton" type="submit" class="btn btn-primary" value=<?php echo _('Login');?>>
            </div>
        </form>
    </div>    
    <footer id = "footer">
<div id = "copyright">
		Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
	</div>

	<div id = "acknowledgements">
		
		<div id = 'vultr'><a href = 'https://www.vultr.com/?ref=7470831' target='_blank' aria-label='Vultr' rel='noopener'><img id = 'vultr-logo' src='/assets/uploads/vultr.png' alt = 'Vultr Logo'/>&nbsp;<?php echo _("Web Hosting by Vultr"); ?></a></div>
		&vert;
		<div id = 'cloudflare'><a href = 'https://www.cloudflare.com' target='_blank' aria-label='Cloudflare' rel='noopener'><img id = 'cloudflare-logo' src='/assets/uploads/cloudflare.png' alt = 'Cloudflare Logo'/>&nbsp;<?php echo _("CDN by Cloudflare"); ?></a></div>
	</div>
    </footer>
</body>
</html>