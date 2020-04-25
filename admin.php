
<?php include('assets/php/functions.php');?>
<?php include('assets/php/admin-functions.php');?>
<?php include('assets/php/language-switcher.php'); ?>
<?php
if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
	header("location: /login");
	exit;
}
?>

<!DOCTYPE html>
<html lang=<?php echo $language; ?>>
<head>
    <meta charset="UTF-8">
    <title><?php echo _("Admin Panel - Pan Chen"); ?></title>
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" href="<?php echo $languageUrls[1]; ?>" hreflang="zh-cn" />
	<link rel="alternate" href="<?php echo $languageUrls[2]; ?>" hreflang="zh-tw" />
	<link rel="stylesheet" type="text/css" href="/assets/css/admin.css"> 
    <?php loadCssAndScript(); ?>
</head>

<body>
	<header>
		<div class = "title">
			<strong><h1><?php echo _("Admin Panel"); ?></h1></strong>
		</div>
	    <div class="welcome">
	        <h2><?php echo _("Welcome! Pan Chen."); ?></h2>
	    </div>
    </header>
	<div class = "mainContent resume">
		<h3><?php echo _("Resume"); ?></h3>
		<form> 
			<?php $resume = get_resume_info(); ?>
			<?php
			foreach ($resume as $resume_section_id => $resume_section) {
				?>
				<div class = "resume-section collapse">
					<button class="move-up-button" type="move-up-button">Move Up</button>
					<button class = "move-down-button" type="move-down-button">Move Down</button>
					<input class = "resume-section-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionOrder-<?php echo $resume_section_id; ?>" value = "<?php echo $resume_section['display_order']; ?>">
					<input class = "resumeSectionCheckbox" type="checkbox" name="resumeSectionCheckbox[]" value=<?php echo $resume_section_id; ?>>
					<button onclick = "expand_collapse(this.parentNode, this)" class = "expand-collapse-button" type="expand-collapse-button">Expand</button>
					<textarea class = "section-text" oninput = "checking(this.previousElementSibling.previousElementSibling)" name = "resumeSectionTitles-<?php echo $resume_section_id; ?>" value = "<?php echo $resume_section['title']?>"><?php echo $resume_section['title']?></textarea>
					<button onclick = "delete_section(this, <?php echo $resume_section_id;?>, <?php echo $resume_section['display_order']; ?>)" class = "delete-section-button" type="delete-section-button">Delete Section</button>
					<?php
					
					$current_resume_section = $resume_section;
					foreach ($current_resume_section['items'] as $resume_sections_item_id => $resume_sections_item) {
						?>
						<div class = "resume-section-item collapse">
							<button class="move-up-button" type="move-up-button">Move Up</button>
							<button class = "move-down-button" type="move-down-button">Move Down</button>
							<input class = "resume-section-item-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionItemOrder-<?php echo $resume_sections_item_id; ?>" value = "<?php echo $resume_sections_item['item_display_order']; ?>">
							<input type="checkbox" name="resumeSectionItemCheckbox[]" value=<?php echo $resume_sections_item_id; ?>>
							<button onclick = "expand_collapse(this.parentNode, this)" class = "expand-collapse-button" type="expand-collapse-button">Expand</button>
							<textarea class = "item-text" oninput = "checking(this.previousElementSibling.previousElementSibling)" name = "resumeSectionItemTitles-<?php echo $resume_sections_item_id; ?>" value = '<?php echo $resume_sections_item['item_title']?>'><?php echo $resume_sections_item['item_title']; ?></textarea>
							<button onclick = "delete_item(this, <?php echo $resume_sections_item_id;?>, <?php echo $resume_sections_item['item_display_order']; ?>)" class = "delete-item-button" type="delete-item-button">Delete Item</button>
							<?php
							$current_item_contents = $resume_sections_item["item_content"];
							for ($i = 0; $i < count($current_item_contents); $i++) {
								$item_content_id = $current_item_contents[$i][0];
								$item_content = $current_item_contents[$i][1];
								$item_content_display_order = $current_item_contents[$i][2];
								?>
								<div class = "resume-section-item-content">
								<button class="move-up-button" type="move-up-button">Move Up</button>
								<button class = "move-down-button" type="move-down-button">Move Down</button>
								<input class = "resume-section-item-content-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionItemContentOrder-<?php echo $item_content_id; ?>" value = "<?php echo $item_content_display_order; ?>">
								<input type="checkbox" name="resumeSectionItemContentCheckbox[]" value=<?php echo $item_content_id; ?>>
								<textarea class = "content-text"  oninput= "checking(this.previousElementSibling)" type = "text" name = "resumeSectionItemContent-<?php echo $item_content_id; ?>"><?php echo $item_content ?></textarea>
								<button onclick = "delete_content(this, <?php echo $item_content_id;?>, <?php echo $item_content_display_order; ?>)" class = "delete-content-button" type="delete-content-button">Delete Content</button>
							</div>
							<?php
							}
							?>
							<div class = "newContent">
								<textarea class = "content-text" id = "newContentAddedToResumeSectionItem-<?php echo $resume_sections_item_id;?>" name = "newContentAddedToResumeSectionItem-<?php echo $resume_sections_item_id;?>" placeholder = "New Content"></textarea>
								<button onclick = "addNewContent(<?php echo $resume_sections_item_id;?>)" class = "addNewSectionItemContent">Add New Content</button>
							</div>
						</div>
					<?php
					}
					?>
						<div class = "newItem">
							<textarea class = "item-text" id = "newItemAddedToResumeSection-<?php echo $resume_section_id;?>" name = "newItemAddedToResumeSection-<?php echo $resume_section_id;?>" placeholder = "New Item"></textarea>
							<button onclick = "addItem(<?php echo $resume_section_id;?>)" class = "addNewItem">Add New Item</button>
						</div>
				</div>
				<?php
			}
			?>

				<div class = "newSection">
					<textarea class = "section-text" id = "addNewSection" name="addNewResumeSection" placeholder = "New Section"></textarea>
					<button onclick = "addSection()" class = "addNewSection">Add New Section</button>
				</div>
		</form> 
		
		<button class = "update-button" onclick = "update_resume()" value="Update Section" name="update_section" class="option btn btn-warning">Update</button>
	</div>

	<div class = "mainContent comments">
		<?php showComments(); ?>
	</div>
	
	<footer id = "footer">
		<div id = "copyright">
			Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
		</div>
		<div id = "acknowledgements">
			<div id = 'vultr'>
				<a href = 'https://www.vultr.com/?ref=7470831' target='_blank' aria-label='Vultr' rel='noopener'><img id = 'vultr-logo' src='/assets/uploads/vultr.png' alt = 'Vultr Logo'/>&nbsp;<?php echo _("Web Hosting by Vultr"); ?></a>
			</div>
			&vert;
			<div id = 'cloudflare'>
				<a href = 'https://www.cloudflare.com' target='_blank' aria-label='Cloudflare' rel='noopener'><img id = 'cloudflare-logo' src='/assets/uploads/cloudflare.png' alt = 'Cloudflare Logo'/>&nbsp;<?php echo _("CDN by Cloudflare"); ?></a>
			</div>
		</div>
	</footer>


</body>
</html>