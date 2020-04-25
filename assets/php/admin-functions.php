<?php
session_start();
function loadCssAndScript() {
	print_r('<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>');
	print_r('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
	print_r('<link rel="stylesheet" href="/assets/css/admin.css">');
	print_r('<script src="/assets/js/admin.js"></script>');
}
function login(){
	// Initialize the session
	// Check if the user is already logged in, if yes then redirect him to welcome page
	if((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
		header("location: /admin");
	    exit;
	}
	 
	// Include config file
	require_once "config.php";
	 
	// Define variables and initialize with empty values
	$username = $password = "";
	$username_err = $password_err = "";
	 
	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	    // Check if username is empty
	    if(empty(trim($_POST["username"]))){
	        $username_err = _('Please enter username.');
	    } else{
	        $username = trim($_POST["username"]);
	    }
	    
	    // Check if password is empty
	    if(empty(trim($_POST["password"]))){
	        $password_err = _('Please enter your password.');
	    } else{
	        $password = trim($_POST["password"]);
	    }
		
		//Schema: Admins(AdminID, AdminName, AdminPassword)
	    // Validate credentials
	    if(empty($username_err) && empty($password_err)){
	        // Prepare a select statement
	        $sql = "SELECT admin_name, admin_password FROM admins WHERE admin_name = ?";
	        
	        if($stmt = mysqli_prepare($conn, $sql)){
	            // Bind variables to the prepared statement as parameters
	            mysqli_stmt_bind_param($stmt, "s", $param_username);
	            
	            // Set parameters
	            $param_username = $username;
	            
	            // Attempt to execute the prepared statement
	            if(mysqli_stmt_execute($stmt)){
	                // Store result
	                mysqli_stmt_store_result($stmt);
	                
	                // Check if username exists, if yes then verify password
	                if(mysqli_stmt_num_rows($stmt) == 1){                    
	                    // Bind result variables
	                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
						if(mysqli_stmt_fetch($stmt))
						{
							if(password_verify($password, $hashed_password))
							{
	                            // Password is correct, so start a new session
	                            
	                            // Store data in session variables
	                            $_SESSION["loggedin"] = true;
	                            
	                            // Redirect user to welcome page
	                            header("location: /admin");
							} 
							
							else 
							{
	                            // Display an error message if password is not valid
								$password_err = _('The password you entered was not valid.');
								header("location: /login");
	                        }
	                    }
					} 
					else 
					{
	                    // Display an error message if username doesn't exist
						$username_err = _('No account found with that username.');
						header("location: /login");
	                }
				} 
				else 
				{
					echo _('Something went wrong. Please try again later.');
					header("location: /login");
	            }
	        }
	        
	        // Close statement
	        mysqli_stmt_close($stmt);
	    }
	    
	    // Close connection
	    mysqli_close($conn);
	}
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

	require "config.php";
	
	$sql = "SELECT comment_id, comment_author, comment_content, comment_date, comment_approved FROM comments";
	$result = $conn->query($sql);
	$conn->set_charset("utf8mb4");
	
	if ($result->num_rows > 0) {
		// output data of each row
		$unproved_comments = array();
		$proved_comments = array();
	    while($row = $result->fetch_assoc()) {
				
			$comment_id = $row["comment_id"];
			$comment_author = $row["comment_author"];
			$comment_content = $row["comment_content"];
			$comment_content = nl2br($comment_content );
			$comment_date = $row["comment_date"];
			$comment_approved = $row["comment_approved"];
			$comment_ymd = date("M d, Y", strtotime($comment_date));
			if ($comment_approved == 't') {
				array_push($proved_comments, [$comment_id, $comment_author, $comment_content, $comment_ymd]);
			}
			else {
				array_push($unproved_comments, [$comment_id, $comment_author, $comment_content, $comment_ymd]);
			}
    		?>
        	<?php
		}
	?>
	<form action="" method="post" enctype="multipart/form-data">  
	<h2>All Unapproved Comments:</h2>
	<?php
	for ($x = 0; $x < count($unproved_comments); $x++) {
		?>
			<div class = "guest-comment-meta">
				<p><input type="checkbox" name="techno[]" value=<?php echo $unproved_comments[$x][0]?>> <?php echo $unproved_comments[$x][1]?> said on <?php echo date("M d, Y", strtotime($unproved_comments[$x][3])); ?>:</p> 
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
		approveComment();
		unapproveComment();
		deleteComment();
		?>
			<div class = "guest-comment-meta">
				<p><input type="checkbox" name="techno[]" value=<?php echo $proved_comments[$x][0];?>> <?php echo $proved_comments[$x][1]?> said on <?php echo date("M d, Y", strtotime($proved_comments[$x][3])); ?>:</p> 
			</div>
			<div class = "guest-comment-content">
				<p><?php echo $proved_comments[$x][2]?></p>
			</div>
		<?php
	}
	}
	$conn->close();
	?>
	<div class = "options">
	<input type="submit" value="Approve" name="approve" class="option btn btn-warning">
	<input type="submit" value="Unapprove" name="unapprove" class="option btn btn-primary">
	<input type="submit" value="Delete" name="delete" class="option btn btn-danger">
	</form>
	</div>
	<?php
		
}
?>