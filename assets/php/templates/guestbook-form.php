<form class = "guestbook-form">
<script type="text/javascript">
let recaptchaResponse
      var verifyCallback = function(response) {
        recaptchaResponse = response
        recaptchaCallback()
      };
      var expireCallback = function(response) {
        recaptchaResponse = response
        expiredCallback()
      };
      var onloadCallback = function() {
        grecaptcha.render('recaptcha', {
          'sitekey' : '6Le3GbwUAAAAAIWk1sXmkluqYb41l5e7usBvVCDm',
          'callback' : verifyCallback,
          'expired-callback': expireCallback
        });
      };
    </script>
            <div id = "guestbook-form-body">
                <div class="form-group">
                    <label for="form-name"><?php echo _("Name"); ?><span class="asterisk">*</span></label>
                    <input type="text" name="name" class="form-control" id= "form-name" value="<?php echo $name; ?>" placeholder="<?php echo _("Your Name"); ?>" required="required">
                </div>
                
                
                <div class="form-group">
                    <label for="form-email"><?php echo _("Email"); ?><span class="asterisk">*</span></label>
                    <input type="email" name="email" class="form-control" id = "form-email" value="<?php echo $email; ?>" placeholder="<?php echo _("Email Address"); ?>" required="required">
                </div>
                
                <div class="form-group">
                    <label for="form-content"><?php echo _("Your Message"); ?><span class="asterisk">*</span></label>
                    <textarea type="text" name="content" class="form-control" id = "form-content" value="<?php echo $content; ?>" placeholder="<?php echo _("Your Message"); ?>" required="required"></textarea>
                </div>
        
                <div class="form-group">
                    <p id = "send-comment-error"><?php echo _(">:O Please fill all the required fields and try again."); ?></p>
                    <p id = "send-comment-error-email"><?php echo _(">:/ Please provide a valid email address."); ?></p>

                    <div id="recaptcha"></div>
                    <input onclick = "sendComment(recaptchaResponse)" type="submit" name="submit" class="btn btn-primary" id = "form-submit" value="<?php echo _("Submit"); ?>" disabled>
                </div>
            </div>
            <p id = "comment-form-reminder"><?php echo _("* I recently ajaxified this comment form. If the comment system doesn't work properly, please refresh your cache or try the incognito mode. Thank you."); ?></p>
            <div id = "thankyou">
				<p id = "do-not-show-it-to-my-distinguished-guest"><?php echo _('You want my thankyou? Give me a message, or no way!!') ?></p>
				<span><?php echo _("Thank you :^) !")?></span>
                <p><?php echo _("Your message has been sent to the database successfully.") ?></p> 
                <p><?php echo _("It will display in the guestbook after a review.")?></p>
            </div>

            <?php include('assets/php/templates/like-dislike.php');?>
        
        </form>
    </script>