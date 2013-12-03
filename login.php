<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $lang_text["blog_name"]." - ".$lang_text["login_page_title"]; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="blog.css"/>
	<script type="text/javascript" src="module/tb_function.js"></script>
</head>
<body>
    <form method="post" id="login_form" name="login_form" action="index.php?action=login">
        <table id="login_table">
            <tr id="login_tr">
                <td colspan=2 id="login_td_title">
                    <a href="index.php" id="login_td_title_link" name="login_td_title_link">
                        <?php echo $lang_text["blog_name"]; ?>
                    </a>
                </td>
            </tr>
            <tr id="login_tr1">
                <td id="login_td_label">
                    <?php echo $lang_text["login_user_name"].": "; ?>
                </td>
                <td id="login_td_input">
                    <input type="text" id="login_user_name_input" name="login_user_name_input">
                </td>
            </tr>
            <tr id="login_tr2">
                <td id="login_td_label">
                    <?php echo $lang_text["login_user_passwd"].": "; ?>
                </td>
                <td id="login_td_input">
                    <input type="text" id="login_user_passwd_input" name="login_user_passwd_input">
                </td>
            </tr>
            <tr id="login_tr1">
                <td colspan=2 id="login_td_submit">
                    <input type="submit" id="login_submit_input" name="login_submit_input" value=<?php echo $lang_text["login_submit"]; ?> >
                </td>
            </tr>
            <tr id="login_tr2">
                <td colspan=2 id="login_td_notice">
                    <?php 
                        $fail_notice = $g_login->get_fail_notice();
                        if (!empty($fail_notice))
                        {
                            echo "<p>$fail_notice</p>";
                        }
                    ?>
                </td>
            </tr>
            <tr id="login_tr1">
                <td colspan=2 id="login_td_register">
                    <a href="index.php?page=register">
                        <?php echo $lang_text["login_goto_register"]; ?>
                    </a>
                </td>
            </tr>
        </table>
    </form>
    <script type="text/javascript">
        var login_form = document.getElementById("login_form");
        if (login_form)
        {
            tb_add_event(login_form, "submit", function(event){
                var user_name_input = document.getElementById("login_user_name_input");
                if (user_name_input.value == "")
                {
                    var fail_notice = document.getElementById("login_td_notice");
                    if (fail_notice)
                    {
                        //set the failure notice text
                        tb_set_text_content(fail_notice, "<?php echo $lang_text['login_user_null']; ?>");
                    }

                    return tb_cancel_event(event);
                }

                var user_passwd_input = document.getElementById("login_user_passwd_input");
                if (user_passwd_input.value == "")
                {
                    var fail_notice = document.getElementById("login_td_notice");
                    if (fail_notice)
                    {
                        //set the failure notice text
                        tb_set_text_content(fail_notice, "<?php echo $lang_text['login_passwd_null']; ?>");
                    }

                    return tb_cancel_event(event);
                }
            });
        }
    </script>
</body>
</html>
