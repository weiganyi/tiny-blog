
<div id="sidebar_div">
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_notice_title"]; ?></div>
        <div class="sidebar_content_div"><?php echo get_blog_notice(); ?></div>
    </div>
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_summary_title"]; ?></div>
        <div class="sidebar_content_div">
            <?php echo $g_lang_text["sidebar_summary_bloger"]; ?>
            <span class="sidebar_content_right_span">
                <?php echo get_bloger_name(); ?>
            </span>
            </br>
            <?php echo $g_lang_text["sidebar_summary_register"]; ?>
            <span class="sidebar_content_right_span">
                <?php echo get_user_registered(); ?>
            </span>
            </br>
            <?php echo $g_lang_text["sidebar_summary_posts"]; ?>
            <span class="sidebar_content_right_span">
                <?php echo get_posts_number(); ?>
            </span>
            </br>
            <?php echo $g_lang_text["sidebar_summary_read"]; ?>
            <span class="sidebar_content_right_span">
                <?php echo get_read_number(); ?>
            </span>
            </br>
            <?php echo $g_lang_text["sidebar_summary_comment"]; ?>
            <span class="sidebar_content_right_span">
                <?php echo get_comment_number(); ?>
            </span>
            </br>
            <?php echo $g_lang_text["sidebar_summary_email"]; ?>
            <span class="sidebar_content_right_span">
                <?php echo get_user_email(); ?>
            </span>
            </br>
        </div>
    </div>
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_category_title"]; ?></div>
        <div class="sidebar_content_div"><?php echo make_category_list(); ?></div>
    </div>
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_archive_title"]; ?></div>
        <div class="sidebar_content_div"><?php echo make_archive_list(); ?></div>
    </div>
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_reading_title"]; ?></div>
        <div class="sidebar_content_div"><?php echo make_reading_list(); ?></div>
    </div>
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_commnet_title"]; ?></div>
        <div class="sidebar_content_div"><?php echo make_comment_list(); ?></div>
    </div>
</div>

