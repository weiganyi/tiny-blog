<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo get_blog_name()." - ".$lang_text["reg_page_title"]; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="blog.css"/>
	<script type="text/javascript" src="module/tb_function.js"></script>
</head>
<body>
    <form method="post" id="reg_form" name="reg_form" action="index.php?action=register">
        <table id="reg_table">
            <tr id="reg_tr">
                <td colspan=2 id="reg_title_td">
                    <a href="index.php" id="reg_title_a" name="reg_title_a">
                        <?php echo get_blog_name(); ?>
                    </a>
                </td>
            </tr>
            <tr class="reg_tr1">
                <td class="reg_label_td">
                    <?php echo $lang_text["reg_user_name"].": "; ?>
                </td>
                <td class="reg_input_td">
                    <input type="text" class="reg_input" name="reg_user_name_input">
                </td>
            </tr>
            <tr class="reg_tr2">
                <td class="reg_label_td">
                    <?php echo $lang_text["reg_user_passwd"].": "; ?>
                </td>
                <td class="reg_input_td">
                    <input type="text" class="reg_input" name="reg_user_passwd_input">
                </td>
            </tr>
            <tr class="reg_tr1">
                <td class="reg_label_td">
                    <?php echo $lang_text["reg_user_mail"].": "; ?>
                </td>
                <td class="reg_input_td">
                    <input type="text" class="reg_input" name="reg_user_email_input">
                </td>
            </tr>
            <tr class="reg_tr2">
                <td colspan=2 id="reg_submit_td">
                    <input type="submit" id="reg_submit_input" name="reg_submit_input" value=<?php echo $lang_text["reg_submit"]; ?> >
                </td>
            </tr>
            <tr class="reg_tr1">
                <td colspan=2 id="reg_notice_td">
                    <?php 
                        $fail_notice = $g_login->get_fail_notice();
                        if (!empty($fail_notice))
                        {
                            echo "<p>$fail_notice</p>";
                        }
                    ?>
                </td>
            </tr>
            <tr class="reg_tr2">
                <td colspan=2 id="reg_login_td">
                    <a href="index.php?page=login">
                        <?php echo $lang_text["reg_goto_login"]; ?>
                    </a>
                </td>
            </tr>
        </table>
    </form>
    <script type="text/javascript">
        var reg_form = document.getElementById("reg_form");
        if (reg_form)
        {
            tb_add_event(reg_form, "submit", function(event){
                var user_name_input = document.getElementById("reg_user_name_input");
                if (user_name_input.value == "")
                {
                    var fail_notice = document.getElementById("reg_notice_td");
                    if (fail_notice)
                    {
                        //set the failure notice text
                        tb_set_text_content(fail_notice, "<?php echo $lang_text['reg_user_null']; ?>");
                    }

                    return tb_cancel_event(event);
                }

                var user_passwd_input = document.getElementById("reg_user_passwd_input");
                if (user_passwd_input.value == "")
                {
                    var fail_notice = document.getElementById("reg_notice_td");
                    if (fail_notice)
                    {
                        //set the failure notice text
                        tb_set_text_content(fail_notice, "<?php echo $lang_text['reg_passwd_null']; ?>");
                    }

                    return tb_cancel_event(event);
                }

                var user_email_input = document.getElementById("reg_user_email_input");
                if (user_email_input.value == "")
                {
                    var fail_notice = document.getElementById("reg_notice_td");
                    if (fail_notice)
                    {
                        //set the failure notice text
                        tb_set_text_content(fail_notice, "<?php echo $lang_text['reg_email_null']; ?>");
                    }

                    return tb_cancel_event(event);
                }
            });
        }
    </script>
</body>
</html>
