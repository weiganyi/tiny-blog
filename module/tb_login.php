<?php
/*
    create by weiganyi on 20131128
*/

function login_init()
{
    session_start();
}

function check_login()
{
    if (isset($SESSION["valid_user"]))
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>
