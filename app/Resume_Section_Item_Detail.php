<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Resume_Section_Item_Detail extends Model
{
    //
    protected $table = 'resume_sections_items_details';
    protected $primaryKey = 'resume_section_item_detail_id';

    protected $fillable = [
        'resume_section_item_detail_content', 'resume_section_item_detail_display_order',
        'resume_section_item_id',
    ];
    public $timestamps = false;

    public static function add($request) {
        $itemId = $request->itemId;
        $content = $request->content;

        $resume_section_item_detail = new Resume_Section_Item_Detail();
        $resume_section_item_detail->resume_section_item_detail_content = $content;
        $resume_section_item_detail->resume_section_item_detail_display_order = Resume_Section_Item_Detail::where('resume_section_item_id', $itemId)->max('resume_section_item_detail_display_order') + 1;
        $resume_section_item_detail->resume_section_item_id = $itemId;
        $resume_section_item_detail->save();

        $content_id = $resume_section_item_detail->resume_section_item_detail_id;
        $display_order = $resume_section_item_detail->resume_section_item_detail_display_order;
        

    
        $moveUpButton = '<button class="move-up-button" type="move-up-button">Move Up</button>';
        $moveDownButton = '<button class = "move-down-button" type="move-down-button">Move Bottom</button>';
        $contentOrder = '<input class = "resume-section-item-content-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionItemContentOrder-' .$content_id . '" value = "' .$display_order . '">';
        $checkbox = '<input type="checkbox" name="resumeSectionItemContentCheckbox[]" value=' .$content_id .'>';
        $input = '<textarea class = "content-text" oninput = "checking(this.previousElementSibling)" type = "text" name = "resumeSectionItemContent-' . $content_id . '">' . $content . '</textarea>';
        $delete_button = '<button onclick = "delete_content(this, '.$content_id .', '.$display_order .')" class = "delete-content-button" type="delete-content-button">Delete Content</button>';
    
        echo '<div class = "resume-section-item-content">' . $moveUpButton . $moveDownButton . $contentOrder . $checkbox . $input . $delete_button . '</div>';
    }
    public static function remove($request) {
        $id = $request->id;
        $order = $request->order;
        Resume_Section_Item_Detail::where('resume_section_item_detail_id', $id)->delete();
        Resume_Section_Item_Detail::where('resume_section_item_detail_display_order', '>', $order)->decrement('resume_section_item_detail_display_order', 1);
    }

    public static function modify($request) {
        $resumeSectionsItemContentIds = $request->resumeSectionItemContentCheckbox;
        $resumeSectionsItemsContents = $request->resumeContents;
        $resume_sections_items_content = array(); 
        for ($i = 0; $i < count($resumeSectionsItemContentIds); $i++) 
        {
            $resume_sections_items_content[$resumeSectionsItemContentIds[$i]] = [
                'content' => $resumeSectionsItemsContents[$resumeSectionsItemContentIds[$i]][0],
                'display_order' => $resumeSectionsItemsContents[$resumeSectionsItemContentIds[$i]][1]
            ];
        }
    
        foreach ($resume_sections_items_content as $resume_section_item_content_id => $resume_section_item_content) 
        {
            Resume_Section_Item_Detail::where('resume_section_item_detail_id', $resume_section_item_content_id)
            ->update(['resume_section_item_detail_content' => $resume_section_item_content['content'], 'resume_section_item_detail_display_order' => $resume_section_item_content['display_order']]);
        }
    }
}
