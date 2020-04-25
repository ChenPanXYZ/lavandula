<?php
$domain = $_SERVER['HTTP_HOST'];
$pathinfo = $_SERVER['REQUEST_URI'];
if (substr($domain, 0, 4) == 'www.') 
{
    $domain = substr($_SERVER['HTTP_HOST'], 4);
} 

else if (in_array(substr($domain, 0, 3), array('cn.', 'tw.'))) 
{
    $domain = substr($_SERVER['HTTP_HOST'], 3);
}
if ($pathinfo == '/index') 
{
	$pathinfo = '';
}

// Full URL, https://www.chenpan.xyz/guestbook
$languageUrls = array('https://www.' . $domain . $pathinfo, 'https://cn.' . $domain . $pathinfo, 'https://tw.' . $domain . $pathinfo);

// Domain, cn.chenpan.xyz
$languageDomains = array('www.' . $domain, 'cn.' . $domain, 'tw.' . $domain);

if(isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider|mediapartners/i', $_SERVER['HTTP_USER_AGENT']) == true) 
{
	// It is a bot, do not redirect.
	if ($_SERVER['HTTP_HOST'] == "tw." . $domain) 
	{
		// 機器人正在抓取正體中文界面，顯示給他看！
		putenv('LANG=zh_TW' );   
		setlocale(LC_ALL, 'zh_TW' );
	}
	else if ($_SERVER['HTTP_HOST'] == "cn." . $domain) 
	{
		// 机器人正在抓取简体中文界面，显示给他看！
		putenv('LANG=zh_CN' );   
		setlocale(LC_ALL, 'zh_CN' );
	}
	else 
	{
		putenv('LANG=en' );   
		setlocale(LC_ALL, 'en' );
	}
}
else 
{ 
	if (isset($_COOKIE['language']) == false) 
	{ //First Use, also update the web counter.
		$browser_lang=strtok($_SERVER['HTTP_ACCEPT_LANGUAGE'], ',');
		if ($browser_lang == "zh-TW") {
			$language = "zh-TW";
		}
		else if (substr($browser_lang, 0, 2) == "zh") 
		{
			$language = "zh-CN";
		}
		else 
		{
			$language = "en";
        }
        setcookie("language", $language, time() + (2147483647), "/", $domain);
        increment_counter('visitor');
        $visitorNumber += 1;
	}

	else 
	{
        // Get language info from cookie. Not first time visitor.
        $language = htmlspecialchars($_COOKIE["language"]);
    }
    
    // Now, we know which language should be displayed to the users (en, zh-CN, zh-TW), either frm cookie or the user's browser language. 


    if($language == "zh-TW")
    {
        // 用戶使用正體中文
        if ($_SERVER['HTTP_HOST'] == $languageDomains[2]) {
            // 如果域名已經是tw.chenpan.xyz了，那麽則無需跳轉。
            putenv('LANG=zh_TW' );   
            setlocale(LC_ALL, 'zh_TW' );
        }
        else {
            // 用戶訪問的鏈接不是tw.chenpan.xyz，需要跳轉。
            header("Location: " . $languageUrls[2]);
        }
    }

    else if ($language == "zh-CN")
    {
        // 用户使用简体中文。
        if ($_SERVER['HTTP_HOST'] == $languageDomains[1]) {
            // 如果域名已经是cn.chenpan.xyz了，那么无需跳转。
            putenv('LANG=zh_CN' );   
            setlocale(LC_ALL, 'zh_CN' );
        }
        else {
            // 用户访问的域名不是cn.chenpan.xyz，需要跳转。
            header("Location: " . $languageUrls[1]);
        }
    }

    else 
    {
        // English Version should be displayed.
        if ($_SERVER['HTTP_HOST'] == $languageDomains[0]) {
            // No need to redirect because the domain is already www.chenpan.xyz.
            putenv('LANG=en' );   
            setlocale(LC_ALL, 'en' );
        }
        else {
            // Need to redirect because the domain is not www.chenpan.xyz
            header("Location: " . $languageUrls[0]);
        }
    }
}
?>