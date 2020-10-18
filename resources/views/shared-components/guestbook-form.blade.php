<form class = "guestbook-form" id = "guestbook-form">
<!-- <script type="text/javascript">
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
    </script> -->
            <div id = "guestbook-form-body">
                <p>The Comment System is recently renovated. So, if you don't see a message telling you that your message has been received by the database, please let me know!</p>
                <div class="form-group">
                    <label for="form-name"><?php echo __("Name"); ?><span class="asterisk">*</span></label>
                    <input type="text" name="name" class="form-control" id= "form-name" placeholder="<?php echo __("Your Name"); ?>" required="required">
                </div>
                
                
                <div class="form-group">
                    <label for="form-email"><?php echo __("Email"); ?><span class="asterisk">*</span></label>
                    <input type="email" name="email" class="form-control" id = "form-email" placeholder="<?php echo __("Email Address"); ?>" required="required">
                </div>
                
                <div class="form-group">
                    <label for="form-content"><?php echo __("Your Message"); ?><span class="asterisk">*</span></label>
                    <textarea type="text" name="content" class="form-control" id = "form-content" placeholder="<?php echo __("Your Message"); ?>" required="required"></textarea>
                </div>
        
                <div class="form-group">
                    <p id = "send-comment-error"><?php echo __(">:O Please fill all the required fields and try again."); ?></p>
                    <p id = "send-comment-error-email"><?php echo __(">:/ Please provide a valid email address."); ?></p>
                    <input onclick = "sendComment()" type="submit" name="submit" class="btn btn-primary" id = "form-submit" value="<?php echo __("Submit"); ?>">
                </div>
            </div>

            @yield('like-dislike', View::make('shared-components/like-dislike', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber]))
            @yield('thankyou', View::make('shared-components/thankyou'))
        </form>