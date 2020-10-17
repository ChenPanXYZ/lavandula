<section class = "main-section content" id = "guestbook">

<h2><?php echo __("Guestbook"); ?></h2>
    <div class = "guest-comments">
    @if (count($comments) > 0)
        @php $displayNum = 0 @endphp
        @foreach ($comments as $comment)
            @if (!($commentsNumber == -1) && $displayNum >=$commentsNumber)
                @break
            @endif
            @php $displayNum++ @endphp
            <div class = "guest-comment">
                @php

                $comment_author = $comment->author_name;
                $comment_content = $comment->content->rendered;
                $comment_content = nl2br($comment_content);
                $comment_date = $comment->date;
                $comment_ymd = date(__("M d, Y"), strtotime($comment_date));
                @endphp
    			<div class = "guest-comment-meta">
					<p>
                    @php echo sprintf(__('%s said on %s'), $comment_author, $comment_ymd); @endphp
                    </p>
    			</div>
    			<div class = "guest-comment-content">
    				<p>
                    @php echo $comment_content; @endphp
                    </p>
    			</div>
            </div>
        @endforeach
        @if ($displayNum < count($comments))
            <div class = "more-guest-comment">
                <a href="https://www.chen.life/messages" class="button">@php echo __("More Comments"); @endphp </a>
			</div>
        @endif
    @endif
    </div>
    @yield('guestbook-form', View::make('shared-components/guestbook-form', ["likeNumber" => $likeNumber, "dislikeNumber" => $dislikeNumber]))
</section>

<!-- $comment_author = $comment->comment_author;
                $comment_content = $comment->comment_content;
                $comment_content = nl2br($comment_content);
                $comment_date = $comment->comment_date;
                $comment_ymd = date(__("M d, Y"), strtotime($comment_date)); -->