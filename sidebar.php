
<div id="sidebar_div">
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_notice_title"]; ?></div>
        <div class="sidebar_content_div"><?php echo get_blog_notice(); ?></div>
    </div>
    <div class="sidebar_frame_div">
        <div class="sidebar_title_div"><?php echo $g_lang_text["sidebar_summary_title"]; ?></div>
        <div class="sidebar_content_div">
            <?php
                echo $g_lang_text["sidebar_summary_bloger"].get_bloger_name()."</br>";
                echo $g_lang_text["sidebar_summary_register"].get_user_registered()."</br>";
                echo $g_lang_text["sidebar_summary_posts"].get_posts_number()."</br>";
                echo $g_lang_text["sidebar_summary_read"].get_read_number()."</br>";
                echo $g_lang_text["sidebar_summary_comment"].get_comment_number()."</br>";
                echo $g_lang_text["sidebar_summary_email"].get_user_email()."</br>";
            ?>
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

