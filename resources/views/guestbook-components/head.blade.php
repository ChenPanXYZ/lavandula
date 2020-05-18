<!DOCTYPE html>
<html lang={{$languageCode}}>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Cache-control" content="public">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo __("Guestbook - Pan Chen"); ?></title>
        <meta name="author" content="<?php echo __("Pan Chen"); ?>" />
        <meta name="description" content="<?php echo __("Here is the guestbook, where my peers and friends leave their words to me."); ?>" />
        <meta name="keywords" content="<?php echo __("Pan Chen, 陈攀, Chen Pan, UofT, University of Toronto, AI, NLP, Artificial Intelligence, Natural Language Processing, Computer Science, Statistics Science"); ?>" />
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