<?php
/*
    create by weiganyi on 20131128
*/

class tb_login
{
    //navigate to login.php
    var $jump_to_login = false;
    //navigate to register.php
    var $jump_to_register = false;
    //the notice display after do_login() or do_register()
    var $fail_notice;

    function is_jump_to_login()
    {
        return $this->jump_to_login;
    }

    function is_jump_to_register()
    {
        return $this->jump_to_register;
    }

    function get_fail_notice()
    {
        return $this->fail_notice;
    }

    function login_init()
    {
        session_start();

        //set default timezone
        date_default_timezone_set("Asia/Hong_Kong");
    }

    function is_logined()
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

    function is_admin_logined()
    {
        global $g_db;

        if (empty($g_db))
        {
            echo "Error: is_admin_logined() necessary params is null.";
            exit;
        }

        if (isset($_SESSION["valid_user"]))
        {
            $logined_user = $_SESSION["valid_user"];

            $result = $g_db->get_tb_users_by_user_level("admin");
            if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
            {
                $num = $result["num"];
                $rows = $result["rows"];

                $user = $rows[0];

                //the column 1 is user_name
                $user_name = $user[1];

                if ($user_name == $logined_user)
                {
                    return true;
                }
            }

            return false;
        }
        else
        {
            return false;
        }
    }

    function get_logined_user()
    {
        if (isset($_SESSION["valid_user"]))
        {
            return $_SESSION["valid_user"];
        }
        else
        {
            return NULL;
        }
    }

    function is_logining()
    {
        if (isset($_REQUEST["action"]) &&
            $_REQUEST["action"] == "login" &&
            isset($_REQUEST["login_user_name_input"]) && 
            isset($_REQUEST["login_user_passwd_input"]))
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
        global $g_lang_text;

        $user_name = $_REQUEST["login_user_name_input"];
        $user_password = $_REQUEST["login_user_passwd_input"];

        //if the user is already login, jump to index directly.
        if (isset($_SESSION["valid_user"]) && $_SESSION["valid_user"] == $user_name)
        {
            return true;
        }

        $result = $g_db->get_tb_users_by_user_name($user_name);
        if ($result["num"] == 1)
        {
            $rows = $result["rows"];
            //the column 2 is user_password
            $passwd = $rows[0][2];

            if ($passwd == $user_password)
            {
                //change the status of the user_name to registered
                $_SESSION["valid_user"] = $user_name;
                return true;
            }
            else
            {
                $this->fail_notice = $g_lang_text["tb_login_passwd_incorrent"];
                return false;
            }
        }

        $this->fail_notice = $g_lang_text["tb_login_user_noexist"];
        return false;
    }

    function is_registering()
    {
        if (isset($_REQUEST["action"]) &&
            $_REQUEST["action"] == "register" &&
            isset($_REQUEST["reg_user_name_input"]) && 
            isset($_REQUEST["reg_user_passwd_input"]) && 
            isset($_REQUEST["reg_user_email_input"]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function do_register()
    {
        global $g_db;
        global $g_lang_text;

        $user_name = $_REQUEST["reg_user_name_input"];
        $user_password = $_REQUEST["reg_user_passwd_input"];
        $user_email = $_REQUEST["reg_user_email_input"];

        $result = $g_db->get_tb_users_by_user_name($user_name);
        if ($result["num"] == 0)
        {
            $user_registered = date("Y-m-d h:i:s");
            $user_level = "user";
            $user_array = array("user_name"=>"$user_name", 
                                "user_password"=>"$user_password", 
                                "user_registered"=>"$user_registered", 
                                "user_email"=>"$user_email", 
                                "user_level"=>"$user_level");

            $result = $g_db->insert_tb_users($user_array);
            if ($result == false)
            {
                $this->fail_notice = $g_lang_text["tb_login_server_stop"];
            }

            return $result;
        }
        else
        {
            $this->fail_notice = $g_lang_text["tb_login_user_exist"];
            return false;
        }
    }

    function is_logouting()
    {
        if (isset($_REQUEST["action"]) &&
            $_REQUEST["action"] == "logout")
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function do_logout()
    {
        if (isset($_SESSION["valid_user"]) && !empty($_SESSION["valid_user"]))
        {
            unset($_SESSION["valid_user"]);
            return true;
        }

        return false;
    }

    function login_main()
    {
        if (has_page("login") == true)
        {
            $this->jump_to_login = true;
        }
        elseif (has_page("register") == true)
        {
            $this->jump_to_register = true;
        }
        else
        {
            if ($this->is_logining() == true)
            {
                $result = $this->do_login();
                if ($result == false)
                {
                    $this->jump_to_login = true;
                }
            }
            elseif ($this->is_registering() == true)
            {
                $result = $this->do_register();
                if ($result == false)
                {
                    $this->jump_to_register = true;
                }
            }
            elseif ($this->is_logouting() == true)
            {
                $this->do_logout();
            }
        }
    }
}

?>
