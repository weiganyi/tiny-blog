<?php
/*
    create by weiganyi on 20131128
*/

define('ROOTPATH', dirname(__FILE__).'/');

require_once(ROOTPATH . "model/tb_db.php");
$g_db = new tb_db();

require_once(ROOTPATH . "control/tb_lang.php");
$lang = get_language();
require_once(ROOTPATH . "lang/$lang.php");

require_once(ROOTPATH . "control/tb_login.php");
$g_login = new tb_login();

require_once(ROOTPATH . "control/tb_function.php");

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
else
{
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
        require_once(ROOTPATH . "post.php");
    }

    require_once(ROOTPATH . "foot.php");
}

?>
