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

//navigate to login.php
$jump_to_login = false;
//navigate to register.php
$jump_to_register = false;

login_init();
if (has_page("login") == true)
{
    $jump_to_login = true;
}
elseif (has_page("register") == true)
{
    $jump_to_register = true;
}
else
{
    if (is_logining() == true)
    {
        $result = do_login();
        if ($result == false)
        {
            $jump_to_login = true;
        }
    }
}

if ($jump_to_login == true)
{
    require_once(ROOTPATH . "login.php");
}
elseif ($jump_to_register == true)
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
