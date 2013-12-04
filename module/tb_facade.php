<?php
/*
    create by weiganyi on 20131203
*/

function get_language()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_language() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_option("language");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $lang = $rows[0][2];
    }
    else
    {
        $lang = "en";
    }

    return $lang;
}

function get_blog_name()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_blog_name() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_option("blog_name");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $name = $rows[0][2];
    }
    else
    {
        $name = "";
    }

    return $name;
}

function get_blog_notice()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_blog_notice() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_option("blog_notice");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $notice = $rows[0][2];
    }
    else
    {
        $notice = "";
    }

    return $notice;
}

function get_bloger_name()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_bloger_name() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_option("bloger_name");
    if (!empty($result["num"]) && !empty($result["rows"]) && $result["num"]==1)
    {
        $rows = $result["rows"];
        //the column 2 is option_value
        $name = $rows[0][2];
    }
    else
    {
        $name = "";
    }

    return $name;
}

function get_user_registered()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_user_registered() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_users();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        for ($idx=0; $idx<$num; $idx++)
        {
            $user = $rows[$idx];
            //the column 3 is user_level
            if ($user[5] == "admin")
            {
                //the column 3 is user_registered
                $user_registered = $user[3];
                break;
            }
        }
    }
    else
    {
        $user_registered = "";
    }

    return $user_registered;
}

function get_posts_number()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_posts_number() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_posts();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $posts_number = (String)$num;
    }
    else
    {
        $posts_number = "0";
    }

    return $posts_number;
}

function get_read_number()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_read_number() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_posts();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $read_number = 0;
        //calculate the read number for all posts
        for ($idx=0; $idx<$num; $idx++)
        {
            $post = $rows[$idx];
            //the column 7 is read_number
            $read_number = $read_number + $post[7];
        }

        $read_number = (String)$read_number;
    }
    else
    {
        $read_number = "0";
    }

    return $read_number;
}

function get_comment_number()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_comment_number() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_posts();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $comment_number = 0;
        //calculate the number for all posts
        for ($idx=0; $idx<$num; $idx++)
        {
            $post = $rows[$idx];
            //the column 8 is comment_number
            $comment_number = $comment_number + $post[8];
        }

        $comment_number = (String)$comment_number;
    }
    else
    {
        $comment_number = "0";
    }

    return $comment_number;
}

function get_user_email()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_user_email() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_users();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        for ($idx=0; $idx<$num; $idx++)
        {
            $user = $rows[$idx];
            //the column 5 is user_level
            if ($user[5] == "admin")
            {
                //the column 4 is user_email
                $user_email = $user[4];
                break;
            }
        }
    }
    else
    {
        $user_email = "";
    }

    return $user_email;
}

function get_category_list()
{
    global $g_db;

    if (empty($g_db))
    {
        echo "Error: get_category_list() necessary params is null.";
        exit;
    }

    $result = $g_db->get_tb_categories();
    if (!empty($result["num"]) && !empty($result["rows"]))
    {
        $num = $result["num"];
        $rows = $result["rows"];

        $categories_list = "";
        for ($idx=0; $idx<$num; $idx++)
        {
            $category = $rows[$idx];
            //the column 0 is category_id
            $category_id = $category[0];
            //the column 1 is category_name
            $category_name = $category[1];
            if ($category_id)
            {
                $result2 = $g_db->get_tb_posts_by_category($category_id);
                if (!empty($result2["num"]) && !empty($result2["rows"]) && $result2["num"]==1)
                {
                    $rows2 = $result2["rows"];
                    $posts_number = $rows2[0][0];

                    $categories_list = $categories_list . 
                                    "<a id='sidebar_category_a' href='index.php?cat=$category_name'>$category[1]</a>" .
                                    " ($posts_number)" . 
                                    "</br>";
                }
            }
        }
    }
    else
    {
        $categories_list = "";
    }

    return $categories_list;
}

