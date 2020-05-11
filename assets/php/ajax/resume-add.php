<?php
require_once '../../../config.php';
$type = $_POST['type'];

if((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
    return -1;
}
if($type == 0) {
    $title = $conn->real_escape_string($_POST['title']);
    $sql = "INSERT INTO resume_sections (resume_section_title, resume_section_display_order) SELECT '$title', coalesce(MAX(resume_section_display_order), 0) + 1 FROM resume_sections";

    if($result = $conn->query($sql)) {
        $section_id = $conn->insert_id;
    }
    $sql = "SELECT resume_section_display_order FROM resume_sections WHERE resume_section_id = '$section_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $display_order = $row['resume_section_display_order'];
        }
    }

    $moveUpButton = '<button class="move-up-button" type="move-up-button">Move Up</button>';
    $moveDownButton = '<button class = "move-down-button" type="move-down-button">Move Bottom</button>';
    $contentOrder = '<input class = "resume-section-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionOrder-' .$section_id . '" value = "' .$display_order . '">';
    $checkbox = '<input type="checkbox" name="resumeSectionCheckbox[]" value=' .$section_id .'>';
    $expandCollapseButton = '<button onclick = "expand_collapse(this.parentNode, this)" class = "expand-collapse-button" type="expand-collapse-button">Expand</button>';
    $input = '<textarea class = "section-text" oninput = "checking(this.previousElementSibling.previousElementSibling)" type = "text" name = "resumeSectionTitles-' . $section_id . '">' . $title . '</textarea>';

    $newItem = '<div class = "newItem"><textarea class = "item-text" id = "newItemAddedToResumeSection-' . $section_id . '" name = "newItemAddedToResumeSection-' . $section_id . '" placeholder = "New Item"></textarea><button onclick = "addItem(' .$section_id . ')" class = "addNewItem">Add New Item</button></div>';

    $delete_button = '<button onclick = "delete_section(this, '.$section_id .', '.$display_order .')" class = "delete-section-button" type="delete-section-button">Delete Section</button>';


    echo '<div class = "resume-section collapse">' . $moveUpButton . $moveDownButton . $contentOrder . $checkbox . $expandCollapseButton . $input . $delete_button . $newItem .'</div>';
    mysqli_close($conn);
}

else if ($type == 1) 
{
    $sectionId=$_POST['sectionId'];
    $title=$conn->real_escape_string($_POST['title']);
    $sql = "INSERT INTO resume_sections_items (resume_section_item_title, resume_section_item_display_order, resume_section_id) SELECT '$title', coalesce(MAX(resume_section_item_display_order), 0) + 1, $sectionId FROM resume_sections_items WHERE resume_section_id = '$sectionId';";

    if($result = $conn->query($sql)) {
        $item_id = $conn->insert_id;
    }

    $sql = "SELECT resume_section_item_display_order FROM resume_sections_items WHERE resume_section_item_id = $item_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $display_order = $row['resume_section_item_display_order'];
        }
    }
    $moveUpButton = '<button class="move-up-button" type="move-up-button">Move Up</button>';
    $moveDownButton = '<button class = "move-down-button" type="move-down-button">Move Bottom</button>';
    $contentOrder = '<input class = "resume-section-item-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionItemOrder-' .$item_id . '" value = "' .$display_order . '">';
    $checkbox = '<input type="checkbox" name="resumeSectionItemCheckbox[]" value=' .$item_id .'>';
    $expandCollapseButton = '<button onclick = "expand_collapse(this.parentNode, this)" class = "expand-collapse-button" type="expand-collapse-button">Expand</button>';
    $input = '<textarea class = "item-text" oninput = "checking(this.previousElementSibling.previousElementSibling)" type = "text" name = "resumeSectionItemTitles-' . $item_id . '">' . $title . '</textarea>';
    $newContent = '<div class = "newContent"><textarea class = "content-text" id = "newContentAddedToResumeSectionItem-' . $item_id . '" name = "newContentAddedToResumeSectionItem-' . $item_id . '" placeholder = "New Content"></textarea><button onclick = "addNewContent(' .$item_id . ')" class = "addNewSectionItemContent">Add New Content</button></div>';
    $delete_button = '<button onclick = "delete_item(this, '.$item_id .', '.$display_order .')" class = "delete-item-button" type="delete-item-button">Delete item</button>';

    echo '<div class = "resume-section-item collapse">' . $moveUpButton . $moveDownButton . $contentOrder . $checkbox . $expandCollapseButton . $input . $delete_button . $newContent .'</div>';

    mysqli_close($conn);
}

else 
{
    $itemId=$_POST['itemId'];
    $content=$conn->real_escape_string($_POST['content']);
    $sql = "INSERT INTO resume_sections_items_details (resume_section_item_detail_content, resume_section_item_detail_display_order, resume_section_item_id) SELECT '$content', coalesce(MAX(resume_section_item_detail_display_order), 0) + 1, $itemId FROM resume_sections_items_details WHERE resume_section_item_id = $itemId;";
    
    if($result = $conn->query($sql)) {
        $content_id = $conn->insert_id;
    }

    $sql = "SELECT resume_section_item_detail_display_order FROM resume_sections_items_details WHERE resume_section_item_detail_id = $content_id";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $display_order = $row['resume_section_item_detail_display_order'];
        }
    }

    $moveUpButton = '<button class="move-up-button" type="move-up-button">Move Up</button>';
    $moveDownButton = '<button class = "move-down-button" type="move-down-button">Move Bottom</button>';
    $contentOrder = '<input class = "resume-section-item-content-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionItemContentOrder-' .$content_id . '" value = "' .$display_order . '">';
    $checkbox = '<input type="checkbox" name="resumeSectionItemContentCheckbox[]" value=' .$content_id .'>';
    $input = '<textarea class = "content-text" oninput = "checking(this.previousElementSibling)" type = "text" name = "resumeSectionItemContent-' . $content_id . '">' . $content . '</textarea>';
    $delete_button = '<button onclick = "delete_content(this, '.$content_id .', '.$display_order .')" class = "delete-content-button" type="delete-content-button">Delete Content</button>';

    echo '<div class = "resume-section-item-content">' . $moveUpButton . $moveDownButton . $contentOrder . $checkbox . $input . $delete_button . '</div>';
}
mysqli_close($conn);
?>