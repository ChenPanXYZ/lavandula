<script>myResponses = {
    like : '<?php echo __('Thanks for your LIKE B^D. I will keep working hard to make myself a better person!'); ?>',
    alreadyLike : '<?php echo __('You have already given me a LIKE today. If I still deserve your LIKE, please come again tomorrow!'); ?>',
    dislike : '<?php echo __('What did I do to deserve your DISLIKE D:<. I am a good person I promise!'); ?>',
    alreadyDislike : '<?php echo __('You have already given me a DISLIKE today. Please give me a change to behave myself!'); ?>',
    changeToLike : '<?php echo __('You changed you mind... Thank you! But please come again tomorrow.'); ?>',
    changeToDislike : '<?php echo __('Well, I give you 24 hours so that you could think if this gentleman deserves a DISLIKE.'); ?>',
    cookieNotEnabled: '<?php echo __('You must allow cookie to give me a LIKE or DISLIKE.'); ?>'
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
