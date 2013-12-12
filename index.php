<?php
/*
    create by weiganyi on 20131128
*/

define('ROOTPATH', dirname(__FILE__).'/');

//include model file
require_once(ROOTPATH . "model/tb_db.php");
$g_db = new tb_db();

//include control file
require_once(ROOTPATH . "control/tb_lang.php");
$g_lang = get_language();
require_once(ROOTPATH . "lang/$g_lang.php");

require_once(ROOTPATH . "control/tb_login.php");
$g_login = new tb_login();

require_once(ROOTPATH . "control/tb_cache.php");
$g_cache = new tb_cache();

require_once(ROOTPATH . "control/tb_function.php");

//session init
$g_login->login_init();
//do login, register, logout
$g_login->login_main();

//display page
if ($g_login->is_jump_to_login() == true)
{
    require_once(ROOTPATH . "login.php");
}
elseif ($g_login->is_jump_to_register() == true)
{
    require_once(ROOTPATH . "register.php");
}
elseif (is_ajax() == true)
{
    $page = get_page();
    if (!empty($page))
    {
        require_once(ROOTPATH . "$page.php");
    }
}
else
{
    //because the setcookie need be done before any html output, so do it in here
    do_post_read_action();

    require_once(ROOTPATH . "head.php");
    require_once(ROOTPATH . "menu.php");
    require_once(ROOTPATH . "sidebar.php");

    $page = get_page();
    if (!empty($page))
    {
        require_once(ROOTPATH . "$page.php");
    }
    else
    {
        require_once(ROOTPATH . "post_list.php");
    }

    require_once(ROOTPATH . "foot.php");
}

?>
