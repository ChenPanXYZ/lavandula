<?php

function loadFonts(){
	if(Config::get('app.locale') == "zh-TW") {
		//print_r('<link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC&display=swap" rel="stylesheet">');
		?>
		<?php
	}
	else if(Config::get('app.locale')== "zh-CN") {
		//print_r('<link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC&display=swap" rel="stylesheet">');
		?>
		<?php
	}
	else {
		print_r('<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">');
		?>
		<style>
			@font-face {
				font-display: fallback;
				font-family: 'Pan Sans';
				src: url('fonts/pan-sans/pansans-webfont.eot');
				src: url('fonts/pan-sans/pansans-webfont.eot?#iefix') format('embedded-opentype'),
					url('fonts/pan-sans/pansans-webfont.woff2') format('woff2'),
					url('fonts/pan-sans/pansans-webfont.woff') format('woff'),
					url('fonts/pan-sans/pansans-webfont.ttf') format('truetype'),
					url('fonts/pan-sans/pansans-webfont.svg#panfontregular') format('svg');
				font-weight: normal;
				font-style: normal;
			}
		</style>
		<?php
	}
}

//Schema: Comments(CommentID, CommentAuthor, CommentEmail, CommentContent, CommentApproved, CommentDate, CommentDateGMT);
function showGuestbookComments($limit){
	$comments = DB::table('comments')
	->select(DB::raw('comment_author, comment_content, comment_date'))
	->where('comment_approved', '=', 't')
	->orderBy('comment_id', 'desc')
	->get();
	
	if (count($comments) > 0) {
		$displayNum = 0;
		foreach ($comments as $comment) {
			if (!($limit == 0) && $displayNum >=$limit) {
				break;
			}
			$displayNum += 1;
			?>
			<div class = "guest-comment">
			<?php
			$comment_author = $comment->comment_author;
			$comment_content = $comment->comment_content;
			$comment_content = nl2br($comment_content);
			$comment_date = $comment->comment_date;
			$comment_ymd = date(__("M d, Y"), strtotime($comment_date));
			?>
    			<div class = "guest-comment-meta">
					<p><?php echo sprintf(__('%s said on %s'), $comment_author, $comment_ymd); ?></p>
    			</div>
    			<div class = "guest-comment-content">
    				<p><?php echo $comment_content?></p>
    			</div>
    		</div>
			<?php
		}
		if ($displayNum < count($comments)) {
			?>
				<div class = "more-guest-comment">
					<a href="/guestbook" class="button"><?php echo __("More Comments"); ?></a>
				</div>
			<?php
		}
	}
	else {
		//deal with no comment.
	}
}

