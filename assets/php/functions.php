<?php
function loadFonts(){
	if(getenv("LANG")== "zh_TW") {
		print_r('<link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC&display=swap" rel="stylesheet">');
		?>
		<style>
			body, h1, h2, h3, h4 {
				font-family: 'Noto Serif TC', serif;
			}
			#name {
				letter-spacing:22px;
			}
		</style>
		<?php
	}
	if(getenv("LANG")== "zh_CN") {
		print_r('<link href="https://fonts.googleapis.com/css?family=Noto+Serif+SC&display=swap" rel="stylesheet">');
		?>
		<style>
			body, h1, h2, h3, h4 {
				font-family: 'Noto Serif SC', serif;
			}
			#name {
				letter-spacing:22px;
			}
		</style>
		<?php
	}
	if(getenv("LANG")== "en") {
		print_r('<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">');
		?>
		<style>
			@font-face {
				font-display: fallback;
				font-family: 'Pan Sans';
				src: url('/assets/fonts/pan-sans/pansans-webfont.eot');
				src: url('/assets/fonts/pan-sans/pansans-webfont.eot?#iefix') format('embedded-opentype'),
					url('/assets/fonts/pan-sans/pansans-webfont.woff2') format('woff2'),
					url('/assets/fonts/pan-sans/pansans-webfont.woff') format('woff'),
					url('/assets/fonts/pan-sans/pansans-webfont.ttf') format('truetype'),
					url('/assets/fonts/pan-sans/pansans-webfont.svg#panfontregular') format('svg');
				font-weight: normal;
				font-style: normal;
			}
			body, button, #name>h1 {
				font-family: 'Pan Sans', serif;
			}
			h1, h2, h3, h4 {
				font-family: 'Roboto', serif;
			}
		</style>
		<?php
	}
}
function enableMultipleLanguages() {  
	$domain  =  'chenpan' ;
	bindtextdomain ( $domain ,  "languages/" );   
	bind_textdomain_codeset($domain ,  'UTF-8' );
	textdomain($domain );
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
	require "config.php";
	
	$sql = "SELECT comment_author, comment_content, comment_date FROM comments WHERE comment_approved = 't' ORDER BY comment_id DESC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		$displayNum = 0;
	    while($row = $result->fetch_assoc()) {
        	if (!($limit == 0) && $displayNum >=$limit) {
        		break;
        	}
	    	$displayNum += 1;
	    		?>
    		<div class = "guest-comment">
    			
    			<?php 
    			
    			$comment_author = $row["comment_author"];
				$comment_content = $row["comment_content"];
				$comment_content = nl2br($comment_content);
    			$comment_date = $row["comment_date"];
				$comment_ymd = date(_("M d, Y"), strtotime($comment_date));
    			?>
    			<div class = "guest-comment-meta">
					<p><?php echo sprintf(_('%s said on %s'), $comment_author, $comment_ymd); ?></p>
    			</div>
    			<div class = "guest-comment-content">
    				<p><?php echo $comment_content?></p>
    			</div>
    		</div>
        	<?php
	    }?>
		<?php if ($displayNum < $result->num_rows)
		{?>
			<div class = "more-guest-comment">
				<a href="/guestbook" class="button"><?php echo _("More Comments"); ?></a>
			</div><?php
		}
	}
	$conn->close();
}
function get_resume_info() {
	require "config.php";
	$sql = "SELECT * FROM resume_sections ORDER BY resume_section_display_order";
	$result = $conn->query($sql);
	$conn->set_charset("utf8mb4");
	$resume = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$resume_section_id = $row["resume_section_id"];
			$resume_section_title = $row["resume_section_title"];
			$resume_section_display_order = $row["resume_section_display_order"];
			$resume[$resume_section_id] = ["title" => $resume_section_title, "display_order" => $resume_section_display_order, "items" =>[]];
		}
	}

	// 現在我要去獲取每一個resume items,並將之存儲於$resume[$resume_sections_id][items]中。
	foreach ($resume as $resume_section_id => $value) {
		$sql = "SELECT * FROM resume_sections_items WHERE resume_section_id = $resume_section_id ORDER BY resume_section_item_display_order";
		$result = $conn->query($sql);
		$conn->set_charset("utf8mb4");
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				
				$resume_section_item_id = $row["resume_section_item_id"];
				$resume_section_item_title = $row["resume_section_item_title"];
				$resume_section_item_display_order = $row["resume_section_item_display_order"];
				$resume[$resume_section_id]["items"][$resume_section_item_id] = [
					"item_title" => $resume_section_item_title,
					"item_content" => [],
					"item_display_order" => $resume_section_item_display_order
				];

			}
		}
		foreach ($resume[$resume_section_id]["items"] as $resume_section_item_id => $value) {
			
			$sql = "SELECT * FROM resume_sections_items_details WHERE resume_section_item_id = $resume_section_item_id ORDER BY resume_section_item_detail_display_order";
				
			$result2 = $conn->query($sql);
			
			if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {

					$resume_sections_items_content = $row["resume_section_item_detail_content"];

					$resume_sections_items_content_id = $row["resume_section_item_detail_id"];

					$resume_sections_items_content_display_order = $row["resume_section_item_detail_display_order"];



					array_push($resume[$resume_section_id]["items"][$resume_section_item_id]["item_content"], [$resume_sections_items_content_id, $resume_sections_items_content, $resume_sections_items_content_display_order]);
					
				}
			}
		}



	}
	$conn->close();
	return $resume;
}


function increment_counter($counterType) {
	require "config.php";
	$sql = "UPDATE counters SET counter_value = counter_value + 1 WHERE counter_type = '$counterType'";
	$result = $conn->query($sql);
	$conn->close();
}


function get_counter_number($counterType) {
	require "config.php";
	$sql = "SELECT counter_value FROM counters WHERE counter_type = '$counterType'";
	$visitorNumber = 0;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$visitorNumber = $row["counter_value"];
		}
	}
	$conn->close();
	return $visitorNumber;
}

