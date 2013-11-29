<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $lang_text["blog_name"]." - ".$lang_text["login_page_title"]; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link type="text/css" rel="stylesheet" href="blog.css"/>
</head>
<body>
    <form method="post" id="login_form" name="login_form" action="index.php?action=\"login\"">
        <table id="login_table">
            <tr id="login_tr" name="login_tr">
                <td colspan=2 id="login_td_title" name="login_td_title">
                    <?php echo $lang_text["blog_name"]." - ".$lang_text["login_page_title"]; ?>
                </td>
            </tr>
            <tr id="login_tr1" name="login_tr1">
                <td id="login_td_label" name="login_td_label">
                    <?php echo $lang_text["login_user_name"].": "; ?>
                </td>
                <td id="login_td_input" name="login_td_input">
                    <input type="text" id="login_user_name_input" name="login_user_name_input">
                </td>
            </tr>
            <tr id="login_tr2" name="login_tr2">
                <td id="login_td_label" name="login_td_label">
                    <?php echo $lang_text["login_user_passwd"].": "; ?>
                </td>
                <td id="login_td_input" name="login_td_input">
                    <input type="text" id="login_user_passwd_input" name="login_user_passwd_input">
                </td>
            </tr>
            <tr id="login_tr1" name="login_tr1">
                <td colspan=2 id="login_td_submit" name="login_td_submit">
                    <input type="submit" id="login_submit_input" name="login_submit_input" value=<?php echo $lang_text["login_submit"]; ?> >
                </td>
            </tr>
            <tr id="login_tr2" name="login_tr2">
                <td colspan=2 id="login_td_register" name="login_td_register">
                    <a href="index.php?page=register"><?php echo $lang_text["goto_register"]; ?></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
