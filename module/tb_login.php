<?php
/*
    create by weiganyi on 20131128
*/

function login_init()
{
    session_start();
}

function check_logined()
{
    if (isset($_SESSION["valid_user"]))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function has_page($page)
{
    if (isset($_REQUEST["page"]) && $_REQUEST["page"]==$page)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function is_logining()
{
    if (isset($_SESSION["action"]) &&
        $_SESSION["action"] == "login" &&
        isset($_SESSION["login_user_name_input"]) && 
        isset($_SESSION["login_user_passwd_input"]))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function do_login()
{
    global $g_db;

    $user_name = $_SESSION["login_user_name_input"];
    $user_passwd = $_SESSION["login_user_passwd_input"];

    $result = $g_db->get_tb_users($user_name);
    if ($result["num"] == 1)
    {
        $row = $result["row"];
        //the column 2 is user_password
        $passwd = $row[2];

        if ($passwd == $user_passwd)
        {
            //change the status of the user_name to registered
            $_SESSION["valid_user"] = $user_name;

            return true;
        }
    }

    return false;
}

?>
