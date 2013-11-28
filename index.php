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

login_init();
if (check_login() == false)
{
    require_once(ROOTPATH . "login.php");
}
else
{
    require_once(ROOTPATH . "head.php");
    require_once(ROOTPATH . "menu.php");
    require_once(ROOTPATH . "sidebar.php");



    require_once(ROOTPATH . "foot.php");
}

?>
