<!DOCTYPE html>
<?php
include('assets/php/functions.php');
include('assets/php/language-switcher.php');
include('assets/php/ajax/ga.php');
?>
<html lang=<?php echo $language; ?>>
<?php
enableMultipleLanguages();
// $analytics = initializeAnalytics();
// $profile = getFirstProfileId($analytics);
// $visitorNumber = showTotalViews();
$visitorNumber = get_counter_number('visitor');
$likeNumber = get_counter_number('like');
$dislikeNumber = get_counter_number('dislike');
?>
<style>
    #loading {
        background-position: center; 
    }
</style>