<?php include('assets/php/init.php');?>
<! ––
*********                 *********       
*                         *       *
*                         *       *
*                         *********
*                         *
*********                 *
––>
<head>
	<title><?php echo _("Guestbook - Pan Chen"); ?></title>
	<?php include('assets/php/templates/header.php');?>

	<! ––main content starts here––>

	<title><?php echo _("The page does not exist - Pan Chen"); ?></title>
	
	<section class = "main-section content" id = "guestbook">
		<h2><?php echo _("Guestbook"); ?></h2>
		<div class = "guest-comments">
		<?php showGuestbookComments(0);?>
		</div>
		<?php include('assets/php/templates/guestbook-form.php');?>



        
	</section>

<! ––main content edns here––>

<?php include('assets/php/templates/footer.php');?>
<script src="//instant.page/3.0.0" type="module" defer integrity="sha384-OeDn4XE77tdHo8pGtE1apMPmAipjoxUQ++eeJa6EtJCfHlvijigWiJpD7VDPWXV1"></script>
</body>
</html>