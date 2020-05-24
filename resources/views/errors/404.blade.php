@extends('layouts.app')
<!DOCTYPE html>
<html lang={{$languageCode}}>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Cache-control" content="public">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo __("The page does not exist - Pan Chen"); ?></title>
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
        <script src='https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/p5.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.dom.min.js'></script>
        <script src='https://unpkg.com/ml5@0.1.1/dist/ml5.min.js'></script>
        <link rel="stylesheet" href="/css/404game.css" defer>
        <script type="text/javascript" src="/js/404game.js"></script>
        @if($languageCode == "en")
            @php print_r('<link href="/fonts/pan-sans/stylesheet.css" rel="stylesheet">'); @endphp
        @endif
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
@section('header')
    @yield('header', View::make('shared-components/header', ["domain" => $domain, "languageUrls" => $languageUrls]))
@endsection

@section('sections')
<section class ="main-section content" id="404" style = "text-align: center;">
			<p>
                <?php echo __("I am sorry I haven't yet made a page for this address.<br>Maybe the navigation on the top can help you."); ?>
                <?php echo __("Or You can try playing the brand-new face-control snake game!"); ?>
			</p>
</section>


<div class = "game">
    <header class = "game-header align-center">
            <h1><?php echo __("Snake") ?></h1>
    </header>
    <div id = "game-body">
        <canvas id="game-box" class="align-center" width="0" height="0" tabindex="1"></canvas>

        <div id = "stat">

            <p class="score"><?php echo __("Score") ?>: <span id="score-value">0</span></p>

            <p class="score"><?php echo __("Highest Score") ?>: <span id="highest-score-value">...</span></p>

            <p class="speed"><?php echo __("Your Speed") ?>: <span id="speed-value">0 km/h</span></p>
        </div>
        <div id="menu">
            <a id="loading-reminder"><?php echo __("AI module is coming") ?><br> 🏃 🏃 🏃 🏃 🏃</a>
            <a id="start-button"><?php echo __("Start") ?> 🤞</a>
            <a id="gameover"><?php echo __("GAMEOVER") ?>😢</a>
            <a id = "restart-button"><?php echo __("Try Again!") ?></a>
        </div>
    </div>
</div>
@endsection('sections')

@section('footer')
    @yield('footer', View::make('shared-components/footer', ["visitorNumber" => $visitorNumber]))
@endsection('footer')