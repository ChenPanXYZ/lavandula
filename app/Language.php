<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    private $domain;
    private $languageUrls;
    private $languageCode;

    function __construct() {
        $this->domain = $_SERVER['HTTP_HOST'];
    }

    function getLanguageCode() {
        return $this->languageCode;
    }
    function getDomain() {
        return $this->domain;
    }
    function getLanguageUrls() {
        return $this->languageUrls;
    }

    function init($visitorNumber){
        $pathinfo = $_SERVER['REQUEST_URI'];
        if (substr($this->domain, 0, 4) === 'www.') 
        {
            $this->domain = substr($_SERVER['HTTP_HOST'], 4);
        } 
        
        else if (in_array(substr($this->domain, 0, 3), array('cn.', 'tw.'))) 
        {
            $this->domain = substr($_SERVER['HTTP_HOST'], 3);
        }
        if ($pathinfo == '/index') 
        {
            $pathinfo = '';
        }
        
        // Full URL, https://www.chenpan.xyz/guestbook
        $this->languageUrls = array('https://www.' . $this->domain . $pathinfo, 'https://cn.' . $this->domain . $pathinfo, 'https://tw.' . $this->domain . $pathinfo);
        
        // Domain, cn.chenpan.xyz
        $languageDomains = array('www.' . $this->domain, 'cn.' . $this->domain, 'tw.' . $this->domain);

        $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);

        // A list of some common words used only for bots and crawlers.
        $bot_identifiers = array(
          'bot',
          'slurp',
          'crawler',
          'spider',
          'curl',
          'facebook',
          'fetch',
        );
        $isBot = false;

        foreach ($bot_identifiers as $identifier) {
            if (strpos($user_agent, $identifier) !== false) {
                $isBot = true;
            }
          }

        if($isBot) 
        {
            // It is a bot, do not redirect.
            if ($_SERVER['HTTP_HOST'] == "tw." . $this->domain) 
            {
                // 機器人正在抓取正體中文界面，顯示給他看！
                \App::setLocale("zh-CN");
            }
            else if ($_SERVER['HTTP_HOST'] == "cn." . $this->domain) 
            {
                // 机器人正在抓取简体中文界面，显示给他看！
                \App::setLocale("zh-CN");
            }
            else 
            {
                \App::setLocale("en");
            }
        }
        else 
        { 
            if (isset($_COOKIE['language']) === false) { //First Use, also update the web counter.
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
                setcookie("language", $language, time() + (2147483647), "/", $this->domain);
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
                    \App::setLocale("zh-TW");
                    $this->languageCode = "zh-TW";
                }
                else {
                    // 用戶訪問的鏈接不是tw.chenpan.xyz，需要跳轉。
                    //header("Location: " . $this->languageUrls[2]);
                    //echo $this->languageUrls[2];
                    return $this->languageUrls[2];
                }
            }
        
            else if ($language == "zh-CN")
            {
                // 用户使用简体中文。
                if ($_SERVER['HTTP_HOST'] == $languageDomains[1]) {
                    // 如果域名已经是cn.chenpan.xyz了，那么无需跳转。
                    \App::setLocale("zh-CN");
                    $this->languageCode = "zh-CN";
                }
                else {
                    // 用户访问的域名不是cn.chenpan.xyz，需要跳转。
                    return $this->languageUrls[1];
                }
            }
        
            else 
            {
                // English Version should be displayed.
                if ($_SERVER['HTTP_HOST'] == $languageDomains[0]) {
                    // No need to redirect because the domain is already www.chenpan.xyz.
                    \App::setLocale("en");
                    $this->languageCode = "en";
                }
                else {
                    // Need to redirect because the domain is not www.chenpan.xyz
                    return $this->languageUrls[0];
                }
            }
        }
        return 0;
   }
}
