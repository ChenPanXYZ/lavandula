<h2><?php echo _("My Projects"); ?></h2>
		<div class = "icon-arrow-left" id="previous-page-button"></div>
		<div class = "icon-arrow-right" id="next-page-button"></div>
		<div class = "collapsible-table">

		<?php
		$resume = get_resume_info();
		$projects = $resume[155]['items'];
		
		foreach ($projects as $project_id => $project) {
			?>
			<div class = "project collapsible-table-row">
				<button class = "collapsible-table-row-head"><?php echo _($project['item_title']); ?></button>
				<div class = "collapsible-table-row-content">
				<?php
					$project_content = $project['item_content'];
					$project_content_num = count($project_content);
					if ($project_content_num > 0) {
						?>
						<dd>
							<ul>
							<?php
							for ($i = 0; $i < $project_content_num; $i++) {
								?>
								<li><?php echo _($project_content[$i][1]);?></li>
								<?php
							}
							?>
							</ul>
						</dd>
						<?php
					}
						?>
				</div>
			</div>
			<?php
		}
		?>
	</div>