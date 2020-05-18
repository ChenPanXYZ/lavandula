<?php

function hello() {
    return "hello";
}

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


function guestbook_form(){
	?>
	<form class = "guestbook-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
		<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
			<label for="form-name"><?php echo _("Name"); ?><span class="asterisk">*</span></label>
			<input type="text" name="name" class="form-control" id= "form-name" value="<?php echo $name; ?>" placeholder="<?php echo _("Your Name"); ?>" required="required">
			<span class="help-block"><?php echo $name_err; ?></span>
		</div>
		
		
		<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
			<label for="form-email"><?php echo _("Email"); ?><span class="asterisk">*</span></label>
			<input type="email" name="email" class="form-control" id = "form-email" value="<?php echo $email; ?>" placeholder="<?php echo _("Email Address"); ?>" required="required">
			<span class="help-block"><?php echo $email_err; ?></span>
		</div>
		
		<div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
			<label for="form-content"><?php echo _("Your Message"); ?><span class="asterisk">*</span></label>
			<textarea type="text" name="content" class="form-control" id = "form-content" value="<?php echo $content; ?>" placeholder="<?php echo _("Your Message"); ?>" required="required"></textarea>
			<span class="help-block"><?php echo $content_err; ?></span>
		</div>

		<div class="form-group">
			<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Le3GbwUAAAAAIWk1sXmkluqYb41l5e7usBvVCDm"></div>
			<input type="submit" name="submit" class="btn btn-primary" id = "form-submit" value="<?php echo _("Submit"); ?>" disabled>
		</div>
	
	</form>
<?php
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

function increment_counter($counterType) {
	DB::table('counters')
	->where('counter_type', $counterType)
	->update([
		'counter_value' => DB::raw('counter_value + 1')
	]);
}

function get_counter_number($counterType) {

	$results = DB::table('counters')
	->select(DB::raw('counter_value'))
	->where('counter_type', '=', $counterType)
	->get();
	$visitorNumber = 0;

	if (count($results) > 0) {
		foreach ($results as $result) {
			$visitorNumber = $result->counter_value;
		}
	}
	return $visitorNumber;
}

