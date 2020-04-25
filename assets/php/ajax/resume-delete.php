<?php
require_once '../../../config.php';
$id = $_POST['id'];
$order = $_POST['order'];
$type = $_POST['type'];
if ($type == 0) 
{
    $sql = "DELETE FROM resume_sections WHERE resume_section_id = $id;";
    $sql .= "UPDATE resume_sections SET resume_section_display_order = resume_section_display_order - 1 WHERE resume_section_display_order>$order";
	if (mysqli_multi_query($conn,$sql))
	{
		do
		{
			if ($result=mysqli_store_result($conn))
			{
				mysqli_free_result($result);
			}
		}
		while (mysqli_next_result($conn));
	}
}

if ($type == 1) 
{
    $sql = "DELETE FROM resume_sections_items WHERE resume_section_item_id = $id;";
    $sql .= "UPDATE resume_sections_items SET resume_section_item_display_order = resume_section_item_display_order - 1 WHERE resume_section_item_display_order>$order";
	if (mysqli_multi_query($conn,$sql))
	{
		do
		{
			if ($result=mysqli_store_result($conn))
			{
				mysqli_free_result($result);
			}
		}
		while (mysqli_next_result($conn));
	}
} 

if ($type == 2) 
{
    $sql = "DELETE FROM resume_sections_items_details WHERE resume_section_item_detail_id = $id;";
    $sql .= "UPDATE resume_sections_items_details SET resume_section_item_detail_display_order = resume_section_item_detail_display_order - 1 WHERE resume_section_item_detail_display_order>$order";
    
	if (mysqli_multi_query($conn,$sql))
	{
		do
		{
			if ($result=mysqli_store_result($conn))
			{
				mysqli_free_result($result);
			}
		}
		while (mysqli_next_result($conn));
	}
} 
mysqli_close($conn);
?>