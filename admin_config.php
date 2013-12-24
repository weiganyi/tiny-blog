
<?php do_admin_action(); ?>

<div id='config_div'>
    <form method="post" id="config_form" name="config_form" action="index.php?action=edit_option&page=admin_config">
        <table id="config_table">
            <tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_password"].": "; ?>
                </td>
                <td class="config_input_td">
                    <input type="text" class="config_option_middle_input" name="user_password" value="<?php echo get_user_passwd(); ?>">
                </td>
            </tr>
            <tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_email"].": "; ?>
                </td>
                <td class="config_input_td">
                    <input type="text" class="config_option_middle_input" name="user_email" value="<?php echo get_user_email(); ?>">
                </td>
            </tr>
        	<tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_language"].": "; ?>
                </td>
                <td class="config_input_td">
                    <input type="text" class="config_option_short_input" name="language" value="<?php echo get_language(); ?>">
                </td>
            </tr>
            <tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_page_posts"].": "; ?>
                </td>
                <td class="config_input_td">
                    <input type="text" class="config_option_short_input" name="page_posts" value="<?php echo get_page_posts(); ?>">
                </td>
            </tr>
            <tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_blog_name"].": "; ?>
                </td>
                <td class="config_input_td">
                    <input type="text" class="config_option_middle_input" name="blog_name" value="<?php echo get_blog_name(); ?>">
                </td>
            </tr>
            <tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_bloger_name"].": "; ?>
                </td>
                <td class="config_input_td">
                    <input type="text" class="config_option_middle_input" name="bloger_name" value="<?php echo get_bloger_name(); ?>">
                </td>
            </tr>
            <tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_blog_notice"].": "; ?>
                </td>
                <td class="config_input_td">
                    <textarea rows='5' class="config_option_long_input" name='blog_notice'><?php echo get_blog_notice(); ?></textarea>
                </td>
            </tr>
            <tr class="config_tr">
                <td class="config_label_td">
                    <?php echo $g_lang_text["admin_config_foot_text"].": "; ?>
                </td>
                <td class="config_input_td">
                    <input type="text" class="config_option_long_input" name="foot_text" value="<?php echo get_foot_text(); ?>">
                </td>
            </tr>
            <tr class="config_tr">
                <td colspan=2 id="config_submit_td">
                    <input type="submit" name="config_submit_input" value=<?php echo $g_lang_text["admin_config_submit"]; ?> >
                </td>
            </tr>
        </table>
    </form>
</div>

