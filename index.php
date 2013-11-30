<?php
/*
    create by weiganyi on 20131128
*/

define('ROOTPATH', dirname(__FILE__).'/');

require_once(ROOTPATH . "module/tb_db.php");
$g_db = new tb_db();

require_once(ROOTPATH . "module/tb_lang.php");
$lang = get_language();
require_once(ROOTPATH . "lang/$lang.php");

require_once(ROOTPATH . "module/tb_login.php");
$g_login = new tb_login();

/* do login and register */
$g_login->login_init();
if ($g_login->has_page("login") == true)
{
    $g_login->set_jump_to_login(true);
}
elseif ($g_login->has_page("register") == true)
{
    $g_login->set_jump_to_register(true);
}
else
{
    if ($g_login->is_logining() == true)
    {
        $result = $g_login->do_login();
        if ($result == false)
        {
            $g_login->set_jump_to_login(true);
        }
    }
    elseif ($g_login->is_registering() == true)
    {
        $result = $g_login->do_register();
        if ($result == false)
        {
            $g_login->set_jump_to_register(true);
        }
    }
    elseif ($g_login->is_logouting() == true)
    {
        $g_login->do_logout();
    }
}

/* display page */
if ($g_login->is_jump_to_login() == true)
{
    require_once(ROOTPATH . "login.php");
}
elseif ($g_login->is_jump_to_register() == true)
{
    require_once(ROOTPATH . "register.php");
}
else
{
    require_once(ROOTPATH . "head.php");
    require_once(ROOTPATH . "menu.php");
    require_once(ROOTPATH . "sidebar.php");



    require_once(ROOTPATH . "foot.php");
}

?>
