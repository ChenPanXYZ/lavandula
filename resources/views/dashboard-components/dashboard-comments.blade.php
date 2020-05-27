<?php
use App\Language;
use App\Counter;
$visitorNumber = Counter::getData('visitor');
$language = new Language();
$language->init($visitorNumber);
$domain = $language->getDomain(); 
$languageUrls = $language->getLanguageUrls();
?>

<script>
	const api_token = '{{ Auth::user()->api_token }}';
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo __("Dashboard - Pan Chen"); ?></title>
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" href="{{$languageUrls[1]}}" hreflang="zh-cn" />
	<link rel="alternate" href="{{$languageUrls[2]}}" hreflang="zh-tw" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/admin.css">
	<script src="/js/admin.js"></script>
</head>

<body>
	<header>
		<div class = "title">
			<strong><h1><?php echo __("Guestbook"); ?></h1></strong>
		</div>
    </header>

	<div id = "switch-buttons">

		<button id = "show-unapproved-comments" class="btn btn-secondary"><?php echo __("Unapproved"); ?></button>
		<button id = "show-approved-comments" class="btn btn-secondary"><?php echo __("Approved"); ?></button>

	</div>


	<div class = "mainContent comments">
		<form>
			<div id = "unapproved-comments">
				@foreach ($unapprovedComments as $comment)

				<div class="card comment">
					<input class = "comment-checkbox" type="checkbox" name="commentCheckbox[]" value=<?php echo $comment->comment_id; ?>>
					<div class="card-body">
						<h3 class="card-title"><?php echo $comment->comment_author; ?></h5>
						<p class="card-text"><?php echo nl2br($comment->comment_content); ?></p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><?php echo date("M d, Y", strtotime($comment->comment_date)); ?></li>
						<li class="list-group-item"><?php echo $comment->comment_email; ?></li>
					</ul>
				</div>
				@endforeach
			</div>
			<div id = "approved-comments">
				@foreach ($approvedComments as $comment)
				<div class="card comment">
					<input class = "comment-checkbox" type="checkbox" name="commentCheckbox[]" value=<?php echo $comment->comment_id; ?>>
					<div class="card-body">
						<h3 class="card-title"><?php echo $comment->comment_author; ?></h5>
						<p class="card-text"><?php echo nl2br($comment->comment_content); ?></p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><?php echo date("M d, Y", strtotime($comment->comment_date)); ?></li>
						<li class="list-group-item"><?php echo $comment->comment_email; ?></li>
					</ul>
				</div>
				@endforeach		
			</div>	
			<div class = "options">
				<button id = "approve-button" class = "approve-button btn btn-primary" onclick = "update_comments(1)" value="Approve" name="approve" class="option btn btn-warning"><?php echo __("Approve"); ?></button>
				<button id = "unapprove-button" class = "unapprove-button btn btn-primary" onclick = "update_comments(2)" value="Unapprove" name="unapprove" class="option btn btn-primary"><?php echo __("Unapprove"); ?></button>
				<button id = "delete-button" class = "delete-button btn btn-warning" onclick = "update_comments(3)" value="Delete" name="delete" class="option btn btn-danger"><?php echo __("Delete"); ?></button>
			</div>
		</form>
	</div>
    
	
	<footer id = "footer">
		@yield('copyright', View::make('shared-components/copyright'))
		@yield('acknowledgements', View::make('shared-components/acknowledgements'))
	</footer>


</body>
</html>