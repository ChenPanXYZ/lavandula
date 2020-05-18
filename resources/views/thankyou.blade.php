<style>
#thankyou {
  font-size: 20px;
}
#comment-form-reminder {
    display: none;
}
</style>

<div id = "thankyou">
    <span><strong>{{$name}}</strong></span>
    <span><?php echo __("Thank you :^) !")?></span>
    <p><?php echo __("Your message has been sent to the database successfully.") ?></p> 
    <p><?php echo __("It will display in the guestbook after a review.")?></p>
</div>