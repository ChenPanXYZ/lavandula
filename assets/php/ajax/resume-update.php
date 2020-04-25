<?php
require_once '../../../config.php';
if(isset($_POST['resumeSectionCheckbox'])) 
{ 
	$resumeSectionsIds = $_POST['resumeSectionCheckbox'];
	$resumeSections = $_POST['resumeSections'];
} 
$resume_sections = array(); 
for ($i = 0; $i < count($resumeSectionsIds); $i++) 
{
	$resume_sections[$resumeSectionsIds[$i]] = [
		'title' => $conn->real_escape_string($resumeSections[$resumeSectionsIds[$i]][0]),
		'display_order' => $resumeSections[$resumeSectionsIds[$i]][1],
	];
}
$sql = '';
foreach ($resume_sections as $resume_section_id => $resume_section) 
{
	$sql = $sql . "UPDATE resume_sections SET resume_section_title = '$resume_section[title]', resume_section_display_order = '$resume_section[display_order]' WHERE resume_section_id = $resume_section_id;";
}
if (mysqli_multi_query($conn,$sql))
{
	do
	{
		if ($result=mysqli_store_result($conn))
		{
			while ($row=mysqli_fetch_row($result))
			{

			}
			mysqli_free_result($result);
		}
	}
	while (mysqli_next_result($conn));
}
    

if(isset($_POST['resumeSectionItemCheckbox'])) {
	$resumeSectionsItemIds = $_POST['resumeSectionItemCheckbox'];
	$resumeSectionsItems = $_POST['resumeItems'];
} 

$resume_sections_items = array(); 
for ($i = 0; $i < count($resumeSectionsItemIds); $i++) 
{
	$resume_sections_items[$resumeSectionsItemIds[$i]] = [
		'title' => $conn->real_escape_string($resumeSectionsItems[$resumeSectionsItemIds[$i]][0]),
		'display_order' => $resumeSectionsItems[$resumeSectionsItemIds[$i]][1],
	];
}
$sql = '';
foreach ($resume_sections_items as $resume_section_item_id => $resume_section_item) 
{
	$sql = $sql . "UPDATE resume_sections_items SET resume_section_item_title = '$resume_section_item[title]', resume_section_item_display_order = '$resume_section_item[display_order]' WHERE resume_section_item_id = $resume_section_item_id;";
}
	
if (mysqli_multi_query($conn,$sql))
{
	do
	{
		if ($result=mysqli_store_result($conn))
		{
			while ($row=mysqli_fetch_row($result))
			{
			}
			mysqli_free_result($result);
		}
	}
	while (mysqli_next_result($conn));
}


if(isset($_POST['resumeSectionItemContentCheckbox'])) {
	$resumeSectionsItemContentIds = $_POST['resumeSectionItemContentCheckbox'];
	$resumeSectionsItemsContents = $_POST['resumeContents'];
} 
$resume_sections_items_content = array(); 
for ($i = 0; $i < count($resumeSectionsItemContentIds); $i++) 
{
	$resume_sections_items_content[$resumeSectionsItemContentIds[$i]] = [
		'content' => $conn->real_escape_string($resumeSectionsItemsContents[$resumeSectionsItemContentIds[$i]][0]),
		'display_order' => $resumeSectionsItemsContents[$resumeSectionsItemContentIds[$i]][1]
	];
}

$sql = '';
foreach ($resume_sections_items_content as $resume_section_item_content_id => $resume_section_item_content) 
{
	mysqli_real_escape_string($conn,$resume_section_item_content);



	$sql = $sql . "UPDATE resume_sections_items_details SET resume_section_item_detail_content = '$resume_section_item_content[content]', resume_section_item_detail_display_order = '$resume_section_item_content[display_order]' WHERE resume_section_item_detail_id = $resume_section_item_content_id;";
}
if (mysqli_multi_query($conn,$sql))
{
	do
	{
		if ($result=mysqli_store_result($conn))
		{
			while ($row=mysqli_fetch_row($result))
			{
			}
			mysqli_free_result($result);
		}
	}
	while (mysqli_next_result($conn));
}
?>