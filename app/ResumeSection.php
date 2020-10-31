<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use DB;

class ResumeSection extends Model
{
    protected $table = 'resume_sections';
    protected $primaryKey = 'resume_section_id';

    protected $fillable = [
        'resume_section_title', 'resume_section_display_order',
    ];
    public $timestamps = false;


    
    public static function add($request) {
        $title = $request->title;
        $resume_section = new ResumeSection();
        $resume_section->resume_section_title = $title;
        $resume_section->resume_section_display_order = ResumeSection::max('resume_section_display_order') + 1;
        $resume_section->save();

        $section_id = $resume_section->resume_section_id;
        $display_order = $resume_section->resume_section_display_order;

        $moveUpButton = '<button class="move-up-button" type="move-up-button">Move Up</button>';
        $moveDownButton = '<button class = "move-down-button" type="move-down-button">Move Bottom</button>';
        $contentOrder = '<input class = "resume-section-order" onchange = "checking(this.nextElementSibling)" name = "resumeSectionOrder-' .$section_id . '" value = "' .$display_order . '">';
        $checkbox = '<input type="checkbox" name="resumeSectionCheckbox[]" value=' .$section_id .'>';
        $expandCollapseButton = '<button onclick = "expand_collapse(this.parentNode, this)" class = "expand-collapse-button" type="expand-collapse-button">Expand</button>';
        $input = '<textarea class = "section-text" oninput = "checking(this.previousElementSibling.previousElementSibling)" type = "text" name = "resumeSectionTitles-' . $section_id . '">' . $title . '</textarea>';
        $newItem = '<div class = "newItem"><textarea class = "item-text" id = "newItemAddedToResumeSection-' . $section_id . '" name = "newItemAddedToResumeSection-' . $section_id . '" placeholder = "New Item"></textarea><button onclick = "addItem(' .$section_id . ')" class = "addNewItem">Add New Item</button></div>';
        $delete_button = '<button onclick = "delete_section(this, '.$section_id .', '.$display_order .')" class = "delete-section-button" type="delete-section-button">Delete Section</button>';
        echo '<div class = "resume-section collapse">' . $moveUpButton . $moveDownButton . $contentOrder . $checkbox . $expandCollapseButton . $input . $delete_button . $newItem .'</div>';
    }

    public static function remove($request) {
        $id = $request->id;
        $order = $request->order;
        ResumeSection::where('resume_section_id', $id)->delete();
        ResumeSection::where('resume_section_display_order', '>', $order)->decrement('resume_section_display_order', 1);
    }

    public static function modify($request) {
        $resumeSectionsIds = $request->resumeSectionCheckbox;
        $resumeSections = $request->resumeSections;

        $resume_sections = array(); 
        for ($i = 0; $i < count($resumeSectionsIds); $i++) 
        {
            $resume_sections[$resumeSectionsIds[$i]] = [
                'title' => $resumeSections[$resumeSectionsIds[$i]][0],
                'display_order' => $resumeSections[$resumeSectionsIds[$i]][1],
            ];
        }
        foreach ($resume_sections as $resume_section_id => $resume_section) 
        {
            ResumeSection::where('resume_section_id', $resume_section_id)
            ->update(['resume_section_title' => $resume_section['title'], 'resume_section_display_order' => $resume_section['display_order']]);
        }
    }

    public static function getAll() {
        $results = DB::table('resume_sections')
        ->select(DB::raw('*'))
        ->orderBy('resume_section_display_order')
        ->get();
        $resume = array();
        if (count($results) > 0) {
            foreach ($results as $result) {
                $resume_section_id = $result->resume_section_id;
                $resume_section_title = $result->resume_section_title;
                $resume_section_display_order = $result->resume_section_display_order;
                $resume[$resume_section_id] = ["title" => $resume_section_title, "display_order" => $resume_section_display_order, "items" =>[]];
            }
        }
    
        foreach ($resume as $resume_section_id => $value) {
            $results = DB::table('resume_sections_items')
            ->select(DB::raw('*'))
            ->where('resume_section_id', '=', $resume_section_id)
            ->orderBy('resume_section_item_display_order')
            ->get();
    
            if (count($results) > 0) {
                foreach ($results as $result) {
                    $resume_section_item_id = $result->resume_section_item_id;
                    $resume_section_item_title = $result->resume_section_item_title;
                    $resume_section_item_display_order = $result->resume_section_item_display_order;
                    $resume[$resume_section_id]["items"][$resume_section_item_id] = [
                        "item_title" => $resume_section_item_title,
                        "item_content" => [],
                        "item_display_order" => $resume_section_item_display_order
                    ];
                }
            }
    
    
            foreach ($resume[$resume_section_id]["items"] as $resume_section_item_id => $value) {
    
                $results = DB::table('resume_sections_items_details')
                ->select(DB::raw('*'))
                ->where('resume_section_item_id', '=', $resume_section_item_id)
                ->orderBy('resume_section_item_detail_display_order')
                ->get();
        
                if (count($results) > 0) {
                    foreach ($results as $result) {
                        $resume_sections_items_content = $result->resume_section_item_detail_content;
                        $resume_sections_items_content_id = $result->resume_section_item_detail_id;
                        $resume_sections_items_content_display_order = $result->resume_section_item_detail_display_order;
                        array_push($resume[$resume_section_id]["items"][$resume_section_item_id]["item_content"], [$resume_sections_items_content_id, $resume_sections_items_content, $resume_sections_items_content_display_order]);
                    }
                }
            }
    
    
    
        }
        return $resume;
    }

}
