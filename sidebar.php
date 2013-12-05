<div id="sidebar_div">
    <div class="sidebar_title_div">
        <p class="sidebar_title"><?php echo $lang_text["sidebar_notice_title"]; ?></p>
        <p class="sidebar_content"><?php echo get_blog_notice(); ?></p>
    </div>
    <div class="sidebar_title_div">
        <p class="sidebar_title"><?php echo $lang_text["sidebar_summary_title"]; ?></p>
        <p class="sidebar_content">
            <?php
                echo $lang_text["sidebar_summary_bloger"].get_bloger_name()."</br>";
                echo $lang_text["sidebar_summary_register"].get_user_registered()."</br>";
                echo $lang_text["sidebar_summary_posts"].get_posts_number()."</br>";
                echo $lang_text["sidebar_summary_read"].get_read_number()."</br>";
                echo $lang_text["sidebar_summary_comment"].get_comment_number()."</br>";
                echo $lang_text["sidebar_summary_email"].get_user_email()."</br>";
            ?>
        </p>
    </div>
    <div class="sidebar_title_div">
        <p class="sidebar_title"><?php echo $lang_text["sidebar_category_title"]; ?></p>
        <p class="sidebar_content"><?php echo get_category_list(); ?></p>
    </div>
    <div class="sidebar_title_div">
        <p class="sidebar_title"><?php echo $lang_text["sidebar_archive_title"]; ?></p>
        <p class="sidebar_content"><?php echo get_archive_list(); ?></p>
    </div>
    <div class="sidebar_title_div">
        <p class="sidebar_title"><?php echo $lang_text["sidebar_reading_title"]; ?></p>
        <p class="sidebar_content"><?php echo get_reading_list(); ?></p>
    </div>
    <div class="sidebar_title_div">
        <p class="sidebar_title"><?php echo $lang_text["sidebar_commnet_title"]; ?></p>
        <p class="sidebar_content"><?php echo get_comment_list(); ?></p>
    </div>
</div>

