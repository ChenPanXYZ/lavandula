<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Resume_Section_Item extends Model
{
    //
    protected $table = 'resume_sections_items';
    protected $primaryKey = 'resume_section_item_id';
    protected $fillable = [
        'resume_section_item_title', 'resume_section_item_display_order',
        'resume_section_id',
    ];
    public $timestamps = false;

    public static function add($request) {
        $title = $request->title;
        $resume_section_item = new Resume_Section_Item();
        $resume_section_item->resume_section_item_title = $request->title;
        $resume_section_item->resume_section_item_display_order = Resume_Section_Item::where('resume_section_id', $request->sectionId)->max('resume_section_item_display_order') + 1;
        $resume_section_item->resume_section_id = $request->sectionId;
        $resume_section_item->save();

        $item_id = $resume_section_item->resume_section_item_id;
        $display_order = $resume_section_item->resume_section_item_display_order;
    
        $moveUpButton = '<button class="move-up-button" type="move-up-button">Move Up</button>';
        $moveDownButton = '<button class = "move-down-button" type="move-down-button">Move Bottom</button>';
        $contentOrder = '<input class = "resume-section-item-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionItemOrder-' .$item_id . '" value = "' .$display_order . '">';
        $checkbox = '<input type="checkbox" name="resumeSectionItemCheckbox[]" value=' .$item_id .'>';
        $expandCollapseButton = '<button onclick = "expand_collapse(this.parentNode, this)" class = "expand-collapse-button" type="expand-collapse-button">Expand</button>';
        $input = '<textarea class = "item-text" oninput = "checking(this.previousElementSibling.previousElementSibling)" type = "text" name = "resumeSectionItemTitles-' . $item_id . '">' . $title . '</textarea>';
        $newContent = '<div class = "newContent"><textarea class = "content-text" id = "newContentAddedToResumeSectionItem-' . $item_id . '" name = "newContentAddedToResumeSectionItem-' . $item_id . '" placeholder = "New Content"></textarea><button onclick = "addNewContent(' .$item_id . ')" class = "addNewSectionItemContent">Add New Content</button></div>';
        $delete_button = '<button onclick = "delete_item(this, '.$item_id .', '.$display_order .')" class = "delete-item-button" type="delete-item-button">Delete item</button>';
    
        echo '<div class = "resume-section-item collapse">' . $moveUpButton . $moveDownButton . $contentOrder . $checkbox . $expandCollapseButton . $input . $delete_button . $newContent .'</div>';
    }
    public static function remove($request) {
        $id = $request->id;
        $order = $request->order;
        Resume_Section_Item::where('resume_section_item_id', $id)->delete();

        Resume_Section_Item::where('resume_section_item_display_order', '>', $order)->decrement('resume_section_item_display_order', 1);
    }

    public static function modify($request) {
        $resumeSectionsItemIds = $request->resumeSectionItemCheckbox;
        $resumeSectionsItems = $request->resumeItems;
        $resume_sections_items = array(); 
        for ($i = 0; $i < count($resumeSectionsItemIds); $i++) 
        {
            $resume_sections_items[$resumeSectionsItemIds[$i]] = [
                'title' => $resumeSectionsItems[$resumeSectionsItemIds[$i]][0],
                'display_order' => $resumeSectionsItems[$resumeSectionsItemIds[$i]][1],
            ];
        }
    
    
        foreach ($resume_sections_items as $resume_section_item_id => $resume_section_item) 
        {
            Resume_Section_Item::where('resume_section_item_id', $resume_section_item_id)
            ->update(['resume_section_item_title' => $resume_section_item['title'], 'resume_section_item_display_order' => $resume_section_item['display_order']]);
        }
    }
}
