<?php
function loadCssAndScript() {
	print_r('<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>');
	print_r('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
	print_r('<link rel="stylesheet" href="/css/admin.css">');
	print_r('<script src="/js/admin.js"></script>');
}
function approveComment() {
	if(isset($_POST['approve']))  
	{  
		require "config.php";
		$checkbox1=$_POST['techno'];  
		$chk="";
		for ($x = 0; $x < count($checkbox1); $x++) {
			$chk .= 'comment_id = '.$checkbox1[$x];
			if($x != (count($checkbox1) - 1)) {
				$chk = $chk . " OR ";
			}
		}

		$sql = "UPDATE comments SET comment_approved = 't' WHERE " . $chk;
		if($stmt = mysqli_prepare($conn, $sql)){
			if(mysqli_stmt_execute($stmt)){
				// Redirect to login page
				header("Location: /admin");
			}
			else
			{
				echo "Something went wrong. Please try again later.";
			}
		}
	}
}

function unapproveComment() {
	if(isset($_POST['unapprove']))  
	{  
		require "config.php";
		$checkbox1=$_POST['techno'];  
		$chk="";
		for ($x = 0; $x < count($checkbox1); $x++) {
			$chk .= 'comment_id = '.$checkbox1[$x];
			if($x != (count($checkbox1) - 1)) {
				$chk = $chk . " OR ";
			}
		}

		$sql = "UPDATE comments SET comment_approved = 'f' WHERE " . $chk;
		if($stmt = mysqli_prepare($conn, $sql)){
			if(mysqli_stmt_execute($stmt)){
				// Redirect to login page
				header("Location: /admin");
			}
			else
			{
				echo "Something went wrong. Please try again later.";
			}
		}
	}
}

function deleteComment() {
	if(isset($_POST['delete']))  
	{  
		require "config.php";
		$checkbox1=$_POST['techno'];  
		$chk="";
		for ($x = 0; $x < count($checkbox1); $x++) {
			$chk .= 'comment_id = '.$checkbox1[$x];
			if($x != (count($checkbox1) - 1)) {
				$chk = $chk . " OR ";
			}
		}

		$sql = "DELETE FROM comments WHERE " . $chk;
		if($stmt = mysqli_prepare($conn, $sql)){
			if(mysqli_stmt_execute($stmt)){
				// Redirect to login page
				header("Location: /admin");
			}
			else
			{
				echo "Something went wrong. Please try again later.";
			}
		}
	}
}

function showComments(){
	$comments = App\Comment::get();
	if (count($comments) > 0) {
		// output data of each row
		$unproved_comments = array();
		$proved_comments = array();

		foreach ($comments as $comment) {
			$comment_id = $comment->comment_id;
			$comment_author = $comment->comment_author;
			$comment_content = $comment->comment_content;
			$comment_content = $comment->comment_content;
			$comment_date = $comment->comment_date;
			$comment_approved = $comment->comment_approved;
			$comment_ymd = date("M d, Y", strtotime($comment_date));
			if ($comment_approved == 't') {
				array_push($proved_comments, [$comment_id, $comment_author, $comment_content, $comment_ymd]);
			}
			else {
				array_push($unproved_comments, [$comment_id, $comment_author, $comment_content, $comment_ymd]);
			}
		}
    		?>
        	<?php
		}
	?>
	<form>  
	<h2>All Unapproved Comments:</h2>
	<?php
	for ($x = 0; $x < count($unproved_comments); $x++) {
		?>
			<div class = "guest-comment-meta">
				<p><input type="checkbox" name="commentCheckbox[]" value=<?php echo $unproved_comments[$x][0]?>> <?php echo $unproved_comments[$x][1]?> said on <?php echo date("M d, Y", strtotime($unproved_comments[$x][3])); ?>:</p> 
			</div>
			<div class = "guest-comment-content">
				<p><?php echo $unproved_comments[$x][2]?></p>
			</div>
		<?php
	}

	?>
	<h2>All Approved Comments:</h2>
	<?php
	for ($x = 0; $x < count($proved_comments); $x++) {
		// approveComment();
		// unapproveComment();
		// deleteComment();
		?>
			<div class = "guest-comment-meta">
				<p><input type="checkbox" name="commentCheckbox[]" value=<?php echo $proved_comments[$x][0];?>> <?php echo $proved_comments[$x][1]?> said on <?php echo date("M d, Y", strtotime($proved_comments[$x][3])); ?>:</p> 
			</div>
			<div class = "guest-comment-content">
				<p><?php echo $proved_comments[$x][2]?></p>
			</div>
		<?php
	}
	?>
	<div class = "options">

	<button class = "approve-button" onclick = "update_comments(1)" value="Approve" name="approve" class="option btn btn-warning">Approve</button>
	<button class = "unapprove-button" onclick = "update_comments(2)" value="Unapprove" name="unapprove" class="option btn btn-primary">Unapprove</button>
	<button class = "delete-button" onclick = "update_comments(3)" value="Delete" name="delete" class="option btn btn-danger">Delete</button>
	</form>
	</div>
	<?php
	}
	?>