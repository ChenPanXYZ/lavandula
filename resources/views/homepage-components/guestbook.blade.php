<section class = "main-section content" id = "guestbook">


<h2><?php echo __("Guestbook"); ?></h2>
    <div class = "guest-comments">
    <?php showGuestbookComments(6);?>
    </div>
    @yield('guestbook-form', View::make('guestbook-form', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber]))
</section>
<?php loadFonts(); ?>