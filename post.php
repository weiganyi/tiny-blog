
<?php do_post_action(); ?>

<div id="post_div">
    <div class='post_head_div'>
        <?php echo $g_lang_text["post_view_head"]; ?>
    </div>

    <?php echo make_post_title(); ?>

    <div id='post_content_div'>
        <?php echo make_post_content(); ?>
    </div>

    <?php echo make_comment_content(); ?>

    <?php echo make_comment_write(); ?>

</div>

