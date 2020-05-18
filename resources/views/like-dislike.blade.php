<?php
$likeNumber = get_counter_number('like');
$dislikeNumber = get_counter_number('dislike');
?>
<script>myResponses = {
    like : '<?php echo _('Thanks for your LIKE B^D. I will keep working hard to make myself a better person!'); ?>',
    alreadyLike : '<?php echo _('You have already given me a LIKE today. If I still deserve your LIKE, please come again tomorrow!'); ?>',
    dislike : '<?php echo _('What did I do to deserve your DISLIKE D:<. I am a good person I promise!'); ?>',
    alreadyDislike : '<?php echo _('You have already given me a DISLIKE today. Please give me a change to behave myself!'); ?>',
    changeToLike : '<?php echo _('You changed you mind... Thank you! But please come again tomorrow.'); ?>',
    changeToDislike : '<?php echo _('Well, I give you 24 hours so that you could think if this gentleman deserves a DISLIKE.'); ?>',
    cookieNotEnabled: '<?php echo _('You must allow cookie to give me a LIKE or DISLIKE.'); ?>'
}
</script>
<div id ="like-dislike">
    <div id = "like">
        <span id = "like-number"><?php echo $likeNumber;?></span> <span onclick = "like(myResponses)" class="icon-like"></span>
    </div>
    <div id = "dislike">
        <span id = "dislike-number"><?php echo $dislikeNumber;?></span> <span onclick = "dislike(myResponses)" class="icon-dislike"></span>
    </div>
    <div id = "myResponse"></div>
</div>