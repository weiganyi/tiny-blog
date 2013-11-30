<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $lang_text["blog_name"]." - ".$lang_text["reg_page_title"]; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="blog.css"/>
</head>
<body>
    <form method="post" id="reg_form" name="reg_form" action="index.php?action=register">
        <table id="reg_table">
            <tr id="reg_tr" name="reg_tr">
                <td colspan=2 id="reg_td_title" name="reg_td_title">
                    <a href="index.php" id="reg_td_title_link" name="reg_td_title_link">
                        <?php echo $lang_text["blog_name"]; ?>
                    </a>
                </td>
            </tr>
            <tr id="reg_tr1" name="reg_tr1">
                <td id="reg_td_label" name="reg_td_label">
                    <?php echo $lang_text["reg_user_name"].": "; ?>
                </td>
                <td id="reg_td_input" name="reg_td_input">
                    <input type="text" id="reg_user_name_input" name="reg_user_name_input">
                </td>
            </tr>
            <tr id="reg_tr2" name="reg_tr2">
                <td id="reg_td_label" name="reg_td_label">
                    <?php echo $lang_text["reg_user_passwd"].": "; ?>
                </td>
                <td id="reg_td_input" name="reg_td_input">
                    <input type="text" id="reg_user_passwd_input" name="reg_user_passwd_input">
                </td>
            </tr>
            <tr id="reg_tr1" name="reg_tr1">
                <td id="reg_td_label" name="reg_td_label">
                    <?php echo $lang_text["reg_user_mail"].": "; ?>
                </td>
                <td id="reg_td_input" name="reg_td_input">
                    <input type="text" id="reg_user_email_input" name="reg_user_email_input">
                </td>
            </tr>
            <tr id="reg_tr2" name="reg_tr2">
                <td colspan=2 id="reg_td_submit" name="reg_td_submit">
                    <input type="submit" id="reg_submit_input" name="reg_submit_input" value=<?php echo $lang_text["reg_submit"]; ?> >
                </td>
            </tr>
            <tr id="reg_tr1" name="reg_tr1">
                <td colspan=2 id="reg_td_notice" name="reg_td_notice">
                    <?php 
                        $fail_notice = $g_login->get_fail_notice();
                        if (!empty($fail_notice))
                        {
                            echo "<p>$fail_notice</p>";
                        }
                    ?>
                </td>
            </tr>
            <tr id="reg_tr2" name="reg_tr2">
                <td colspan=2 id="reg_td_login" name="reg_td_login">
                    <a href="index.php?page=login">
                        <?php echo $lang_text["reg_goto_login"]; ?>
                    </a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
